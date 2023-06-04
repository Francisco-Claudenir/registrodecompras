@extends('layout.page', [
    'layout' => 'default',
    'plugins' => ['wizard'],
])

@section('title', ' - Espelho de alunno')

@section('content')
    @include('sweet::alert')
    <div class="container-fluid">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Espelho</h3>
                    <div class="card-options">
                        <div class="btn-list">
                            <a href="{{ route('primeirospassos.inscricao.pdf', ['primeiropasso_id' => $dadosInscrito->primeiropasso_id, 'passos_inscricao_id' => $dadosInscrito->passos_inscricao_id]) }}" class="btn btn-xs btn-info" title="">
                                PDF
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-2 pb-0">
                    <h5>Identificação do Candidato</h5>
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
                            <dd class="text-justify">{{ $dadosInscrito->centro }}</dd>
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
                            <dt>Parecer Comitê</dt>
                            <dd class="text-justify"><a style="color: red;"
                                    href="{{ route('primeirospassos.inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->parecercomite)]) }}">Arquivo</a>
                            </dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Currículo Lattes atualizado a partir de 2018</dt>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="copyright">
            <p>
                Todos os direitos reservados Universidade Estadual do Maranhão -
                <a style="color: red;" href="https://www.uema.br/" target="_blank">UEMA</a> {{ now()->year }}
            </p>
            <p>
                Coordenação de Tecnologia da Informação e Comunicação -
                <a style="color: red;" href="https://ctic.uema.br/" target="_blank">CTIC</a>
            </p>
        </div>
    </div>
@endsection
