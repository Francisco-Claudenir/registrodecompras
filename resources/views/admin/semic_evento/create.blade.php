@extends('layout.page', [
    'layout' => 'admin',
    'plugins' => ['wizard', 'validation_jquery'],
])

@section('title', ' - Cadastro de Programa Semic_evento')

@section('content')
    <div class="container-fluid">
        @include('sweet::alert')
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">

                    <h4 class="card-title">Cadastro Semic_evento</h4>

                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Semic_evento</a></li>
                    <li class="breadcrumb-item active"><a href="">Cadastro</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('semicevento.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-4 col-md-6">
                                    <label class="form-label">Nome</label>
                                    <input type="text"
                                           class="form-control @if ($errors->first('nome')) is-invalid @endif"
                                           placeholder="Nome" name="nome" required="" value="{{ old('nome') }}">
                                    @if ($errors->has('nome'))
                                        <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
                                    @endif
                                </div>
                                <div class="mb-4 col-md-2">
                                    <label class="form-label">Data Inicio</label>
                                    <input type="date"
                                           class="form-control @if ($errors->first('data_inicio')) is-invalid @endif"
                                           name="data_inicio" required="" value="{{ old('data_inicio') }}"
                                           id="data_inicio">
                                    @if ($errors->has('data_inicio'))
                                        <div class="invalid-feedback">{{ $errors->first('data_inicio') }}</div>
                                    @endif
                                </div>
                                <div class="mb-4 col-md-2">
                                    <label class="form-label">Data Fim</label>
                                    <input type="date"
                                           class="form-control @if ($errors->first('data_fim')) is-invalid @endif"
                                           name="data_fim" required="" value="{{ old('data_fim') }}" id="data_fim">
                                    @if ($errors->has('data_fim'))
                                        <div class="invalid-feedback">{{ $errors->first('data_fim') }}</div>
                                    @endif
                                </div>
                                <div class="mb-4 col-md-2">
                                    <label class="form-label">Data Certificado</label>
                                    <input type="date"
                                           class="form-control @if ($errors->first('data_certificado')) is-invalid @endif"
                                           name="data_certificado" required="" value="{{ old('data_certificado') }}"
                                           id="data_certificado">
                                    @if ($errors->has('data_certificado'))
                                        <div class="invalid-feedback">{{ $errors->first('data_certificado') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-5 col-sm-4">
                                    <label class="form-label fw-normal">Banner</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-primary text-white">Upload</span>
                                        <div class="form-file">
                                            <input type="file"
                                                   class="form-file-input form-control @if ($errors->first('banner')) is-invalid @endif"
                                                   name="banner">
                                        </div>
                                    </div>
                                    {!! $errors->default->first('banner', '<span style="color:red" class="form-text">:message</span>') !!}
                                </div>
                                <div class="mb-4 col-md-4">
                                    <label class="form-label">Descrição</label>
                                    <textarea class="form-control @if ($errors->first('descricao')) is-invalid @endif"
                                              cols="30" rows="10"
                                              id="comment" name="descricao"
                                              required="">{{ old('descricao') }}</textarea>
                                    @if ($errors->has('descricao'))
                                        <div class="invalid-feedback">{{ $errors->first('descricao') }}</div>
                                    @endif
                                </div>
                                <div class="mb-4 col-md-3">
                                    <label class="form-label">Visibilidade do Evento</label>
                                    <div class="form-check custom-checkbox mb-3 checkbox-info">
                                        <input type="checkbox"
                                               class="form-check-input @if ($errors->first('visivel')) is-invalid @endif"
                                               checked="" value="1" id="customCheckBox2" name="visivel">

                                        <label class="form-check-label" for="customCheckBox2">Evento Visível</label>
                                        @if ($errors->has('visivel'))
                                            <div class="invalid-feedback">{{ $errors->first('visivel') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <hr class="hr">
                            <div class="row">
                                <div class="mb-4 col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title text-primary">Minicursos</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="nome_minicurso">Nome</label>
                                                    <input type="text" class="form-control"
                                                           id="nome_minicurso">
                                                </div>
                                                <div class="col-3">
                                                    <label for="vagas_minicurso">Vagas</label>
                                                    <input type="number" class="form-control" min="1"
                                                           id="vagas_minicurso" oninput="validity.valid||(value='');">
                                                </div>
                                                <div class="col-3">
                                                    <label for="horas_minicurso">Horas</label>
                                                    <input type="number" class="form-control" min="1"
                                                           oninput="validity.valid||(value='');"
                                                           id="horas_minicurso">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="btn-list float-right mb-2">
                                                        <div class="pt-3">
                                                            <button type="button"
                                                                    class="btn btn-sm btn-primary"
                                                                    onclick="Salvar()">
                                                                Adicionar
                                                            </button>
                                                            <button type="button"
                                                                    onclick="limpaCampos()"
                                                                    class="btn btn-sm btn-danger">
                                                                Limpar
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>

                                            <table
                                                class="table table-sm table-responsive table-bordered text-nowrap">
                                                <thead>
                                                <tr>
                                                    <th style="width:50%">Nome
                                                    </th>
                                                    <th style="width:15%">Vagas
                                                    </th>
                                                    <th style="width:15%">Horas
                                                    </th>
                                                    <th>Ação</th>
                                                </tr>
                                                </thead>
                                                <tbody id="id_minicursos">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success float-end" type="submit">Salvar</button>
                            <a class="btn btn-primary float-end me-2" type="button"
                               href="{{ route('semicevento.index') }}">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .bootstrap-select .btn {
            height: 3.5rem !important;
        }

        @media (max-width: 1402px) {
            .bootstrap-select .btn {
                height: 2.5rem !important;
            }
        }

        .form-control::-webkit-file-upload-button {
            height: 55px !important;
        }

        @media (max-width: 1400px) {
            .form-control::-webkit-file-upload-button {
                height: 40px !important;
            }

            .bootstrap-select .dropdown-toggle .filter-option-inner-inner {
                height: 2.2rem !important;
            }

        }
    </style>
@endsection

@section('scripts')
    <script>
        // Obtém a data atual
        var today = new Date();

        // Obtém o dia, mês e ano da data atual
        var dd = today.getDate(); // dia
        var mm = today.getMonth() + 1; //January is 0! // mês (lembrando que janeiro é representado por 0)
        var yyyy = today.getFullYear(); // ano

        // Verifica se o dia é menor que 10 e adiciona um zero à frente, se necessário
        if (dd < 10) {
            dd = '0' + dd
        }

        // Verifica se o mês é menor que 10 e adiciona um zero à frente, se necessário
        if (mm < 10) {
            mm = '0' + mm
        }

        // Formata a data no formato "yyyy-mm-dd"
        today = yyyy + '-' + mm + '-' + dd;

        // Define a data mínima nos elementos HTML com os IDs "data_inicio" e "data_fim"
        document.getElementById("data_inicio").setAttribute("min", today);
        document.getElementById("data_fim").setAttribute("min", today);
    </script>

    <script>
        function limpaCampos() {
            document.getElementById('nome_minicurso').value = "";
            document.getElementById('vagas_minicurso').value = "";
            document.getElementById('horas_minicurso').value = "";
        }

        this.id = 1;
        this.arrayDados = [];

        function LerDados() {
            let dados = {}
            dados.id = this.id;
            dados.nome_minicurso = document.getElementById('nome_minicurso').value;
            dados.vagas_minicurso = document.getElementById('vagas_minicurso').value;
            dados.horas_minicurso = document.getElementById('horas_minicurso').value;


            return dados;
        }

        function Salvar() {
            let dados = this.LerDados();
            if (this.ValidaCampos(dados)) {
                this.Adicionar(dados);

            }
            this.ListaTabela();
        }

        function Adicionar(dados) {
                this.arrayDados.push(dados);
                this.id++;

                limpaCampos();
        }

        function RemoverDados(id) {
            let tbody = document.getElementById('id_minicursos');

            for (let i = 0; i < this.arrayDados.length; i++) {

                if (this.arrayDados[i].id == id) {
                    this.arrayDados.splice(i, 1);
                    tbody.deleteRow(i);
                }
            }
        }

        function ListaTabela() {
            let tbody = document.getElementById('id_minicursos');
            tbody.innerText = '';

            for (let i = 0; i < this.arrayDados.length; i++) {

                let tr = tbody.insertRow();

                let td_nome = tr.insertCell();
                let td_vagas = tr.insertCell();
                let td_horas = tr.insertCell();
                let td_acoes = tr.insertCell();

                td_nome.innerHTML = `<input class="form-control type="text" name="minicursos[` +
                    i +
                    `][nome]" readonly value="` + this
                        .arrayDados[i].nome_minicurso + `" style="border: none;">`;
                td_vagas.innerHTML = `<input class="form-control type="text" name="minicursos[` +
                    i +
                    `][vagas]" readonly value="` + this
                        .arrayDados[i].vagas_minicurso + `" style="border: none;">`;
                td_horas.innerHTML = `<input class="form-control type="text" name="minicursos[` + i +
                    `][horas]" readonly value="` + this
                        .arrayDados[i].horas_minicurso + `" style="border: none;">`;
                td_acoes.innerHTML = `<i class="btn btn-danger shadow btn-xs sharp me-1 fas fa-trash" style="color: #fff" onclick="RemoverDados(` + this
                    .arrayDados[i].id + `)"></i>`;
            }
console.log(arrayDados);
        }

        function ValidaCampos(dados) {
            let mensagem = '';
            if (dados.nome_minicurso == '') {
                mensagem += '- Infome o Nome do Minicurso \n';
            }if (dados.vagas_minicurso == '') {
                mensagem += '- Infome a quantidade de vagas do minicurso \n';
            }
            if (dados.horas_minicurso == '') {
                mensagem += '- Infome a quantidade de horas do minicurso \n';
            }
            if (mensagem != '') {
                alert(mensagem);
                return false;
            }
            return true;
        }
    </script>


@endsection
