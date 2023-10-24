@extends('layout.page', [
    'layout' => 'admin',
    'plugins' => ['wizard', 'validation_jquery'],
])

@section('title', ' - Cadastro de Certificados')

@section('content')
    <div class="container-fluid">
        @include('sweet::alert')
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">

                    <h4 class="card-title">Cadastro de Certificados</h4>

                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Certificados</a></li>
                    <li class="breadcrumb-item active"><a href="">Cadastro</a></li>
                </ol>
            </div>
        </div>
        <div class="row page-title mx-0">
            <div class="card">
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('certificado.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <label class="form-label">Nome</label>
                            <input class="form-control @if ($errors->first('nome')) is-invalid @endif" type="text"
                                   name="nome" required value="{{ old('nome') }}">
                            @if ($errors->has('nome'))
                                <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
                            @endif
                            <div class="mb-3 mt-3">
                                <div class="mb-3 mt-3">
                                    <label class="form-label">Imagem</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-primary text-white">Upload</span>
                                        <div class="form-file">
                                            <input type="file"
                                                   class="form-file-input form-control @if ($errors->first('img')) is-invalid @endif"
                                                   name="img">
                                        </div>
                                    </div>
                                        {!! $errors->default->first('img', '<span style="color:red" class="form-text">:message</span>') !!}
                                </div>
                                <div class="mb-3 mt-3">
                                    <label class="form-label">Descrição</label>
                                    <input class="form-control @if ($errors->first('descricao')) is-invalid @endif"
                                           type="text" name="descricao" required="" value="{{ old('descricao') }}">
                                    @if ($errors->has('descricao'))
                                        <div class="invalid-feedback">{{ $errors->first('descricao') }}</div>
                                    @endif
                                </div>
                            </div>
                            <button class="btn btn-success float-end mt-3" ; type="submit">Salvar</button>
                            <a class="btn btn-danger float-end mt-3 me-2" type="button"
                               href="{{ route('certificado.index') }}">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
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
