@extends('layout.page', [
    'layout' => 'evt',
])

@section('title', ' - ' . $semic_evento->nome)
@section('content-header')
    @include('sweet::alert')
    <div class="container-fluid ">
        <div class="card">
            <div class="container">
                <div class="d-flex justify-content-center pb-4">
                    <img class="img-fluid w-80" src="{{ asset('images/logo_SEMIC.png') }}" alt="" srcset="" width="350"
                         height="70">
                </div>
            </div>
        </div>
        <div class="card">
            <div class="row p-4">
                <div class="col-xl-4">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card bg-light border">
                                <div class="card-body">
                                    <div class="profile-statistics">
                                        <div class="text-center">
                                            <div class="row">
                                                <div class="col">
                                                    <h4 class="m-b-0">
                                                        {{ date('d/m/Y', strtotime($semic_evento->data_inicio)) }}
                                                    </h4>
                                                    <span>Data
                                                        início</span>
                                                </div>
                                                <div class="col">
                                                    <h4 class="m-b-0">
                                                        {{ date('d/m/Y', strtotime($semic_evento->data_fim)) }}
                                                    </h4>
                                                    <span>Data
                                                        fim</span>
                                                </div>

                                            </div>
                                            <div class="row mt-4 justify-content-center">
                                                <div class="row justify-content-center mt-2">
                                                    @if (!Auth::check())
                                                        <div class="col-8 align-self-center ">
                                                            <a href="javascript:void(0);"
                                                               class="btn btn-outline-info btn-xs btn-block mb-1"
                                                               data-bs-toggle="modal"
                                                               data-bs-target="#sendMessageModal">Login</a>
                                                        </div>
                                                    @endif

                                                    <div class="col-6">

                                                        @if ($isInscrito)
                                                            <a href="{{ route('semic.eventoinscricao.show', ['semic_evento_id' => $semic_evento->semic_evento_id, 'user_id' => Auth::user()->id]) }}"
                                                               class="btn btn-info btn-xs mb-1">Ver Inscrição</a>
                                                            @if ($semic_evento->status === 'Aberto')
                                                                @if (now()->gte($semic_evento->data_inicio) && now()->lte($semic_evento->data_fim))
                                                                    <!-- aqui -->
                                                                @else
                                                                    <span class="text-danger"> Não é possível realizar a
                                                                        inscrição !</span>
                                                                @endif
                                                            @else
                                                                <br>
                                                                <span class="text-danger"> Não é possível realizar a
                                                                    inscrição !</span>
                                                            @endif
                                                        @else
                                                            @if (Auth::check())
                                                                @if ($semic_evento->status === 'Aberto')
                                                                    @if (now()->gte($semic_evento->data_inicio) && now()->lte($semic_evento->data_fim))
                                                                        <a href="{{ route('semic.eventoinscricao.create', ['semic_evento_id' => $semic_evento->semic_evento_id]) }}"
                                                                           class="btn btn-primary btn-xs mb-1">Realizar
                                                                            Inscrição</a>
                                                                    @else
                                                                        <span class="text-danger"> Não é possível realizar a
                                                                            inscrição !</span>
                                                                    @endif
                                                                @else
                                                                    <br>
                                                                    <span class="text-danger"> Não é possível realizar a
                                                                        inscrição !</span>
                                                                @endif
                                                            @endif
                                                        @endif
                                                    </div>
                                                    <div class="col-6">
                                                        @auth
                                                            <div class="dropdown custom-dropdown">
                                                                <button type="button"
                                                                        class="btn btn-xs btn-outline-info"
                                                                        data-bs-toggle="dropdown"
                                                                        aria-expanded="true">{{ explode(' ', Auth::user()->nome)[0] }}
                                                                    <i class="fa fa-angle-down ms-3"></i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-end"
                                                                     data-popper-placement="top-end"
                                                                     style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(-31px, -44px);">
                                                                    @if (isset(Auth::user()->perfil) ||
                                                                            auth()->user()->can('check-role', 'Administrador|Coordenação de Pesquisa|Coordenação de Pós Graduação|Gabinete'))
                                                                        <a href="{{ route('admin.home') }}"
                                                                           class="dropdown-item ai-icon">
                                                                            <i class="flaticon-073-settings text-dark"
                                                                               aria-hidden="true"></i>
                                                                            <span class="ms-2">Admin </span>
                                                                        </a>
                                                                    @endif
                                                                    <a href="{{ route('logout.eventos') }}"
                                                                       class="dropdown-item ai-icon"
                                                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                                        <svg id="icon-logout"
                                                                             xmlns="http://www.w3.org/2000/svg"
                                                                             class="text-danger" width="18" height="18"
                                                                             viewBox="0 0 24 24" fill="none"
                                                                             stroke="currentColor" stroke-width="2"
                                                                             stroke-linecap="round"
                                                                             stroke-linejoin="round">
                                                                            <path
                                                                                d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4">
                                                                            </path>
                                                                            <polyline
                                                                                points="16 17 21 12 16 7"></polyline>
                                                                            <line x1="21" y1="12" x2="9"
                                                                                  y2="12"></line>
                                                                        </svg>
                                                                        <span class="ms-2">Sair</span>
                                                                    </a>
                                                                    <form id="logout-form"
                                                                          action="{{ route('logout.eventos') }}"
                                                                          method="POST"
                                                                          class="d-none">
                                                                        @csrf
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        @endauth
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="sendMessageModal">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="auth-form">
                                                                <form action="{{ route('login.eventos') }}"
                                                                      method="post">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label class="mb-1"><strong>Cpf</strong></label>
                                                                        <div class="input-group">
                                                                            <input type="text" name="cpf"
                                                                                   class="form-control @error('cpf') is-invalid @enderror"
                                                                                   value="{{-- old('cpf') --}}"
                                                                                   placeholder="cpf" autofocus>
                                                                            <div class="input-group-text">
                                                                                <span class="flaticon-381-user"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {!! $errors->default->first('cpf', '<span style="color:red" class="form-text">:message</span>') !!}
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="mb-1"><strong>Senha</strong></label>
                                                                        <div class="input-group">
                                                                            <input type="password" name="password"
                                                                                   class="form-control @error('password') is-invalid @enderror"
                                                                                   placeholder="Senha">
                                                                            <div class="input-group-text">
                                                                                <span class="flaticon-381-key"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {!! $errors->first('password', '<span style="color:red" class="form-text">:message</span>') !!}
                                                                    <div
                                                                        class="form-row d-flex justify-content-between mt-4 mb-2">
                                                                        <div class="form-group">
                                                                            <div
                                                                                class="custom-control custom-checkbox ms-1">
                                                                                <input type="checkbox"
                                                                                       class="form-check-input"
                                                                                       id="basic_checkbox_1">
                                                                                <label class="form-check-label"
                                                                                       for="basic_checkbox_1">Lembrar-me</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <a href="{!! url('/page-forgot-password') !!}">Esqueci
                                                                                minha senha</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block">Log
                                                                            In
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                                <div class="new-account mt-3">
                                                                    <p>
                                                                        Não possui cadastro?
                                                                        <a class="text-primary"
                                                                           href="{!! url('/register') !!}">Cadastre-se</a>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="card bg-light border">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="#descricao" data-bs-toggle="tab"
                                                                class="nav-link active">Descrição</a>
                                        </li>
                                        <li class="nav-item"><a href="#programacao" data-bs-toggle="tab"
                                                                class="nav-link">Programação Geral</a>
                                        </li>
                                        <li class="nav-item"><a href="#anaisevento" data-bs-toggle="tab"
                                                                class="nav-link">Anais do evento</a>
                                        </li>
                                        <li class="nav-item"><a href="#premiacao" data-bs-toggle="tab"
                                                                class="nav-link">Premiação </a>
                                        </li>
                                        <li class="nav-item"><a href="#listatrabalho" data-bs-toggle="tab"
                                                                class="nav-link">Lista de trabalhos</a>
                                        </li>
                                        <li class="nav-item"><a href="#minicursos" data-bs-toggle="tab"
                                                                class="nav-link">Minicursos</a>
                                        </li>

                                    </ul>
                                    <div class="tab-content">
                                        <div id="descricao" class="tab-pane fade active show">
                                            <div class="profile-about-me">
                                                <div class="pt-4 border-bottom-1 pb-4">
                                                    <h4 class="text-primary">Descrição</h4>
                                                    <p class="mb-2">{{ $semic_evento->descricao }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="programacao" class="tab-pane fade">
                                            <div class="profile-about-me">
                                                <div class="pt-4 border-bottom-1 pb-4">
                                                    <h4 class="text-primary">Programação Geral</h4>

                                                    <div class="basic-list-group mt-4">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-xl-2">
                                                                <div class="list-group mb-4 border border-1 "
                                                                     id="list-tab" role="tablist">
                                                                    <a class="list-group-item list-group-item-action text-black active"
                                                                       id="list-01-list" data-bs-toggle="list"
                                                                       href="#list-01" role="tab"
                                                                       aria-selected="true">
                                                                        <span>Segunda-feira</span>
                                                                        <small>27/11/2023</small>
                                                                    </a>
                                                                    <a class="list-group-item list-group-item-action text-black"
                                                                       id="list-02-list" data-bs-toggle="list"
                                                                       href="#list-02" role="tab"
                                                                       aria-selected="false" tabindex="-1">
                                                                        <span>Terça-feira</span>
                                                                        <small>28/11/2023</small>
                                                                    </a>
                                                                    <a class="list-group-item list-group-item-action text-black"
                                                                       id="list-03-list" data-bs-toggle="list"
                                                                       href="#list-03" role="tab"
                                                                       aria-selected="false" tabindex="-1">
                                                                        <span>Quarta-feira</span>
                                                                        <small>29/11/2023</small>
                                                                    </a>
                                                                    <a class="list-group-item list-group-item-action text-black"
                                                                       id="list-04-list" data-bs-toggle="list"
                                                                       href="#list-04" role="tab"
                                                                       aria-selected="false" tabindex="-1">
                                                                        <span>Quinta-feira</span>
                                                                        <small>30/11/2023</small>
                                                                    </a>
                                                                    <a class="list-group-item list-group-item-action text-black"
                                                                       id="list-05-list" data-bs-toggle="list"
                                                                       href="#list-05" role="tab"
                                                                       aria-selected="false" tabindex="-1">
                                                                        <span>Sexta-feira</span>
                                                                        <small>01/12/2023</small>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-xl-10">
                                                                <div class="tab-content" id="nav-tabContent">
                                                                    <div class="tab-pane fade show active"
                                                                         id="list-01" role="tabpanel"
                                                                         aria-labelledby="#list-01-list">
                                                                        <h5 class="mb-4 text-primary">Manhã
                                                                            08:00 às
                                                                            12:00 h</h5>
                                                                        <p>Minicurso
                                                                            MEIO AMBIENTE, TURISMO E
                                                                            (RE)PRODUÇÃO DO ESPAÇO:
                                                                            PERSPECTIVAS PARA A
                                                                            GESTÃO E O PLANEJAMENTO</p>
                                                                        <h5 class="mb-4 text-primary">Tarde
                                                                            14:00 às
                                                                            18:00 h</h5>
                                                                        <p>
                                                                            Apresentação de
                                                                            trabalhos em salas online
                                                                            Sessões de Agronomia,
                                                                            Veterinária, Biologia, Saúde,
                                                                            História, Educação, Ciências
                                                                            Sociais, Arquitetura, Letras,
                                                                            Eng. Computação, Eng.
                                                                            Produção, Eng. Mecânica,
                                                                            PIBITI
                                                                        </p>
                                                                        <h5 class="mb-4 text-primary">Noite 19:30 h</h5>
                                                                        <p>
                                                                            Cerimônia de abertura
                                                                            Palestra de abertura- Canal do
                                                                            Youtube UEMA

                                                                        </p>
                                                                    </div>
                                                                    <div class="tab-pane fade" id="list-02"
                                                                         role="tabpanel"
                                                                         aria-labelledby="#list-02-list">
                                                                        <h5 class="mb-4 text-primary">Manhã
                                                                            08:00 às
                                                                            12:00 h</h5>
                                                                        <p>Apresentação de trabalhos 08:00
                                                                            às 12:00 h
                                                                            Sessões de Agronomia,
                                                                            Veterinária, Biologia, Saúde,
                                                                            História, Educação, Ciências
                                                                            Sociais, Arquitetura, Letras,
                                                                            Química, Filosofia, Eng.
                                                                            Mecânica, PIBITI</p>
                                                                        <h5 class="mb-4 text-primary">Tarde
                                                                            14:00 às
                                                                            18:00 h</h5>
                                                                        <p>
                                                                            Apresentação de
                                                                            trabalhos em salas online
                                                                            Sessões de Agronomia,
                                                                            Veterinária, Biologia, Química,
                                                                            História, Educação, Ciências
                                                                            Sociais, Arquitetura, Letras,
                                                                            Filosofia, Geografia, PIBITI
                                                                        </p>
                                                                    </div>
                                                                    <div class="tab-pane fade" id="list-03"
                                                                         role="tabpanel"
                                                                         aria-labelledby="#list-03-list">
                                                                        <h5 class="mb-4 text-primary">Manhã
                                                                            08:00 às
                                                                            12:00 h</h5>
                                                                        <p>
                                                                            Apresentação de trabalhos 08:00
                                                                            às 12:00 h
                                                                            Sessões de Agronomia,
                                                                            Veterinária, Biologia, Zootecnia,
                                                                            História, Geografia, Ciências
                                                                            Sociais, Arquitetura, Letras,
                                                                            Direito, Eng. Pesca, Física,
                                                                            PIBITI
                                                                        </p>
                                                                        <h5 class="mb-4 text-primary">Tarde
                                                                            14:00 às
                                                                            18:00 h</h5>
                                                                        <p>
                                                                            Apresentação de trabalhos em
                                                                            salas online
                                                                            Sessões de Agronomia,
                                                                            Veterinária, Biologia, Zootecnia,
                                                                            Ciências Sociais/Administração,
                                                                            Matemática, Letras, Direito,
                                                                            Eng. Pesca

                                                                        </p>
                                                                    </div>
                                                                    <div class="tab-pane fade" id="list-04"
                                                                         role="tabpanel"
                                                                         aria-labelledby="#list-settings-list">
                                                                        <h5 class="mb-4 text-primary">Manhã
                                                                            08:00 às
                                                                            12:00 h</h5>
                                                                        <p>Minicurso
                                                                            ETINOGRAFIA: CRÍTICA
                                                                            AOS MANUAIS
                                                                        </p>
                                                                        <p>
                                                                            Minicurso
                                                                            A METDOLOGIA ESTADO
                                                                            DE CONHECIMENTO:
                                                                            FUNDAMENTOS E
                                                                            CONTRIBUIÇÕES PARA A
                                                                            PESQUISA ACADÊMICA
                                                                        </p>
                                                                        <h5 class="mb-4 text-primary">Tarde
                                                                            14:00 às
                                                                            18:00 h</h5>
                                                                        <p>17:00 h Lançamentos
                                                                            Livros-Transmissão pelo
                                                                            Youtube-UEMA
                                                                            Lançamento coletânea
                                                                            XXXIV SEMIC
                                                                        </p>
                                                                    </div>
                                                                    <div class="tab-pane fade" id="list-05"
                                                                         role="tabpanel"
                                                                         aria-labelledby="#list-settings-list">
                                                                        <h5 class="mb-4 text-primary">Tarde
                                                                            14:00 às
                                                                            18:00 h</h5>
                                                                        <p>Cerimônia de
                                                                            encerramento e
                                                                            premiações Bolsista
                                                                            Destaque -
                                                                            Transmissão pelo
                                                                            Youtube-UEMA
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div id="anaisevento" class="tab-pane fade">
                                            <div class="profile-about-me">
                                                <div class="pt-4 border-bottom-1 pb-4">
                                                    <h4 class="text-primary">Anais do Evento</h4>

                                                    <div class="p-3  mt-3 bg-opacity-10 bg-danger rounded-2">

                                                    <span >Em construção</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="premiacao" class="tab-pane fade">
                                            <div class="profile-about-me">
                                                <div class="pt-4 border-bottom-1 pb-4">
                                                    <h4 class="text-primary">Premiação</h4>

                                                    <div class="p-3  mt-3 bg-opacity-10 bg-danger rounded-2">

                                                        <span >Em construção</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="listatrabalho" class="tab-pane fade">
                                            <div class="profile-about-me">
                                                <div class="pt-4 border-bottom-1 pb-4">
                                                    <h4 class="text-primary">Lista de trabalhos por sala e links de acesso às sessões</h4>

                                                    <div class="p-3  mt-3 bg-opacity-10 bg-danger rounded-2">

                                                        <span >Em construção</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="minicursos" class="tab-pane fade">
                                            <div class="profile-about-me">
                                                <div class="pt-4 border-bottom-1 pb-4">
                                                    <h4 class="text-primary">Minicursos</h4>
                                                    <div class="row">
                                                        @foreach($semic_evento->semic_evento_minicursos as $cursos)

                                                            <div class="col-xl-6 col-xxl-6 col-lg-6 col-sm-6">
                                                            <div class="widget-stat card">
                                                                <div class="card-body p-4">
                                                                    <div class="media ai-icon">
									                            <span class="me-3 bgl-primary text-primary">
                                                             <i class="la la-graduation-cap"></i></span>
                                                                        <div class="media-body">
                                                                            <p class="mb-1"></p>
                                                                            <h4 class="mb-0 pb-3">{{$cursos->nome}}</h4>
                                                                            <br>
                                                                            <span
                                                                                class="badge badge-outline-primary">{{$cursos->vagas}} Vagas</span>
                                                                            <span
                                                                                class="badge badge-outline-warning">{{$cursos->horas}} Horas</span>


                                                                        </div>

                                                                    </div>
                                                                    <div class="col-12 pt-4 pl-4">
                                                                        <p>
                                                                            <small>
                                                                                {!! $cursos->descricao !!}
                                                                            </small>
                                                                        </p>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="col-12 pt-1 pl-4">
                                                                        <p>
                                                                            <small>
                                                                                {!! $cursos->descricao_ministrante !!}
                                                                            </small>
                                                                        </p>
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
                            </div>
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

        .list-group-item.active {
            color: #fff !important;
        }

    </style>
@endsection
@section('scripts')
@endsection
