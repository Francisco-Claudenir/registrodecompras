<?php

namespace App\Http\Controllers\SemicEvento;

use App\Http\Controllers\Controller;
use App\Models\SemicEvento;
use App\Models\User;
use App\Models\SemicEventoInscricao;
use App\Http\Requests\SemicEvento\StoreSemicEventoInscricaoRequest;
use Carbon\Carbon;
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
    protected $user;

    protected $bag = [
        'view' => 'page.semicevento',
        'route' => 'semicevento',
        'msg' => 'temauema.msg.register'
    ];

    public function __construct(SemicEvento $semic_evento, User $user, SemicEventoInscricao $semicevento_inscricao)
    {
        $this->semic_evento = $semic_evento;
        $this->semicevento_inscricao = $semicevento_inscricao;
        $this->user = $user;
    }

    public function index($semic_evento_id, Request $request)
    {
        //Verificando se o id existe
        $semic_evento_ =  $this->semic_evento->findOrfail($semic_evento_id);

        //Buscando a lista de inscritos atraves de join
        $listaInscritos = $this->semicevento_inscricao
            ->join('users', 'users.id', '=', 'semic_eventoinscricao.user_id')
            ->where('semic_eventoinscricao.semic_evento_id', '=', $semic_evento_id)
            ->select([
                'semic_eventoinscricao.nome_orientador',
                'semic_eventoinscricao.titulo_trabalho',
                'semic_eventoinscricao.cota_bolsa',
                'semic_eventoinscricao.status',
                'semic_eventoinscricao.numero_inscricao',
                'semic_eventoinscricao.semic_evento_id',
                'semic_eventoinscricao.semic_eventoinscricao_id',
            ])->orderby('semic_eventoinscricao.numero_inscricao', 'asc')->paginate(20);

        $links = $listaInscritos->appends($request->except('page'));

        return view($this->bag['view'] . '.index', compact('listaInscritos', 'semic_evento_', 'links'));
    }

    public function create($semic_evento_id)
    {
        $data_hoje = Carbon::now();

        $semic_evento = $this->semic_evento->findOrfail($semic_evento_id);

        if (($data_hoje->gte($semic_evento->data_inicio) && $data_hoje->lte($semic_evento->data_fim))) {

            return view('page.semicevento.create', compact('semic_evento'));
            
        } else {

            alert()->error(config($this->bag['msg'] . '.error.data_inscricao'));
            return redirect()->back();
        }
    }

    public function store(StoreSemicEventoInscricaoRequest $request, $semic_evento_id)
    {
        try {
            DB::beginTransaction();

            $data_hoje = Carbon::now();

            $semic_evento = $this->semic_evento->withCount('semic_evento_semic_eventoinscricao')->findOrfail($semic_evento_id);

            if (($data_hoje->gte($semic_evento->data_inicio) && $data_hoje->lte($semic_evento->data_fim))) {

                //Calculo para saber o numero de inscricao

                $numero_inscricao = $semic_evento['semic_evento_semic_eventoinscricao_count'] + 1;

                $dados_inscricao = $request->all();


                //Documento PDF Arquivo

                $extensao =  $request['Arquivo_pdf_semicevento_inscricao']->extension();
                $path = 'SmeicEventoIsncricao/' . Carbon::create($semic_evento->created_at)->format('Y') . '/' . $request['semic_evento_id'] . '/Arquivo_pdf_semicevento_inscricao' . '/' . Auth::user()->cpf . '';
                $nome = 'Arquivo_pdf_semicevento_inscricao' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
                $dados_inscricao['Arquivo_pdf_semicevento_inscricao'] = $request['Arquivo_pdf_semicevento_inscricao']->storeAs($path, $nome);


                $this->semicevento_inscricao->create([
                    'semic_evento_id' => $semic_evento_id,
                    'user_id' => Auth::user()->id,
                    'nome_orientador' => $dados_inscricao['nome_semicevento_inscricao'],
                    'titulo_trabalho' => $dados_inscricao['titulotrabalho_semicevento_inscricao'],
                    'cota_bolsa' => $dados_inscricao['semicevento_inscricao_cotabolsa'],
                    'arquivo' => $dados_inscricao['Arquivo_pdf_semicevento_inscricao'],
                    'numero_inscricao' => $numero_inscricao,
                    'status' => "Em Analise"
                ]);

           
                DB::commit();
                alert()->success(config($this->bag['msg'] . '.success.inscricao'));
                return redirect()->route('semicevento.page', ['semic_evento_id' => $request['semic_evento_id']]);
            } else {
                alert()->error(config($this->bag['msg'] . '.error.data_inscricao'));
                return redirect()->route('semicevento.page', ['semic_evento_id' => $semic_evento_id]);
            }
        } catch (\Throwable $th) {
            dd($th);
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

        $dadosInscrito = $this->semicevento_inscricao->with('semic_eventoinscricao_users', 'semic_eventoinscricao_semic_evento')
            ->where('semic_eventoinscricao.user_id', '=', $user_id)
            ->where('semic_eventoinscricao.semic_evento_id', '=', $semic_evento_id)
            ->orderby('numero_inscricao', 'asc')
            ->paginate(10);

            if ($dadosInscrito == null) {
                alert()->error(config('Você não está inscrito nesse Evento'));
                return redirect()->back();
            }

        $links = $dadosInscrito->appends($request->except('page'));
       // dd($dadosInscrito);
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

    

    
}