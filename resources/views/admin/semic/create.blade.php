@extends('layout.page', [
    'layout' => 'admin',
    'plugins' => ['wizard', 'validation_jquery'],
])

@section('title', ' - Cadastro de Programa Semic')

@section('content')
    <div class="container-fluid">
        @include('sweet::alert')
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">

                    <h4 class="card-title">Cadastro Semic</h4>

                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Semic</a></li>
                    <li class="breadcrumb-item active"><a href="">Cadastro</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('semic.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-4 col-md-4">
                                    <label class="form-label">Nome</label>
                                    <input type="text"
                                        class="form-control @if ($errors->first('nome')) is-invalid @endif"
                                        placeholder="Nome" name="nome" required="" value="{{ old('nome') }}">
                                    @if ($errors->has('nome'))
                                        <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
                                    @endif
                                </div>
                                <div class="mb-4 col-md-4">
                                    <label class="form-label">Data Inicio</label>
                                    <input type="date"
                                        class="form-control @if ($errors->first('data_inicio')) is-invalid @endif"
                                        name="data_inicio" required="" value="{{ old('data_inicio') }}" id="data_inicio">
                                    @if ($errors->has('data_inicio'))
                                        <div class="invalid-feedback">{{ $errors->first('data_inicio') }}</div>
                                    @endif
                                </div>
                                <div class="mb-4 col-md-4">
                                    <label class="form-label">Data Fim</label>
                                    <input type="date"
                                        class="form-control @if ($errors->first('data_fim')) is-invalid @endif"
                                        name="data_fim" required="" value="{{ old('data_fim') }}" id="data_fim">
                                    @if ($errors->has('data_fim'))
                                        <div class="invalid-feedback">{{ $errors->first('data_fim') }}</div>
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
                            
                                <div class="mb-4 col-md-7">
                                    <label class="form-label">Descrição</label>
                                    <textarea class="form-control @if ($errors->first('descricao')) is-invalid @endif" cols="30" rows="10"
                                        id="comment" name="descricao" required="">{{ old('descricao') }}</textarea>
                                    @if ($errors->has('descricao'))
                                        <div class="invalid-feedback">{{ $errors->first('descricao') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-4 col-md-12">
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
                            <button class="btn btn-success float-end" type="submit">Salvar</button>
                            <a class="btn btn-primary float-end me-2" type="button"
                                href="{{ route('semic.index') }}">Cancelar</a>
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
@endsection
