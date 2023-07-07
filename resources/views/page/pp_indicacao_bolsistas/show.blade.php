@extends('layout.page', [
    'layout' => 'evt',
])

@section('title', ' - Ver Inscricao')
@section('content-header')
    <div class="container-fluid ">
        <div class="card">
            <div class="container">
                <div class="d-flex flex-column">
                    <img src="{{ asset('images/semic.png') }}" alt="" srcset="" width="full" height="full">
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
                                                <h5>Número de Inscrição</h5>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <dl>
                                                            <dt>Nª Inscrição</dt>
                                                            <dd>{{ $dados->numero_inscricao }}</dd>
                                                        </dl>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <h5>Identificação do(a) Bolsista</h5>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <dl>
                                                            <dt>Nome completo</dt>
                                                            <dd>{{ $dados->nome_bolsista }}</dd>
                                                        </dl>
                                                    </div>
                                                    <div class="col-6 ">
                                                        <dl>
                                                            <dt>Cpf</dt>
                                                            <dd class="text-justify">{{ $dados->mask_cpf($dados->cpf_bolsista) }}</dd>
                                                        </dl>
                                                    </div>
                                                    <div class="col-6 ">
                                                        <dl>
                                                            <dt>E-mail</dt>
                                                            <dd class="text-justify">{{ $dados->email_bolsista }}</dd>
                                                        </dl>
                                                    </div>
                                                    <div class="col-6">
                                                        <dl>
                                                            <dt>Telefone</dt>
                                                            <dd class="text-justify">{{ $dados->mask_telefone($dados->telefone_bolsista) }}</dd>
                                                        </dl>
                                                    </div>


                                                    @foreach ($dados->endereco_bolsista as $key => $item)
                                                        <div class="col-6">

                                                            <dl>
                                                                <dt>{{ ucfirst($key) }}</dt>
                                                                <dd class="text-justify">{{ $item }}</dd>
                                                            </dl>
                                                        </div>
                                                    @endforeach


                                                    <div class="col-6">
                                                        <dl>
                                                            <dt>Número de Identidade</dt>
                                                            <dd class="text-justify">{{ $dados->numero_identidade }}
                                                            </dd>
                                                        </dl>
                                                    </div>
                                                    <div class="col-6">
                                                        <dl>
                                                            <dt>Centro</dt>
                                                            <dd class="text-justify">
                                                                {{ $dados->centro_candidato->centros }}
                                                            </dd>
                                                        </dl>
                                                    </div>
                                                    <div class="col-6">
                                                        <dl>
                                                            <dt>Curso</dt>
                                                            <dd>{{ $dados->curso->cursos }}</dd>
                                                        </dl>
                                                    </div>
                                                    <div class="col-6">
                                                        <dl>
                                                            <dt>Número de Identidade</dt>
                                                            <dd class="text-justify">{{ $dados->numero_identidade }}
                                                            </dd>
                                                        </dl>
                                                    </div>
                                                    <div class="col-6">
                                                        <dl>
                                                            <dt>Documento de Identidade</dt>
                                                            <dd class="text-justify"><a style="color: red;" target="_blank"
                                                                    href="{{ route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dados->documento_identidade)]) }}">Arquivo</a>
                                                            </dd>
                                                        </dl>
                                                    </div>
                                                    <div class="col-6">
                                                        <dl>
                                                            <dt>Documento CPF</dt>
                                                            <dd class="text-justify"><a style="color: red;"
                                                                    href="{{ route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dados->documento_cpf)]) }}">Arquivo</a>
                                                            </dd>
                                                        </dl>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <hr>
                                                    <h5>Identificação do
                                                        Orientador(a)</h5>

                                                    <div class="col-6">
                                                        <dl>
                                                            <dt>Nome Completo</dt>
                                                            <dd class="text-justify">{{ $dados->nome_orientador }}</dd>
                                                        </dl>
                                                    </div>
                                                    <div class="col-6">
                                                        <dl>
                                                            <dt>CPF</dt>
                                                            <dd class="text-justify">{{ $dados->mask_cpf($dados->cpf_orientador) }}
                                                            </dd>
                                                        </dl>
                                                    </div>
                                                    <div class="col-6">
                                                        <dl>
                                                            <dt>Telefone</dt>
                                                            <dd class="text-justify">{{ $dados->mask_telefone($dados->telefone_orientador) }}
                                                            </dd>
                                                        </dl>
                                                    </div>
                                                    <div class="col-6">
                                                        <dl>
                                                            <dt>E-mail</dt>
                                                            <dd class="text-justify">{{ $dados->email_orientador }}
                                                            </dd>
                                                        </dl>
                                                    </div>
                                                    <div class="col-6">
                                                        <dl>
                                                            <dt>Centro</dt>
                                                            <dd class="text-justify">
                                                                {{ $dados->centro_orientador->centros }}</dd>
                                                        </dl>
                                                    </div>
                                                    <div class="col-6">
                                                        <dl>
                                                            <dt>Título do Projeto do
                                                                Orientador(a)</dt>
                                                            <dd class="text-justify">
                                                                {{ $dados->titulo_projeto_orientador }}</dd>
                                                        </dl>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <dl>
                                                            <dt>Título do Plano de Trabalho
                                                                Orientador(a)</dt>
                                                            <dd class="text-justify">
                                                                {{ $dados->titulo_plano_orientador }}</dd>
                                                        </dl>
                                                    </div>
                                                    <hr>
                                                    <h5>Dados Acadêmicos</h5>
                                                    <div class="col-6">
                                                        <dl>
                                                            <dt>Histórico Escolar atualizado,
                                                                disponível do
                                                                SIGUEMA (formato PDF)</dt>
                                                            <dd class="text-justify"><a style="color: red;"
                                                                    href="{{ route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dados->historico_escolar)]) }}">Arquivo</a>
                                                            </dd>
                                                        </dl>
                                                    </div>
                                                    <div class="col-6">
                                                        <dl>
                                                            <dt>Declaração de vínculo do aluno à UEMA
                                                                atualizado (formato PDF)</dt>
                                                            <dd class="text-justify"><a style="color: red;"
                                                                    href="{{ route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dados->declaracao_vinculo)]) }}">Arquivo</a>
                                                            </dd>
                                                        </dl>
                                                    </div>
                                                    <div class="col-6">
                                                        <dl>
                                                            <dt>Termo de Compromisso do bolsista
                                                                (formato
                                                                PDF)</dt>
                                                            <dd class="text-justify"><a style="color: red;"
                                                                    href="{{ route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dados->termo_compromisso_bolsista)]) }}">Arquivo</a>
                                                            </dd>
                                                        </dl>
                                                    </div>
                                                    <div class="col-6">
                                                        <dl>
                                                            <dt>Declaração Negativa de Vínculo
                                                                Empregatício
                                                                (formato PDF)</dt>
                                                            <dd class="text-justify"><a style="color: red;"
                                                                    href="{{ route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dados->declaracao_negativa_vinculo)]) }}">Arquivo</a>
                                                            </dd>
                                                        </dl>
                                                    </div>
                                                    <div class="col-6">
                                                        <dl>
                                                            <dt>Currículo atualizado, gerado na
                                                                Plataforma
                                                                Lattes (formato PDF)</dt>
                                                            <dd class="text-justify"><a style="color: red;"
                                                                    href="{{ route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dados->curriculo)]) }}">Arquivo</a>
                                                            </dd>
                                                        </dl>
                                                    </div>
                                                    <div class="col-6">
                                                        <dl>
                                                            <dt>Declaração conjuta de estágio (quando
                                                                for o
                                                                caso) (formato PDF)</dt>
                                                            @if ($dados->declaracao_conjuta_estagio != null)
                                                                <dd class="text-justify"><a style="color: red;"
                                                                        href="{{ route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dados->declaracao_conjuta_estagio)]) }}">Arquivo</a>
                                                                </dd>
                                                            @else
                                                                <dd>Sem Arquivo</dd>
                                                            @endif

                                                        </dl>
                                                    </div>
                                                    <hr>
                                                    <h5>Informações Bancárias</h5>
                                                    <div class="col-6">
                                                        <dl>
                                                            <dt>Agência do Banco do Brasil n°</dt>
                                                            <dd>{{ $dados->agencia_banco }}</dd>
                                                        </dl>
                                                    </div>
                                                    <div class="col-6">
                                                        <dl>
                                                            <dt>Número da Conta Corrente do Banco do
                                                                Brasil</dt>
                                                            <dd class="text-justify">
                                                                {{ $dados->numero_conta_corrente }}</dd>
                                                        </dl>
                                                    </div>
                                                    <div class="col-6">
                                                        <dl>
                                                            <dt>Comprovante de Conta Corrente do Banco
                                                                do
                                                                Brasil (formato PDF)</dt>
                                                            <dd class="text-justify"><a style="color: red;"
                                                                    href="{{ route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dados->comprovante_conta_corrente)]) }}">Arquivo</a>
                                                            </dd>
                                                        </dl>
                                                    </div>
                                                    <hr>
                                                    <h5>Documentação do
                                                        Orientador(a)</h5>
                                                    <div class="col-6">
                                                        <dl>
                                                            <dt>Termo de Compromisso (formato
                                                                PDF)</dt>
                                                            <dd class="text-justify"><a style="color: red;"
                                                                    href="{{ route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dados->termo_compromisso_orientador)]) }}">Arquivo</a>
                                                            </dd>
                                                        </dl>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <a href="{{ route('pp-i-bolsistas-inscricao.pdf', ['pp_indicacao_bolsista_id' => $dados->pp_i_bolsista_id, 'pp_i_bolsista_inscricao_id' => $dados->pp_i_bolsista_inscricao_id]) }}"
                                                    class="btn btn-xs btn-info" target="_blank" title="">
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
