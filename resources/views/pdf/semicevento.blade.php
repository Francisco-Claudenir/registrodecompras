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
                {{ $semic_eventopdf->nome }}
            </strong>
        </small> <br>
        <small>
            <strong>
                Data Inicio: {{ date('d/m/Y', strtotime($semic_eventopdf->data_inicio)) }} / Data Fim:
                {{ date('d/m/Y', strtotime($semic_eventopdf->data_fim)) }}
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
                            <td colspan="">
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
                            <th colspan="">
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
                            <th colspan="">
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Nome Orientador</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">
                                            {{ $dadosInscrito->nome_orientador }}</p>
                                    </dd>
                                </small>
                            </th>
                            <th colspan="">
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Titulo Trabalho</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $dadosInscrito->titulo_trabalho }}</p>
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
                                        <dt style="font-size: 14px">Cota Bolsa</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd>
                                        <p style="font-size: 14px">{{ $dadosInscrito->cota_bolsa }}</p>
                                    </dd>
                                </small>
                            </th>
                            <th colspan="">
                                <strong>
                                    <h6>
                                        <dt style="font-size: 14px">Arquivo</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd class="text-justify"><a style="color: red;"
                                            href="{{ route('semic.inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->arquivo)]) }}">Arquivo</a>
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
                                        <dt style="font-size: 14px">Tipo Inscrição</dt>
                                    </h6>
                                </strong>
                                <small>
                                    <dd class="text-justify">
                                        <p style="font-size: 14px">
                                        <ul>


                                            @foreach($tipos = json_decode($dadosInscrito->tipo,true) as $tipo)

                                                <li>{{$tipo}}</li>
                                            @endforeach
                                        </ul>
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
