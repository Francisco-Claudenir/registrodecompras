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
            <strong>
                {{ strtoupper($primeiropasso->nome) }}
            </strong>
        </small> <br>
        <small>
            <strong>
                Data Inicio: {{ date('d/m/Y', strtotime($primeiropasso->data_inicio)) }} / Data Fim:
                {{ date('d/m/Y', strtotime($primeiropasso->data_fim)) }}
            </strong>
        </small> <br>
        <small>
            <strong>
                Documento gerado em: {{ now()->format('d/m/Y H:i:s') }}
            </strong>
        </small> <br>
    </div>
    <br>
    <div class="col-xl-12 p-lg-4">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-11 col-sm-11">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td colspan="3">
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
                                        <dt style="font-size: 14px"> Nome</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">
                                            {{ $dadosInscrito->nome }}</p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Email</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $dadosInscrito->email }}</p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Cpf</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $dadosInscrito->cpf($dadosInscrito->cpf) }}</p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Número de Identidade</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $dadosInscrito->identidade }}</p>
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
                                        <dt style="font-size: 14px">Telefone</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $dadosInscrito->telefone }}</p>
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
                                        <p style="font-size: 14px">{{ $endereco['cep'] }}</p>
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
                                    <dd>
                                        <p style="font-size: 14px">{{ $endereco['numero'] }}</p>
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
                                        <dt style="font-size: 14px">Matrícula</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $dadosInscrito->matricula }}</p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Cópia do Contrato</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd class="text-justify"><a style="color: red;"
                                            href="{{ route('primeirospassos.inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->copiacontrato)]) }}">Arquivo</a>
                                        </p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Vigência - Início</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd class="text-justify">
                                        <p style="font-size: 14px">
                                            {{ date('d/m/Y', strtotime($dadosInscrito->vigencia_inicio)) }}
                                        </p>
                                    </dd>
                                </small>
                            </th>
                    
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th colspan="3">
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Centro</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $centro->centros }}</p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Vigência - Fim</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd class="text-justify">
                                        <p style="font-size: 14px">
                                            {{ date('d/m/Y', strtotime($dadosInscrito->vigencia_fim)) }}
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
                                        <dt style="font-size: 14px">Área do Projeto de Pesquisa</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $subArea->subArea_grandeArea->nome }} :
                                            {{ $subArea->nome }}</p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Título de Projeto de Pesquisa</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $dadosInscrito->tituloprojetopesquisa }}</p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Projeto de Pesquisa</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd class="text-justify"><a style="color: red;"
                                            href="{{ route('primeirospassos.inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->projetopesquisa)]) }}">Arquivo</a>
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
                                        <dt style="font-size: 14px">Resumo do Projeto</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $dadosInscrito->resumoprojeto }}</p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Chefe Imediato</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $dadosInscrito->chefeimediato }}</p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Parecer Comitê</dt>
                                    </h6>
                                </strong>
                                <small>
                                    @if ($dadosInscrito->parecercomite != null)
                                        <dd class="text-justify"><a style="color: red;"
                                                href="{{ route('primeirospassos.inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->parecercomite)]) }}">Arquivo</a>
                                            </p>
                                        </dd>
                                    @else
                                        <dd>
                                            <p style="font-size: 14px">Sem Arquivo</p>
                                        </dd>
                                    @endif

                                </small>
                            </th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <td colspan="3">
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Currículo Lattes</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd class="text-justify"><a style="color: red;"
                                            href="{{ route('primeirospassos.inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->curriculolattes)]) }}">Arquivo</a>
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
                                        <dt style="font-size: 14px">Título do Plano de Trabalho</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $planotrabalho->titulo }}</p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Plano de Trabalho</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $planotrabalho->resumo }}</p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Resumo do Plano de Trabalho</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd class="text-justify"><a style="color: red;"
                                            href="{{ route('primeirospassos.inscricao.docshow', ['diretorio' => Crypt::encrypt($planotrabalho->arquivo)]) }}">Arquivo</a>
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
