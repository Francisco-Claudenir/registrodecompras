<?php

namespace App\Http\Controllers\Bati;

use App\Http\Controllers\Controller;
use App\Models\Bati;
use App\Models\BatiInscricao;
use App\Models\GrandeArea;
use App\Models\Centro;
use App\Models\ModalidadeBolsa;
use Carbon\Carbon;
use App\Http\Requests\Bati\StoreBatiInscricaoRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BatiInscricaoController extends Controller
{

    protected $bati;
    protected $grandearea;
    protected $centros;
    protected $modalidade_bolsa;
    protected $batiinscricao;

    protected $bag = [
        'view' => 'page.bati',
        'route' => 'bati',
        'msg' => 'temauema.msg.register'
    ];

    public function __construct(Bati $bati, GrandeArea $grandearea, Centro $centros, ModalidadeBolsa $modalidade_bolsa, BatiInscricao $batiinscricao){
        $this->bati = $bati;
        $this->grandearea = $grandearea;
        $this->centros = $centros;
        $this->modalidade_bolsa = $modalidade_bolsa;
        $this->batiinscricao = $batiinscricao;
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
        //dd($request);
        try {
            DB::beginTransaction();

            $data_hoje = Carbon::now();

            $bati = $this->bati->withCount('bati_bati_inscricao')->findOrfail($bati_id);

            if (($data_hoje->gte($bati->data_inicio) && $data_hoje->lte($bati->data_fim))) {

                 //Calculo para saber o numero de inscricao

                 $numero_inscricao = $bati['bati_bati_inscricao_count'] + 1;

                 $dados_inscricao = $request->all();

                 $dados_inscricao['cpf_bati_inscricao'] = str_replace(['.', '-'], '', $dados_inscricao['cpf_bati_inscricao']);
                 $dados_inscricao['telefone_bati_inscricao'] = str_replace(['(', ')', '.', '-', ' '], '', $dados_inscricao['telefone_bati_inscricao']);
                //Caminho de arquirvos
                
                //Documento PDF relação dos projetos de pesquisa 
                $extensao =  $request['anexo_pdf_bati_inscricao_projetospesquisa']->extension();
                $path = 'BatiIsncricao/' . Carbon::create($bati->created_at)->format('Y') . '/' . $request['bati_id'] . '/anexo_pdf_bati_inscricao_projetospesquisa' . '/' . Auth::user()->cpf . '';
                $nome = 'anexo_pdf_bati_inscricao_projetospesquisa' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
                $dados_inscricao['anexo_pdf_bati_inscricao_projetospesquisa'] = $request['anexo_pdf_bati_inscricao_projetospesquisa']->storeAs($path, $nome);

                //Documento PDF termo de Outorga
                $extensao =  $request['anexo_pdf_bati_inscricao_termooutorga']->extension();
                $path = 'BatiIsncricao/' . Carbon::create($bati->created_at)->format('Y') . '/' . $request['bati_id'] . '/anexo_pdf_bati_inscricao_termooutorga' . '/' . Auth::user()->cpf . '';
                $nome = 'anexo_pdf_bati_inscricao_termooutorga' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
                $dados_inscricao['anexo_pdf_bati_inscricao_termooutorga'] = $request['anexo_pdf_bati_inscricao_termooutorga']->storeAs($path, $nome);

                //Documento PDF Produção Docente
                $extensao =  $request['anexo_pdf_curriculolattes_bati_inscricao']->extension();
                $path = 'BatiIsncricao/' . Carbon::create($bati->created_at)->format('Y') . '/' . $request['bati_id'] . '/anexo_pdf_curriculolattes_bati_inscricao' . '/' . Auth::user()->cpf . '';
                $nome = 'anexo_pdf_curriculolattes_bati_inscricao' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
                $dados_inscricao['anexo_pdf_curriculolattes_bati_inscricao'] = $request['anexo_pdf_curriculolattes_bati_inscricao']->storeAs($path, $nome);

                //Utilizando o attach



                $this->batiinscricao->create([
                    'bati_id' => $bati_id,
                    'user_id' => Auth::user()->id,
                    'nome' => $dados_inscricao['nome_bati_inscricao'],
                    'cpf' => $dados_inscricao['cpf_bati_inscricao'],
                    'identidade' => $dados_inscricao['bati_inscricao_identidade'],
                    'endereco' => json_encode($dados_inscricao['bati_inscricao_endereco']),
                    'email' => $dados_inscricao['email_bati_inscricao'],

                    'matricula' => $dados_inscricao['matricula_bati_inscricao'],
                    'departamento' => $dados_inscricao['departamento_bati_inscricao'],
                    'laboratorio' => $dados_inscricao['laboratório_bati_inscricao'],
                    'regimetrabalho' => $dados_inscricao['regime_de_trabalho_bati_inscricao'],

                    
                    


                    
                    
                    'status' => "Em Analise",
                    'numero_inscricao' => $numero_inscricao,
                    'areaconhecimento_id' => $dados_inscricao['areaconhecimento_id'],
                    'matricula' => $dados_inscricao['matricula_semicinscricao'],
                    'titulacao' => $dados_inscricao['titulacao_semicinscricao'],
                    'titulocapitulo' => $dados_inscricao['titulo_capitulo_semicinscricao'],
                    'tituloprojetoorient' => $dados_inscricao['titulo_projeto_semicinscricao'],
                    'capitulo' => $dados_inscricao['anexo_capitulo_semicinscricao'],
                ]);

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