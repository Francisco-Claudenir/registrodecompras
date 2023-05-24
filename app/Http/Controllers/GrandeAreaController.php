<?php

namespace App\Http\Controllers;

use App\Http\Requests\GrandeArea\StoreGrandeAreaRequest;
use App\Http\Requests\GrandeArea\UpdateGrandeAreaRequest;
use App\Models\GrandeArea;
use Illuminate\Support\Facades\DB;

class GrandeAreaController extends Controller
{
    protected $grandearea;
    protected $bag = [
        'view' => '',
        'route' => '',
        'Title' => '',
        'subtitle' => '',
        'msg' => 'temauema.msg.register'
    ];

    public function __construct(GrandeArea $grandearea)
    {
        $this->grandearea = $grandearea;
    }

   
    public function index()
    {
        $grandeareas = $this->grandearea->orderby('nome', 'asc')->get();
       // dd($grandeareas);
        return view('admin.grandearea.index', compact('grandeareas'));
    }

    public function create()
    {
        return view('admin.grandearea.create');
    }

    
    public function store(StoreGrandeAreaRequest $request)
    {
        DB::beginTransaction();

        try {

            //$request->validated()
            $this->grandearea->create($request->validated());
            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.create'));
            return redirect()->back();
        } catch (\Throwable $th) {
            dd($th);
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.create'));
            return redirect()->back();
        }
    }

    
    public function show(GrandeArea $grandeArea)
    {
        //
    }

   
    public function edit($id)
    {
        $grandeareas = $this->grandearea->findOrfail($id);
        //$grandeareas = $this->grandearea->post();
        return view('admin.grandearea.edit', compact('grandeareas'));
    }

    
    public function update(StoreGrandeAreaRequest $request, $id)
    {
        DB::beginTransaction();
        
        try {
            $grandeareas = $this->grandearea->findOrfail($id);
            $grandeareas->update($request->all());
            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.create'));
            return redirect()->back();
        } catch (\Throwable $th) {
            dd($th);
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.create'));
            return redirect()->back();
        }
    }

    public function destroy(GrandeArea $grandeArea)
    {
        //
    }
}
