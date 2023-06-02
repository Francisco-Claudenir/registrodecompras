@extends('layout.page', [
    'layout' => 'admin',
    'plugins' => ['wizard', 'validation_jquery'],
])

@section('title', ' - Editar ModalidadeBolsa')

@section('content')
    <div class="container-fluid">
        @include('sweet::alert')
        <div class="row page-title mx-0">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Editar ModalidadeBolsa ( {{ $modalidadebolsas->nome }} )</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('modalidadebolsa.update', $modalidadebolsas->modalidade_id) }}" method="post">
                            @csrf
                            @method('put')
                            <label class="form-label">Nome</label>
                            <input class="form-control @if ($errors->first('nome')) is-invalid @endif" type="text"
                                name="nome" required="" value="{{ $modalidadebolsas->nome }}">
                            @if ($errors->has('nome'))
                                <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
                            @endif
                            <button class="btn btn-success float-end mt-3" ; type="submit">Salvar</button>
                            <a class="btn btn-danger float-end mt-3 me-2" type="button" href="{{ route('grandearea.index')}}">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
