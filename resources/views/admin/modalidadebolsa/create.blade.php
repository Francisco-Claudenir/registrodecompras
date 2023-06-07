@extends('layout.page', [
    'layout' => 'admin',
])

@section('title', ' - Cadastro Modalidade Bolsa')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
    
                    <h4 class="card-title">Cadastro Modalidade Bolsa</h4>
    
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Modalidade Bolsa</a></li>
                    <li class="breadcrumb-item active"><a href="">Cadastro</a></li>
                </ol>
            </div>
        </div>
        <div class="row page-title mx-0">
            <div class="card">
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('modalidadebolsa.store') }}" method="post">
                            @csrf
                            <label class="form-label">Nome</label>
                            <input class="form-control @if ($errors->first('nome')) is-invalid @endif" type="text"
                                name="nome" required="" value="{{ old('nome') }}">
                            @if ($errors->has('nome'))
                                <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
                            @endif
                            <button class="btn btn-success float-end mt-3" ; type="submit">Salvar</button>
                            <a class="btn btn-danger float-end mt-3 me-2" type="button" href="{{ route('modalidadebolsa.index')}}">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
