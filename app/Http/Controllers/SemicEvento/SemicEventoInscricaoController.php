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

    
}