<?php

namespace App\Http\Controllers\PP_IndicacaoBolsistas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PP_IndicacaoBolsistas\StorePP_IndicacaoBolsistasInscricaoRequest;
use App\Models\PP_IndicacaoBolsistas;
use App\Models\PP_IndicacaoBolsistasInscricao;
use App\Models\Centro;
use App\Models\Curso;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use PhpParser\Node\Stmt\TryCatch;

class PP_IndicacaoBolsistasInscricaoController extends Controller
{
    protected $pp_indicacao_bolsistas;
    protected $pp_i_bolsistas_inscricao;
    protected $centros;
    protected $user;
    protected $curso;
    protected $bag = [
        'view' => 'page.pp_indicacao_bolsistas',
        'route' => 'pp-i-bolsistas-inscricao',
        'msg' => 'temauema.msg.register'
    ];

    public function __construct(
        PP_IndicacaoBolsistas $pp_indicacao_bolsistas,
        PP_IndicacaoBolsistasInscricao $pp_i_bolsistas_inscricao,
        Centro $centros,
        User $user,
        Curso $curso
    ) {
        $this->pp_indicacao_bolsistas = $pp_indicacao_bolsistas;
        $this->pp_i_bolsistas_inscricao = $pp_i_bolsistas_inscricao;
        $this->centros = $centros;
        $this->user = $user;
        $this->curso = $curso;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Tras a lista de inscritos
    public function index($pp_indicacao_bolsista_id, Request $request)
    {
        //Verificando se o id existe
        $this->pp_indicacao_bolsistas->findOrfail($pp_indicacao_bolsista_id);

        //Buscando a lista de inscritos atraves de join
        $listaInscritos = $this->pp_i_bolsistas_inscricao
            ->join('users', 'users.id', '=', 'pp_indicacao_bolsistas_inscricao.user_id')
            ->where('pp_indicacao_bolsistas_inscricao.pp_i_bolsista_id', '=', $pp_indicacao_bolsista_id)
            ->select([
                'users.nome',
                'users.email',
                'users.cpf',
                'users.telefone',
                'pp_indicacao_bolsistas_inscricao.pp_i_bolsista_id',
                'pp_indicacao_bolsistas_inscricao.pp_i_bolsista_inscricao_id',
                'pp_indicacao_bolsistas_inscricao.numero_inscricao'
            ])->paginate(20);

        $links = $listaInscritos->appends($request->except('page'));

        return view($this->bag['view'] . '.index', compact('listaInscritos', 'links'));
    }

    //Tras todas as informações que o candidato enviou
    public function espelho($pp_indicacao_bolsista_id, $pp_i_bolsista_inscricao_id)
    {
        //Verificando se o pp_indicacao_bolsista_id existe
        $this->pp_indicacao_bolsistas->findOrfail($pp_indicacao_bolsista_id);

        $dadosInscrito = $this->pp_i_bolsistas_inscricao
            ->join('users', 'users.id', '=', 'pp_indicacao_bolsistas_inscricao.user_id')
            ->where('pp_indicacao_bolsistas_inscricao.pp_i_bolsista_id', '=', $pp_indicacao_bolsista_id)
            ->findOrfail($pp_i_bolsista_inscricao_id);

        $endereco = json_decode($dadosInscrito->endereco, true);

        //Buscando o centro do candidato
        $centro_candidato = $this->centros->findOrfail($dadosInscrito->centro_id);

        //Buscando o centro do orientador
        $centro_orientador = $this->centros->findOrfail($dadosInscrito->centro_orientador_id);

        //Buscando o curso do candidato
        $curso = $this->curso->findOrfail($dadosInscrito->curso_id);

        return view('admin.pp_indicacao_bolsistas.espelho', compact('dadosInscrito', 'endereco', 'centro_candidato', 'centro_orientador', 'curso'));
    }

    //Gera o pdf
    public function gerarPDF($pp_indicacao_bolsista_id, $pp_i_bolsista_inscricao_id)
    {
        //Verificando se o pp_indicacao_bolsista_id existe
        $pp_indicacao_bolsista = $this->pp_indicacao_bolsistas->findOrfail($pp_indicacao_bolsista_id);

        $dadosInscrito = $this->pp_i_bolsistas_inscricao
            ->join('users', 'users.id', '=', 'pp_indicacao_bolsistas_inscricao.user_id')
            ->where('pp_indicacao_bolsistas_inscricao.pp_i_bolsista_id', '=', $pp_indicacao_bolsista_id)
            ->findOrfail($pp_i_bolsista_inscricao_id);

        //Transformando Json em array de enderecos
        $endereco = json_decode($dadosInscrito->endereco, true);

        //Buscando o centro do candidato
        $centro_candidato = $this->centros->findOrfail($dadosInscrito->centro_id);

        //Buscando o centro do orientador
        $centro_orientador = $this->centros->findOrfail($dadosInscrito->centro_orientador_id);

        //Buscando o curso do candidato
        $curso = $this->curso->findOrfail($dadosInscrito->curso_id);

        return view('pdf.pp_indicacao_bolsistas', compact('pp_indicacao_bolsista', 'dadosInscrito', 'endereco', 'centro_candidato', 'centro_orientador', 'curso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($pp_indicacao_bolsista_id)
    {
        $data_hoje = Carbon::now();

        $pp_indicacao_bolsista = $this->pp_indicacao_bolsistas->findOrfail($pp_indicacao_bolsista_id);

        if (($data_hoje->gte($pp_indicacao_bolsista->data_inicio) && $data_hoje->lte($pp_indicacao_bolsista->data_fim))) {

            $centros = $this->centros->where('centros', 'not like', "%Polo%")->get();

            return view($this->bag['view'] . '.create', compact('pp_indicacao_bolsista', 'centros'));
        } else {

            alert()->error(config($this->bag['msg'] . '.error.data_inscricao'));
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePP_IndicacaoBolsistasInscricaoRequest $request, $pp_indicacao_bolsista_id)
    {

        try {
            DB::beginTransaction();

            $data_hoje = Carbon::now();

            $pp_indicacao_bolsistas = $this->pp_indicacao_bolsistas->withCount('pp_i_bolsista_pp_i_b_inscricao')->findOrfail($pp_indicacao_bolsista_id);

            if (($data_hoje->gte($pp_indicacao_bolsistas->data_inicio) && $data_hoje->lte($pp_indicacao_bolsistas->data_fim))) {

                //Calculo para saber o numero de inscricao
                $numero_inscricao['numero_inscricao'] = $pp_indicacao_bolsistas['pp_i_bolsista_pp_i_b_inscricao_count'] + 1;

                //variavel para adicionar os ids
                $ids = [];

                //Buscando e adcionando os id de pp_indicacao_bolsista_id e id so user a variavel
                $ids['pp_i_bolsista_id'] = $pp_indicacao_bolsista_id;
                $ids['user_id'] = Auth::user()->id;

                //Verificando se o user ja esta inscrito do evento
                $buscaInscricao = $this->pp_i_bolsistas_inscricao->where('pp_i_bolsista_id', '=', $pp_indicacao_bolsista_id)
                    ->where('user_id', '=', Auth::user()->id)
                    ->first();

                if ($buscaInscricao != null) {
                    alert()->error(config($this->bag['msg'] . '.error.inscricao_validacao'));
                    return redirect()->route('pp-i-bolsistas.page', ['pp_indicacao_bolsista_id' => $pp_indicacao_bolsista_id]);
                }

                //combina as duas arrays $request e $ids na variavel $dados_inscricao
                $dados_inscricao = array_merge($ids, $numero_inscricao, $request->all());

                //Caminho de arquirvos
                //Documento Indentidade
                $extensao =  $request['documento_identidade']->extension();
                $path = 'PP_IndicacaoBolsistas/' . Carbon::create($pp_indicacao_bolsistas->created_at)->format('Y') . '/' . $pp_indicacao_bolsista_id . '/documento_identidade' . '/' . Auth::user()->cpf . '';
                $nome = 'documento_identidade' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
                $dados_inscricao['documento_identidade'] = $request['documento_identidade']->storeAs($path, $nome);

                //Documento Cpf
                $extensao =  $request['documento_cpf']->extension();
                $path = 'PP_IndicacaoBolsistas/' . Carbon::create($pp_indicacao_bolsistas->created_at)->format('Y') . '/' . $pp_indicacao_bolsista_id . '/documento_cpf' . '/' . Auth::user()->cpf . '';
                $nome = 'documento_cpf' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
                $dados_inscricao['documento_cpf'] = $request['documento_cpf']->storeAs($path, $nome);

                //Historico Escolar
                $extensao =  $request['historico_escolar']->extension();
                $path = 'PP_IndicacaoBolsistas/' . Carbon::create($pp_indicacao_bolsistas->created_at)->format('Y') . '/' . $pp_indicacao_bolsista_id . '/historico_escolar' . '/' . Auth::user()->cpf . '';
                $nome = 'historico_escolar' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
                $dados_inscricao['historico_escolar'] = $request['historico_escolar']->storeAs($path, $nome);

                //Declaracao Vinculo
                $extensao =  $request['declaracao_vinculo']->extension();
                $path = 'PP_IndicacaoBolsistas/' . Carbon::create($pp_indicacao_bolsistas->created_at)->format('Y') . '/' . $pp_indicacao_bolsista_id . '/declaracao_vinculo' . '/' . Auth::user()->cpf . '';
                $nome = 'declaracao_vinculo' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
                $dados_inscricao['declaracao_vinculo'] = $request['declaracao_vinculo']->storeAs($path, $nome);

                //Termo compromisso bolsista
                $extensao =  $request['termo_compromisso_bolsista']->extension();
                $path = 'PP_IndicacaoBolsistas/' . Carbon::create($pp_indicacao_bolsistas->created_at)->format('Y') . '/' . $pp_indicacao_bolsista_id . '/termo_compromisso_bolsista' . '/' . Auth::user()->cpf . '';
                $nome = 'termo_compromisso_bolsista' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
                $dados_inscricao['termo_compromisso_bolsista'] = $request['termo_compromisso_bolsista']->storeAs($path, $nome);

                //Declaracao negativa vinculo
                $extensao =  $request['declaracao_negativa_vinculo']->extension();
                $path = 'PP_IndicacaoBolsistas/' . Carbon::create($pp_indicacao_bolsistas->created_at)->format('Y') . '/' . $pp_indicacao_bolsista_id . '/declaracao_negativa_vinculo' . '/' . Auth::user()->cpf . '';
                $nome = 'declaracao_negativa_vinculo' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
                $dados_inscricao['declaracao_negativa_vinculo'] = $request['declaracao_negativa_vinculo']->storeAs($path, $nome);

                //Curriculo
                $extensao =  $request['curriculo']->extension();
                $path = 'PP_IndicacaoBolsistas/' . Carbon::create($pp_indicacao_bolsistas->created_at)->format('Y') . '/' . $pp_indicacao_bolsista_id . '/curriculo' . '/' . Auth::user()->cpf . '';
                $nome = 'curriculo' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
                $dados_inscricao['curriculo'] = $request['curriculo']->storeAs($path, $nome);

                //Declaracao conjuta estagio
                $extensao =  $request['declaracao_conjuta_estagio'] ? $request['declaracao_conjuta_estagio']->extension() : null;
                if ($extensao != null) {
                    $path = 'PP_IndicacaoBolsistas/' . Carbon::create($pp_indicacao_bolsistas->created_at)->format('Y') . '/' . $pp_indicacao_bolsista_id . '/declaracao_conjuta_estagio' . '/' . Auth::user()->cpf . '';
                    $nome = 'declaracao_conjuta_estagio' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
                    $dados_inscricao['declaracao_conjuta_estagio'] = $request['declaracao_conjuta_estagio']->storeAs($path, $nome);
                } else {
                    $dados_inscricao['declaracao_conjuta_estagio'] = null;
                }

                //Comprovante conta corrente
                $extensao =  $request['comprovante_conta_corrente']->extension();
                $path = 'PP_IndicacaoBolsistas/' . Carbon::create($pp_indicacao_bolsistas->created_at)->format('Y') . '/' . $pp_indicacao_bolsista_id . '/comprovante_conta_corrente' . '/' . Auth::user()->cpf . '';
                $nome = 'comprovante_conta_corrente' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
                $dados_inscricao['comprovante_conta_corrente'] = $request['comprovante_conta_corrente']->storeAs($path, $nome);

                //Termo compromisso orientador
                $extensao =  $request['termo_compromisso_orientador']->extension();
                $path = 'PP_IndicacaoBolsistas/' . Carbon::create($pp_indicacao_bolsistas->created_at)->format('Y') . '/' . $pp_indicacao_bolsista_id . '/termo_compromisso_orientador' . '/' . Auth::user()->cpf . '';
                $nome = 'termo_compromisso_orientador' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
                $dados_inscricao['termo_compromisso_orientador'] = $request['termo_compromisso_orientador']->storeAs($path, $nome);

                $this->pp_i_bolsistas_inscricao->create($dados_inscricao);

                DB::commit();
                alert()->success(config($this->bag['msg'] . '.success.inscricao'));
                return redirect()->route('pp-i-bolsistas.page', ['pp_indicacao_bolsista_id' => $pp_indicacao_bolsista_id]);
            } else {
                alert()->error(config($this->bag['msg'] . '.error.data_inscricao'));
                return redirect()->route('pp-i-bolsistas.page', ['pp_indicacao_bolsista_id' => $pp_indicacao_bolsista_id]);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.inscricao'));
            return redirect()->back();
        }
    }

    public function docshow($diretorio)
    {
        try {

            $diretorio = Crypt::decrypt($diretorio);

            $path = storage_path('app/' . $diretorio);

            if (!File::exists($path)) {

                abort(404);
            }

            $file = File::get($path);
            $type = File::mimeType($path);

            $response = Response::make($file, 200);
            $response->header("Content-Type", $type);

            return $response;
        } catch (\Throwable $th) {

            alert()->error(config($this->bag['msg'] . '.error.diretorio'));
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($pp_indicacao_bolsista_id)
    {
        //Verificando se o pp_indicacao_bolsista_id existe
        $this->pp_indicacao_bolsistas->findOrfail($pp_indicacao_bolsista_id);

        //Verificando se o user_id existe
        $user = $this->user->findOrfail(Auth::user()->id);

        $dadosInscrito = $this->pp_i_bolsistas_inscricao
            ->join('users', 'users.id', '=', 'pp_indicacao_bolsistas_inscricao.user_id')
            ->where('users.id', '=', $user->id)
            ->where('pp_indicacao_bolsistas_inscricao.pp_i_bolsista_id', '=', $pp_indicacao_bolsista_id)
            ->first();


        if ($dadosInscrito == null) {
            alert()->error(config('Você não está inscrito nesse Evento'));
            return redirect()->back();
        }

        //Transformando Json em array de enderecos
        $endereco = json_decode($dadosInscrito->endereco, true);

        //Buscando o centro do candidato
        $centro_candidato = $this->centros->findOrfail($dadosInscrito->centro_id);

        //Buscando o centro do orientador
        $centro_orientador = $this->centros->findOrfail($dadosInscrito->centro_orientador_id);

        //Buscando o curso do candidato
        $curso = $this->curso->findOrfail($dadosInscrito->curso_id);

        return view('page.pp_indicacao_bolsistas.show', compact('dadosInscrito', 'endereco', 'centro_candidato', 'centro_orientador', 'curso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
