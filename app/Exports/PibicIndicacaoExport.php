<?php

namespace App\Exports;

use App\Models\Centro;
use App\Models\Curso;
use App\Models\PibicIndicacao;
use App\Models\PibicIndicacaoInscricao;
use Illuminate\Support\Facades\Crypt;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\Hyperlink;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PibicIndicacaoExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $pibicindicacao_id;

    public function __construct($pibicindicacao_id)
    {
        $this->pibicindicacao_id = $pibicindicacao_id;
    }
    public function collection()
    {
        $lista = [];

        $pibicindicacao_id = $this->pibicindicacao_id;

        //Verificando se o id existe
        $pibic = PibicIndicacao::findOrfail($pibicindicacao_id);

        //Buscando a dados do inscritos
        $inscricoes = PibicIndicacaoInscricao::where('pibicindicacao_inscricoes.pibicindicacao_id', '=', $pibicindicacao_id)
            ->orderby('numero_inscricao', 'asc')->get();


        foreach ($inscricoes as $key => $dados) {

            $endereco = json_decode($dados['endereco_bolsista'], true);

            $curso = Curso::findOrfail($dados['curso_bolsista']);
            $centro_bolsista = Centro::findOrfail($dados['centro_bolsista']);
            $centro_orientador = Centro::findOrfail($dados['centro_orientador']);

            $lista[$key]['numero_inscricao'] = $dados['numero_inscricao'];
            $lista[$key]['status'] = $dados['status'];
            $lista[$key]['nome_bolsista'] = $dados['nome_bolsista'];
            $lista[$key]['email_bolsista'] = $dados['email_bolsista'];
            $lista[$key]['cpf_bolsista'] = $dados['cpf_bolsista'];
            $lista[$key]['telefone_bolsista'] = $dados['telefone_bolsista'];
            $lista[$key]['cep'] = $endereco['cep'];
            $lista[$key]['endereco'] = $endereco['endereco'];
            $lista[$key]['numero'] = $endereco['numero'];
            $lista[$key]['bairro'] = $endereco['bairro'];
            $lista[$key]['curso_bolsista'] = $curso['cursos'];
            $lista[$key]['centro_bolsista'] = $centro_bolsista['centros'];
            $lista[$key]['numero_identidade'] = $dados['numero_identidade'];
            $lista[$key]['documento_identidade'] = route('pibicindicacao.inscricao.docshow', ['diretorio' => Crypt::encrypt($dados['documento_identidade'])]);
            $lista[$key]['documento_cpf'] = route('pibicindicacao.inscricao.docshow', ['diretorio' => Crypt::encrypt($dados['documento_cpf'])]);
            $lista[$key]['nome_orientador'] = $dados['nome_orientador'];
            $lista[$key]['telefone_orientador'] = $dados['telefone_orientador'];
            $lista[$key]['email_orientador'] = $dados['email_orientador'];
            $lista[$key]['cpf_orientador'] = $dados['cpf_orientador'];
            $lista[$key]['centro_orientador'] = $centro_orientador['centros'];
            $lista[$key]['tituloprojeto_orientador'] = $dados['tituloprojeto_orientador'];
            $lista[$key]['tituloplano_bolsista'] = $dados['tituloplano_bolsista'];
            $lista[$key]['palavras_chave'] = $dados['palavras_chave'] ?? null;
            $lista[$key]['curriculolattes_orientador'] = $dados['curriculolattes_orientador'] ?? null;
            $lista[$key]['historico_escolar'] = route('pibicindicacao.inscricao.docshow', ['diretorio' => Crypt::encrypt($dados['historico_escolar'])]);
            $lista[$key]['declaracao_vinculo'] = route('pibicindicacao.inscricao.docshow', ['diretorio' => Crypt::encrypt($dados['declaracao_vinculo'])]);
            $lista[$key]['termocompromisso_bolsista'] = route('pibicindicacao.inscricao.docshow', ['diretorio' => Crypt::encrypt($dados['termocompromisso_bolsista'])]);
            $lista[$key]['declaracaonegativa_vinculo'] = route('pibicindicacao.inscricao.docshow', ['diretorio' => Crypt::encrypt($dados['declaracaonegativa_vinculo'])]);
            $lista[$key]['curriculo_lattes'] = route('pibicindicacao.inscricao.docshow', ['diretorio' => Crypt::encrypt($dados['curriculo_lattes'])]);
            $lista[$key]['declaracao_conjuta_estagio'] = route('pibicindicacao.inscricao.docshow', ['diretorio' => Crypt::encrypt($dados['declaracao_conjuta_estagio'])]);
            $lista[$key]['doc_comprobatorio'] = route('pibicindicacao.inscricao.docshow', ['diretorio' => Crypt::encrypt($dados['doc_comprobatorio'])]);
            $lista[$key]['agencia_banco'] = $dados['agencia_banco'];
            $lista[$key]['numero_conta_corrente'] = $dados['numero_conta_corrente'];
            $lista[$key]['comprovante_conta_corrente'] = route('pibicindicacao.inscricao.docshow', ['diretorio' => Crypt::encrypt($dados['comprovante_conta_corrente'])]);
            $lista[$key]['termocompromisso_orientador'] = route('pibicindicacao.inscricao.docshow', ['diretorio' => Crypt::encrypt($dados['termocompromisso_orientador'])]);

            if ($pibic->tipo == 'Pivic') {
                unset($lista[$key]['declaracao_vinculo']);
                unset($lista[$key]['palavras_chave']);
                unset($lista[$key]['curriculo_lattes']);
                unset($lista[$key]['declaracao_conjuta_estagio']);
                unset($lista[$key]['doc_comprobatorio']);
                unset($lista[$key]['agencia_banco']);
                unset($lista[$key]['numero_conta_corrente']);
                unset($lista[$key]['comprovante_conta_corrente']);
            }

            if ($pibic->tipo == 'Fapema') {
                unset($lista[$key]['palavras_chave']);
                unset($lista[$key]['curriculo_lattes']);
                unset($lista[$key]['doc_comprobatorio']);
            }

            if ($pibic->tipo == 'Cnpq'){
                unset($lista[$key]['doc_comprobatorio']);
            }
            if ($pibic->tipo == 'Ações Afirmativas'){
                unset($lista[$key]['curriculolattes_orientador']);
            }

        }
        $colecao = collect($lista);
        return $colecao;
    }
    public function headings(): array
    {
        $pibicindicacao_id = $this->pibicindicacao_id;

        //Verificando se o id existe
        $pibic = PibicIndicacao::findOrfail($pibicindicacao_id);
        // Defina os nomes personalizados para as colunas
        $colunas = [
            'N° Inscrição',
            'Status',
            'Nome Bolsista',
            'E-mail Bolsista',
            'Cpf Bolsista',
            'Telefone Bolsista',
            'Cep',
            'Endereço',
            'Numero',
            'Bairro',
            'Centro',
            'Curso Bolsista',
            'Numero Identidade',
            'Documento Identidade',
            'Documento Cpf',
            'Nome Orientador',
            'Telefone Orientador',
            'E-mail Orientador',
            'Cpf Orientador',
            'Centro Orientador',
            'Título do Projeto do Orientador',
            'Título do Plano de Trabalho Bolsista',
            '3 Palavras Chave',
            'Link do Currículo Lattes',
            'Histórico Escolar',
            'Declaração de Vínculo',
            'Termo de Compromisso do Bolsista',
            'Declaração Negativa de Vínculo Empregatício',
            'Currículo Lattes',
            'Declaração Conjunta de Estágio',
            'Documento Comprobatório',
            'Agência do Banco do Brasil',
            'Número da Conta Corrente do Banco do Brasil',
            'Comprovante de Conta Corrente do Banco do Brasil',
            'Termo de Compromisso'
        ];
        foreach ($colunas as $key => $coluna){
            if ($pibic->tipo == 'Pivic') {
                if ($coluna == 'Declaração Negativa de Vínculo Empregatício') {
                    unset($colunas[$key]);
                } elseif ($coluna == '3 Palavras Chave') {
                    unset($colunas[$key]);
                } elseif ($coluna == 'Link do Currículo Lattes') {
                    unset($colunas[$key]);
                } elseif ($coluna == 'Declaração Conjunta de Estágio') {
                    unset($colunas[$key]);
                } elseif ($coluna == 'Documento Comprobatório') {
                    unset($colunas[$key]);
                } elseif ($coluna == 'Agência do Banco do Brasil') {
                    unset($colunas[$key]);
                } elseif ($coluna == 'Número da Conta Corrente do Banco do Brasil') {
                    unset($colunas[$key]);
                } elseif ($coluna == 'Comprovante de Conta Corrente do Banco do Brasil') {
                    unset($colunas[$key]);
                }
            }
            if ($pibic->tipo == 'Fapema'){
                if ($coluna == '3 Palavras Chave'){
                    unset($colunas[$key]);
                } elseif ($coluna == 'Link do Currículo Lattes') {
                    unset($colunas[$key]);
                }elseif ($coluna == 'Documento Comprobatório') {
                    unset($colunas[$key]);
                }
            }
            if ($pibic->tipo == 'Cnpq'){
                if ($coluna == 'Documento Comprobatório'){
                    unset($colunas[$key]);
                }
            }
            if ($pibic->tipo == 'Ações Afirmativas'){
                if ($coluna == 'Link do Currículo Lattes'){
                    unset($colunas[$key]);
                }
            }
        }
        return $colunas;
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {

                $event->sheet->insertNewRowBefore(1, 10);
                $lastColumn = $event->sheet->getHighestColumn();
                $lastColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($lastColumn);

                // Adicione a imagem em uma célula específica
                $imagePath = public_path('/images/uema/topo-ppg.png');
                $drawing = new Drawing();
                $drawing->setPath($imagePath);
                $drawing->setCoordinates('A1');
                $drawing->setWidth($lastColumnIndex * 27);
                $drawing->setWorksheet($event->sheet->getDelegate());

                // Ajuste o estilo da cor de fundo para as linhas em branco
                $event->sheet->getStyle('A1:AE10')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('FFFFFF');

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
        $sheet->getStyle('AA1:AZ1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER);


        // Aplicar estilo para as demais colunas
        // Estilizar as demais linhas
        $lastRow = $sheet->getHighestRow();

        for ($row = 2; $row <= $lastRow; $row++) {
            $statusCell = $sheet->getCell('B' . $row);
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
        }

            for ($row = 2; $row <= $lastRow; $row++) {
                $sheet->getRowDimension($row)->setRowHeight(20);
                $sheet->getStyle("A{$row}:Z{$row}")->applyFromArray([
                    'font' => [
                        'size' => 12,
                    ]
                ]);
                $sheet->getStyle("A{$row}:Z{$row}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER);
            }
            for ($row = 2; $row <= $lastRow; $row++) {
                $sheet->getRowDimension($row)->setRowHeight(20);
                $sheet->getStyle("AA{$row}:AZ{$row}")->applyFromArray([
                    'font' => [
                        'size' => 12,
                    ]
                ]);
                $sheet->getStyle("AA{$row}:AZ{$row}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER);
            }

    }
    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 15,
            'C' => 55,
            'D' => 55,
            'E' => 20,
            'F'=> 20
            // 'T' => 75,
            // 'U' => 65,
            // 'Y' => 85,
            // 'AC' => 65,
            // 'AD' => 75,
        ];
    }
}
