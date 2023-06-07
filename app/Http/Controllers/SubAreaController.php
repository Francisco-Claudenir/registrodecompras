<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubArea\StoreSubAreaRequest;
use App\Http\Requests\SubArea\UpdateSubAreaRequest;
use App\Models\SubArea;
use App\Models\GrandeArea;
use Illuminate\Support\Facades\DB;

class SubAreaController extends Controller
{
    protected $subarea;
    protected $grandeareas;
    protected $bag = [
        'view' => '',
        'route' => '',
        'Title' => '',
        'subtitle' => '',
        'msg' => 'temauema.msg.register'
    ];
    
    public function __construct(SubArea $subarea)
    {
        $this->subarea = $subarea;
    }

    public function index()
    {
        $subareas = $this->subarea->with('subArea_grandeArea')->get();
        return view('admin.subarea.index', compact('subareas'));
    }

  
    public function create()
    {
        $grandeareas =  GrandeArea::select('area_id', 'nome')->orderby('nome', 'asc')->get();
       // dd($grandeareas);
        return view('admin.subarea.create', compact('grandeareas'));
    
    }
    
    public function store(StoreSubAreaRequest $request)
    {
        DB::beginTransaction();

        try {
            SubArea::create($request->validated());
            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.create'));
            return redirect()->route('subarea.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.create'));
            return redirect()->back();
        }
    }

    
    public function show(SubArea $subArea)
    {
        //
    }

    
    public function edit($id)
    {
        $subareas = $this->subarea->findOrfail($id);
        $grandeareas =  GrandeArea::select('area_id', 'nome')->orderby('nome', 'asc')->get();
        return view('admin.subarea.edit', compact('subareas', 'grandeareas'));
    }

    
    public function update(UpdateSubAreaRequest $request, $id)
    { 
        DB::beginTransaction();
        try {
        
          //  dd(request);
            $subareas = $this->subarea->findOrfail($id);
            $subareas->update($request->all());
            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.create'));
            return redirect()->route('subarea.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.create'));
            return redirect()->back();
        }
    }

   
    public function destroy(SubArea $subArea)
    {
        //
    }
}
