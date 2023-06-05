<?php

namespace App\Http\Controllers\Bati;

use App\Http\Controllers\Controller;
use App\Http\Requests\Bati\StoreBatiRequest;
use App\Http\Requests\Bati\UpdateBatiRequest;
use App\Models\Bati;
use Illuminate\Support\Facades\DB;

class BatiController extends Controller
{
    protected $bati;
    protected $bag = [
        'view' => 'admin.bati',
        'route' => '',
        'Title' => '',
        'subtitle' => '',
        'msg' => 'temauema.msg.register'
    ];

    public function __construct(Bati $bati)
    {
        $this->bati = $bati;
    }
    
    public function index()
    {
        $Batis = $this->bati->paginate(20);
        $totalBatis = Bati::count();    
        return view('admin.bati.index', compact('Batis'));
    }
 
    public function create()
    {
        return view('admin.bati.create');
    }

    
    public function store(StoreBatiRequest $request)
    {
        DB::beginTransaction();

        try {

            $this->bati->create($request->validated());
            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.create'));
            return redirect()->route('bati.index');
        } catch (\Throwable $th) {
            dd($th);
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.create'));
            return redirect()->back();
        }
    }

   
    public function show(Bati $bati)
    {
        //
    }

   
    public function edit(Bati $bati)
    {
        //
    }

   
    public function update(UpdateBatiRequest $request, Bati $bati)
    {
        //
    }

  
    public function destroy(Bati $bati)
    {
        //
    }
}
