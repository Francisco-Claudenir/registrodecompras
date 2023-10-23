@extends('layout.page', [
    'layout' => 'admin',
    'plugins' => ['wizard', 'validation_jquery'],
])

@section('title', ' - Minicursos Semic')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">

                    <h4 class="card-title">Minicursos</h4>

                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Semic Evento</a></li>
                    <li class="breadcrumb-item active"><a href="">Minicursos</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="basic-form">
                        <div class="row">
                            @foreach($minicursos as $cursos)
                            <div class="col-xl-6 col-lg-12">
                                <div class="card border border-1">
                                    <div class="project-info">
                                        <div class="col-xl-6 my-2 col-lg-6 col-sm-6">
                                            <p class="text-primary mb-1">{{$cursos->minicurso_id}}</p>
                                            <h5 class="title font-w600 mb-2"><a href="post-details.html" class="text-black">{{$cursos->nome}}</a></h5>
                                            <div class="text-dark"><strong>Vagas : </strong>{{$cursos->vagas}} | <strong>Horas : </strong>{{$cursos->horas}}h</div>
                                        </div>
                                        <div class="col-xl-4 my-2 col-lg-6 col-sm-6 ">
                                            <div class="text-dark mt-4"><strong>Inscritos : </strong>{{$cursos->vagas}}</div>
                                            <div class="text-dark"><strong>Vagas restantes : </strong>{{$cursos->vagas}}</div>
                                        </div>

                                        <div class="col-xl-2 my-2 col-lg-6 col-sm-6">
                                            <div class="d-flex project-status align-items-end align-content-end justify-content-end">
                                                <div class="dropdown">
                                                    <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
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
@endsection
@section('scripts')

@endsection

