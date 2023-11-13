<?php

namespace App\Exports;

use App\Models\SemicEvento;
use App\Models\SemicEventoInscricao;
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
use Illuminate\Support\Facades\Crypt;
use PhpOffice\PhpSpreadsheet\Cell\Hyperlink;

class SemicEventoInscricaoExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths, ShouldAutoSize, WithEvents
{

    protected $semic_evento_id;
    protected $tipo;

    public function __construct($semic_evento_id, $tipo)
    {
        $this->semic_evento_id = $semic_evento_id;
        $this->tipo = $tipo;
    }

    public function collection()
    {
        $semic_evento_id = $this->semic_evento_id;
        //Verificando se o id existe
        SemicEvento::findOrfail($semic_evento_id);

        $listaInscritos = SemicEventoInscricao::join('users', 'semic_eventoinscricao.user_id', '=', 'users.id')
            ->where('semic_eventoinscricao.semic_evento_id', '=', $semic_evento_id);

        if ($this->tipo == 'Ouvinte' || $this->tipo == 'Apresentador') {
            $listaInscritos->whereJsonContains('semic_eventoinscricao.tipo', $this->tipo);
        }

        $listaInscritos = $listaInscritos->orderby('semic_eventoinscricao.numero_inscricao', 'asc')
            ->get();


        $lista = [];
        
        foreach ($listaInscritos as $key => $dados) {
            $lista[$key]['numero_inscricao'] = $dados['numero_inscricao'];
            $lista[$key]['nome'] = $dados['nome'];
            $lista[$key]['email'] = $dados['email'];
            $lista[$key]['cpf'] = $dados['cpf'];
            $lista[$key]['telefone'] = $dados['telefone'];
            $lista[$key]['tipo'] = $dados['tipo'];
            $lista[$key]['status'] = $dados['status'];
            $lista[$key]['nome_orientador'] = $dados['nome_orientador'];
            $lista[$key]['titulo_trabalho'] = $dados['titulo_trabalho'];
            $lista[$key]['cota_bolsa'] = $dados['cota_bolsa'];
            $lista[$key]['arquivo'] = $dados['arquivo'] != null ? route('semic.eventoinscricao.docshow', ['diretorio' => Crypt::encrypt($dados['arquivo'])]) : null;
        }

        $colecao = collect($lista);

        return $colecao;
    }


    public function headings(): array
    {
        // Defina os nomes personalizados para as colunas

        return [
            'N° Inscrição',
            'Nome',
            'E-mail',
            'CPF',
            'Telefone',
            'Tipo',
            'Status',
            'Nome Orientador',
            'Título Trabalho',
            'Cota Bolsa',
            'Arquivo'
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
                $event->sheet->getStyle('A1:F7')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF');

                foreach ($event->sheet->getColumnIterator('F') as $row) {
                    foreach ($row->getCellIterator() as $cell) {
                        // Verifica se a célula não está vazia e contém '://'
                        if ($cell->getValue() != "" && str_contains($cell->getValue(), '://')) {
                            // Cria um objeto Hyperlink com a URL e o texto do link
                            $hyperlink = new Hyperlink($cell->getValue(), "Arquivo");

                            // Define o hyperlink na célula
                            $event->sheet->getCell($cell->getCoordinate())->setHyperlink($hyperlink);

                            // Define o valor da célula como "Arquivo Teste"
                            $event->sheet->getCell($cell->getCoordinate())->setValue("Arquivo");

                            // Aplica estilo ao link
                            $event->sheet->getStyle($cell->getCoordinate())->applyFromArray([
                                'font' => [
                                    'color' => ['rgb' => '0000FF'],
                                    'underline' => 'single'
                                ]
                            ]);
                        }
                    }
                }
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
            $statusCell = $sheet->getCell('E' . $row);
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
