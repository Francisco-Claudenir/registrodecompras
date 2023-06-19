<?php

namespace App\Http\Controllers\PrimeirosPassos;

use App\Models\SubArea;
use App\Models\GrandeArea;
use App\Models\PrimeiroPasso;
use App\Http\Controllers\Controller;
use App\Models\PrimeirosPassosInscricao;
use App\Models\PpInscricao_Ptrabalho;
use App\Http\Requests\PrimeirosPassos\StorePrimeirosPassosInscricaoRequest;
use App\Http\Requests\PrimeirosPassos\UpdatePrimeirosPassosInscricaoRequest;
use App\Models\Centro;
use App\Models\PlanoTrabalho;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use PhpParser\Node\Stmt\TryCatch;

class PrimeirosPassosInscricaoController extends Controller
{
    protected $primeirospassosinscricao;
    protected $grandearea;
    protected $subarea;
    protected $primeiropasso;
    protected $planotrabalho;
    protected $user;
    protected $ppinscricao_ptrabalho;
    protected $centros;

    protected $bag = [
        'view' => 'page.primeirospassos',
        'route' => 'primeirospassos',
        'msg' => 'temauema.msg.register'
    ];

    public function __construct(
        PrimeirosPassosInscricao $primeirospassosinscricao,
        GrandeArea $grandearea,
        SubArea $subarea,
        PrimeiroPasso $primeiropasso,
        PlanoTrabalho $planotrabalho,
        User $user,
        PpInscricao_Ptrabalho $ppinscricao_ptrabalho,
        Centro $centros
    ) {
        $this->primeirospassosinscricao = $primeirospassosinscricao;
        $this->primeiropasso = $primeiropasso;
        $this->grandearea = $grandearea;
        $this->subarea = $subarea;
        $this->planotrabalho = $planotrabalho;
        $this->user = $user;
        $this->ppinscricao_ptrabalho = $ppinscricao_ptrabalho;
        $this->centros = $centros;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($primeiropasso_id, Request $request)
    {
        //Verificando se o id existe
        $ppasso =  $this->primeiropasso->findOrfail($primeiropasso_id);

        //Buscando a lista de inscritos atraves de join
        $listaInscritos = $this->primeirospassosinscricao
            ->join('users', 'users.id', '=', 'primeiros_passos_inscricaos.user_id')
            ->where('primeiros_passos_inscricaos.primeiropasso_id', '=', $primeiropasso_id)
            ->select([
                'users.nome',
                'users.email',
                'users.cpf',
                'users.telefone',
                'primeiros_passos_inscricaos.status',
                'primeiros_passos_inscricaos.primeiropasso_id',
                'primeiros_passos_inscricaos.numero_inscricao',
                'primeiros_passos_inscricaos.passos_inscricao_id'
            ])->orderBy('primeiros_passos_inscricaos.numero_inscricao', 'asc')->paginate(20);

        $links = $listaInscritos->appends($request->except('page'));

        return view($this->bag['view'] . '.index', compact('listaInscritos', 'ppasso', 'links'));
    }

    //Tras todas as informações que o candidato enviou
    public function espelho($primeiropasso_id, $passos_inscricao_id)
    {
        //Verificando se o primeiropasso_id existe
        $this->primeiropasso->findOrfail($primeiropasso_id);

        $dadosInscrito = $this->primeirospassosinscricao
            ->join('users', 'users.id', '=', 'primeiros_passos_inscricaos.user_id')
            ->where('primeiros_passos_inscricaos.primeiropasso_id', '=', $primeiropasso_id)
            ->findOrfail($passos_inscricao_id);

        //Transformando Json em array de enderecos
        $endereco = json_decode($dadosInscrito->endereco, true);

        $subArea = $this->subarea->with('subArea_grandeArea')->findOrfail($dadosInscrito->areaconhecimento_id);

        $planotrabalho = $this->ppinscricao_ptrabalho->join('plano_trabalhos', 'pp_inscricao__ptrabalhos.plano_id', '=', 'plano_trabalhos.plano_id')
            ->where('pp_inscricao__ptrabalhos.passos_inscricao_id', '=', $passos_inscricao_id)
            ->first();

        $centro = $this->centros->findOrfail($dadosInscrito->centro_id);

        return view('admin.primeirospassos.espelho', compact('dadosInscrito', 'subArea', 'endereco', 'planotrabalho', 'centro'));
    }

    //Gera o pdf
    public function gerarPDF($primeiropasso_id, $passos_inscricao_id)
    {
        //Verificando se o primeiropasso_id existe
        $primeiropasso = $this->primeiropasso->findOrfail($primeiropasso_id);

        $dadosInscrito = $this->primeirospassosinscricao
            ->join('users', 'users.id', '=', 'primeiros_passos_inscricaos.user_id')
            ->where('primeiros_passos_inscricaos.primeiropasso_id', '=', $primeiropasso_id)
            ->findOrfail($passos_inscricao_id);

        //Transformando Json em array de enderecos
        $endereco = json_decode($dadosInscrito->endereco, true);

        $subArea = $this->subarea->with('subArea_grandeArea')->findOrfail($dadosInscrito->areaconhecimento_id);

        $planotrabalho = $this->ppinscricao_ptrabalho->join('plano_trabalhos', 'pp_inscricao__ptrabalhos.plano_id', '=', 'plano_trabalhos.plano_id')
            ->where('pp_inscricao__ptrabalhos.passos_inscricao_id', '=', $passos_inscricao_id)
            ->first();

        $centro = $this->centros->findOrfail($dadosInscrito->centro_id);

        return view('pdf.primeirospassos', compact('centro', 'dadosInscrito', 'endereco', 'subArea', 'planotrabalho', 'primeiropasso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($primeiropasso_id)
    {
        $data_hoje = Carbon::now();

        $primeiropasso = $this->primeiropasso->findOrfail($primeiropasso_id);

        if (($data_hoje->gte($primeiropasso->data_inicio) && $data_hoje->lte($primeiropasso->data_fim))) {

            $grandeArea = $this->grandearea->with('grandeArea_subArea')->get();
            $centros = $this->centros->where('centros', 'not like', "%Polo%")->get();

            return view('page.primeirospassos.create', compact('grandeArea', 'primeiropasso', 'centros'));
        } else {

            alert()->error(config($this->bag['msg'] . '.error.data_inscricao'));
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PrimeirosPassos\StorePrimeirosPassosInscricaoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrimeirosPassosInscricaoRequest $request)
    {

        $evento = $this->primeiropasso->find($request['primeiropasso_id']);
        if ($this->primeirospassosinscricao->where('primeiropasso_id', $request['primeiropasso_id'])->where('user_id', Auth::user()->id)->first() !== null) {
            alert()->error(config($this->bag['msg'] . '.error.inscricao'));
            return redirect()->route('primeirospassos.page', ['primeiropasso_id' => $request['primeiropasso_id']]);
        }
        //dd($this->primeirospassosinscricao->where('primeiropasso_id', $request['primeiropasso_id'])->where('user_id', Auth::user()->id)->first());
        $data_hoje = Carbon::now();

        try {
            DB::beginTransaction();


            //Verifica se data correta para realizar inscrição

            if (($data_hoje->gte($evento->data_inicio) && $data_hoje->lte($evento->data_fim))) {
                //Copia Contrato
                $extensao =  $request['copiacontrato']->extension();
                $path = 'PrimeirosPassos/' . Carbon::create($evento->created_at)->format('Y') . '/' . $request['primeiropasso_id'] . '/copiacontrato' . '/' . Auth::user()->cpf . '';
                $nome = 'copiacontrato' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
                $dados['copiacontrato'] = $request['copiacontrato']->storeAs($path, $nome);

                //Projeto Pesquisa
                $projetoextensao =  $request['projetopesquisa']->extension();
                $projetopath = 'PrimeirosPassos/' . Carbon::create($evento->created_at)->format('Y') . '/' . $request['primeiropasso_id'] . '/projetopesquisa' . '/' . Auth::user()->cpf . '';
                $projetonome = 'projetopesquisa' . '_' . uniqid(date('HisYmd')) . '.' . $projetoextensao;
                $dados['projetopesquisa'] = $request['projetopesquisa']->storeAs($projetopath, $projetonome);

                //Parecer Comite
                // $parecerextensao =  $request['parecercomite']->extension();
                // $parecerpath = 'PrimeirosPassos/' . Carbon::create($evento->created_at)->format('Y') . '/' . $request['primeiropasso_id'] . '/parecercomite' . '/' . Auth::user()->cpf . '';
                // $parecernome = 'parecercomite' . '_' . uniqid(date('HisYmd')) . '.' . $parecerextensao;
                // $dados['parecercomite'] = $request['parecercomite']->storeAs($parecerpath, $parecernome);
                $parecerextensao =  $request['parecercomite'] ? $request['parecercomite']->extension() : null;
                if ($parecerextensao != null) {
                    $parecerpath = 'PrimeirosPassos/' . Carbon::create($evento->created_at)->format('Y') . '/' . $request['primeiropasso_id'] . '/parecercomite' . '/' . Auth::user()->cpf . '';
                    $parecernome = 'parecercomite' . '_' . uniqid(date('HisYmd')) . '.' . $parecerextensao;
                    $dados['parecercomite'] = $request['parecercomite']->storeAs($parecerpath, $parecernome);
                } else {
                    $dados['parecercomite'] = null;
                }

                //Anuencia Chefe
                $anuenciachefe =  $request['anuenciachefe']->extension();
                $anuenciapath = 'PrimeirosPassos/' . Carbon::create($evento->created_at)->format('Y') . '/' . $request['primeiropasso_id'] . '/anuenciachefe' . '/' . Auth::user()->cpf . '';
                $anuencianome = 'anuenciachefe' . '_' . uniqid(date('HisYmd')) . '.' . $anuenciachefe;
                $dados['anuenciachefe'] = $request['anuenciachefe']->storeAs($anuenciapath, $anuencianome);

                //Curriculo Lattes
                $curriculoextensao =  $request['curriculolattes']->extension();
                $curriculopath = 'PrimeirosPassos/' . Carbon::create($evento->created_at)->format('Y') . '/' . $request['primeiropasso_id'] . '/curriculolattes' . '/' . Auth::user()->cpf . '';
                $curriculonome = 'curriculolattes' . '_' . uniqid(date('HisYmd')) . '.' . $curriculoextensao;
                $dados['curriculolattes'] = $request['curriculolattes']->storeAs($curriculopath, $curriculonome);

                //Calculo para saber o numero de inscricao
                $quantidade_inscritos = $this->primeiropasso->withCount('primeirospassos_ppInscricao')->findOrfail($request['primeiropasso_id']);

                $numero_inscricao = $quantidade_inscritos['primeirospassos_pp_inscricao_count'] + 1;


                //Create de inscrição
                $inscricao = $this->primeirospassosinscricao->create([
                    'primeiropasso_id' => $request['primeiropasso_id'],
                    'user_id' => Auth::user()->id,
                    'areaconhecimento_id' => $request['areaconhecimento_id'],
                    'status' => 'Em Analise',
                    'numero_inscricao' => $numero_inscricao,
                    'identidade' => $request['identidade'],
                    'matricula' => $request['matricula'],
                    'centro_id' => $request['centro_id'],
                    'copiacontrato' => $dados['copiacontrato'],              //file
                    'vigencia_inicio' => $request['vigencia_inicio'],
                    'vigencia_fim' => $request['vigencia_fim'],
                    'tituloprojetopesquisa' => $request['tituloprojetopesquisa'],
                    'resumoprojeto' => $request['resumoprojeto'],
                    'projetopesquisa' => $dados['projetopesquisa'],          //file
                    'chefeimediato' => $request['chefeimediato'],
                    'anuenciachefe' => $dados['anuenciachefe'],
                    'parecercomite' => $dados['parecercomite'],          //file
                    'curriculolattes' => $dados['curriculolattes'],       //file

                ]);


                //Plano Trabalho
                $planoextensao =  $request['arquivo']->extension();
                $planopath = 'PrimeirosPassos/' . Carbon::create($evento->created_at)->format('Y') . '/' . $request['primeiropasso_id'] . '/planotrabalho' . '/' . Auth::user()->cpf . '';
                $planonome = 'curriculolattes' . '_' . uniqid(date('HisYmd')) . '.' . $planoextensao;
                $dados['arquivo'] = $request['arquivo']->storeAs($planopath, $planonome);

                //Create de Plano de trabalho
                $plano = $this->planotrabalho->create([
                    'titulo' => $request['titulo'],
                    'modalidade_id' => $request['modalidade_id'] ?? 1,
                    'resumo' => $request['resumo'],
                    'arquivo' => $dados['arquivo']
                ]);


                // //Adiciona a relação Plano trabalho / Inscrição
                $inscricao->planotrabalho()->attach($plano->plano_id);

                DB::commit();
                alert()->success(config($this->bag['msg'] . '.success.inscricao'));
                return redirect()->route('primeirospassos.page', ['primeiropasso_id' => $request['primeiropasso_id']]);
            } else {
                alert()->error(config($this->bag['msg'] . 'Fora da data de inscrição'));
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.inscricao'));
            return redirect()->back();
        }
    }

    public function analise(UpdatePrimeirosPassosInscricaoRequest $request,  $primeiropasso_id, $passos_inscricao_id)
    {
        try {
            if (auth::user()->can('check-role', 'Administrador|Coordenação de Pesquisa')) {
                $inscricao = $this->primeirospassosinscricao->where('primeiropasso_id', $primeiropasso_id)->find($passos_inscricao_id);
                if ($inscricao['primeiropasso_id'] == $primeiropasso_id) {
                    DB::beginTransaction();
                    $dados = $request->validated();
                    $inscricao->update($dados);
                    DB::commit();
                    alert()->success(config($this->bag['msg'] . '.success.update'));
                    return redirect()->back();
                }
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.update'));
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
            dd($th->getMessage());
            alert()->error(config($this->bag['msg'] . '.error.diretorio'));
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PrimeirosPassosInscricao  $primeirosPassosInscricao
     * @return \Illuminate\Http\Response
     */
    public function show($primeiropasso_id, $user_id)
    {
        //Verificando se o primeiropasso_id existe
        $this->primeiropasso->findOrfail($primeiropasso_id);

        //Verificando se o user_id existe
        $this->user->findOrfail($user_id);

        $dadosInscrito = $this->primeirospassosinscricao
            ->join('users', 'users.id', '=', 'primeiros_passos_inscricaos.user_id')
            ->where('users.id', '=', $user_id)
            ->where('primeiros_passos_inscricaos.primeiropasso_id', '=', $primeiropasso_id)
            ->first();

        //Transformando Json em array de enderecos
        $endereco = json_decode($dadosInscrito->endereco, true);

        $subArea = $this->subarea->with('subArea_grandeArea')->findOrfail($dadosInscrito->areaconhecimento_id);

        $planotrabalho = $this->ppinscricao_ptrabalho->join('plano_trabalhos', 'pp_inscricao__ptrabalhos.plano_id', '=', 'plano_trabalhos.plano_id')
            ->where('pp_inscricao__ptrabalhos.passos_inscricao_id', '=', $dadosInscrito->passos_inscricao_id)
            ->first();

        $centro = $this->centros->findOrfail($dadosInscrito->centro_id);

        return view('page.primeirospassos.show', compact('dadosInscrito', 'subArea', 'endereco', 'planotrabalho', 'centro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PrimeirosPassosInscricao  $primeirosPassosInscricao
     * @return \Illuminate\Http\Response
     */
    public function edit(PrimeirosPassosInscricao $primeirosPassosInscricao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PrimeirosPassos\UpdatePrimeirosPassosInscricaoRequest  $request
     * @param  \App\Models\PrimeirosPassosInscricao  $primeirosPassosInscricao
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePrimeirosPassosInscricaoRequest $request, PrimeirosPassosInscricao $primeirosPassosInscricao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PrimeirosPassosInscricao  $primeirosPassosInscricao
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrimeirosPassosInscricao $primeirosPassosInscricao)
    {
        //
    }
}
