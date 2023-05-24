@extends('layout.page', [
    'layout' => 'admin',
    'plugins' => ['wizard', 'validation_jquery'],
])

@section('title', ' - Edição Primeiros Passos')

@section('content')
    <div class="container-fluid">
        @include('sweet::alert')
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Editar {{ $primeiropasso->nome }}</h4>
                </div>
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
                                        value="{{ date('Y-m-d', strtotime($primeiropasso->data_inicio)) }}">
                                    @if ($errors->has('data_inicio'))
                                        <div class="invalid-feedback">{{ $errors->first('data_inicio') }}</div>
                                    @endif
                                </div>
                                <div class="mb-4 col-md-4">
                                    <label class="form-label">Data Fim</label>
                                    <input type="date"
                                        class="form-control @if ($errors->first('data_fim')) is-invalid @endif"
                                        name="data_fim" required=""
                                        value="{{ date('Y-m-d', strtotime($primeiropasso->data_fim)) }}">
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
                                    <label class="radio-inline me-3"><input type="radio" name="status" value="Aberto" @if ($primeiropasso->status == "Aberto") checked @endif> Aberto</label>
                                    <label class="radio-inline me-3"><input type="radio" name="status" value="Fechado" @if ($primeiropasso->status == "Fechado") checked @endif> Fechado</label>
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
