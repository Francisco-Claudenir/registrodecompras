@extends('layout.page', [
    'layout' => 'admin',
    'plugins' => ['wizard', 'validation_jquery'],
])

@section('title', ' - Edição Primeiros Passos Indicacao Bolsistas')

@section('content')
    <div class="container-fluid">
        @include('sweet::alert')
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">

                    <h4 class="card-title">Editar Primeiros Passos Indicação Bolsistas</h4>

                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Indicação Bolsistas</a></li>
                    <li class="breadcrumb-item active"><a href="">Editar</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="basic-form">
                        <form
                            action="{{ route('pp-indicacao-bolsistas.update', $pp_indicacao_bolsistas->pp_i_bolsista_id) }}"
                            method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="mb-4 col-md-4">
                                    <label class="form-label">Nome</label>
                                    <input type="text"
                                        class="form-control @if ($errors->first('nome')) is-invalid @endif"
                                        name="nome" required="" value="{{ $pp_indicacao_bolsistas->nome }}">
                                    @if ($errors->has('nome'))
                                        <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
                                    @endif
                                </div>
                                <div class="mb-4 col-md-4">
                                    <label class="form-label">Data Inicio</label>
                                    <input type="date"
                                        class="form-control @if ($errors->first('data_inicio')) is-invalid @endif"
                                        name="data_inicio" required=""
                                        value="{{ date('Y-m-d', strtotime($pp_indicacao_bolsistas->data_inicio)) }}">
                                    @if ($errors->has('data_inicio'))
                                        <div class="invalid-feedback">{{ $errors->first('data_inicio') }}</div>
                                    @endif
                                </div>
                                <div class="mb-4 col-md-4">
                                    <label class="form-label">Data Fim</label>
                                    <input type="date"
                                        class="form-control @if ($errors->first('data_fim')) is-invalid @endif"
                                        name="data_fim" required=""
                                        value="{{ date('Y-m-d', strtotime($pp_indicacao_bolsistas->data_fim)) }}">
                                    @if ($errors->has('data_fim'))
                                        <div class="invalid-feedback">{{ $errors->first('data_fim') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-4 col-md-12">
                                    <label class="form-label">Descrição</label>
                                    <textarea class="form-control @if ($errors->first('descricao')) is-invalid @endif" cols="30" rows="10"
                                        id="comment" name="descricao" required="">{{ $pp_indicacao_bolsistas->descricao }}</textarea>
                                    @if ($errors->has('descricao'))
                                        <div class="invalid-feedback">{{ $errors->first('descricao') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="">Status</label>
                                <div class="mb-3 mb-0 mt-2">
                                    <label class="radio-inline me-3"><input type="radio" name="status" value="Aberto"
                                            @if ($pp_indicacao_bolsistas->status == 'Aberto') checked @endif> Aberto</label>
                                    <label class="radio-inline me-3"><input type="radio" name="status" value="Fechado"
                                            @if ($pp_indicacao_bolsistas->status == 'Fechado') checked @endif> Fechado</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-4 col-md-12">
                                    <label class="form-label">Visibilidade do Evento</label>
                                    <div class="form-check custom-checkbox mb-3 checkbox-info">
                                        <input type="checkbox"
                                            class="form-check-input @if ($errors->first('visivel')) is-invalid @endif"
                                            @if ($pp_indicacao_bolsistas->visivel == 1) checked @endif value="1"
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
