<?php

namespace App\Http\Controllers\Semic;

use App\Http\Controllers\Controller;
use App\Models\SemicInscricao;
use App\Models\GrandeArea;
use App\Models\SubArea;
use App\Models\Semic;
use App\Models\Centro;
use App\Models\PrimeirosPassosInscricao;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Semic\StoreSemicInscricaoRequest;
use App\Http\Requests\Semic\UpdateSemicInscricaoRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class SemicInscricaoController extends Controller
{

    protected $semic;
    protected $grandearea;
    protected $centros;
    protected $semicinscricao;
    protected $user;
    protected $subarea;


    protected $bag = [
        'view' => 'page.semic',
        'route' => 'semic',
        'msg' => 'temauema.msg.register'
    ];

    public function __construct(
        Semic $semic,
        GrandeArea $grandearea,
        Centro $centros,
        SemicInscricao $semicinscricao,
        User $user,
        SubArea $subarea
    ) {

        $this->semic = $semic;
        $this->grandearea = $grandearea;
        $this->centros = $centros;
        $this->semicinscricao = $semicinscricao;
        $this->user = $user;
        $this->subarea = $subarea;
    }

    public function index($semic_id, Request $request)
    {
        //Verificando se o id existe
        $semic_ =  $this->semic->findOrfail($semic_id);

        //Buscando a lista de inscritos atraves de join
        $listaInscritos = $this->semicinscricao
        ->join('users', 'users.id', '=', 'semic_inscricaos.user_id')
            ->where('semic_inscricaos.semic_id', '=', $semic_id)
            ->select([
                'semic_inscricaos.nomeorientador',
                'semic_inscricaos.email',
                'semic_inscricaos.cpf',
                'semic_inscricaos.matricula',
                'semic_inscricaos.status',
                'semic_inscricaos.numero_inscricao',
                'semic_inscricaos.semic_id',
                'semic_inscricaos.semic_inscricao_id',
            ])->paginate(20);

        $links = $listaInscritos->appends($request->except('page'));

        return view($this->bag['view'] . '.index', compact('listaInscritos', 'semic_', 'links'));
    }


    public function espelho($semic_id, $semic_inscricao_id)
    {
        //Verificando se o primeiropasso_id existe
        $evento = $this->semic->findOrfail($semic_id);

        $dadosInscrito = $this->semicinscricao
            ->join('users', 'users.id', '=', 'semic_inscricaos.user_id')
            ->where('semic_inscricaos.semic_id', '=', $semic_id)
            ->findOrfail($semic_inscricao_id);

       
        $subArea = $this->subarea->with('subArea_grandeArea')->findOrfail($dadosInscrito->areaconhecimento_id);

       

        return view('admin.semic.espelho', compact('evento', 'dadosInscrito', 'subArea'));
    }


    public function create($semic_id)
    {
        $data_hoje = Carbon::now();

        $semic = $this->semic->findOrfail($semic_id);

        if (($data_hoje->gte($semic->data_inicio) && $data_hoje->lte($semic->data_fim))) {

            $grandeArea = $this->grandearea->with('grandeArea_subArea')->get();
            $centros = $this->centros->where('centros', 'not like', "%Polo%")->get();

            return view('page.semic.create', compact('grandeArea', 'semic', 'centros'));
        } else {

            alert()->error(config($this->bag['msg'] . '.error.data_inscricao'));
            return redirect()->back();
        }
    }

    //Gera o pdf
    public function gerarPDF($semic_id, $semic_inscricao_id)
    {
        //Verificando se o semic_id existe
        $semic = $this->semic->findOrfail($semic_id);

        $dadosInscrito = $this->semicinscricao

            ->where('semic_inscricaos.semic_id', '=', $semic_id)->findOrfail($semic_inscricao_id);


        $subArea = $this->subarea->with('subArea_grandeArea')->findOrfail($dadosInscrito->areaconhecimento_id);


        return view('pdf.semic', compact('dadosInscrito', 'subArea', 'semic'));
    }



    public function store(StoreSemicInscricaoRequest $request, $semic_id)
    {

        try {
            DB::beginTransaction();

            $data_hoje = Carbon::now();

            $semic = $this->semic->withCount('semic_semicInscricao')->findOrfail($semic_id);


            if (($data_hoje->gte($semic->data_inicio) && $data_hoje->lte($semic->data_fim))) {

                //Calculo para saber o numero de inscricao

                $numero_inscricao = $semic['semic_semic_inscricao_count'] + 1;

                $dados_inscricao = $request->all();

                $dados_inscricao['cpf_semicinscricao'] = str_replace(['.', '-'], '', $dados_inscricao['cpf_semicinscricao']);

                //Caminho de arquirvos
                //Documento Termo de compromisso orientador
                $extensao =  $request['anexo_capitulo_semicinscricao']->extension();
                $path = 'SemicIsncricao/' . Carbon::create($semic->created_at)->format('Y') . '/' . $semic_id . '/anexo_capitulo_semicinscricao' . '/' . Auth::user()->cpf . '';
                $nome = 'anexo_capitulo_semicinscricao' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
                $dados_inscricao['anexo_capitulo_semicinscricao'] = $request['anexo_capitulo_semicinscricao']->storeAs($path, $nome);

                $this->semicinscricao->create([
                    'semic_id' => $semic_id,
                    'user_id' => Auth::user()->id,
                    'nomeorientador' => $dados_inscricao['nome_semicinscricao'],
                    'email' => $dados_inscricao['email_semicinscricao'],
                    'cpf' => $dados_inscricao['cpf_semicinscricao'],
                    'status' => "Em Analise",
                    'numero_inscricao' => $numero_inscricao,
                    'areaconhecimento_id' => $dados_inscricao['areaconhecimento_id'],
                    'matricula' => $dados_inscricao['matricula_semicinscricao'],
                    'titulacao' => $dados_inscricao['titulacao_semicinscricao'],
                    'titulocapitulo' => $dados_inscricao['titulo_capitulo_semicinscricao'],
                    'tituloprojetoorient' => $dados_inscricao['titulo_projeto_semicinscricao'],
                    'capitulo' => $dados_inscricao['anexo_capitulo_semicinscricao'],
                ]);

                DB::commit();
                alert()->success(config($this->bag['msg'] . '.success.inscricao'));
                return redirect()->route('semic.page', ['semic_id' => $semic_id]);
            } else {
                alert()->error(config($this->bag['msg'] . '.error.data_inscricao'));
                return redirect()->route('semic.page', ['semic_id' => $semic_id]);
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

    public function show($semic_id, $user_id, Request $request)
    {
        //Verificando se o semic_id existe
        $this->semic->findOrfail($semic_id);

        //Verificando se o user_id existe
        $this->user->findOrfail($user_id);

        $dadosInscrito = $this->semicinscricao->with('semicInscricao_subArea', 'semicInscricao_subArea.subArea_grandeArea', 'semic_inscricao_user', 'semicInscricao_semic')
            ->where('semic_inscricaos.user_id', '=', $user_id)
            ->where('semic_inscricaos.semic_id', '=', $semic_id)

            ->paginate(10);
        foreach ($dadosInscrito as $key => $dados) {

            $dados->endereco = json_decode($dados->endereco, true);
        }

        $links = $dadosInscrito->appends($request->except('page'));
        return view('page.semic.show', compact('dadosInscrito', 'links'));
    }



    public function edit(SemicInscricao $semicInscricao)
    {
        //
    }


    public function update(Request $request, SemicInscricao $semicInscricao)
    {
        //
    }


    public function destroy(SemicInscricao $semicInscricao)
    {
        //
    }
}
