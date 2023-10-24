@extends('layout.page', [
    'layout' => 'evt',
])

@section('title', ' - ' . $semic_evento->nome)
@section('content-header')
    @include('sweet::alert')
    <div class="container-fluid ">
        <div class="card">
            <div class="container">
                <div class="d-flex flex-column">
                    <img src="{{ asset('images/semic.png') }}" alt="" srcset="" width="full" height="full">
                    <div class="pt-4 pb-4">
                        <h3 class="mt-4 text-dark"><strong>{{ $semic_evento->nome }}</strong></h3>
                    </div>
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
                                                          class="btn btn-info btn-xs mb-1">Ver Inscrições</a> 
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
                                                                <button type="button" class="btn btn-xs btn-outline-info"
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
                                                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg"
                                                                            class="text-danger" width="18" height="18"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round">
                                                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4">
                                                                            </path>
                                                                            <polyline points="16 17 21 12 16 7"></polyline>
                                                                            <line x1="21" y1="12" x2="9"
                                                                                y2="12"></line>
                                                                        </svg>
                                                                        <span class="ms-2">Sair</span>
                                                                    </a>
                                                                    <form id="logout-form"
                                                                        action="{{ route('logout.eventos') }}" method="POST"
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
                                                                <form action="{{ route('login.eventos') }}" method="post">
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
                                                                            In</button>
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
                                        <li class="nav-item"><a href="#about-me" data-bs-toggle="tab"
                                                class="nav-link active">Sobre</a>
                                        </li>

                                    </ul>
                                    <div class="tab-content">
                                        <div id="about-me" class="tab-pane fade active show">
                                            <div class="profile-about-me">
                                                <div class="pt-4 border-bottom-1 pb-4">
                                                    <h4 class="text-primary">Descrição</h4>
                                                    <p class="mb-2">{{ $semic_evento->descricao }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="replyModal">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Post Reply</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <textarea class="form-control" rows="4">Message</textarea>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Reply</button>
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

@section('scripts')
@endsection
