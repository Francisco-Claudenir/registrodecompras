@extends('layout.page', [
    'layout' => 'admin',
    'plugins' => ['wizard', 'validation_jquery'],
])

@section('title', ' - Certificados Semic')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">

                    <h4 class="card-title">Certificados</h4>

                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('semicevento.index') }}">Semic Evento</a></li>
                    <li class="breadcrumb-item active"><a href="">Certificados</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-sm-flex d-block">
                    <div class="me-auto mb-sm-0 mb-3">
                        <h5 class="mb-2">{{$semic_evento->nome}}</h5>
                    </div>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#certificadosomodal"
                            class="btn btn-xs btn-info">Adicionar<span class="btn-icon-end"><i
                                class="fa fa-plus"></i></span></button>

                    <div class="modal fade" id="certificadosomodal" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Adicionar Certificados</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    </button>
                                </div>
                                <form
                                    action="{{ route('store.certificado',['semic_evento_id' => $semic_evento->semic_evento_id]) }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">

                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">Nome</label>
                                                <input type="text" class="form-control" name="nome"
                                                       placeholder="Nome Certificado">
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <div class="alert alert-primary light alert-square">
                                                    <div class="col">
                                                        <ul>
                                                            <li><strong>[NOMECANDIDATO]</strong> Message has been sent.
                                                            </li>
                                                            <li><strong>[TITULOTRABALHO]</strong> Message has been sent.
                                                            </li>
                                                            <li><strong>[NOMEORIENTADOR]</strong> Message has been sent.
                                                            </li>
                                                            <li><strong>[NOMEEVENTO]</strong> Message has been sent.
                                                            </li>
                                                            <li><strong>[DATAINICIO]</strong> Message has been sent.
                                                            </li>
                                                            <li><strong>[DATAFIM]</strong> Message has been sent.</li>
                                                            <li><strong>[ANOANTERIOR]</strong> Message has been sent.
                                                            </li>
                                                            <li><strong>[ANOATUAL]</strong> Message has been sent.</li>
                                                        </ul>
                                                        <hr>
                                                        <small class=" d-flex text-center pb-2">Texto Base:</small>
                                                        <p>
                                                            Certificamos que o trabalho intitulado:[TITULOTRABALHO], de
                                                            autoria de [NOMECANDIDATO] foi apresentado no [NOMEEVENTO]
                                                            da
                                                            UEMA,
                                                            realizado entre os dias [DATAINICIO] e [DATAFIM], como parte
                                                            das
                                                            atividades de Iniciação Científica da Universidade Estadual
                                                            do
                                                            Maranhão, ciclo [ANOANTERIOR] - [ANOATUAL].
                                                        </p>
                                                    </div>
                                                </div>
                                                <label class="form-label">Descrição</label>
                                                <textarea class="form-control form-control-sm" name="descricao" rows="8"
                                                          id="comment"></textarea>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-primary text-white">Upload</span>
                                                    <div class="form-file">
                                                        <input type="file"
                                                               class="form-file-input form-control @if ($errors->first('anexo_capitulo_semicinscricao')) is-invalid @endif"
                                                               required name="img">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar
                                        </button>
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <div class="row">
                            @foreach($certificados as $certificado)
                                <div class="col-xl-6 col-lg-12">
                                    <div class="card border border-1">
                                        <div class="project-info">
                                            <div class="col-xl-6 my-2 col-lg-6 col-sm-6">
                                                <p class="text-primary mb-1">{{$certificado->certificado_id}}</p>
                                                <h5 class="title font-w600 mb-2"><a href="post-details.html"
                                                                                    class="text-black">{{$certificado->nome}}</a>
                                                </h5>
                                                <img src="{{ asset('storage/' .$certificado->img) }}" alt=""
                                                     class="img-fluid w-50 rounded" width="80" height="70">


                                            </div>
                                            <div class="col-xl-4 my-2 col-lg-6 col-sm-6  ">


                                            </div>

                                            <div class="col-xl-2 my-2 col-lg-6 col-sm-6">
                                                <div
                                                    class="d-flex project-status align-items-end align-content-end justify-content-end">
                                                    <div class="dropdown">
                                                        <a href="javascript:void(0);" data-bs-toggle="dropdown"
                                                           aria-expanded="false">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z"
                                                                    stroke="#575757" stroke-width="2"
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round"></path>
                                                                <path
                                                                    d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z"
                                                                    stroke="#575757" stroke-width="2"
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round"></path>
                                                                <path
                                                                    d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z"
                                                                    stroke="#575757" stroke-width="2"
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round"></path>
                                                            </svg>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                            <a class="dropdown-item"
                                                               href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

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

            .bootstrap-select .dropdown-toggle .filter-option-inner-inner {
                height: 2.2rem !important;
            }

        }
    </style>
@endsection
@section('scripts')

@endsection

