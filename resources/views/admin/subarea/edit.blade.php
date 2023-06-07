@extends('layout.page', [
    'layout' => 'admin',
    'plugins' => ['wizard', 'validation_jquery'],
])

@section('title', ' - Edição Sub Area')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
    
                    <h4 class="card-title">Editar Sub Area</h4>
    
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Sub Area</a></li>
                    <li class="breadcrumb-item active"><a href="">Editar</a></li>
                </ol>
            </div>
        </div>
        <div class="row page-title mx-0">
            <div class="card">
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('subarea.update', ['subarea' => $subareas->areaconhecimento_id]) }}" method="post">
                            @csrf
                            @method('put')
                            <label class="form-label">Nome</label>
                            <input class="form-control @if ($errors->first('nome')) is-invalid @endif" type="text"
                                name="nome" required="" value="{{ $subareas->nome }}">
                            @if ($errors->has('nome'))
                                <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
                            @endif
                            <div class="mb-3 mt-3">
                                <label for="area_id" class="form-label">Selecione a Grande Area:</label>
                                <select name="area_id" class="default-select  form-control wide" @if ($errors->first('area_id')) border border-danger @endif"
                                    aria-hidden="true" required>
                                    <option value="">Selecione</option>
                                    @foreach ($grandeareas as $grandearea )
                                        <option value="{{$grandearea->area_id}}" {{ $subareas->area_id === $grandearea->area_id ? 'selected' : ''}}>{{$grandearea->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-success float-end mt-3" ; type="submit">Salvar</button>
                            <a class="btn btn-danger float-end mt-3 me-2" type="button" href="{{ route('subarea.index')}}">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
