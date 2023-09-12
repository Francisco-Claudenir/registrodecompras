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
                {{-- $semic->nome --}}
            </strong>
        </small> <br>
        <small>
            <strong>
                Data Inicio: {{ date('d/m/Y', strtotime($semic->data_inicio)) }} / Data Fim:
                {{ date('d/m/Y', strtotime($semic->data_fim)) }}
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
                                        <dt style="font-size: 14px">Nome Professor(a) Orientador</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">
                                            {{ $dadosInscrito->nomeorientador }}</p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">E-mail</dt>
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
                                        <dt style="font-size: 14px">CPF</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $dadosInscrito->cpf}}</p>
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
                                        <p style="font-size: 14px">{{ $dadosInscrito->matricula}}</p>
                                    </dd>
                                </small>
                            </th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th colspan="2">
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Titulação</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $dadosInscrito->titulacao}}</p>
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
                                            {{ date('d/m/Y', strtotime($semic->data_inicio)) }}
                                        </p>
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
                                            {{ date('d/m/Y', strtotime($semic->data_fim)) }}
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
                                        <dt style="font-size: 14px">Titulo do projeto do orientador cadastrado no PIBIC
                                            ciclo {{now()->subYear()->format('Y')}}-{{ now()->format('Y') }}</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $dadosInscrito->tituloprojetoorient }}</p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Título do capítulo submetido para a coletânea</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $dadosInscrito->titulocapitulo }}</p>
                                    </dd>
                                </small>
                            </th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th colspan="4">
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Capítulo</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd class="text-justify"><a style="color: red;"
                                            href="{{route('semic.inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->capitulo)])}}">Arquivo</a>
                                        </p>
                                    </dd>
                                </small>
                            </th>
                        </tr>
                    </thead>
                </table>
                <br>
            </div>
        </div>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>
