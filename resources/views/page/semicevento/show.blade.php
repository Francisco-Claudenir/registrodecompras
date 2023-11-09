@extends('layout.page', [
    'layout' => 'evt',
])

@section('title', ' - Ver Inscricao')
@section('content-header')
    <div class="container-fluid ">
        <div class="card">
            <div class="container">
                <div class="d-flex flex-column">
                    <img src="{{ asset('images/logosemic.png') }}" alt="" srcset="" width="full" height="full">
                    <div class="pt-4 pb-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    @include('sweet::alert')
    <div class="container-fluid">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Inscrição</h3>
                </div>
                <div class="card-body pt-2 pb-0">


                    @foreach ($dadosInscrito as $dados)
                        <div class="row justify-content-center p-4">
                            <div class="col-sm-12 col-lg-10">

                                <div class="card project-card">
                                    <div class="card-body">
                                        <div class="d-flex mb-4 align-items-start">

                                            <div class="me-auto">
                                                <span class="font-w600">
                                                    Número de Inscrição :
                                                </span>
                                                <a class="text-primary mb-1">{{ $dados->numero_inscricao }}</a>
                                            </div>


                                            <div class="pull-right">
                                                @switch($dados->status)
                                                    @case('Deferido')
                                                        <span
                                                            class="badge badge-outline-success d-sm-inline-block ">{{ $dados->status }}</span>
                                                        @break

                                                    @case('Indeferido')
                                                        <span
                                                            class="badge badge-outline-danger d-sm-inline-block ">{{ $dados->status }}</span>
                                                        @break

                                                    @default
                                                        <span
                                                            class="badge badge-outline-dark d-sm-inline-block ">{{ $dados->status }}</span>
                                                @endswitch
                                            </div>
                                        </div>

                                        <a type="button" class="btn btn-xs btn-primary" data-bs-toggle="modal"
                                           data-bs-target="#detalheModal-{{ $dados->numero_inscricao }}"
                                           class="btn btn-xs btn-info" title="">
                                            Detalhes
                                        </a>
                                        <div class="row mb-4">
                                        </div>
                                        <div class="d-flex flex-wrap align-items-center">
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                            </div>
                                            <div class="col-6">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="detalheModal-{{ $dados->numero_inscricao }}" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detalhes da
                                                    Inscrição</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <dl>
                                                            <dt>Numero de Inscrição</dt>
                                                            <dd>{{ $dados->numero_inscricao }}</dd>
                                                        </dl>
                                                    </div>
                                                    <div class="col-6">
                                                        <dl>
                                                            <dt>Tipo Inscrição</dt>
                                                            <dd>
                                                                <ul>
                                                                    @foreach (json_decode($dados->tipo) as $valor)
                                                                        <li>{{$valor}}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </dd>
                                                        </dl>
                                                    </div>

                                                    @if(in_array("Apresentador", json_decode($dados->tipo) ))
                                                        <div class="col-6">
                                                            <dl>
                                                                <dt>Nome Orientador</dt>
                                                                <dd>{{ $dados->nome_orientador }}</dd>
                                                            </dl>
                                                        </div>
                                                        <div class="col-6 ">
                                                            <dl>
                                                                <dt>Título Trabalho</dt>
                                                                <dd class="text-justify">{{ $dados->titulo_trabalho}}</dd>
                                                            </dl>
                                                        </div>
                                                        <div class="col-6 ">
                                                            <dl>
                                                                <dt>Cota Bolsa</dt>
                                                                <dd class="text-justify">{{ $dados->cota_bolsa}}</dd>
                                                            </dl>
                                                        </div>
                                                        <div class="col-6">
                                                            <dl>
                                                                <dt>Arquivo</dt>
                                                                <dd class="text-justify"><a style="color: red;"
                                                                                            target="_blank"
                                                                                            href="{{ route('semic.eventoinscricao.docshow', ['diretorio' => Crypt::encrypt($dados->arquivo)]) }}">Arquivo</a>
                                                                </dd>
                                                            </dl>
                                                        </div>

                                                    @endif

                                                </div>
                                            </div>
                                            <div class="modal-footer">
{{--                                                <a href="{{ route('semic.eventoinscricao.pdf', ['semic_evento_id' => $dados->semic_evento_id, 'semic_eventoinscricao_id' => $dados->semic_eventoinscricao_id]) }}"--}}
{{--                                                   class="btn btn-xs btn-info pull-right"--}}
{{--                                                   title="" target="_blank">--}}
{{--                                                    PDF--}}
{{--                                                </a>--}}
                                                <button type="button" class="btn btn-xs btn-danger"
                                                        data-bs-dismiss="modal">Fechar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="col-sm-5 col-md-5">
                            <div class="dataTables_info" id="responsive-datatable_info" role="status"
                                 aria-live="polite">
                                Exibindo {{ $dadosInscrito->firstItem() }} a {{ $dadosInscrito->lastItem() }} de
                                {{ $dadosInscrito->total() }}.
                            </div>
                        </div>
                        <div class="col-sm-7 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="responsive-datatable_paginate">
                                {{ $links->links() }}
                            </div>
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

        }
    </style>
@endsection
@section('scripts')
@endsection
