<?php

namespace App\Http\Controllers\Bati;

use App\Http\Controllers\Controller;
use App\Models\Bati;
use App\Models\GrandeArea;
use App\Models\Centro;
use Carbon\Carbon;

class BatiInscricaoController extends Controller
{

    protected $bati;
    protected $grandearea;
    protected $centros;

    protected $bag = [
        'view' => 'page.bati',
        'route' => 'bati',
        'msg' => 'temauema.msg.register'
    ];

    public function __construct(Bati $bati, GrandeArea $grandearea, Centro $centros){
        $this->bati = $bati;
        $this->grandearea = $grandearea;
        $this->centros = $centros;
    }
  

    public function create($bati_id)
    {
        $data_hoje = Carbon::now();

        $bati = $this->bati->findOrfail($bati_id);

        if (($data_hoje->gte($bati->data_inicio) && $data_hoje->lte($bati->data_fim))) {

            $grandeArea = $this->grandearea->with('grandeArea_subArea')->get();
            $centros = $this->centros->where('centros', 'not like', "%Polo%")->get();

            return view('page.bati.create', compact('grandeArea', 'bati', 'centros'));
        } else {

            alert()->error(config($this->bag['msg'] . '.error.data_inscricao'));
            return redirect()->back();
        }
    }
   
}