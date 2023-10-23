@extends('layout.page', [
    'layout' => 'evt',
    'plugins' => ['lightgallery'],
])

@section('title', ' - Inscrição')
@section('content-header')
    <div class="container-fluid ">
        <div class="card">
            <div class="container">
                <div class="d-flex flex-column">
                    <img src="{{ asset('images/semic.png') }}" alt="" srcset="" width="full" height="full">
                    <div class="pt-4 pb-4">
                        <span class="mt-4"><strong>{{ $semic_evento->nome }}</strong></span>
                    </div>
                </div>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif
        <div class="card">
            <form action="{{ route('semic.eventoinscricao.store', ['semic_evento_id' => $semic_evento]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="col-xl-12 p-lg-4 ">
                    <div class="row justify-content-center">
                        <h3 class="text-primary d-inline text-center p-4">Inscrição Semic_evento</h3>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="card border shadow-sm">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <h4 class=" text-muted d-inline text-center px-4 pb-2">Identificação
                                        </h4>
                                    </div>
                                    <hr class="mt-3 mb-3">
                                    <div class="basic-form">
                                        <div class="row mt-3">
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label fw-normal">Nome Orientador *</label>
                                                <input type="text"
                                                    class="form-control @if ($errors->first('nome_orientador')) is-invalid @endif"
                                                    placeholder="Nome Orientador" required name="nome_orientador"
                                                    value="{{ old('nome_orientador') }}" >
                                                {!! $errors->default->first('nome_orientador', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label fw-normal">Titulo Trabalho *</label>
                                                <input type="text"
                                                    class="form-control @if ($errors->first('titulo_trabalho')) is-invalid @endif"
                                                    placeholder="Titulo Trabalho" required name="titulo_trabalho"
                                                    value="{{ old('titulo_trabalho') }}" autocomplete="cpf" autofocus
                                                    id="titulo_trabalho">
                                                {!! $errors->default->first('titulo_trabalho', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="mb-3 col-md-6 col-sm-6">
                                                <label class="form-label fw-normal">Arquivo *</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-primary text-white">Upload</span>
                                                    <div class="form-file">
                                                        <input type="file"
                                                            class="form-file-input form-control @if ($errors->first('arquivo')) is-invalid @endif"
                                                            required name="arquivo">
                                                    </div>
                                                </div>
                                                {!! $errors->default->first(
                                                    'arquivo',
                                                    '<span style="color:red" class="form-text">:message</span>',
                                                ) !!}
                                            </div>

                                            <div class="mb-3 col-md-8">
                                                <label class="form-label fw-normal ">Cota Bolsa *</label>
                                                <select class="default-select form-control " tabindex="null"
                                                    name="cota_bolsa" required>
                                                    <option disabled selected value="">
                                                        Selecione
                                                        uma opção</option>
                                                    @foreach (config('tipoPibic.tipo') as $item)
                                                        <option value={{ $item }}>
                                                            {{ $item }}</option>
                                                    @endforeach
                                                    {!! $errors->default->first('semicevento_inscricao_cotabolsa', '<span style="color:red" class="form-text">:message</span>') !!}
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="card border shadow-sm">
                                <div class="card-body">
                                    <a href="" onclick="history.back()"
                                        class="btn btn-dark float-start">Voltar</a>
                                    <button type="submit" class="btn btn-primary float-end">Enviar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .form-control::-webkit-file-upload-button {
            height: 55px !important;
        }

        @media (max-width: 1400px) {
            .form-control::-webkit-file-upload-button {
                height: 40px !important;
            }

        }
    </style>
@endsection

