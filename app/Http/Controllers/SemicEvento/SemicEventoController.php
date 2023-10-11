<?php

namespace App\Http\Controllers\SemicEvento;

use App\Http\Controllers\Controller;
use App\Models\SemicEvento;
use App\Http\Requests\SemicEvento\StoreSemicEventoRequest;
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
            return redirect()->route('semic.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.create'));
            return redirect()->back();
        }
    }

}