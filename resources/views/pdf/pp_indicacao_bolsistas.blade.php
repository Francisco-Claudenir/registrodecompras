<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
        integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <style>
        @page {
            margin: 0px 0px 25px 0px !important;
            padding: 0px 0px 0px 0px !important;
        }
    </style>
</head>

<body style="margin: 0px">
    <br>
    <div class="col-sm-12 text-center">
        <small>
            <strong>
                UNIVERSIDADE ESTADUAL DO MARANHÃO - UEMA
            </strong>
        </small><br>
        <small>
            <strong>
                PRÓ-REITORIA DE PESQUISA E PÓS-GRADUAÇÃO - PPG
            </strong>
        </small> <br>
        <small>
            <strong style="text-transform: uppercase">
                {{ $pp_indicacao_bolsista->nome }}
            </strong>
        </small> <br>
        <small>
            <strong>
                Data Inicio: {{ date('d/m/Y', strtotime($pp_indicacao_bolsista->data_inicio)) }} / Data Fim:
                {{ date('d/m/Y', strtotime($pp_indicacao_bolsista->data_fim)) }}
            </strong>
        </small> <br>
        <small>
            <strong>
                Documento gerado em: {{ now()->format('d/m/Y H:i:s') }}
            </strong>
        </small> <br>
    </div>
    <br>
    <br>
    <div class="col-xl-12 p-lg-4">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-11 col-sm-11">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td colspan="2">
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Nª Inscrição</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">
                                            {{ $dadosInscrito->numero_inscricao }}</p>
                                    </dd>
                                </small>
                            </td>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px"> Data Inscrição</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">
                                            {{ date('d/m/Y H:i', strtotime($dadosInscrito->created_at)) }}
                                    </dd>
                                </small>
                            </th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Nome do(a) Bolsista</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">
                                            {{ $dadosInscrito->nome_bolsista }}</p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">E-mail do(a) Bolsista</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $dadosInscrito->email_bolsista }}</p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">CPF do(a) Bolsista</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">
                                            {{ $dadosInscrito->cpf($dadosInscrito->cpf_bolsista) }}</p>
                                    </dd>
                                </small>
                            </th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Número de Identidade</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $dadosInscrito->numero_identidade }}</p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Telefone do(a) Bolsista</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $dadosInscrito->mask_telefone($dadosInscrito->telefone_bolsista) }}</p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Cep</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $dadosInscrito->mask_cep($endereco['cep']) }}</p>
                                    </dd>
                                </small>
                            </th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Bairro</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $endereco['bairro'] }}</p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Endereço</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $endereco['endereco'] }}</p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Número</dt>
                                    </h6>
                                </strong>
                                <small>
                                    @if ($endereco['numero'] != null)
                                        <dd>
                                            <p style="font-size: 14px">{{ $endereco['numero'] }}</p>
                                        </dd>
                                    @else
                                        <dd>
                                            <p style="font-size: 14px">Sem Número</p>
                                        </dd>
                                    @endif
                                </small>
                            </th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Campus/Centros</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $centro_candidato->centros }}</p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Curso</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $curso->cursos }}</p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Documento CPF</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd class="text-justify"><a style="color: red;"
                                            href="{{ route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->documento_cpf)]) }}">Arquivo</a>
                                        </p>
                                    </dd>
                                </small>
                            </th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <td colspan="3">
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Documento de Identidade</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd class="text-justify"><a style="color: red;"
                                            href="{{ route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->documento_identidade)]) }}">Arquivo</a>
                                        </p>
                                    </dd>
                                </small>
                            </td>
                        </tr>
                    </thead>
                </table>

                <br>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Nome do Orientador(a)</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $dadosInscrito->nome_orientador }}</p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Telefone do Orientador(a)</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $dadosInscrito->mask_telefone($dadosInscrito->telefone_orientador) }}</p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">E-mail do Orientador(a)</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $dadosInscrito->email_orientador }}</p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">CPF do Orientador(a)</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">
                                            {{ $dadosInscrito->cPF($dadosInscrito->cpf_orientador) }}</p>
                                    </dd>
                                </small>
                            </th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Campus/Centros</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $centro_orientador->centros }}</p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Título do Projeto do Orientador(a)</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $dadosInscrito->titulo_projeto_orientador }}</p>
                                    </dd>
                                </small>
                            </th>
                            <td colspan="2">
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Título do Plano de Trabalho Bolsista</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $dadosInscrito->titulo_plano_orientador }}</p>
                                    </dd>
                                </small>
                            </td>
                        </tr>
                    </thead>
                </table>

                <br>
                <br>
                <br>
                <br>
                <br>
                <br>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Histórico Escolar atualizado, disponível do SIGUEMA
                                        </dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd class="text-justify"><a style="color: red;"
                                            href="{{ route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->historico_escolar)]) }}">Arquivo</a>
                                        </p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Declaração de vínculo do aluno à UEMA atualizado
                                        </dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd class="text-justify"><a style="color: red;"
                                            href="{{ route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->declaracao_vinculo)]) }}">Arquivo</a>
                                        </p>
                                    </dd>
                                </small>
                            </th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Termo de Compromisso do bolsista </dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd class="text-justify"><a style="color: red;"
                                            href="{{ route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->termo_compromisso_bolsista)]) }}">Arquivo</a>
                                        </p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Declaração Negativa de Vínculo Empregatício</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd class="text-justify"><a style="color: red;"
                                            href="{{ route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->declaracao_negativa_vinculo)]) }}">Arquivo</a>
                                        </p>
                                    </dd>
                                </small>
                            </th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Currículo atualizado, gerado na Plataforma Lattes
                                        </dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd class="text-justify"><a style="color: red;"
                                            href="{{ route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->curriculo)]) }}">Arquivo</a>
                                        </p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Declaração conjuta de estágio</dt>
                                    </h6>
                                </strong>
                                <small>
                                    @if ($dadosInscrito->declaracao_conjuta_estagio != null)
                                        <dd class="text-justify"><a style="color: red;"
                                                href="{{ route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->declaracao_conjuta_estagio)]) }}">Arquivo</a>
                                            </p>
                                        </dd>
                                    @else
                                        Sem Arquivo
                                    @endif
                                </small>
                            </th>
                        </tr>
                    </thead>
                </table>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Agência do Banco do Brasil n°</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd class="text-justify"><a style="color: red;"
                                            href="{{ route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->agencia_banco)]) }}">Arquivo</a>
                                        </p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Número da Conta Corrente do Banco do Brasil</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $dadosInscrito->numero_conta_corrente }}</p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Comprovante de Conta Corrente do Banco do Brasil
                                        </dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd class="text-justify"><a style="color: red;"
                                            href="{{ route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->comprovante_conta_corrente)]) }}">Arquivo</a>
                                        </p>
                                    </dd>
                                </small>
                            </th>
                        </tr>
                    </thead>
                </table>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Termo de Compromisso</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd class="text-justify"><a style="color: red;"
                                            href="{{ route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->termo_compromisso_orientador)]) }}">Arquivo</a>
                                        </p>
                                    </dd>
                                </small>
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>
