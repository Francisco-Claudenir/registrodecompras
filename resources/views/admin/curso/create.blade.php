@extends('layout.page', [
    'layout' => 'admin',
    'plugins' => ['wizard', 'validation_jquery'],
])

@section('title', ' - Cadastro Cursos')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">

                    <h4 class="card-title">Cadastro Cursos</h4>

                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Cursos</a></li>
                    <li class="breadcrumb-item active"><a href="">Cadastro </a></li>
                </ol>
            </div>
        </div>
        <div class="row page-title mx-0">
            <div class="card">
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('curso.store') }}" method="post">
                            @csrf
                            <label class="form-label">Curso</label>
                            <input class="form-control @if ($errors->first('cursos')) is-invalid @endif" type="text"
                                name="cursos" required="" value="{{ old('cursos') }}">
                            @if ($errors->has('cursos'))
                                <div class="invalid-feedback">{{ $errors->first('cursos') }}</div>
                            @endif

                            <div class="mb-3 mt-3">
                                <label for="centro_id" class="form-label">Selecione o centro:</label>
                                <select name="centro_id"
                                    class="default-select form-control wide
                                    @if ($errors->first('centro_id')) border border-danger @endif"
                                    aria-hidden="true" required>
                                    <option value="" disabled selected>Selecione</option>
                                    @foreach ($centros as $centro)
                                        <option value="{{ $centro->id }}"
                                            {{ $centro->id == old('centro_id') ? 'selected' : '' }}>{{ $centro->centros }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="modalidade_id" class="form-label">Selecione a modalidade:</label>
                                <select name="modalidade_id"
                                    class="default-select form-control wide
                                    @if ($errors->first('modalidade_id')) border border-danger @endif"
                                    aria-hidden="true" required>
                                    <option value="" disable selected>Selecione</option>
                                    @foreach ($modalidades as $modalidade)
                                        <option value="{{ $modalidade->id }}"
                                            {{ $modalidade->id == old('modalidade_id') ? 'selected' : '' }}>
                                            {{ $modalidade->modalidades }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-success float-end mt-3" ; type="submit">Salvar</button>
                            <a class="btn btn-danger float-end mt-3 me-2" type="button"
                                href="{{ route('curso.index') }}">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
