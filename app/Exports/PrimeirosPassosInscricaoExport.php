<?php

namespace App\Exports;

use App\Http\Controllers\PrimeirosPassos\PrimeirosPassosInscricaoController;
use App\Models\PrimeiroPasso;
use App\Models\PrimeirosPassosInscricao;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class PrimeirosPassosInscricaoExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $primeiropasso_id;

    public function __construct($primeiropasso_id)
    {
        $this->primeiropasso_id = $primeiropasso_id;
    }
    public function collection()
    {
        $primeiropasso_id = $this->primeiropasso_id;
        //Verificando se o id existe
        PrimeiroPasso::findOrfail($primeiropasso_id);

        //Buscando a lista de inscritos atraves de join
        $listaInscritos = PrimeirosPassosInscricao::
            join('users', 'users.id', '=', 'primeiros_passos_inscricaos.user_id')
            ->where('primeiros_passos_inscricaos.primeiropasso_id', '=', $primeiropasso_id)
            ->select([
                'users.nome',
                'users.email',
                'users.cpf',
                'users.telefone',
            ])->get();

       return $listaInscritos;
   }

   public function headings(): array
    {
        // Defina os nomes personalizados para as colunas
        return [
            'Nome',
            'Email',
            'Cpf',
            'Telefone'
            // Outras colunas...
        ];
    }
    public function styles(Worksheet $sheet)
    {
         // Aplicar estilo para a coluna de cabeçalho
         $sheet->getStyle('A1:Z1')->getFont()->setSize(14)->setBold(true);// Tamanho 14
         $sheet->getRowDimension(1)->setRowHeight(25);
         $sheet->getStyle('A1:Z1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER);


         // Aplicar estilo para as demais colunas
         // Estilizar as demais linhas
        $lastRow = $sheet->getHighestRow();
        for ($row = 2; $row <= $lastRow; $row++) {
            $sheet->getStyle("A{$row}:Z{$row}")->applyFromArray([
                'font' => [
                    'size' => 12,
                ],
            ]);
            $sheet->getStyle("A{$row}:Z{$row}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        }
    }
    public function columnWidths(): array
    {
        return [
            'A' => 55,
            'B' => 55,
            'C' => 55,
            'D' => 55,

        ];
    }
    
}


