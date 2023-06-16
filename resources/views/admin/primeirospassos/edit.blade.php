@extends('layout.page', [
    'layout' => 'admin',
    'plugins' => ['wizard', 'validation_jquery'],
])

@section('title', ' - Edição Primeiros Passos')

@section('content')
    <div class="container-fluid">
        @include('sweet::alert')

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">

                    <h4 class="card-title">Editar Primeiros Passos</h4>

                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Primeiros Passos</a></li>
                    <li class="breadcrumb-item active"><a href="">Editar</a></li>
                </ol>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('primeiropasso.update', $primeiropasso->primeiropasso_id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="mb-4 col-md-4">
                                    <label class="form-label">Nome</label>
                                    <input type="text"
                                        class="form-control @if ($errors->first('nome')) is-invalid @endif"
                                        name="nome" required="" value="{{ $primeiropasso->nome }}">
                                    @if ($errors->has('nome'))
                                        <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
                                    @endif
                                </div>
                                <div class="mb-4 col-md-4">
                                    <label class="form-label">Data Inicio</label>
                                    <input type="date"
                                        class="form-control @if ($errors->first('data_inicio')) is-invalid @endif"
                                        name="data_inicio" required=""
                                        value="{{ date('Y-m-d', strtotime($primeiropasso->data_inicio)) }}"
                                        id="data_inicio">
                                    @if ($errors->has('data_inicio'))
                                        <div class="invalid-feedback">{{ $errors->first('data_inicio') }}</div>
                                    @endif
                                </div>
                                <div class="mb-4 col-md-4">
                                    <label class="form-label">Data Fim</label>
                                    <input type="date"
                                        class="form-control @if ($errors->first('data_fim')) is-invalid @endif"
                                        name="data_fim" required=""
                                        value="{{ date('Y-m-d', strtotime($primeiropasso->data_fim)) }}" id="data_fim">
                                    @if ($errors->has('data_fim'))
                                        <div class="invalid-feedback">{{ $errors->first('data_fim') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-4 col-md-12">
                                    <label class="form-label">Descrição</label>
                                    <textarea class="form-control @if ($errors->first('descricao')) is-invalid @endif" cols="30" rows="10"
                                        id="comment" name="descricao" required="">{{ $primeiropasso->descricao }}</textarea>
                                    @if ($errors->has('descricao'))
                                        <div class="invalid-feedback">{{ $errors->first('descricao') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="">Status</label>
                                <div class="mb-3 mb-0 mt-2">
                                    <label class="radio-inline me-3"><input type="radio" name="status" value="Aberto"
                                            @if ($primeiropasso->status == 'Aberto') checked @endif> Aberto</label>
                                    <label class="radio-inline me-3"><input type="radio" name="status" value="Fechado"
                                            @if ($primeiropasso->status == 'Fechado') checked @endif> Fechado</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-4 col-md-12">
                                    <label class="form-label">Visibilidade do Evento</label>
                                    <div class="form-check custom-checkbox mb-3 checkbox-info">
                                        <input type="checkbox"
                                            class="form-check-input @if ($errors->first('visivel')) is-invalid @endif"
                                            @if ($primeiropasso->visivel == true) checked @endif value="{{ true }}"
                                            id="customCheckBox2" name="visivel">

                                        <label class="form-check-label" for="customCheckBox2">Evento Visível</label>
                                        @if ($errors->has('visivel'))
                                            <div class="invalid-feedback">{{ $errors->first('visivel') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success float-end" type="submit">Salvar</button>
                            <a class="btn btn-danger float-end me-2" type="button" href=""
                                onclick="history.back()">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
