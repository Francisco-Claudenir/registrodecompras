<?php

namespace App\Http\Controllers\SemicEvento;

use App\Http\Controllers\Controller;
use App\Models\SemicEvento;
use App\Http\Requests\SemicEvento\StoreSemicEventoRequest;
use App\Http\Requests\SemicEvento\UpdateSemicEventoRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SemicEventoController extends Controller
{

    protected $semic_evento;
    protected $bag = [
        'view' => 'admin.semic_evento',
        'route' => 'semicevento',
        'msg' => 'temauema.msg.register'
    ];

    public function __construct(SemicEvento $semic_evento)
    {
        $this->semic_evento = $semic_evento;
    }

    public function create()
    {
        return view('admin.semic_evento.create');
    }

    public function index()
    {
        $programasSemic_evento = $this->semic_evento->paginate(20);
        return view('admin.semic_evento.index', compact('programasSemic_evento'));
    }

    public function store(StoreSemicEventoRequest $request)
    {
     //  dd($request->all());
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
            $this->semic_evento->create($semicevento);
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
       // dd($semic_evento);
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