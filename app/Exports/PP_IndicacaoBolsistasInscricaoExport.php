<?php

namespace App\Exports;

use App\Http\Controllers\PrimeirosPassos\PrimeirosPassosInscricaoController;
use App\Models\Centro;
use App\Models\PP_IndicacaoBolsistas;
use App\Models\PP_IndicacaoBolsistasInscricao;
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

class PP_IndicacaoBolsistasInscricaoExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths, ShouldAutoSize, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $pp_indicacao_bolsista_id;

    public function __construct($pp_indicacao_bolsista_id)
    {
        $this->pp_indicacao_bolsista_id = $pp_indicacao_bolsista_id;
    }
    public function collection()
    {
        $pp_indicacao_bolsista_id = $this->pp_indicacao_bolsista_id;


        //Verificando se o id existe
        PP_IndicacaoBolsistas::findOrfail($pp_indicacao_bolsista_id);

        //Buscando a dados do inscritos atraves de join
        $lista = PP_IndicacaoBolsistasInscricao::join('users', 'pp_indicacao_bolsistas_inscricao.user_id', '=', 'users.id')
            ->join('centros', 'pp_indicacao_bolsistas_inscricao.centro_id', '=', 'centros.id')
            ->join('cursos', 'pp_indicacao_bolsistas_inscricao.curso_id', '=', 'cursos.id')
            ->where('pp_indicacao_bolsistas_inscricao.pp_i_bolsista_id', '=', $pp_indicacao_bolsista_id)
            ->select([
                'pp_indicacao_bolsistas_inscricao.numero_inscricao',
                'users.nome',
                'users.email',
                'users.cpf',
                'users.telefone',
                'centros.centros',
                'cursos.cursos',
                'pp_indicacao_bolsistas_inscricao.nome_orientador',
                'pp_indicacao_bolsistas_inscricao.email_orientador',
                'pp_indicacao_bolsistas_inscricao.telefone_orientador',
                'pp_indicacao_bolsistas_inscricao.centro_orientador_id',
            ])
            ->get();

        
        for ($i=0; $i < count($lista); $i++) { 
            
            $centro = Centro::findOrfail($lista[$i]['centro_orientador_id']);

            $lista[$i]['centro_orientador_id'] = $centro['centros'];
        }
        
        return $lista;
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
            'Telefone',
            'Centro',
            'Curso',
            'Nome Orientador',
            'Email Orientador',
            'Telefone Orientador',
            'Centro Orientador'
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
                $drawing->setCoordinates('C1');
                $drawing->setWidth($lastColumnIndex * 37);
                $drawing->setWorksheet($event->sheet->getDelegate());

                // Ajuste o estilo da cor de fundo para as linhas em branco
                $event->sheet->getStyle('A1:I7')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF');
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
