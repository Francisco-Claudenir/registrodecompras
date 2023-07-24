<?php

namespace App\Exports;

use App\Http\Controllers\PrimeirosPassos\PrimeirosPassosInscricaoController;
use App\Models\Centro;
use App\Models\Curso;
use App\Models\PP_IndicacaoBolsistas;
use App\Models\PP_IndicacaoBolsistasInscricao;
use Illuminate\Support\Facades\Crypt;
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
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\Hyperlink;

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
        $lista = [];

        $pp_indicacao_bolsista_id = $this->pp_indicacao_bolsista_id;

        //Verificando se o id existe
        PP_IndicacaoBolsistas::findOrfail($pp_indicacao_bolsista_id);

        //Buscando a dados do inscritos atraves de join
        $inscricoes = PP_IndicacaoBolsistasInscricao::where('pp_indicacao_bolsistas_inscricao.pp_i_bolsista_id', '=', $pp_indicacao_bolsista_id)
            ->orderby('numero_inscricao', 'asc')->get();

        foreach ($inscricoes as $key => $dados) {

            $endereco = json_decode($dados['endereco_bolsista'], true);

            $curso = Curso::findOrfail($dados['curso_id']);
            $centro_candidato = Centro::findOrfail($dados['centro_id']);
            $centro_orientador = Centro::findOrfail($dados['centro_orientador_id']);

            $lista[$key]['numero_inscricao'] = $dados['numero_inscricao'];
            $lista[$key]['nome_bolsista'] = $dados['nome_bolsista'];
            $lista[$key]['email_bolsista'] = $dados['email_bolsista'];
            $lista[$key]['cpf_bolsista'] = $dados['cpf_bolsista'];
            $lista[$key]['telefone_bolsista'] = $dados['telefone_bolsista'];
            $lista[$key]['cep'] = $endereco['cep'];
            $lista[$key]['endereco'] = $endereco['endereco'];
            $lista[$key]['numero'] = $endereco['numero'];
            $lista[$key]['bairro'] = $endereco['bairro'];
            $lista[$key]['curso_id'] = $curso['cursos'];
            $lista[$key]['centro_id'] = $centro_candidato['centros'];
            $lista[$key]['numero_identidade'] = $dados['numero_identidade'];
            $lista[$key]['documento_identidade'] = route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dados['documento_identidade'])]);
            $lista[$key]['documento_cpf'] = route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dados['documento_cpf'])]);
            $lista[$key]['nome_orientador'] = $dados['nome_orientador'];
            $lista[$key]['telefone_orientador'] = $dados['telefone_orientador'];
            $lista[$key]['email_orientador'] = $dados['email_orientador'];
            $lista[$key]['cpf_orientador'] = $dados['cpf_orientador'];
            $lista[$key]['centro_orientador_id'] = $centro_orientador['centros'];
            $lista[$key]['titulo_projeto_orientador'] = $dados['titulo_projeto_orientador'];
            $lista[$key]['titulo_plano_orientador'] = $dados['titulo_plano_orientador'];
            $lista[$key]['historico_escolar'] = route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dados['historico_escolar'])]);
            $lista[$key]['declaracao_vinculo'] = route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dados['declaracao_vinculo'])]);
            $lista[$key]['termo_compromisso_bolsista'] = route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dados['termo_compromisso_bolsista'])]);
            $lista[$key]['declaracao_negativa_vinculo'] = route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dados['declaracao_negativa_vinculo'])]);
            $lista[$key]['curriculo'] = route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dados['curriculo'])]);
            $lista[$key]['declaracao_conjuta_estagio'] = route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dados['declaracao_conjuta_estagio'])]);
            $lista[$key]['agencia_banco'] = $dados['agencia_banco'];
            $lista[$key]['numero_conta_corrente'] = $dados['numero_conta_corrente'];
            $lista[$key]['comprovante_conta_corrente'] = route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dados['comprovante_conta_corrente'])]);
            $lista[$key]['termo_compromisso_orientador'] = route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dados['termo_compromisso_orientador'])]);
        }

        $colecao = collect($lista);

        return $colecao;
    }

    //    public function drawings()
    //    {
    //        $drawing = new Drawing();
    //        $drawing->setName('Logo');
    //        $drawing->setDescription('This is my logo');
    //        $drawing->setPath(public_path('/images/uema/logo_uema.png'));
    //        $drawing->setHeight(90);all
    //        $drawing->setCoordinates('A1');

    //        return $drawing;
    //    }


    public function headings(): array
    {
        // Defina os nomes personalizados para as colunas
        return [
            'N° Inscrição',
            'Nome Bolsista',
            'E-mail Bolsista',
            'Cpf Bolsista',
            'Telefone Bolsista',
            'Cep',
            'Endereço',
            'Numero',
            'Bairro',
            'Centro',
            'Curso',
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
            'Histórico Escolar',
            'Declaração de Vínculo',
            'Termo de Compromisso do Bolsista',
            'Declaração Negativa de Vínculo Empregatício',
            'Currículo',
            'Declaração Conjuta de Estágio',
            'Agência do Banco do Brasil',
            'Número da Conta Corrente do Banco do Brasil',
            'Comprovante de Conta Corrente do Banco do Brasil',
            'Termo de Compromisso'
        ];
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
            'B' => 55,
            'C' => 55,
            'D' => 20,
            'E' => 20,
            // 'T' => 75,
            // 'U' => 65,
            // 'Y' => 85,
            // 'AC' => 65,
            // 'AD' => 75,
        ];
    }
}
