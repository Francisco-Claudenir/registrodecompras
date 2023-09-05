<?php

namespace App\Http\Controllers\Bati;

use App\Http\Controllers\Controller;
use App\Models\Bati;
use App\Models\GrandeArea;
use App\Models\Centro;
use App\Models\ModalidadeBolsa;
use Carbon\Carbon;
use App\Http\Requests\Bati\StoreBatiInscricaoRequest;
use Illuminate\Support\Facades\DB;

class BatiInscricaoController extends Controller
{

    protected $bati;
    protected $grandearea;
    protected $centros;
    protected $modalidade_bolsa;

    protected $bag = [
        'view' => 'page.bati',
        'route' => 'bati',
        'msg' => 'temauema.msg.register'
    ];

    public function __construct(Bati $bati, GrandeArea $grandearea, Centro $centros, ModalidadeBolsa $modalidade_bolsa){
        $this->bati = $bati;
        $this->grandearea = $grandearea;
        $this->centros = $centros;
        $this->modalidade_bolsa = $modalidade_bolsa;
    }
  

    public function create($bati_id)
    {
        $data_hoje = Carbon::now();

        $bati = $this->bati->findOrfail($bati_id);

        if (($data_hoje->gte($bati->data_inicio) && $data_hoje->lte($bati->data_fim))) {

            $grandeArea = $this->grandearea->with('grandeArea_subArea')->get();
            $centros = $this->centros->where('centros', 'not like', "%Polo%")->get();
            $modalidade_bolsas = $this->modalidade_bolsa->where('nome', 'not like', "%Polo%")->get();

            return view('page.bati.create', compact('grandeArea', 'bati', 'centros', 'modalidade_bolsas'));
        } else {

            alert()->error(config($this->bag['msg'] . '.error.data_inscricao'));
            return redirect()->back();
        }
    }

    public function store(StoreBatiInscricaoRequest $request, $bati_id)
    {
        try {
            DB::beginTransaction();

            $data_hoje = Carbon::now();

            $bati = $this->bati->withCount('bati_bati_inscricao')->findOrfail($bati_id);

            if (($data_hoje->gte($bati->data_inicio) && $data_hoje->lte($bati->data_fim))) {

            } else {
                alert()->error(config($this->bag['msg'] . '.error.data_inscricao'));
                return redirect()->route('bati.page', ['bati_id' => $bati_id]);
            }

        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.inscricao'));
            return redirect()->back();
        }
    }
   
}