<?php

namespace App\Http\Controllers;

use App\Models\PrimeiroPasso;
use App\Models\PP_IndicacaoBolsistas;
use App\Models\PibicIndicacao;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ProjetoAprovadoController extends Controller
{
    protected $primeiroPasso, $ppIndicacaoBolsista, $pibicIndicacao;

    public function __construct(
        PrimeiroPasso $primeiroPasso,
        PP_IndicacaoBolsistas $ppIndicacaoBolsista,
        PibicIndicacao $pibicIndicacao
    ) {
        $this->primeiroPasso = $primeiroPasso;
        $this->ppIndicacaoBolsista = $ppIndicacaoBolsista;
        $this->pibicIndicacao = $pibicIndicacao;
    }

    public function buscaProjetosAprovados()
    {
        $user = Auth::User();
        $testee = 55;
        $cpfteste = '06426061450';

        $primeiro_passos = $this->buscarEventoEInscricao("primeiroPasso", "primeirospassos", "primeiros_passos_inscricaos", "primeiropasso_id", $testee, $cpfteste);

        $primeirop_passo_inscricao = $this->buscarEventoEInscricao("ppIndicacaoBolsista", "pp_indicacao_bolsistas", "pp_indicacao_bolsistas_inscricao", "pp_i_bolsista_id", $testee, $cpfteste);
    }

    public function buscarEventoEInscricao($nomeModalEvento, $nomeTabelaEvento, $nomeTabelaInscricao, $nomeDoId, $user_id, $cpf_orientador)
    {

        $query = $this->$nomeModalEvento->join($nomeTabelaInscricao, $nomeTabelaEvento . '.' . $nomeDoId, '=', $nomeTabelaInscricao . '.' . $nomeDoId)
            ->where($nomeTabelaInscricao . '.status', '=', 'Deferido');

        if ($nomeTabelaEvento == 'primeirospassos') {
            $query->where($nomeTabelaInscricao . '.user_id', '=', $user_id);
        } else {
            $query->where($nomeTabelaInscricao . '.cpf_orientador', '=', $cpf_orientador);
        }

        return $query->get();
    }
}
