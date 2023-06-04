<?php

namespace App\Exports;

use App\Http\Controllers\PrimeirosPassos\PrimeirosPassosInscricaoController;
use App\Models\PrimeiroPasso;
use App\Models\PrimeirosPassosInscricao;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class PrimeirosPassosInscricaoExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths, ShouldAutoSize, WithEvents
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
        $listaInscritos = PrimeirosPassosInscricao::join('users', 'users.id', '=', 'primeiros_passos_inscricaos.user_id')
            ->where('primeiros_passos_inscricaos.primeiropasso_id', '=', $primeiropasso_id)
            ->select([
                'primeiros_passos_inscricaos.numero_inscricao',
                'users.nome',
                'users.email',
                'users.cpf',
                'users.telefone',
            ])->get();
        return $listaInscritos;
    }

    //    public function drawings()
    //    {
    //        $drawing = new Drawing();
    //        $drawing->setName('Logo');
    //        $drawing->setDescription('This is my logo');
    //        $drawing->setPath(public_path('/images/uema/logo_uema.png'));
    //        $drawing->setHeight(90);
    //        $drawing->setCoordinates('A1');

    //        return $drawing;
    //    }
    public function headings(): array
    {
        // Defina os nomes personalizados para as colunas
        return [
            'N° Inscrição',
            'Nome',
            'Email',
            'Cpf',
            'Telefone'
            // Outras colunas...
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {


                $event->sheet->insertNewRowBefore(1, 7);
                $lastColumn = $event->sheet->getHighestColumn();
                $lastColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($lastColumn);

                // Adicione a imagem em uma célula específica
                $imagePath = public_path('/images/uema/topo-ppg.png');
                $drawing = new Drawing();
                $drawing->setPath($imagePath);
                $drawing->setCoordinates('B1');
                $drawing->setWidth($lastColumnIndex * 37);
                $drawing->setWorksheet($event->sheet->getDelegate());

                // Ajuste o estilo da cor de fundo para as linhas em branco
                $event->sheet->getStyle('A1:E7')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF');
            },
        ];
    }
    public function styles(Worksheet $sheet)
    {
        // Obter a última coluna preenchida na planilha
        $lastColumn = $sheet->getHighestColumn();

        // Definir a faixa de células da linha de cabeçalho
        $range = 'A1:' . $lastColumn . '1';
        // Aplicar estilo para a coluna de cabeçalho
        $sheet->getStyle($range)->getFont()->setSize(14)->setBold(true); // Tamanho 14

        $sheet->getStyle($range)->applyFromArray([
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => 'dddddd' // Cor de fundo desejada
                ]
            ]
        ]);
        $sheet->getRowDimension(1)->setRowHeight(25);
        $sheet->getStyle('A1:Z1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER);


        // Aplicar estilo para as demais colunas
        // Estilizar as demais linhas
        $lastRow = $sheet->getHighestRow();
        for ($row = 2; $row <= $lastRow; $row++) {
            $sheet->getRowDimension($row)->setRowHeight(20);
            $sheet->getStyle("A{$row}:Z{$row}")->applyFromArray([
                'font' => [
                    'size' => 12,
                ]
            ]);
            $sheet->getStyle("A{$row}:Z{$row}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER);
        }
    }
    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 55,
            'C' => 55,
            'D' => 20,
            'E' => 20,

        ];
    }
}
