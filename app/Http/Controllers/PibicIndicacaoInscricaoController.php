<?php

namespace App\Http\Controllers;

use App\Http\Requests\PibicIndicacao\StorePibicIndicacaoInscricaoRequest;
use App\Models\Centro;
use App\Models\PibicIndicacao;
use App\Models\PibicIndicacaoInscricao;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    public function index($pibic_indicacao_id, Request $request)
    {
        //verificando se existe
        $pibic_indicacao = $this->pibicIndicacao->findOrfail($pibic_indicacao_id);

        $listaInscritos = $this->pibicIndicacaoInscricao->join('pibic_indicacoes', 'pibicindicacao_inscricoes.pibicindicacao_id', '=', 'pibic_indicacoes.pibicindicacao_id')
            ->where('pibic_indicacoes.pibicindicacao_id', '=', $pibic_indicacao_id)
            ->select([
                'pibicindicacao_inscricoes.numero_inscricao',
                'pibicindicacao_inscricoes.nome_orientador', 
                'pibicindicacao_inscricoes.cpf_orientador',
                'pibicindicacao_inscricoes.nome_bolsista',
                'pibicindicacao_inscricoes.cpf_bolsista',
                'pibicindicacao_inscricoes.status'
            ])->orderBy('pibicindicacao_inscricoes.numero_inscricao', 'asc')->paginate(20);

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
     * @param \Illuminate\Http\Request\PibicIndicacao\StorePibicIndicacaoInscricaoRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePibicIndicacaoInscricaoRequest $request, $pibicindicacao_id)
    {


        try {
            DB::beginTransaction();

            $data_hoje = Carbon::now();


            $pibicIndicacao_bolsistas = $this->pibicIndicacao->withCount('pibicIndicacao_Inscricao')->findOrfail($pibicindicacao_id);
            if (($data_hoje->gte($pibicIndicacao_bolsistas->data_inicio) && $data_hoje->lte($pibicIndicacao_bolsistas->data_fim))) {

                //Calculo para saber o numero de inscricao
                $numero_inscricao = $pibicIndicacao_bolsistas['pibic_indicacao__inscricao_count'] + 1;


                //combina as duas arrays $request e $ids na variavel $dados_inscricao
                $dados_inscricao = $request->all();

                $dados_inscricao['endereco_bolsista']['cep'] = str_replace(['.', '-'], '', $dados_inscricao['endereco_bolsista']['cep']);
                $dados_inscricao['cpf_bolsista'] = str_replace(['.', '-'], '', $dados_inscricao['cpf_bolsista']);
                $dados_inscricao['cpf_orientador'] = str_replace(['.', '-'], '', $dados_inscricao['cpf_orientador']);
                $dados_inscricao['telefone_bolsista'] = str_replace(['(', ')', '.', '-', ' '], '', $dados_inscricao['telefone_bolsista']);
                $dados_inscricao['telefone_orientador'] = str_replace(['(', ')', '.', '-', ' '], '', $dados_inscricao['telefone_orientador']);


                //Caminho de arquirvos

                ///////////////////////////////////////////////////Identificação do Bolsista

                //Documento Indentidade
                $extensao = $request['documento_identidade']->extension();
                $path = 'PibicIndicacaoBolsista/' . Carbon::create($pibicIndicacao_bolsistas->created_at)->format('Y') . '/' . $pibicindicacao_id . '/documento_identidade' . '/' . Auth::user()->cpf . '';
                $nome = 'documento_identidade' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
                $dados_inscricao['documento_identidade'] = $request['documento_identidade']->storeAs($path, $nome);

                //Documento Cpf
                $extensao = $request['documento_cpf']->extension();
                $path = 'PibicIndicacaoBolsista/' . Carbon::create($pibicIndicacao_bolsistas->created_at)->format('Y') . '/' . $pibicindicacao_id . '/documento_cpf' . '/' . Auth::user()->cpf . '';
                $nome = 'documento_cpf' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
                $dados_inscricao['documento_cpf'] = $request['documento_cpf']->storeAs($path, $nome);


                /////////////////////////////////////////////////////Dados Acadêmicos

                //Historico Escolar
                $extensao = $request['historico_escolar']->extension();
                $path = 'PibicIndicacaoBolsista/' . Carbon::create($pibicIndicacao_bolsistas->created_at)->format('Y') . '/' . $pibicindicacao_id . '/historico_escolar' . '/' . Auth::user()->cpf . '';
                $nome = 'historico_escolar' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
                $dados_inscricao['historico_escolar'] = $request['historico_escolar']->storeAs($path, $nome);

                //Declaracao Vinculo
                $extensao = $request['declaracao_vinculo']->extension();
                $path = 'PibicIndicacaoBolsista/' . Carbon::create($pibicIndicacao_bolsistas->created_at)->format('Y') . '/' . $pibicindicacao_id . '/declaracao_vinculo' . '/' . Auth::user()->cpf . '';
                $nome = 'declaracao_vinculo' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
                $dados_inscricao['declaracao_vinculo'] = $request['declaracao_vinculo']->storeAs($path, $nome);

                //Termo compromisso bolsista
                $extensao = $request['termocompromisso_bolsista']->extension();
                $path = 'PibicIndicacaoBolsista/' . Carbon::create($pibicIndicacao_bolsistas->created_at)->format('Y') . '/' . $pibicindicacao_id . '/termocompromisso_bolsista' . '/' . Auth::user()->cpf . '';
                $nome = 'termocompromisso_bolsista' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
                $dados_inscricao['termocompromisso_bolsista'] = $request['termocompromisso_bolsista']->storeAs($path, $nome);

                if ($pibicIndicacao_bolsistas->tipo == 'Fapema') {
                    //Termo compromisso bolsista Fapema
                    $extensao = $request['termocompromissobolsista_fapema']->extension();
                    $path = 'PibicIndicacaoBolsista/' . Carbon::create($pibicIndicacao_bolsistas->created_at)->format('Y') . '/' . $pibicindicacao_id . '/termocompromissobolsista_fapema' . '/' . Auth::user()->cpf . '';
                    $nome = 'termocompromissobolsista_fapema' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
                    $dados_inscricao['termocompromissobolsista_fapema'] = $request['termocompromissobolsista_fapema']->storeAs($path, $nome);

                    //Declaracao Vinculo Fapema
                    $extensao = $request['declaracaoempregaticio_fapema']->extension();
                    $path = 'PibicIndicacaoBolsista/' . Carbon::create($pibicIndicacao_bolsistas->created_at)->format('Y') . '/' . $pibicindicacao_id . '/declaracaoempregaticio_fapema' . '/' . Auth::user()->cpf . '';
                    $nome = 'declaracaoempregaticio_fapema' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
                    $dados_inscricao['declaracaoempregaticio_fapema'] = $request['declaracaoempregaticio_fapema']->storeAs($path, $nome);

                } else {
                    $dados_inscricao['termocompromissobolsista_fapema'] = null;
                    $dados_inscricao['declaracaoempregaticio_fapema'] = null;
                }

                if ($pibicIndicacao_bolsistas->tipo !== 'Pivic') {
                    //Declaracao negativa vinculo
                    $extensao = $request['declaracaonegativa_vinculo']->extension();
                    $path = 'PibicIndicacaoBolsista/' . Carbon::create($pibicIndicacao_bolsistas->created_at)->format('Y') . '/' . $pibicindicacao_id . '/declaracaonegativa_vinculo' . '/' . Auth::user()->cpf . '';
                    $nome = 'declaracaonegativa_vinculo' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
                    $dados_inscricao['declaracaonegativa_vinculo'] = $request['declaracaonegativa_vinculo']->storeAs($path, $nome);

                }else{
                    $dados_inscricao['declaracaonegativa_vinculo'] = null;
                }


                //Curriculo Lattes
                $extensao = $request['curriculo_lattes']->extension();
                $path = 'PibicIndicacaoBolsista/' . Carbon::create($pibicIndicacao_bolsistas->created_at)->format('Y') . '/' . $pibicindicacao_id . '/curriculo_lattes' . '/' . Auth::user()->cpf . '';
                $nome = 'curriculo_lattes' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
                $dados_inscricao['curriculo_lattes'] = $request['curriculo_lattes']->storeAs($path, $nome);

                //Declaracao conjuta estagio
                $extensao = $request['declaracao_conjuta_estagio'] ? $request['declaracao_conjuta_estagio']->extension() : null;
                if ($extensao != null) {
                    $path = 'PibicIndicacaoBolsista/' . Carbon::create($pibicIndicacao_bolsistas->created_at)->format('Y') . '/' . $pibicindicacao_id . '/declaracao_conjuta_estagio' . '/' . Auth::user()->cpf . '';
                    $nome = 'declaracao_conjuta_estagio' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
                    $dados_inscricao['declaracao_conjuta_estagio'] = $request['declaracao_conjuta_estagio']->storeAs($path, $nome);
                } else {
                    $dados_inscricao['declaracao_conjuta_estagio'] = null;
                }

                //Comprovante Conta Corrente
                $extensao = $request['comprovante_conta_corrente']->extension();
                $path = 'PibicIndicacaoBolsista/' . Carbon::create($pibicIndicacao_bolsistas->created_at)->format('Y') . '/' . $pibicindicacao_id . '/comprovante_conta_corrente' . '/' . Auth::user()->cpf . '';
                $nome = 'comprovante_conta_corrente' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
                $dados_inscricao['comprovante_conta_corrente'] = $request['comprovante_conta_corrente']->storeAs($path, $nome);


                //Termo compromisso orientador
                $extensao = $request['termocompromisso_orientador']->extension();
                $path = 'PibicIndicacaoBolsista/' . Carbon::create($pibicIndicacao_bolsistas->created_at)->format('Y') . '/' . $pibicindicacao_id . '/termocompromisso_orientador' . '/' . Auth::user()->cpf . '';
                $nome = 'termocompromisso_orientador' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
                $dados_inscricao['termocompromisso_orientador'] = $request['termocompromisso_orientador']->storeAs($path, $nome);

                if ($pibicIndicacao_bolsistas->tipo == 'Ações Afirmativas') {
                    //Documento Comprobatorio
                    $extensao = $request['doc_comprobatorio']->extension();
                    $path = 'PibicIndicacaoBolsista/' . Carbon::create($pibicIndicacao_bolsistas->created_at)->format('Y') . '/' . $pibicindicacao_id . '/doc_comprobatorio' . '/' . Auth::user()->cpf . '';
                    $nome = 'doc_comprobatorio' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
                    $dados_inscricao['doc_comprobatorio'] = $request['doc_comprobatorio']->storeAs($path, $nome);
                } else {
                    $dados_inscricao['doc_comprobatorio'] = null;
                }


                $this->pibicIndicacaoInscricao->create([
                    'pibicindicacao_id' => $pibicindicacao_id,
                    'numero_inscricao' => $numero_inscricao,
                    'user_id' => Auth::user()->id,
                    'status' => "Em Analise",
                    'nome_bolsista' => $dados_inscricao['nome_bolsista'],
                    'endereco_bolsista' => json_encode($dados_inscricao['endereco_bolsista']),
                    'curso_bolsista' => $dados_inscricao['curso_bolsista'],
                    'centro_bolsista' => $dados_inscricao['centro_bolsista'],
                    'telefone_bolsista' => $dados_inscricao['telefone_bolsista'],
                    'email_bolsista' => $dados_inscricao['email_bolsista'],
                    'numero_identidade' => $dados_inscricao['numero_identidade'],
                    'documento_identidade' => $dados_inscricao['documento_identidade'],
                    'cpf_bolsista' => $dados_inscricao['cpf_bolsista'],
                    'documento_cpf' => $dados_inscricao['documento_cpf'],
                    'nome_orientador' => $dados_inscricao['nome_orientador'],
                    'telefone_orientador' => $dados_inscricao['telefone_orientador'],
                    'cpf_orientador' => $dados_inscricao['cpf_orientador'],
                    'centro_orientador' => $dados_inscricao['centro_orientador'],
                    'email_orientador' => $dados_inscricao['email_orientador'],
                    'tituloprojeto_orientador' => $dados_inscricao['tituloprojeto_orientador'],
                    'tituloplano_bolsista' => $dados_inscricao['tituloplano_bolsista'],
                    'palavras_chave' => $dados_inscricao['palavras_chave'] ?? null,
                    'curriculolattes_orientador' => $dados_inscricao['curriculolattes_orientador'] ?? null,
                    'historico_escolar' => $dados_inscricao['historico_escolar'],
                    'declaracao_vinculo' => $dados_inscricao['declaracao_vinculo'],
                    'termocompromisso_bolsista' => $dados_inscricao['termocompromisso_bolsista'],
                    'declaracaonegativa_vinculo' => $dados_inscricao['declaracaonegativa_vinculo'],
                    'termocompromissobolsista_fapema' => $dados_inscricao['termocompromissobolsista_fapema'],
                    'declaracaoempregaticio_fapema' => $dados_inscricao['declaracaoempregaticio_fapema'],
                    'curriculo_lattes' => $dados_inscricao['curriculo_lattes'],
                    'declaracao_conjuta_estagio' => $dados_inscricao['declaracao_conjuta_estagio'],
                    'doc_comprobatorio' => $dados_inscricao['doc_comprobatorio'],
                    'agencia_banco' => $dados_inscricao['agencia_banco'],
                    'numero_conta_corrente' => $dados_inscricao['numero_conta_corrente'],
                    'comprovante_conta_corrente' => $dados_inscricao['comprovante_conta_corrente'],
                    'termocompromisso_orientador' => $dados_inscricao['termocompromisso_orientador'],
                ]);


                DB::commit();
                alert()->success(config($this->bag['msg'] . '.success.inscricao'));
                return redirect()->route('pibicindicacao.page', ['pibicindicacao_id' => $pibicindicacao_id]);
            } else {
                alert()->error(config($this->bag['msg'] . '.error.data_inscricao'));
                return redirect()->route('pibicindicacao.page', ['pibicindicacao_id' => $pibicindicacao_id]);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.inscricao'));
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\PibicIndicacaoInscricao $pIndicacaoInscricao
     * @return \Illuminate\Http\Response
     */
    public function show($pibicindicacao_id, $user_id, Request $request)
    {

        //Verificando se o primeiropasso_id existe
        $this->pibicIndicacao->findOrfail($pibicindicacao_id);


        //Verificando se o user_id existe
        $this->user->findOrfail($user_id);
        $dadosInscrito = $this->pibicIndicacaoInscricao
            ->with('centroBolsista', 'cursoBolsista', 'centroOrientador')
            ->join('users', 'users.id', '=', 'pibicindicacao_inscricoes.user_id')
            ->where('users.id', '=', $user_id)
            ->where('pibicindicacao_inscricoes.pibicindicacao_id', '=', $pibicindicacao_id)
            ->paginate(10);

        foreach ($dadosInscrito as $key => $dados) {

            $dados->endereco_bolsista = json_decode($dados->endereco, true);
        }

//        dd($dadosInscrito);
        $links = $dadosInscrito->appends($request->except('page'));
        return view('page.pibic_indicacao.show', compact('dadosInscrito', 'links'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\PibicIndicacaoInscricao $pIndicacaoInscricao
     * @return \Illuminate\Http\Response
     */
    public function edit(PibicIndicacaoInscricao $pIndicacaoInscricao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PibicInscricao $pIndicacaoInscricao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PibicIndicacaoInscricao $pIndicacaoInscricao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\PibicIndicacaoInscricao $pIndicacaoInscricao
     * @return \Illuminate\Http\Response
     */
    public function destroy(PibicIndicacaoInscricao $pIndicacaoInscricao)
    {
        //
    }
}
