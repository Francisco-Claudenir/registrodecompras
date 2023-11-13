<?php

namespace App\Http\Controllers\SemicEvento;

use App\Http\Controllers\Controller;
use App\Models\Minicurso;
use App\Models\MinicursoSemiceventoinscricao;
use App\Models\SemicEvento;
use App\Models\User;
use App\Models\SemicEventoInscricao;
use App\Http\Requests\SemicEvento\StoreSemicEventoInscricaoRequest;
use App\Http\Requests\SemicEvento\UpdateSemicEventoInscricaoRequest;
use Carbon\Carbon;
use geekcom\ValidatorDocs\Rules\Certidao;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;


class SemicEventoInscricaoController extends Controller
{

    protected $semic_evento;
    protected $semicevento_inscricao;
    protected $user, $minicurso;
    protected $minicursoinscricao;

    protected $bag = [
        'view' => 'page.semicevento',
        'route' => 'semicevento',
        'msg' => 'temauema.msg.register'
    ];

    public function __construct(SemicEvento $semic_evento, User $user, SemicEventoInscricao $semicevento_inscricao, Minicurso $minicurso, MinicursoSemiceventoinscricao  $minicursoinscricao)
    {
        $this->semic_evento = $semic_evento;
        $this->semicevento_inscricao = $semicevento_inscricao;
        $this->user = $user;
        $this->minicurso = $minicurso;
        $this->minicursoinscricao = $minicursoinscricao;
    }

    public function index($semic_evento_id, Request $request, $tipo)
    {
        //Verificando se o id existe
        $semic_evento = $this->semic_evento->findOrfail($semic_evento_id);

        //Buscando a lista de inscritos atraves de join
        $listaInscritos = $this->semicevento_inscricao
            ->join('users', 'users.id', '=', 'semic_eventoinscricao.user_id')
            ->where('semic_eventoinscricao.semic_evento_id', '=', $semic_evento_id);

        if ($tipo == 'Ouvinte' || $tipo == 'Apresentador' || $tipo == 'Minicurso') {
            $listaInscritos->whereJsonContains('semic_eventoinscricao.tipo', $tipo);
        }

        $listaInscritos = $listaInscritos->select([
            'users.nome',
            'users.email',
            'users.cpf',
            'semic_eventoinscricao.status',
            'semic_eventoinscricao.tipo',
            'semic_eventoinscricao.numero_inscricao',
            'semic_eventoinscricao.semic_evento_id',
            'semic_eventoinscricao.semic_eventoinscricao_id',
        ])->orderby('semic_eventoinscricao.numero_inscricao', 'asc')
            ->paginate(20);

        $links = $listaInscritos->appends($request->except('page'));

        return view($this->bag['view'] . '.index', compact('listaInscritos', 'semic_evento', 'links'));
    }

    public function indexminicurso($semic_evento_id, Request $request, $minicurso)
    {
        //Verificando se o id existe
        $semic_evento = $this->semic_evento->findOrfail($semic_evento_id);
        $dadosminicurso = $this->minicurso->findOrfail($minicurso);

        //Buscando a lista de inscritos atraves de join
        $listaInscritos = $this->minicursoinscricao
            ->join('semic_eventoinscricao', 'minicurso_semiceventoinscricao.semic_eventoinscricao_id', '=', 'semic_eventoinscricao.semic_eventoinscricao_id')
            ->join('users', 'users.id', '=', 'semic_eventoinscricao.user_id')
            ->where('minicurso_id', '=', $minicurso)
            ->orderby('minicurso_semiceventoinscricao.created_at', 'asc')
            ->paginate(20);

        $links = $listaInscritos->appends($request->except('page'));

        return view($this->bag['view'] . '.minicurso', compact('listaInscritos', 'semic_evento','dadosminicurso', 'links'));
    }

    public function create($semic_evento_id)
    {
        $user = Auth::User();

        $verificandoInscricao = $this->semicevento_inscricao
            ->where('user_id', '=', $user->id)
            ->where('semic_evento_id', $semic_evento_id)
            ->first();


        if ($verificandoInscricao != null) {
            alert()->error('Você já está inscrito nesse evento.');
            return redirect()->back();
        }

        $data_hoje = Carbon::now();

        $semic_evento = $this->semic_evento->with('semic_evento_minicursos')->find($semic_evento_id);

        if (($data_hoje->gte($semic_evento->data_inicio) && $data_hoje->lte($semic_evento->data_fim))) {

            return view('page.semicevento.create', compact('semic_evento'));
        } else {

            alert()->error(config($this->bag['msg'] . '.error.data_inscricao'));
            return redirect()->back();
        }
    }

    public function store(Request $request, $semic_evento_id)
    {
        $tipoinscricao = ['Ouvinte', 'Apresentador'];

        if ($request->has('radio_ouvinte') && $request->has('radio_minicurso') && $request->has('radio_participante')) {

            $radio_ouvinte = $request['radio_ouvinte'];
            $radio_participante = $request['radio_participante'];
            $radio_minicurso = $request['radio_minicurso'];

            if ($radio_ouvinte == 0) {
                $tipoinscricao = array_diff($tipoinscricao, ['Ouvinte']);
            }

            if ($radio_participante == 0) {
                $tipoinscricao = array_diff($tipoinscricao, ['Apresentador']);
            }

            if (
                $radio_ouvinte == 0 && $radio_minicurso == 0 && $radio_participante == 0 ||
                $radio_ouvinte == 0 && $radio_participante == 0
            ) {
                alert()->error('É necessário escolher, no mínimo, ouvinte ou participante.');
                return redirect()->route('semicevento.page', ['semic_evento_id' => $semic_evento_id]);
            }
            
        } else {
            alert()->error('Voçe não respondeu todas as perguntas');
            return redirect()->route('semicevento.page', ['semic_evento_id' => $semic_evento_id]);
        }

        try {
            DB::beginTransaction();

            $data_hoje = Carbon::now();

            $semic_evento = $this->semic_evento
                ->with('semic_evento_minicursos')
                ->withCount('semic_evento_semic_eventoinscricao')
                ->findOrfail($semic_evento_id);

            if (($data_hoje->gte($semic_evento->data_inicio) && $data_hoje->lte($semic_evento->data_fim))) {

                //Calculo para saber o numero de inscricao
                $numero_inscricao = $semic_evento['semic_evento_semic_eventoinscricao_count'] + 1;

                $dados_inscricao = $request->all();

                //Documento PDF Arquivo
                if ($request->has('arquivo')) {

                    $request->validate([
                        'arquivo' => 'required|mimes:docx',
                    ]);

                    $extensao = $request['arquivo']->extension();
                    $path = 'SemicEventoIsncricao/' . Carbon::create($semic_evento->created_at)->format('Y') . '/' . $request['semic_evento_id'] . '/Arquivo_pdf_semicevento_inscricao' . '/' . Auth::user()->cpf . '';
                    $nome = 'Arquivo_pdf_semicevento_inscricao' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
                    $dados_inscricao['arquivo'] = $request['arquivo']->storeAs($path, $nome);
                } else {
                    $dados_inscricao['arquivo'] = null;
                }

                $inscricao = $this->semicevento_inscricao->create([
                    'semic_evento_id' => $semic_evento_id,
                    'user_id' => Auth::user()->id,
                    'nome_orientador' => $request->has('nome_orientador') ? $dados_inscricao['nome_orientador'] : null,
                    'titulo_trabalho' => $request->has('titulo_trabalho') ? $dados_inscricao['titulo_trabalho'] : null,
                    'cota_bolsa' => $request->has('cota_bolsa') ? $dados_inscricao['cota_bolsa'] : null,
                    'arquivo' => $dados_inscricao['arquivo'],
                    'numero_inscricao' => $numero_inscricao,
                    'tipo' => json_encode(array_values($tipoinscricao)),
                    'status' => "Em Analise"
                ]);

                if ($request['radio_minicurso'] != 0) {
                    $idsMinicursos = [];
                    foreach ($semic_evento->semic_evento_minicursos as $minicurso) {
                        for ($i = 0; $i < count($request->minicurso); $i++) {
                            if ($minicurso->minicurso_id == $request->minicurso[$i]) {
                                $idsMinicursos[] = $request->minicurso[$i]; 
                            }
                        }
                    }

                    foreach ($idsMinicursos as $item) {
                        $this->minicursoinscricao->create([
                            'minicurso_id' => $item,
                            'semic_eventoinscricao_id' => $inscricao->semic_eventoinscricao_id,
                            'status' => 'Em analise'
                        ]);
                    }
                }

                DB::commit();
                alert()->success(config($this->bag['msg'] . '.success.inscricao'));
                return redirect()->route('semicevento.page', ['semic_evento_id' => $request['semic_evento_id']]);
            } else {
                alert()->error(config($this->bag['msg'] . '.error.data_inscricao'));
                return redirect()->route('semicevento.page', ['semic_evento_id' => $semic_evento_id]);
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

            $path = storage_path('app/public/' . $diretorio);

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

    public function show($semic_evento_id, $user_id, Request $request)
    {
        //Verificando se o semic_evento_id existe
        $this->semic_evento->findOrfail($semic_evento_id);

        //Verificando se o user_id existe
        $this->user->findOrfail($user_id);

        $dadosInscrito = $this->semicevento_inscricao->with('semic_eventoinscricao_users', 'semic_eventoinscricao_semic_evento', 'semiceventoinscricao_minicurso', 'semiceventoinscricao_minicurso.minicurso_eventoinscricao')
            ->where('semic_eventoinscricao.user_id', '=', $user_id)
            ->where('semic_eventoinscricao.semic_evento_id', '=', $semic_evento_id)
            ->orderby('numero_inscricao', 'asc')
            ->paginate(10);

        if ($dadosInscrito == null) {
            alert()->error(config('Você não está inscrito nesse Evento'));
            return redirect()->back();
        }

        $links = $dadosInscrito->appends($request->except('page'));
        //         dd($dadosInscrito);
        return view('page.semicevento.show', compact('dadosInscrito', 'links'));
    }

    //Gera o pdf
    public function gerarPDF($semic_evento_id, $semic_eventoinscricao_id)
    {
        //Verificando se o semic_evento_id existe
        $semic_eventopdf = $this->semic_evento->findOrfail($semic_evento_id);

        $dadosInscrito = $this->semicevento_inscricao->where('semic_eventoinscricao.semic_evento_id', '=', $semic_evento_id)
            ->where('semic_eventoinscricao.semic_eventoinscricao_id', '=', $semic_eventoinscricao_id)
            ->firstOrfail();

        return view('pdf.semicevento', compact('dadosInscrito', 'semic_eventopdf'));
    }

    public function espelho($semic_evento_id, $semic_eventoinscricao_id)
    {

        //Verificando se o semic_evento_id existe
        $evento = $this->semic_evento->find($semic_evento_id);

        $dadosInscrito = $this->semicevento_inscricao->where('semic_eventoinscricao.semic_evento_id', '=', $semic_evento_id)
            ->where('semic_eventoinscricao.semic_eventoinscricao_id', '=', $semic_eventoinscricao_id)
            ->firstOrfail();


        return view('admin.semic_evento.espelho', compact('evento', 'dadosInscrito'));
    }

    public function analise(UpdateSemicEventoInscricaoRequest $request, $semic_evento_id, $semic_eventoinscricao_id)
    {
        try {
            if (auth::user()->can('check-role', 'Administrador|Coordenação de Pesquisa')) {
                $inscricao = $this->semicevento_inscricao->where('semic_evento_id', $semic_evento_id)->find($semic_eventoinscricao_id);
                if ($inscricao['semic_evento_id'] == $semic_evento_id) {
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
}
