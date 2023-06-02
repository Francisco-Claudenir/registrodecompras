<?php

namespace App\Http\Controllers\Export;

use App\Exports\PrimeirosPassosInscricaoExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExportsController extends Controller
{
    public function primeirosPassosInscritos()
    {
        return Excel::download(new PrimeirosPassosInscricaoExport(), 'inscritos.xlsx');
    }
}
