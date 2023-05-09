<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrimeiroPassoRequest;
use App\Models\PrimeiroPasso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrimeiroPassoController extends Controller
{
    protected $primeiropasso;
    protected $bag = [
        'view' => '',
        'route' => '',
        'Title' => '',
        'subtitle' => '',
        'msg' => 'temauema.msg.register'
    ];

    public function __construct(PrimeiroPasso $primeiropasso)
    {
        $this->primeiropasso = $primeiropasso;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $primeiropasso = $this->primeiropasso->paginate(20);
        return view('primeiropasso.index', compact('primeiropasso'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('primeiropasso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PrimeiroPassoRequest $request)
    {
        DB::beginTransaction();

        try {

            $dados = $request->validated();
            $dados['data_fim'] = $dados['data_fim'] . ' 23:59:59';
            $dados['status'] = 'Aberto';
            $this->primeiropasso->create($dados);

            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.create'));
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.create'));
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PrimeiroPasso  $primeiropasso
     * @return \Illuminate\Http\Response
     */
    public function show(PrimeiroPasso $primeiropasso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PrimeiroPasso  $primeiropasso
     * @return \Illuminate\Http\Response
     */
    public function edit(PrimeiroPasso $primeiropasso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PrimeiroPasso  $primeiropasso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PrimeiroPasso $primeiropasso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PrimeiroPasso  $primeiropasso
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrimeiroPasso $primeiropasso)
    {
        //
    }
}
