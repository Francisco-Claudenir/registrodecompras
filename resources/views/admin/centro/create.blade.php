@extends('layout.page', [
    'layout' => 'admin',
    'plugins' => ['wizard', 'validation_jquery'],
])

@section('title', ' - Cadastro Centros')

@section('content')
    <div class="container-fluid">
        @include('sweet::alert')
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">

                    <h4 class="card-title">Cadastro Centros</h4>

                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Centros</a></li>
                    <li class="breadcrumb-item active"><a href="">Cadastro </a></li>
                </ol>
            </div>
        </div>
        <div class="row page-title mx-0">
            <div class="card">
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('centro.store') }}" method="post">
                            @csrf
                            
                            <label class="form-label">Centro</label>
                            <input class="form-control @if ($errors->first('centros')) is-invalid @endif" type="text"
                                name="centros" required value="{{ old('centros') }}">
                            @if ($errors->has('centros'))
                                <div class="invalid-feedback">{{ $errors->first('centros') }}</div>
                            @endif
                            
                            <div class="mb-3 mt-3">
                                <label for="cidade_id" class="form-label">Selecione a cidade:</label>
                                <select name="cidade_id"
                                    class="default-select form-control wide
                                    @if ($errors->first('cidade_id')) border border-danger @endif"
                                    aria-hidden="true" required>
                                    <option value="" disabled selected>Selecione</option>
                                    @foreach ($cidades as $cidade)
                                        <option value="{{ $cidade->id }}"
                                            {{ $cidade->id == old('cidade_id') ? 'selected' : '' }}>{{ $cidade->cidades }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="mb-3 mt-3 w-25">
                                <label class="form-label">Latitude</label>
                                <input class="form-control @if ($errors->first('latitude')) is-invalid @endif"
                                    type="text" name="latitude" required value="{{ old('latitude') }}">
                                @if ($errors->has('latitude'))
                                    <div class="invalid-feedback">{{ $errors->first('latitude') }}</div>
                                @endif
                                </div>
                                <div class="mb-3 mt-3 w-25">
                                    <label class="form-label">Longitude</label>
                                    <input class="form-control @if ($errors->first('longitude')) is-invalid @endif"
                                        type="text" name="longitude" required="" value="{{ old('longitude') }}">
                                    @if ($errors->has('longitude'))
                                        <div class="invalid-feedback">{{ $errors->first('longitude') }}</div>
                                    @endif
                                    </div>
                            </div>
                            <button class="btn btn-success float-end mt-3" ; type="submit">Salvar</button>
                            <a class="btn btn-danger float-end mt-3 me-2" type="button"
                                href="{{ route('centro.index') }}">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
