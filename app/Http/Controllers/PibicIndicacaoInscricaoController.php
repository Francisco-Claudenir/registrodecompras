<?php

namespace App\Http\Controllers;

use App\Models\PibicIndicacao;
use App\Models\PibicIndicacaoInscricao;
use Illuminate\Http\Request;

class PibicIndicacaoInscricaoController extends Controller
{

    protected $pibicIndicacao;
    protected $pibicIndicacaoInscricao;
    // protected $bag = [
    //     'view' => 'admin.pibic',
    //     'route' => 'pibic',
    //     'msg' => 'temauema.msg.register'
    // ];

    public function __construct(PibicIndicacao $pibicIndicacao, PibicIndicacaoInscricao $pibicIndicacaoInscricao)
    {
        $this->pibicIndicacao = $pibicIndicacao;
        $this->pibicIndicacaoInscricao = $pibicIndicacaoInscricao;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index($pibic_indicacao_id, $tipo, Request $request)
    // {
    //     //verificando se existe
    //     $pibic_indicacao = $this->pibicIndicacao->where('tipo','=', $tipo)->findOrfail($pibic_indicacao_id);

    //     $listaInscritos = $this->pibicIndicacaoInscricao->join('pibic_indicacoes','pibicindicacao_inscricoes.pibicindicacao_id','=','pibic_indicacoes.pibicindicacao_id')
    //                                                     ->where('pibicindicacao_inscricoes.pibicindicacao_id', '=', $pibic_indicacao_id)
    //                                                     ->where('pibic_indicacoes.tipo', '=', $tipo)
    //                                                     ->get();


    //     return view($this->bag['view'] . '.index', compact('listaInscritos', 'links', 'ppIndicacaoBolsista'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PibicIndicacaoInscricao  $pIndicacaoInscricao
     * @return \Illuminate\Http\Response
     */
    public function show(PibicIndicacaoInscricao $pIndicacaoInscricao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PibicIndicacaoInscricao  $pIndicacaoInscricao
     * @return \Illuminate\Http\Response
     */
    public function edit(PibicIndicacaoInscricao $pIndicacaoInscricao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PibicInscricao  $pIndicacaoInscricao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PibicIndicacaoInscricao $pIndicacaoInscricao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PibicIndicacaoInscricao  $pIndicacaoInscricao
     * @return \Illuminate\Http\Response
     */
    public function destroy(PibicIndicacaoInscricao $pIndicacaoInscricao)
    {
        //
    }
}
