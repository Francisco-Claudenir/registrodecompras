@extends('layout.page', [
    'layout' => 'default',
    'plugins' => ['wizard'],
])

@section('title', ' - Cadastro de alunno')

@section('content')
    @include('sweet::alert')
    <!-- Modal -->
    <div class="modal fade" id="analiseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $dadosInscrito->nome }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <label class="col-form-label col-sm-3 pt-0">Resultado</label>
                        <div class="col-sm-9">
                            <form
                                action="{{ route('pp-i-bolsistas-inscricao.analise', ['pp_indicacao_bolsista_id' => $dadosInscrito->pp_i_bolsista_id, 'pp_i_bolsista_inscricao_id' => $dadosInscrito->pp_i_bolsista_inscricao_id]) }}"
                                method="post">
                                @csrf
                                @foreach (config('status.status') as $item)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status"
                                            value="{{ $item }}" checked="">
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

                    <h4 class="card-title">{{ $ppIndicacaoBolsista->nome }}</h4>

                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a
                            href="{{ route('pp-i-bolsistas-inscricao.index', ['pp_indicacao_bolsista_id' => $dadosInscrito->pp_i_bolsista_id]) }}">Lista
                            de Inscritos</a></li>
                    <li class="breadcrumb-item active">Espelho<a href=""></a>
                    </li>
                </ol>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Espelho</h3>
                    <div class="card-options">
                        <div class="btn-list">
                            <a type="button" class="btn btn-xs btn-primary" data-bs-toggle="modal"
                                data-bs-target="#analiseModal" class="btn btn-xs btn-info" title="">
                                Analisar
                            </a>
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
                            <dt>Nome completo do(a) bolsista</dt>
                            <dd>{{ $dadosInscrito->nome_bolsista }}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Email</dt>
                            <dd class="text-justify">{{ $dadosInscrito->email_bolsista }}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Cpf</dt>
                            <dd class="text-justify">{{ $dadosInscrito->cpf_bolsista }}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Telefone</dt>
                            <dd class="text-justify">{{ $dadosInscrito->telefone_bolsista }}</dd>
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
                            <dt>CPF</dt>
                            <dd class="text-justify">{{ $dadosInscrito->cpf_orientador }}</dd>
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
    <div class="footer">
        <div class="copyright">
            <p>
                Todos os direitos reservados Universidade Estadual do Maranhão -
                <a href="https://www.uema.br/" target="_blank">UEMA</a> {{ now()->year }}
            </p>
            <p>
                Coordenação de Tecnologia da Informação e Comunicação -
                <a href="https://ctic.uema.br/" target="_blank">CTIC</a>
            </p>
        </div>
    </div>
@endsection
