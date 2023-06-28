@extends('layout.page', [
    'layout' => 'evt',
])

@section('title', ' - ' . $primeiropasso->nome)
@section('content-header')
    @include('sweet::alert')
    <div class="container-fluid ">
        <div class="card">
            <div class="container">
                <div class="d-flex flex-column">

                    <img src="{{ asset('images/pp_na_ciencia/topo.png') }}" alt="" srcset="" width="full"
                        height="full">
                    <div class="pt-4 pb-4">
                        <h3 class="mt-4 text-dark"><strong>{{ $primeiropasso->nome }}</strong></h3>
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
                                                        {{ date('d/m/Y', strtotime($primeiropasso->data_inicio)) }}
                                                    </h4>
                                                    <span>Data
                                                        início</span>
                                                </div>
                                                <div class="col">
                                                    <h4 class="m-b-0">
                                                        {{ date('d/m/Y', strtotime($primeiropasso->data_fim)) }}
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
                                                            <a href="{{ route('primeirospassos.inscricao.show', ['primeiropasso_id' => $primeiropasso->primeiropasso_id, 'user_id' => Auth::user()->id]) }}"
                                                                class="btn btn-info btn-xs mb-1">Ver Inscrições</a>
                                                            @if (now()->gte($primeiropasso->data_inicio) && now()->lte($primeiropasso->data_fim))
                                                                <a href="{{ route('primeirospassos.inscricao.create', ['primeiropasso_id' => $primeiropasso->primeiropasso_id]) }}"
                                                                    class="btn btn-primary btn-xs mb-1">Realizar
                                                                    Inscrição</a>
                                                            @else
                                                                <span class="text-danger"> Não é possível realizar a
                                                                    inscrição !</span>
                                                            @endif
                                                        @else
                                                            @if (Auth::check())

                                                                @if (now()->gte($primeiropasso->data_inicio) && now()->lte($primeiropasso->data_fim))
                                                                    <a href="{{ route('primeirospassos.inscricao.create', ['primeiropasso_id' => $primeiropasso->primeiropasso_id]) }}"
                                                                        class="btn btn-primary btn-xs mb-1">Realizar
                                                                        Inscrição</a>
                                                                @else
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
                                                                                value="{{ old('cpf') }}"
                                                                                placeholder="cpf" autofocus>
                                                                            <div class="input-group-text">
                                                                                <span class="flaticon-381-user"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{-- {!! $errors->first('usuario', '<span style="color:red" class="form-text">:message</span>') !!} --}}
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
                        {{-- <div class="col-xl-12">
                            <div class="card bg-light border">
                                <div class="card-body">
                                    <div class="profile-interest">
                                        <h5 class="text-primary d-inline">Galeria</h5>
                                        <div class="row mt-4 sp4" id="lightgallery">
                                            <a href="https://zenix.dexignzone.com/laravel/demo/images/profile/2.jpg"
                                                data-exthumbimage="https://zenix.dexignzone.com/laravel/demo/images/profile/2.jpg"
                                                data-src="https://zenix.dexignzone.com/laravel/demo/images/profile/2.jpg"
                                                class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                                <img src="https://zenix.dexignzone.com/laravel/demo/images/profile/2.jpg"
                                                    alt="" class="img-fluid rounded">
                                            </a>
                                            <a href="https://zenix.dexignzone.com/laravel/demo/images/profile/3.jpg"
                                                data-exthumbimage="https://zenix.dexignzone.com/laravel/demo/images/profile/3.jpg"
                                                data-src="https://zenix.dexignzone.com/laravel/demo/images/profile/3.jpg"
                                                class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                                <img src="https://zenix.dexignzone.com/laravel/demo/images/profile/3.jpg"
                                                    alt="" class="img-fluid">
                                            </a>
                                            <a href="https://zenix.dexignzone.com/laravel/demo/images/profile/4.jpg"
                                                data-exthumbimage="https://zenix.dexignzone.com/laravel/demo/images/profile/4.jpg"
                                                data-src="https://zenix.dexignzone.com/laravel/demo/images/profile/4.jpg"
                                                class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                                <img src="https://zenix.dexignzone.com/laravel/demo/images/profile/4.jpg"
                                                    alt="" class="img-fluid">
                                            </a>
                                            <a href="https://zenix.dexignzone.com/laravel/demo/images/profile/3.jpg"
                                                data-exthumbimage="https://zenix.dexignzone.com/laravel/demo/images/profile/3.jpg"
                                                data-src="https://zenix.dexignzone.com/laravel/demo/images/profile/3.jpg"
                                                class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                                <img src="https://zenix.dexignzone.com/laravel/demo/images/profile/3.jpg"
                                                    alt="" class="img-fluid">
                                            </a>
                                            <a href="https://zenix.dexignzone.com/laravel/demo/images/profile/4.jpg"
                                                data-exthumbimage="https://zenix.dexignzone.com/laravel/demo/images/profile/4.jpg"
                                                data-src="https://zenix.dexignzone.com/laravel/demo/images/profile/4.jpg"
                                                class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                                <img src="https://zenix.dexignzone.com/laravel/demo/images/profile/4.jpg"
                                                    alt="" class="img-fluid">
                                            </a>
                                            <a href="https://zenix.dexignzone.com/laravel/demo/images/profile/2.jpg"
                                                data-exthumbimage="https://zenix.dexignzone.com/laravel/demo/images/profile/2.jpg"
                                                data-src="https://zenix.dexignzone.com/laravel/demo/images/profile/2.jpg"
                                                class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                                <img src="https://zenix.dexignzone.com/laravel/demo/images/profile/2.jpg"
                                                    alt="" class="img-fluid">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="col-xl-12">
                            <div class="card bg-light border">
                                <div class="card-body">
                                    <div class="profile-news">
                                        <h5 class="text-primary d-inline">Posts</h5>
                                        <div class="media pt-3 pb-3">
                                            <img src="https://zenix.dexignzone.com/laravel/demo/images/profile/5.jpg"
                                                alt="image" class="me-3 rounded" width="75">
                                            <div class="media-body">
                                                <h5 class="m-b-5"><a
                                                        href="https://zenix.dexignzone.com/laravel/demo/post-details"
                                                        class="text-black">Collection of textile samples</a></h5>
                                                <p class="mb-0">I shared this on my fb wall a few months back, and I
                                                    thought.</p>
                                            </div>
                                        </div>
                                        <div class="media pt-3 pb-3">
                                            <img src="https://zenix.dexignzone.com/laravel/demo/images/profile/6.jpg"
                                                alt="image" class="me-3 rounded" width="75">
                                            <div class="media-body">
                                                <h5 class="m-b-5"><a
                                                        href="https://zenix.dexignzone.com/laravel/demo/post-details"
                                                        class="text-black">Collection of textile samples</a></h5>
                                                <p class="mb-0">I shared this on my fb wall a few months back, and I
                                                    thought.</p>
                                            </div>
                                        </div>
                                        <div class="media pt-3 pb-3">
                                            <img src="https://zenix.dexignzone.com/laravel/demo/images/profile/7.jpg"
                                                alt="image" class="me-3 rounded" width="75">
                                            <div class="media-body">
                                                <h5 class="m-b-5"><a
                                                        href="https://zenix.dexignzone.com/laravel/demo/post-details"
                                                        class="text-black">Collection of textile samples</a></h5>
                                                <p class="mb-0">I shared this on my fb wall a few months back, and I
                                                    thought.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
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
                                        {{-- <li class="nav-item"><a href="#my-posts" data-bs-toggle="tab"
                                                class="nav-link show">Posts</a>
                                        </li>
                                        <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab"
                                                class="nav-link ">Galeria</a>
                                        </li> --}}
                                    </ul>
                                    <div class="tab-content">
                                        <div id="about-me" class="tab-pane fade active show">
                                            <div class="profile-about-me">
                                                <div class="pt-4 border-bottom-1 pb-4">
                                                    <h4 class="text-primary">Descrição</h4>
                                                    <p class="mb-2">{{ $primeiropasso->descricao }}</p>
                                                </div>
                                            </div>

                                            {{-- <div class="profile-personal-info">
                                                <h4 class="text-primary mb-4">Personal Information</h4>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Name <span class="pull-end">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span>Mitchell C.Shay</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Email <span class="pull-end">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span>example@examplel.com</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Availability <span class="pull-end">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span>Full Time (Free Lancer)</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Age <span class="pull-end">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span>27</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Location <span class="pull-end">:</span></h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span>Rosemont Avenue Melbourne,
                                                            Florida</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Year Experience <span
                                                                class="pull-end">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span>07 Year Experiences</span>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>

                                        {{-- <div id="my-posts" class="tab-pane fade">
                                            <div class="my-post-content pt-3">
                                                <div class="card p-4">
                                                    <div class="profile-uoloaded-post border-bottom-1 pb-5">
                                                        <img src="https://zenix.dexignzone.com/laravel/demo/images/profile/8.jpg"
                                                            alt="" class="img-fluid w-100 rounded border">
                                                        <a class="post-title"
                                                            href="https://zenix.dexignzone.com/laravel/demo/post-details">
                                                            <h3 class="text-black">Collection of textile samples lay spread
                                                            </h3>
                                                        </a>
                                                        <p>A wonderful serenity has take possession of my entire soul like
                                                            these
                                                            sweet morning of spare which enjoy whole heart.A wonderful
                                                            serenity
                                                            has take possession of my entire soul like these sweet morning
                                                            of spare which enjoy whole heart.</p>
                                                        <div class="flex col-7">
                                                            <div class="card border p-4">
                                                                <div class="d-flex align-items-center">
                                                                    <div
                                                                        class="col-2 p-4 border shadow-sm bg-bodyborder-light rounded d-flex justify-content-center  align-items-center">
                                                                        <a href="#">
                                                                            <i class="fas fa-download text-dark "></i>
                                                                        </a>
                                                                    </div>
                                                                    <div
                                                                        class="col-8 p-4 justify-content-center  align-items-center">
                                                                        <strong>Edital</strong><br>
                                                                        <small>sdaihsdifhsadfhsadihfsdffdgdgdfgdfgdfgdfgdfgfdhs</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary me-2"><span class="me-2"><i
                                                                    class="fa fa-heart"></i></span>Like</button>
                                                        <button class="btn btn-secondary" data-bs-toggle="modal"
                                                            data-bs-target="#replyModal"><span class="me-2"><i
                                                                    class="fa fa-reply"></i></span>Reply</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div id="profile-settings" class="tab-pane fade ">
                                            <div class="pt-4">
                                                <div class="settings-form">
                                                    <h4 class="text-primary ">Galeria</h4>
                                                    <div class="row mt-4 sp4" id="lightgallery2">
                                                        <a href="https://zenix.dexignzone.com/laravel/demo/images/profile/2.jpg"
                                                            data-exthumbimage="https://zenix.dexignzone.com/laravel/demo/images/profile/2.jpg"
                                                            data-src="https://zenix.dexignzone.com/laravel/demo/images/profile/2.jpg"
                                                            class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                                            <img src="https://zenix.dexignzone.com/laravel/demo/images/profile/2.jpg"
                                                                alt="" class="img-fluid rounded">
                                                        </a>
                                                        <a href="https://zenix.dexignzone.com/laravel/demo/images/profile/3.jpg"
                                                            data-exthumbimage="https://zenix.dexignzone.com/laravel/demo/images/profile/3.jpg"
                                                            data-src="https://zenix.dexignzone.com/laravel/demo/images/profile/3.jpg"
                                                            class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                                            <img src="https://zenix.dexignzone.com/laravel/demo/images/profile/3.jpg"
                                                                alt="" class="img-fluid rounded">
                                                        </a>
                                                        <a href="https://zenix.dexignzone.com/laravel/demo/images/profile/4.jpg"
                                                            data-exthumbimage="https://zenix.dexignzone.com/laravel/demo/images/profile/4.jpg"
                                                            data-src="https://zenix.dexignzone.com/laravel/demo/images/profile/4.jpg"
                                                            class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                                            <img src="https://zenix.dexignzone.com/laravel/demo/images/profile/4.jpg"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                        <a href="https://zenix.dexignzone.com/laravel/demo/images/profile/3.jpg"
                                                            data-exthumbimage="https://zenix.dexignzone.com/laravel/demo/images/profile/3.jpg"
                                                            data-src="https://zenix.dexignzone.com/laravel/demo/images/profile/3.jpg"
                                                            class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                                            <img src="https://zenix.dexignzone.com/laravel/demo/images/profile/3.jpg"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                        <a href="https://zenix.dexignzone.com/laravel/demo/images/profile/4.jpg"
                                                            data-exthumbimage="https://zenix.dexignzone.com/laravel/demo/images/profile/4.jpg"
                                                            data-src="https://zenix.dexignzone.com/laravel/demo/images/profile/4.jpg"
                                                            class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                                            <img src="https://zenix.dexignzone.com/laravel/demo/images/profile/4.jpg"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                        <a href="https://zenix.dexignzone.com/laravel/demo/images/profile/2.jpg"
                                                            data-exthumbimage="https://zenix.dexignzone.com/laravel/demo/images/profile/2.jpg"
                                                            data-src="https://zenix.dexignzone.com/laravel/demo/images/profile/2.jpg"
                                                            class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                                            <img src="https://zenix.dexignzone.com/laravel/demo/images/profile/2.jpg"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
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
