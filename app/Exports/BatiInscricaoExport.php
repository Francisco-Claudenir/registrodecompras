<?php

namespace App\Exports;

use App\Models\Bati;
use App\Models\Centro;
use App\Models\SubArea;
use App\Models\PlanoTrabalho;
use App\Models\BatiInscricao;
use Illuminate\Support\Facades\DB;
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

class BatiInscricaoExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths, ShouldAutoSize, WithEvents
{

    protected $bati_id;
    protected $subarea;
    protected $centros;
    

    public function __construct($bati_id)
    {
        $this->bati_id = $bati_id;
    }
    public function collection()
    {
        $lista = [];
        
        $bati_id = $this->bati_id;
        //Verificando se o id existe
        Bati::findOrfail($bati_id);
       
        $listaInscritos = BatiInscricao::with('plano_trabalho')->where('bati_inscricoes.bati_id', '=', $bati_id)
        ->orderby('bati_inscricoes.numero_inscricao', 'asc')
        ->get();

       // dd($listaInscritos);

        foreach ($listaInscritos as $key => $dados) {

            $vinculo = json_decode($dados['vinculo'], true);

            $subarea = SubArea::findOrfail($dados['areaconhecimento_id']);
            $centro_candidato = Centro::findOrfail($dados['centro_id']);

            $lista[$key]['numero_inscricao'] = $dados['numero_inscricao'];
            $lista[$key]['nome'] = $dados['nome'];
            $lista[$key]['cpf'] = $dados['cpf'];
            $lista[$key]['identidade'] = $dados['identidade'];
            $lista[$key]['endereco'] = $dados['endereco'];
            $lista[$key]['telefone'] = $dados['telefone'];
            $lista[$key]['email'] = $dados['email'];
            $lista[$key]['matricula'] = $dados['matricula'];
            $lista[$key]['centro_id'] = $centro_candidato['centros'];
            $lista[$key]['departamento'] = $dados['departamento'];
            $lista[$key]['laboratorio'] = $dados['laboratorio'];
            $lista[$key]['regimetrabalho'] = $dados['regimetrabalho'];
            $lista[$key]['titulacao'] = $dados['titulacao'];
            $lista[$key]['status'] = $dados['status'];
            $lista[$key]['areaconhecimento_id'] = $subarea['nome'];

            foreach ($dados->plano_trabalho as $index => $dados1) {

                $titulosplanotrabalho[$index] = $dados1['titulo']; 
            
            }
           
            $lista[$key]['titulo'] = implode(', ',$titulosplanotrabalho);
            $lista[$key]['vinculo'] = implode(', ',$vinculo);
            $lista[$key]['projetospesquisa'] = route('bati.inscricao.docshow', ['diretorio' => Crypt::encrypt($dados['projetospesquisa'])]);
            $lista[$key]['termosoutorga'] = route('bati.inscricao.docshow', ['diretorio' => Crypt::encrypt($dados['termosoutorga'])]);
            $lista[$key]['curriculolattes'] = route('bati.inscricao.docshow', ['diretorio' => Crypt::encrypt($dados['curriculolattes'])]);

        }
        $colecao = collect($lista);
        
       // dd($colecao);
       return $colecao;
    }

    public function headings(): array
    {
        // Defina os nomes personalizados para as colunas
        return [
            'N° Inscrição',
            'Nome Completo',
            'CPf',
            'Identidade',
            'Endereço',
            'Telefone',
            'Email',
            'Matrícula',
            'Centro',
            'Departamento',
            'Laboratório',
            'Regime de Trabalho',
            'Titulação/Categoria Funcional',
            'Status',
            'Área do Projeto de Pesquisa',
            'Plano(s) de Trabalho do Bolsista',
            'Programas de Pós-Graduação Vinculado',
            'Relação dos Projetos de Pesquisa',
            'Termo(s) de Outorga',
            'Currículo Lattes'
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
                
                
                foreach ($event->sheet->getColumnIterator('H') as $row) {
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
            'C' => 40,
            'D' => 20,
            'E' => 55,

        ];
    }
}
