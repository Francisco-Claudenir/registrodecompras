@extends('layout.page', [
    'layout' => 'admin',
])

@section('title', ' - Cadastro de Programa Semic')

@section('content')
    <div class="container-fluid">
        @include('sweet::alert')
        <div class="row page-title mx-0">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Cadastro de Grande Area</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('grandearea.store') }}" method="post">
                        @csrf
                        <label class="form-label">Nome</label>
                        <input class="form-control" type="text" name="nome" value="{{ old('nome') }}">
                        <button class="btn btn-success float-end mt-3" ; type="submit">Salvar</button>
                        <a class="btn btn-danger float-end mt-3 me-2" type="button" href=""
                            onclick="history.back()">Cancelar</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
