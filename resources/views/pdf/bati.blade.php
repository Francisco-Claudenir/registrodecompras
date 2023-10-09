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
                {{ $bati->nome }}
            </strong>
        </small> <br>
        <small>
            <strong>
                Data Inicio: {{ date('d/m/Y', strtotime($bati->data_inicio)) }} / Data Fim:
                {{ date('d/m/Y', strtotime($bati->data_fim)) }}
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
                            <th>
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
                            </th>
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
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Vigência - Início</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd class="text-justify">
                                        <p style="font-size: 14px">
                                            {{ date('d/m/Y', strtotime($bati->data_inicio)) }}
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
                                            {{ date('d/m/Y', strtotime($bati->data_fim)) }}
                                        </p>
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
                                        <dt style="font-size: 14px">Nome completo</dt>
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
                                        <dt style="font-size: 14px">CPF</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $dadosInscrito->cpf }}</p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Identidade</dt>
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
                                        <dt style="font-size: 14px">Endereço</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $dadosInscrito->endereco }}</p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Telefone</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">
                                            {{ $dadosInscrito->telefone }}</p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">E-MAIL</dt>
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
                                        <dt style="font-size: 14px">Matrícula</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $dadosInscrito->matricula }}</p>
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
                                        <dt style="font-size: 14px">Centro</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $centro->centros }}
                                        </p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Departamento</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $dadosInscrito->departamento }}</p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Laboratório</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd class="text-justify">
                                        <p style="font-size: 14px">
                                            {{ $dadosInscrito->laboratorio }}
                                        </p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Regime de trabalho</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd class="text-justify">
                                        <p style="font-size: 14px">
                                            {{ $dadosInscrito->regimetrabalho }}
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
                                    <h6 style="margin-top: -50px;">
                                        <dt style="font-size: 14px">Titulação/Categoria Funcional</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd class="text-justify">
                                        <p style="font-size: 14px">
                                            {{ $dadosInscrito->titulacao }}
                                        </p>
                                    </dd>
                                </small>
                            </th>
                            <th colspan="3">
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Programas de Pós-Graduação Vinculado</dt>
                                    </h6>
                                </strong>

                                <small>
                                    <dd>
                                        @foreach ($dadosInscrito->vinculo as $key => $item)
                                            <p style="font-size: 14px">{{ $item }}</p>
                                        @endforeach
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
                                        <dt style="font-size: 14px">Relação dos Projetos de Pesquisa</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd class="text-justify"><a style="color: red;"
                                            href="{{ route('bati.inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->projetospesquisa)]) }}">Arquivo</a>
                                        </p>
                                    </dd>
                                </small>
                            </th>
                            <th>
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Termo(s) de Outorga</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd class="text-justify"><a style="color: red;"
                                            href="{{ route('bati.inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->termosoutorga)]) }}">Arquivo</a>
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
                            @foreach ($dadosInscrito->plano_trabalho as $key => $item)
                                <th>
                                    <strong>
                                        <h6>
                                            <dt style="font-size: 14px">Plano(s) de Trabalho do Bolsista</dt>
                                        </h6>
                                    </strong>
                                    <small>
                                        <p class="form-label fw-normal">Plano de Trabalho {{ $key + 1 }}</p>
                                        <dt>Modalidade de Bolsa solicitada</dt>
                                        <dd class="text-justify">{{ $item->modalidade->nome }}</dd>
                                        <dt>Título</dt>
                                        <dd class="text-justify">{{ $item->titulo }}</dd>
                                        <dt>Resumo</dt>
                                        <dd class="text-justify">{{ $item->resumo }}</dd>
                                        <dt>Arquivo</dt>
                                        <dd class="text-justify"><a style="color: red;" target="_blank"
                                                href="{{ route('bati.inscricao.docshow', ['diretorio' => Crypt::encrypt($item->arquivo)]) }}">Arquivo</a>
                                        </dd>
                                    </small>
                                </th>
                            @endforeach
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
                                        <dt style="font-size: 14px">Currículo Lattes</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd class="text-justify"><a style="color: red;"
                                            href="{{ route('bati.inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->curriculolattes)]) }}">Arquivo</a>
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
