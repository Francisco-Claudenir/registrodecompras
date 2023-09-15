<?php

namespace App\Http\Controllers\Bati;

use App\Http\Controllers\Controller;
use App\Models\Bati;
use App\Models\BatiInscricao;
use App\Models\GrandeArea;
use App\Models\Centro;
use App\Models\ModalidadeBolsa;
use App\Models\PlanoTrabalho;
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
    protected $planotrabalho;

    protected $bag = [
        'view' => 'page.bati',
        'route' => 'bati',
        'msg' => 'temauema.msg.register'
    ];

    public function __construct(Bati $bati, GrandeArea $grandearea, Centro $centros, ModalidadeBolsa $modalidade_bolsa, BatiInscricao $batiinscricao, PlanoTrabalho $planotrabalho)
    {
        $this->bati = $bati;
        $this->grandearea = $grandearea;
        $this->centros = $centros;
        $this->modalidade_bolsa = $modalidade_bolsa;
        $this->batiinscricao = $batiinscricao;
        $this->planotrabalho = $planotrabalho;
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
        // dd($request->all());
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


                //Tratamento das informações enviadas de vinculos
                if ($dados_inscricao['opcao_1'] === "SIM" && isset($dados_inscricao['ppgraduacao'])) {
                    $vinculo_tratado = $dados_inscricao['ppgraduacao'];
                } elseif ($dados_inscricao['opcao_1'] === "NAO" && isset($dados_inscricao['ppgraduacao'])) {
                    $vinculo_tratado = "Sem Vínculos";
                } else {
                    $vinculo_tratado = "Sem Vínculos";
                }

                $inscricao = $this->batiinscricao->create([
                    'bati_id' => $bati_id,
                    'user_id' => Auth::user()->id,
                    'nome' => $dados_inscricao['nome_bati_inscricao'],
                    'cpf' => $dados_inscricao['cpf_bati_inscricao'],
                    'identidade' => $dados_inscricao['bati_inscricao_identidade'],
                    'endereco' => json_encode($dados_inscricao['bati_inscricao_endereco']),
                    'email' => $dados_inscricao['email_bati_inscricao'],
                    'telefone' => $dados_inscricao['telefone_bati_inscricao'],

                    'matricula' => $dados_inscricao['matricula_bati_inscricao'],
                    'departamento' => $dados_inscricao['departamento_bati_inscricao'],
                    'laboratorio' => $dados_inscricao['laboratório_bati_inscricao'],
                    'regimetrabalho' => $dados_inscricao['regime_de_trabalho_bati_inscricao'],
                    'status' => "Em Analise",
                    'titulacao' => $dados_inscricao['titulacao_categoria_funcional_bati_inscricao'],
                    'vinculo' => json_encode($vinculo_tratado),

                    'numero_inscricao' => $numero_inscricao,

                    'areaconhecimento_id' => $dados_inscricao['areaconhecimento_id'],
                    'projetospesquisa' => $dados_inscricao['anexo_pdf_bati_inscricao_projetospesquisa'],
                    'termosoutorga' => $dados_inscricao['anexo_pdf_bati_inscricao_termooutorga'],
                    'curriculolattes' => $dados_inscricao['anexo_pdf_curriculolattes_bati_inscricao'],
                    'centro_id' => $dados_inscricao['centro_id']

                ]);

                dd($dados_inscricao);
                $planotrabalho2 = [
                    'modalidade' => $dados_inscricao['modalidade_bolsa_bati_inscricao_2'],
                    'titulobati' => $dados_inscricao['titulo_bati_inscricao_2'],
                    'resmumo' => $dados_inscricao['resumo_bati_incricao_2'],
                    'arquivo' => $dados_inscricao['anexo_pdf_arquivo_bati_inscricao_2']
                ];

                if (!empty($planotrabalho2)) {
                    $plano2 = $this->planotrabalho->create([
                        'resumo' => $planotrabalho2['resmumo'],
                        'modalidade_id' => $planotrabalho2['modalidade'],
                        'titulo' => $planotrabalho2['titulobati'],
                        'arquivo' => $planotrabalho2['arquivo'],
                    ]);
                }

                //Cadastro plano de trabalho
                $plano = $this->planotrabalho->create([
                    'resumo' => $dados_inscricao['resumo_bati_incricao'],
                    'modalidade_id' => $dados_inscricao['modalidade_bolsa_bati_inscricao'],
                    'titulo' => $dados_inscricao['titulo_bati_inscricao'],
                    'arquivo' => $dados_inscricao['anexo_pdf_arquivo_bati_inscricao'],
                ]);

                $result = [$plano['plano_id'], $plano2['plano_id']];

                $inscricao->plano_trabalho()->attach($result);

                DB::commit();
                alert()->success(config($this->bag['msg'] . '.success.inscricao'));
                return redirect()->route('bati.page', ['bati_id' => $request['bati_id']]);
            } else {
                alert()->error(config($this->bag['msg'] . '.error.data_inscricao'));
                return redirect()->route('bati.page', ['bati_id' => $bati_id]);
            }
        } catch (\Throwable $th) {
            dd($th);
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.inscricao'));
            return redirect()->back();
        }
    }
}
