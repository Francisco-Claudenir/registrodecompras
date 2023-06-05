<?php

namespace App\Http\Controllers\Export;

use App\Exports\PrimeirosPassosInscricaoExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExportsController extends Controller
{
    public function primeirosPassosInscritos($primeiropasso_id)
    {
        return Excel::download(new PrimeirosPassosInscricaoExport($primeiropasso_id), 'inscritos.xlsx');
    }
}
