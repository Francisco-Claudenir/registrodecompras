<?php

namespace App\Exports;

use App\Models\Semic;
use App\Models\SemicInscricao;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class SemicInscricaoExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths, ShouldAutoSize, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $semic_id;

    public function __construct($semic_id)
    {
        $this->semic_id = $semic_id;
    }
    public function collection()
    {
        $semic_id = $this->semic_id;
        //Verificando se o id existe
        Semic::findOrfail($semic_id);

        //Buscando a lista de inscritos atraves de join
        $listaInscritos = SemicInscricao::join('users', 'users.id', '=', 'semic_inscricaos.user_id')
            ->join('sub_areas', 'sub_areas.areaconhecimento_id', '=', 'semic_inscricaos.areaconhecimento_id')
            //->join('pp_inscricao__ptrabalhos', 'pp_inscricao__ptrabalhos.passos_inscricao_id', '=', 'primeiros_passos_inscricaos.passos_inscricao_id')
           // ->join('plano_trabalhos', 'plano_trabalhos.plano_id', '=', 'pp_inscricao__ptrabalhos.plano_id')
           // ->join('centros', 'centros.id', '=', 'primeiros_passos_inscricaos.centro_id')
            ->where('semic_inscricaos.semic_id', '=', $semic_id)
            ->select([
                'semic_inscricaos.numero_inscricao',
                'semic_inscricaos.nomeorientador',
                'semic_inscricaos.email',
                'semic_inscricaos.cpf',
                'semic_inscricaos.matricula',
                'semic_inscricaos.titulacao',
                'sub_areas.nome as subarea',
                'semic_inscricaos.tituloprojetoorient',
                'semic_inscricaos.titulocapitulo',
                'semic_inscricaos.status'      
            ])
            ->orderby('semic_inscricaos.numero_inscricao', 'asc')->get();

        return $listaInscritos;
    }


    public function headings(): array
    {
        // Defina os nomes personalizados para as colunas

        $anoatual = now()->subYear()->format('Y');
        $anoanterior = now()->format('Y');
        return [
            'N° Inscrição',
            'Nome Professor(a) Orientador',
            'Email',
            'Cpf',
            'Matrícula',
            'Titulação',
            'Área de Conhecimento',
            'Titulo do projeto do orientador cadastrado no PIBIC ciclo ' . $anoatual . '-' . $anoanterior,  
            'Título do capítulo submetido para a coletânea',
            'Status'
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
                $event->sheet->getStyle('A1:J7')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF');
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
            $statusCell = $sheet->getCell('H' . $row);
            $status = $statusCell->getValue();

            // Defina a cor de fundo com base no valor do status
            if ($status == 'Em Analise') {
                $statusCell->getStyle()->getFont()->setBold(true)->getColor()->setRGB('FFFFFF');
                $statusCell->getStyle()->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('B2B2B2'); // Amarelo
            } elseif ($status == 'Deferido') {
                $statusCell->getStyle()->getFont()->setBold(true)->getColor()->setRGB('FFFFFF');
                $statusCell->getStyle()->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('00FF00'); // Verde
            } elseif ($status == 'Indeferido') {
                $statusCell->getStyle()->getFont()->setBold(true)->getColor()->setRGB('FFFFFF');
                $statusCell->getStyle()->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('FF0000'); // Vermelho
            }

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
