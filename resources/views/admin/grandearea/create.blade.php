@extends('layout.page', [
    'layout' => 'admin',
])

@section('title', ' - Cadastro GrandeArea')

@section('content')
    <div class="container-fluid">
        @include('sweet::alert')
        <div class="row page-title mx-0">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Cadastro de Grande Area</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('grandearea.store') }}" method="post">
                            @csrf
                            <label class="form-label">Nome</label>
                            <input class="form-control @if ($errors->first('nome')) is-invalid @endif" type="text"
                                name="nome" required="" value="{{ old('nome') }}">
                            @if ($errors->has('nome'))
                                <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
                            @endif
                            <button class="btn btn-success float-end mt-3" ; type="submit">Salvar</button>
                            <a class="btn btn-danger float-end mt-3 me-2" type="button" href="" onclick="history.back()">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
