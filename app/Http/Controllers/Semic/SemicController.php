<?php

namespace App\Http\Controllers\Semic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Semic\StoreSemicRequest;
use App\Http\Requests\Semic\UpdateSemicRequest;
use App\Models\Semic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SemicController extends Controller
{
    protected $semic;
    protected $bag = [
        'view' => 'admin.semic',
        'route' => 'semic',
        'msg' => 'temauema.msg.register'
    ];

    public function __construct(Semic $semic)
    {
        $this->semic = $semic;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programasSemic = $this->semic->paginate(20);
        return view('admin.semic.index', compact('programasSemic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.semic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSemicRequest $request)
    {
        try {
            DB::beginTransaction();
            $semics = $request->validated();
            $semics['data_fim'] = $semics['data_fim'] . ' 23:59:59';
            $batis['status'] = 'Aberto';
            $this->semic->create($semics);

            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.create'));
            return redirect()->route('semic.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.create'));
            return redirect()->back();
        }
    }

 
    public function show(Semic $semic)
    {
        //
    }

   
    public function edit($id)
    {
        $semic = $this->semic->findOrfail($id);
        return view('admin.semic.edit', compact('semic'));
    }

   
    public function update(UpdateSemicRequest $request, $id)
    {
        try {

            DB::beginTransaction();
            $semicUp = $this->semic->findOrfail($id);
            $semics = $request->validated();
            $semics['data_fim'] = $semics['data_fim'] . ' 23:59:59';
            $semicUp->update($semics);
            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.update'));
            return redirect()->route('semic.index');

        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.update'));
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Semic  $semic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Semic $semic)
    {
        //
    }
}
