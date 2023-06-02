<?php

namespace App\Exports;

use App\Models\PrimeirosPassosInscricao;
use Maatwebsite\Excel\Concerns\FromCollection;

class PrimeirosPassosInscricaoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PrimeirosPassosInscricao::all();
    }
}
