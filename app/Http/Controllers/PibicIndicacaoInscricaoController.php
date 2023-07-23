<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use App\Models\PibicIndicacao;
use App\Models\PibicIndicacaoInscricao;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PibicIndicacaoInscricaoController extends Controller
{
    protected $pibicIndicacao, $pibicIndicacaoInscricao, $user, $centros;
    protected $bag = [
        'view' => 'page.pibic_indicacao',
        'route' => 'pibicindicacao',
        'msg' => 'temauema.msg.register'
    ];
    public function __construct(PibicIndicacao $pibicIndicacao, PibicIndicacaoInscricao $pibicIndicacaoInscricao, User $user, Centro $centros)
    {
        $this->pibicIndicacao = $pibicIndicacao;
        $this->pibicIndicacaoInscricao = $pibicIndicacaoInscricao;
        $this->centros = $centros;
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pibic_indicacao_id, $tipo, Request $request)
    {
        //verificando se existe
        $pibic_indicacao = $this->pibicIndicacao->where('tipo', '=', $tipo)->findOrfail($pibic_indicacao_id);

        $listaInscritos = $this->pibicIndicacaoInscricao->join('pibic_indicacoes', 'pibicindicacao_inscricoes.pibicindicacao_id', '=', 'pibic_indicacoes.pibicindicacao_id')
            ->where('pibic_indicacoes.pibicindicacao_id', '=', $pibic_indicacao_id)
            ->where('pibic_indicacoes.tipo', '=', $tipo)
            ->paginate(20);

        $links = $listaInscritos->appends($request->except('page'));

        return view($this->bag['view'] . '.index', compact('listaInscritos', 'links', 'pibic_indicacao'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($pibicindicacao_id)
    {
        // dd($pibicindicacao_id);

        $data_hoje = Carbon::now();

        $pibics = $this->pibicIndicacao->findOrfail($pibicindicacao_id);

        if (($data_hoje->gte($pibics->data_inicio) && $data_hoje->lte($pibics->data_fim))) {

            $centros = $this->centros->where('centros', 'not like', "%Polo%")->get();

            return view('page.pibic_indicacao.create', compact('pibics', 'centros'));
        } else {

            alert()->error(config($this->bag['msg'] . '.error.data_inscricao'));
            return redirect()->back();
        }
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
    public function show($pibicindicacao_id, $user_id, Request $request)
    {

        //Verificando se o primeiropasso_id existe
        $this->pibicIndicacao->findOrfail($pibicindicacao_id);


        //Verificando se o user_id existe
        $this->user->findOrfail($user_id);

        $dadosInscrito = $this->pibicIndicacaoInscricao->with('pp_inscricao_subArea', 'pp_inscricao_subArea.subArea_grandeArea', 'centros', 'planotrabalho', 'pp_inscricao_user')
            ->join('users', 'users.id', '=', 'primeiros_passos_inscricaos.user_id')
            ->where('users.id', '=', $user_id)
            ->where('primeiros_passos_inscricaos.primeiropasso_id', '=', $pibicindicacao_id)
            ->paginate(10);

        foreach ($dadosInscrito as $key => $dados) {

            $dados->endereco = json_decode($dados->endereco, true);
        }

        // dd($dadosInscrito);
        $links = $dadosInscrito->appends($request->except('page'));
        return view('page.pibic_indicacao.show', compact('dadosInscrito', 'links'));
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
