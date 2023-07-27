<?php

namespace App\Http\Controllers\Export;

use App\Exports\PibicIndicacaoExport;
use App\Exports\PrimeirosPassosInscricaoExport;
use App\Exports\PP_IndicacaoBolsistasInscricaoExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExportsController extends Controller
{
    public function primeirosPassosInscritos($primeiropasso_id)
    {
        return Excel::download(new PrimeirosPassosInscricaoExport($primeiropasso_id), 'inscritos.xlsx');
    }

    public function ppIndicacaoBolsista($pp_indicacao_bolsista_id)
    {
        return Excel::download(new PP_IndicacaoBolsistasInscricaoExport($pp_indicacao_bolsista_id), 'inscritos.xlsx');
    }

    public function pibicIndicacaoInscricao($pibicindicacao_id)
    {
        return Excel::download(new PibicIndicacaoExport($pibicindicacao_id), 'inscritos.xlsx');
    }
}
