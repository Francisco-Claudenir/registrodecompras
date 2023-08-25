@extends('layout.page', [
    'layout' => 'evt',
])

@section('title', ' - Ver Inscricao')
@section('content-header')
    <div class="container-fluid ">
        <div class="card">
            <div class="container">
                <div class="d-flex flex-column">
                    <img src="{{ asset('images/semic.png') }}" alt="" srcset="" width="full"
                        height="full">
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
                    <h3 class="card-title">Inscrições</h3>
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
                                                <h5 class="modal-title" id="exampleModalLabel">Detalhes da Inscrição</h5>
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
                                                            <dt>Nome Completo</dt>
                                                            <dd>{{ $dados->nomeorientador }}</dd>
                                                        </dl>
                                                    </div>
                                                    <div class="col-6 ">
                                                        <dl>
                                                            <dt>Cpf</dt>
                                                            <dd class="text-justify">{{ $dados->cpf }}</dd>
                                                        </dl>
                                                    </div>
                                                    <div class="col-6 ">
                                                        <dl>
                                                            <dt>Email</dt>
                                                            <dd class="text-justify">{{ $dados->email }}</dd>
                                                        </dl>
                                                    </div>
                                                    <div class="col-6">
                                                        <dl>
                                                            <dt>Matricula</dt>
                                                            <dd class="text-justify">{{ $dados->matricula }}</dd>
                                                        </dl>
                                                    </div>
                                                    
                                                    <div class="col-6">
                                                        <dl>
                                                            <dt>Titulação</dt>
                                                            <dd class="text-justify">{{ $dados->titulacao }}</dd>
                                                        </dl>
                                                    </div>
                                                    <hr>

                                                    <div class="row">
                                                        <h5>Área do Projeto de Pesquisa</h5>
                                                        <div class="col-6">
                                                            <dl>
                                                                <dt> {{ $dados->semicInscricao_subArea->subArea_grandeArea->nome }}</dt>
                                                                <dd class="text-justify">
                                                                    {{ $dados->semicInscricao_subArea->nome }}
                                                                </dd>
                                                            </dl>
                                                        </div>
                                                        <hr>
                                                        <h5>Projetos</h5>
                                                        <div class="col-6">
                                                            <dl>
                                                                <dt>Titulo do projeto do orientador cadastrado no PIBIC ciclo 2022-2023</dt>
                                                                <dd class="text-justify">
                                                                    {{ $dados->tituloprojetoorient }}
                                                                </dd>
                                                            </dl>
                                                        </div>
                                                        <div class="col-6">
                                                            <dl>
                                                                <dt>Título do capítulo submetido para a coletânea</dt>
                                                                <dd class="text-justify">
                                                                    {{ $dados->titulocapitulo }}
                                                                </dd>
                                                            </dl>
                                                        </div>
                                                        <hr>
                                                        <h5>Anexos</h5>
                                                        <div class="col-6">
                                                            <dl>
                                                                <dt>Capítulo</dt>
                                                                <dd class="text-justify"><a style="color: red;" target="_blank"
                                                                        href="{{ route('semic.inscricao.docshow', ['diretorio' => Crypt::encrypt($dados->capitulo)]) }}">Arquivo</a>
                                                                </dd>
                                                            </dl>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="{{ route('semic.inscricao.pdf', ['semic_id' => $dados->semic_id, 'semic_inscricao_id' => $dados->semic_inscricao_id]) }}"
                                                    class="btn btn-xs btn-info pull-right" title=""
                                                    target="_blank">
                                                    PDF
                                                </a>
                                                <button type="button" class="btn btn-xs btn-danger"
                                                    data-bs-dismiss="modal">Fechar</button>
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

                    {{-- <h5>Identificação do Candidato</h5>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Numero de Inscrição</dt>
                            <dd>{{ $dadosInscrito->numero_inscricao }}</dd>
                        </dl>
                        <dl>
                            <dt>Nome Completo</dt>
                            <dd>{{ $dadosInscrito->nome }}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Email</dt>
                            <dd class="text-justify">{{ $dadosInscrito->email }}</dd>
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
                            <dt>Telefone</dt>
                            <dd class="text-justify">{{ $dadosInscrito->telefone }}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Cep</dt>
                            <dd class="text-justify">{{ $endereco['cep'] }}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Número</dt>
                            <dd class="text-justify">{{ $endereco['numero'] }}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Endereço</dt>
                            <dd class="text-justify">{{ $endereco['endereco'] }}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Bairro</dt>
                            <dd class="text-justify">{{ $endereco['bairro'] }}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Número de Identidade</dt>
                            <dd class="text-justify">{{ $dadosInscrito->identidade }}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Matrícula</dt>
                            <dd class="text-justify">{{ $dadosInscrito->matricula }}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Centro</dt>
                            <dd class="text-justify">{{ $centro->centros }}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Cópia do Contrato</dt>
                            <dd class="text-justify"><a style="color: red;"
                                    href="{{ route('primeirospassos.inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->copiacontrato)]) }}">Arquivo</a>
                            </dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Vigência - Início</dt>
                            <dd class="text-justify">{{ date('d/m/Y', strtotime($dadosInscrito->vigencia_inicio)) }}
                            </dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Vigência - Fim</dt>
                            <dd class="text-justify">{{ date('d/m/Y', strtotime($dadosInscrito->vigencia_fim)) }}
                            </dd>
                        </dl>
                    </div>
                    <h5>Área do Projeto de Pesquisa</h5>
                    <div class="col-sm-12">
                        <dl>
                            <dt>{{ $subArea->subArea_grandeArea->nome }}</dt>
                            <dd class="text-justify">{{ $subArea->nome }}</dd>
                        </dl>
                    </div>
                    <h5>Projeto de Pesquisa</h5>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Título de Projeto de Pesquisa</dt>
                            <dd class="text-justify">{{ $dadosInscrito->tituloprojetopesquisa }}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Projeto de Pesquisa</dt>
                            <dd class="text-justify"><a style="color: red;"
                                    href="{{ route('primeirospassos.inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->projetopesquisa)]) }}">Arquivo</a>
                            </dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Resumo do Projeto</dt>
                            <dd class="text-justify">{{ $dadosInscrito->resumoprojeto }}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Chefe Imediato</dt>
                            <dd class="text-justify">{{ $dadosInscrito->chefeimediato }}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Anuência do Chefe Imediato</dt>
                            <dd class="text-justify"><a style="color: red;"
                                    href="{{ route('primeirospassos.inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->anuenciachefe)]) }}">Arquivo</a>
                            </dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Comitê de Ética</dt>
                            @if ($dadosInscrito->parecercomite != null)
                                <dd class="text-justify"><a style="color: red;"
                                        href="{{ route('primeirospassos.inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->parecercomite)]) }}">Arquivo</a>
                                </dd>
                            @else
                                <dd class="text-justify">Sem Arquivo</dd>
                            @endif

                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Currículo Lattes atualizado</dt>
                            <dd class="text-justify"><a style="color: red;"
                                    href="{{ route('primeirospassos.inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->curriculolattes)]) }}">Arquivo</a>
                            </dd>
                        </dl>
                    </div>
                    <h5>Plano de Trabalho</h5>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Título do Plano de Trabalho</dt>
                            <dd class="text-justify">{{ $planotrabalho->titulo }}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Plano de Trabalho</dt>
                            <dd class="text-justify">{{ $planotrabalho->resumo }}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Resumo do Plano de Trabalho</dt>
                            <dd class="text-justify"><a style="color: red;"
                                    href="{{ route('primeirospassos.inscricao.docshow', ['diretorio' => Crypt::encrypt($planotrabalho->arquivo)]) }}">Arquivo</a>
                            </dd>
                        </dl>
                    </div> --}}
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
