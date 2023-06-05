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
    <div class="col-xl-12 p-lg-4 ">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12 col-sm-12">
                
            </div>
        </div>
    </div>
    <br>
    <div class="container">
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
        </div>
        <br>
        <div class="col-sm-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            <strong>
                                <dt>Nome</dt>
                            </strong>
                            <small>
                                <dd>{{ $dadosInscrito->nome }}</dd>
                            </small>
                        </th>
                        <th>
                            <strong>
                                <dt>Email</dt>
                            </strong>
                            <small>
                                <dd>{{ $dadosInscrito->email }}</dd>
                            </small>
                        </th>
                        <th>
                            <strong>
                                <dt>Cpf</dt>
                            </strong>
                            <small>
                                <dd>{{ $dadosInscrito->cpf }}</dd>
                            </small>
                        </th>
                        <th>
                            <strong>
                                <dt>Telefone</dt>
                            </strong>
                            <small>
                                <dd>{{ $dadosInscrito->telefone }}</dd>
                            </small>
                        </th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th>
                            <strong>
                                <dt>Rg</dt>
                            </strong>
                            <small>
                                <dd>{{ $dadosInscrito->numero_identidade }}</dd>
                            </small>
                        </th>
                        <th>
                            <strong>
                                <dt>Curso</dt>
                            </strong>
                            <small>
                                <dd>{{ $dadosInscrito->curso }}</dd>
                            </small>
                        </th>
                        <th>
                            <strong>
                                <dt>Centro</dt>
                            </strong>
                            <small>
                                <dd>{{ $dadosInscrito->centro }}</dd>
                            </small>
                        </th>
                        <th>
                            <strong>
                                <dt>Endereço</dt>
                            </strong>
                            <small>
                                dsfadfasfdasfasdfas
                            </small>
                        </th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <td colspan="2">
                            <strong>
                                <dt>Documento Cpf</dt>
                            </strong>
                            <small>
                                <dd>{{ $dadosInscrito->documento_cpf }}</dd>
                            </small>
                        </td>
                        <td colspan="2">
                            <strong>
                                <dt>Documento Indentidade</dt>
                            </strong>
                            <small>
                                <dd>{{ $dadosInscrito->documento_identidade }}</dd>
                            </small>
                        </td>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="col-sm-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            <strong>
                                <dt>Nome Orientador</dt>
                            </strong>
                            <small>
                                <dd>{{ $dadosInscrito->nome_orientador }}</dd>
                            </small>
                        </th>
                        <th>
                            <strong>
                                <dt>Telefone Orientador</dt>
                            </strong>
                            <small>
                                <dd>{{ $dadosInscrito->telefone_orientador }}</dd>
                            </small>
                        </th>
                        <td colspan="2">
                            <strong>
                                <dt>Email Orientador</dt>
                            </strong>
                            <small>
                                <dd>{{ $dadosInscrito->email_orientador }}</dd>
                            </small>
                        </td>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <td colspan="2">
                            <strong>
                                <dt>Título do Projeto do Orientador</dt>
                            </strong>
                            <small>
                                <dd>{{ $dadosInscrito->titulo_projeto_orientador }}</dd>
                            </small>
                        </td>
                        <td colspan="2">
                            <strong>
                                <dt>Título do Plano de Trabalho Bolsista</dt>
                            </strong>
                            <small>
                                <dd>{{ $dadosInscrito->titulo_plano_orientador }}</dd>
                            </small>
                        </td>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="col-sm-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            <strong>
                                <dt>Historico Escolar Disponível no SIGUEMA</dt>
                            </strong>
                            <small>
                                <dd>{{ $dadosInscrito->historico_escolar }}</dd>
                            </small>
                        </th>
                        <th>
                            <strong>
                                <dt>Declaração de vínculo do aluno a UEMA</dt>
                            </strong>
                            <small>
                                <dd>{{ $dadosInscrito->declaracao_vinculo }}</dd>
                            </small>
                        </th>
                        <th>
                            <strong>
                                <dt>Termo de Compromisso do bolsista</dt>
                            </strong>
                            <small>
                                <dd>{{ $dadosInscrito->termo_compromisso_bolsista }}</dd>
                            </small>
                        </th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th>
                            <strong>
                                <dt>Declaração Negativa de Vínculo Empregatício</dt>
                            </strong>
                            <small>
                                <dd>{{ $dadosInscrito->declaracao_negativa_vinculo }}</dd>
                            </small>
                        </th>
                        <th>
                            <strong>
                                <dt>Curriculo gerado na Plataforma Lattes</dt>
                            </strong>
                            <small>
                                <dd>{{ $dadosInscrito->curriculo }}</dd>
                            </small>
                        </th>
                        <th>
                            <strong>
                                <dt>Declaração conjuta de estágio</dt>
                            </strong>
                            <small>
                                <dd>{{ $dadosInscrito->declaracao_conjuta_estagio }}</dd>
                            </small>
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="col-sm-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            <strong>
                                <dt>Agência do Banco do Brasil</dt>
                            </strong>
                            <small>
                                <dd>{{ $dadosInscrito->agencia_banco }}</dd>
                            </small>
                        </th>
                        <th>
                            <strong>
                                <dt>Número da conta corrente no Brasil</dt>
                            </strong>
                            <small>
                                <dd>{{ $dadosInscrito->numero_conta_corrente }}</dd>
                            </small>
                        </th>
                        <th>
                            <strong>
                                <dt>Comprovante de conta corrente do Banco do Brasil</dt>
                            </strong>
                            <small>
                                <dd>{{ $dadosInscrito->comprovante_conta_corrente }}</dd>
                            </small>
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="col-sm-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            <strong>
                                <dt>Termo de Compromisso</dt>
                            </strong>
                            <small>
                                <dd>{{ $dadosInscrito->termo_compromisso_orientador }}</dd>
                            </small>
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>
