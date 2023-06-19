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
                    <h3 class="card-title">Inscrição</h3>
                    <div class="card-options">
                        <div class="btn-list">
                            <a href="{{ route('pp-i-bolsistas-inscricao.pdf', ['pp_indicacao_bolsista_id' => $dadosInscrito->pp_i_bolsista_id, 'pp_i_bolsista_inscricao_id' => $dadosInscrito->pp_i_bolsista_inscricao_id]) }}"
                                class="btn btn-xs btn-info" title="">
                                PDF
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-2 pb-0">
                    <h5>Identificação do Bolsista</h5>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Número de Inscrição</dt>
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
                            <dt>Centro</dt>
                            <dd class="text-justify">{{ $centro_candidato->centros }}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Curso</dt>
                            <dd>{{ $curso->cursos }}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Número de Identidade</dt>
                            <dd class="text-justify">{{ $dadosInscrito->numero_identidade }}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Documento de Identidade</dt>
                            <dd class="text-justify"><a style="color: red;"
                                    href="{{ route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->documento_identidade)]) }}">Arquivo</a>
                            </dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Documento CPF</dt>
                            <dd class="text-justify"><a style="color: red;"
                                    href="{{ route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->documento_cpf)]) }}">Arquivo</a>
                            </dd>
                        </dl>
                    </div>
                    <h5>Identificação do
                        Orientador(a)</h5>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Nome Completo</dt>
                            <dd class="text-justify">{{ $dadosInscrito->nome_orientador }}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Telefone</dt>
                            <dd class="text-justify">{{ $dadosInscrito->telefone_orientador }}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>E-mail</dt>
                            <dd class="text-justify">{{ $dadosInscrito->email_orientador }}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Centro</dt>
                            <dd class="text-justify">{{ $centro_orientador->centros }}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Título do Projeto do
                                Orientador(a)</dt>
                            <dd class="text-justify">{{ $dadosInscrito->titulo_projeto_orientador }}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Título do Plano de Trabalho
                                Bolsista</dt>
                            <dd class="text-justify">{{ $dadosInscrito->titulo_plano_orientador }}</dd>
                        </dl>
                    </div>
                    <h5>Dados Acadêmicos</h5>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Histórico Escolar atualizado,
                                disponível do
                                SIGUEMA (formato PDF)</dt>
                            <dd class="text-justify"><a style="color: red;"
                                    href="{{ route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->historico_escolar)]) }}">Arquivo</a>
                            </dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Declaração de vínculo do aluno à UEMA
                                atualizado (formato PDF)</dt>
                            <dd class="text-justify"><a style="color: red;"
                                    href="{{ route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->declaracao_vinculo)]) }}">Arquivo</a>
                            </dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Termo de Compromisso do bolsista
                                (formato
                                PDF)</dt>
                            <dd class="text-justify"><a style="color: red;"
                                    href="{{ route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->termo_compromisso_bolsista)]) }}">Arquivo</a>
                            </dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Declaração Negativa de Vínculo
                                Empregatício
                                (formato PDF)</dt>
                            <dd class="text-justify"><a style="color: red;"
                                    href="{{ route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->declaracao_negativa_vinculo)]) }}">Arquivo</a>
                            </dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Currículo atualizado, gerado na
                                Plataforma
                                Lattes (formato PDF)</dt>
                            <dd class="text-justify"><a style="color: red;"
                                    href="{{ route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->curriculo)]) }}">Arquivo</a>
                            </dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Declaração conjuta de estágio (quando
                                for o
                                caso) (formato PDF)</dt>
                            @if ($dadosInscrito->declaracao_conjuta_estagio != null)
                                <dd class="text-justify"><a style="color: red;"
                                        href="{{ route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->declaracao_conjuta_estagio)]) }}">Arquivo</a>
                                </dd>
                            @else
                                <dd>Sem Arquivo</dd> 
                            @endif

                        </dl>
                    </div>
                    <h5>Informações Bancárias</h5>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Agência do Banco do Brasil n°</dt>
                            <dd>{{ $dadosInscrito->agencia_banco }}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Número da Conta Corrente do Banco do
                                Brasil</dt>
                            <dd class="text-justify">{{ $dadosInscrito->numero_conta_corrente }}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Comprovante de Conta Corrente do Banco
                                do
                                Brasil (formato PDF)</dt>
                            <dd class="text-justify"><a style="color: red;"
                                    href="{{ route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->comprovante_conta_corrente)]) }}">Arquivo</a>
                            </dd>
                        </dl>
                    </div>
                    <h5>Documentação do
                        Orientador(a)</h5>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Termo de Compromisso (formato
                                PDF)</dt>
                            <dd class="text-justify"><a style="color: red;"
                                    href="{{ route('pp-i-bolsistas-inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->termo_compromisso_orientador)]) }}">Arquivo</a>
                            </dd>
                        </dl>
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
