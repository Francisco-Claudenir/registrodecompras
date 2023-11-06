<?php

namespace App\Http\Controllers\SemicEvento;

use App\Http\Controllers\CertificadoInscricaoController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Certificado\StoreCertificadoRequest;
use App\Models\Certificado;
use App\Models\Certificado_Inscricao;
use App\Models\Minicurso;
use App\Models\SemicEvento;
use App\Models\SemicEventoInscricao;
use App\Http\Requests\SemicEvento\StoreSemicEventoRequest;
use App\Http\Requests\SemicEvento\UpdateSemicEventoRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SemicEventoController extends Controller
{

    protected $semic_evento, $minicurso, $certificado, $certificadoinscricao;
    protected $bag = [
        'view' => 'admin.semic_evento',
        'route' => 'semicevento',
        'msg' => 'temauema.msg.register'
    ];

    public function __construct(SemicEvento $semic_evento, Minicurso $minicurso, Certificado $certificado, Certificado_Inscricao $certificadoinscricao)
    {
        $this->semic_evento = $semic_evento;
        $this->minicurso = $minicurso;
        $this->certificado = $certificado;
        $this->certificadoinscricao = $certificadoinscricao;
    }

    public function create()
    {
        return view('admin.semic_evento.create');
    }

    public function index()
    {
        $programasSemic_evento = $this->semic_evento->withCount('semic_evento_semic_eventoinscricao')->paginate(20);
        return view('admin.semic_evento.index', compact('programasSemic_evento'));
    }

    public function page($semic_evento_id)
    {


        $semic_evento = $this->semic_evento->with('semic_evento_minicursos')->findOrfail($semic_evento_id);


        if ($semic_evento->visivel == 0) {
            alert()->error(config('Evento não encontrado', 'Este evento não existe'));
            return redirect()->back();
        }

        if (Auth::check()) {
            $isInscrito = SemicEventoInscricao::where('semic_evento_id', $semic_evento->semic_evento_id)->where('user_id', Auth::user()->id)->exists();
        } else {
            $isInscrito = false;
        }

        return view('page.semicevento.page', compact('semic_evento', 'isInscrito'));

    }

    public function minicursos($semic_evento_id)
    {
        $semic_evento = $this->semic_evento->findOrfail($semic_evento_id);
        $minicursos = $this->minicurso->with('minicurso_semiceventoinscricao')->where('semicevento_id', $semic_evento_id)->get();
        return view('admin.semic_evento.minicursos', compact('semic_evento', 'minicursos'));
    }

    public function certificados($semic_evento_id)
    {
        $semic_evento = $this->semic_evento->findOrfail($semic_evento_id);
        $certificados = $this->certificado->where('semicevento_id', $semic_evento_id)->get();
        return view('admin.semic_evento.certificados', compact('semic_evento', 'certificados'));
    }

    public function storecertificado(StoreCertificadoRequest $request, $semic_evento_id)
    {
        $semic_evento = $this->semic_evento->findOrfail($semic_evento_id);

        try {
            DB::beginTransaction();
            $extensao = $request['img']->extension();
            $path = 'semicevento/Evento' . '/Certificado' . '';
            $nome = 'certificadosemicevento' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
            $certificado['img'] = $request['img']->storeAs($path, $nome);


            $cert = $this->certificado->create([
                'nome' => $request['nome'],
                'descricao' => $request['descricao'],
                'img' => $certificado['img'],
                'semicevento_id' => $semic_evento['semic_evento_id']
            ]);

            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.create'));
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.create'));
            return redirect()->back();
        }
    }
    public function site()
    {
        $semiceventos = $this->semic_evento->where('visivel', '=', 1)->orderBy('created_at', 'asc')->paginate(10);
        return view('page.semicevento.site', compact('semiceventos'));
    }

    public function store(StoreSemicEventoRequest $request)
    {
        try {
            DB::beginTransaction();
            $semicevento = $request->validated();

            $extensao = $request['banner']->extension();
            $path = 'semicevento/Evento' . '/Banner' . '';
            $nome = 'bannersemicevento' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
            $semicevento['banner'] = $request['banner']->storeAs($path, $nome);

            $semicevento['data_fim'] = $semicevento['data_fim'] . ' 23:59:59';
            $semicevento['data_certificado'] = $semicevento['data_certificado'];
            $semicevento['status'] = 'Aberto';
            $semicevento['banner'] = $semicevento['banner'];
            $evento = $this->semic_evento->create($semicevento);


            if (isset($request['minicursos'])){
                foreach ($request['minicursos'] as $cursos) {
                    $this->minicurso->create([
                        'nome' => $cursos['nome'],
                        'vagas' => $cursos['vagas'],
                        'horas' => $cursos['horas'],
                        'semicevento_id' => $evento->semic_evento_id
                    ]);
                }
            }


            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.create'));
            return redirect()->route('semicevento.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.create'));
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $semic_evento = $this->semic_evento->findOrfail($id);
        return view('admin.semic_evento.edit', compact('semic_evento'));
    }


    public function update(UpdateSemicEventoRequest $request, $id)
    {
        //   dd($request);
        try {

            DB::beginTransaction();
            $semic_eventoUp = $this->semic_evento->findOrfail($id);
            $semic_eventos = $request->validated();
            $semic_eventos['visivel'] = $request['visivel'] ?? false;
            $semic_eventos['data_fim'] = $semic_eventos['data_fim'] . ' 23:59:59';
            $semic_eventoUp->update($semic_eventos);
            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.update'));
            return redirect()->route('semicevento.index');

        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.update'));
            return redirect()->back();
        }
    }

}
