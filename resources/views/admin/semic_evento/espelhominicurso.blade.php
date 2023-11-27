@extends('layout.page', [
'layout' => 'admin',
'plugins' => ['wizard'],
])

@section('title', ' - Espelho do Minicurso Inscricao')

@section('content')
@include('sweet::alert')

<!-- Modal -->
<div class="modal fade" id="analiseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$dadosInscrito->nome}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('analise.minicursoinscricao.espelho', $dadosInscrito->minicursosemiceventoinscricao_id) }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <label class="col-form-label col-sm-3 pt-0">Resultado</label>
                        <div class="col-sm-9">

                            @foreach (config('statusminicurso.status') as $item)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="{{ $item }}" checked="">
                                <label class="form-check-label">
                                    {{ $item }}
                                </label>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-xs btn-danger" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-xs btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">

                <h4 class="card-title">{{ $dadosInscrito->nome_minicurso }}</h4>

            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Lista
                        de Inscritos</a></li>
                <li class="breadcrumb-item active"><a href="">{{ $semicEvento->nome }}</a>
                </li>
            </ol>
        </div>
    </div>
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Espelho Minicurso</h3>
                <div class="card-options">
                    <div class="btn-list">
                        <a type="button" class="btn btn-xs btn-primary" data-bs-toggle="modal" data-bs-target="#analiseModal" class="btn btn-xs btn-info" title="">
                            Analisar
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body pt-2 pb-0">
                <h5>Identificação do Candidato</h5>
                <div class="col-sm-12">
                    <dl>
                        <dt>Número de Inscrição</dt>
                        <dd>{{ $dadosInscrito->numero_inscricao }}</dd>
                    </dl>
                    <dl>
                        <dt>Nome</dt>
                        <dd>{{ $dadosInscrito->nome }}</dd>
                    </dl>
                </div>
                <div class="col-sm-12">
                    <dl>
                        <dt>Cpf</dt>
                        <dd class="text-justify">{{ $dadosInscrito->cpf }}</dd>
                    </dl>
                </div>
                <div class="col-sm-12">
                    <dl>
                        <dt>E-mail</dt>
                        <dd class="text-justify">{{ $dadosInscrito->email }}</dd>
                    </dl>
                </div>

                <div class="col-sm-12">
                    <dl>
                        <dt>Tipo</dt>
                        <dd class="text-justify">{{ $dadosInscrito->tipo }}
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection