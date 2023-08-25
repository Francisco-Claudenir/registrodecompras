@extends('layout.page', [
    'layout' => 'default',
    'plugins' => ['wizard'],
])

@section('title', ' - Espelho da Inscricao')

@section('content')
    @include('sweet::alert')

    <!-- Modal -->
    <div class="modal fade" id="analiseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{-- $dadosInscrito->nome --}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <label class="col-form-label col-sm-3 pt-0">Resultado</label>
                        <div class="col-sm-9">
                            <form action="{{-- route('semic.inscricao.analise', ['pp_indicacao_bolsista_id' => $dadosInscrito->pp_i_bolsista_id, 'pp_i_bolsista_inscricao_id' => $dadosInscrito->pp_i_bolsista_inscricao_id]) --}}" method="post">
                                @csrf
                                @foreach (config('status.status') as $item)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status"
                                            value="{{-- $item --}}" checked="">
                                        <label class="form-check-label">
                                            {{-- $item --}}
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

                    <h4 class="card-title">{{ $evento->nome }}</h4>

                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{-- route('primeirospassos.inscricao.index', ['primeiropasso_id' => $dadosInscrito->primeiropasso_id]) --}}">Lista
                            de Inscritos</a></li>
                    <li class="breadcrumb-item active"><a href="">{{-- explode(' ', $dadosInscrito->nome)[0] --}}</a>
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
                            <a href="{{-- route('primeirospassos.inscricao.pdf', ['primeiropasso_id' => $dadosInscrito->primeiropasso_id, 'passos_inscricao_id' => $dadosInscrito->passos_inscricao_id]) --}}" class="btn btn-xs btn-info" title="">
                                PDF
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
                            <dt>Nome Completo</dt>
                            <dd>{{ $dadosInscrito->nomeorientador }}</dd>
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
                            <dt>CPF</dt>
                            <dd class="text-justify">{{ $dadosInscrito->cpf }}</dd>
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
                            <dt>Titulação</dt>
                            <dd class="text-justify">{{ -$dadosInscrito->titulação }}</dd>
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
                            <dt> {{ $dadosInscrito->semicInscricao_subArea->subArea_grandeArea->nome }}</dt>
                            <dd class="text-justify">
                                {{ $dadosInscrito->semicInscricao_subArea->nome }}
                            </dd>
                        </dl>
                    </div>
                    <h5>Projetos</h5>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Titulo do projeto do orientador cadastrado no PIBIC ciclo 2022-2023</dt>
                            <dd class="text-justify">{{ $dadosInscrito->tituloprojetoorient }}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <dt>Título do capítulo submetido para a coletânea</dt>
                            <dd class="text-justify">{{ $dadosInscrito->titulocapitulo }}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-12">
                        <dl>
                            <h5>Anexo</h5>
                            <dt>Capítulo</dt>
                            <dd class="text-justify"><a style="color: red;" target="_blank"
                                    href="{{ route('semic.inscricao.docshow', ['diretorio' => Crypt::encrypt($dadosInscrito->capitulo)]) }}">Arquivo</a>
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
