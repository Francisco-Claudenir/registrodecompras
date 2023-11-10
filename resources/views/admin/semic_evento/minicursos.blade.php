@extends('layout.page', [
    'layout' => 'admin',
    'plugins' => ['wizard', 'validation_jquery','summernote','pickers'],
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
                    <li class="breadcrumb-item"><a href="{{ route('semicevento.index') }}">Semic Evento</a></li>
                    <li class="breadcrumb-item active"><a href="">Minicursos</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-sm-flex d-block">
                    <div class="me-auto mb-sm-0 mb-3">
                        <h5 class="mb-2">{{$semic_evento->nome}}</h5>
                    </div>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#minicursomodal"
                            class="btn btn-xs btn-info">Adicionar<span class="btn-icon-end"><i
                                class="fa fa-plus"></i></span></button>

                    <div class="modal fade" id="minicursomodal" style="display: none;z-index: 100;" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Adicionar Minicursos</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    </button>
                                </div>
                                <form
                                    action="{{ route('store.minicursos',['semic_evento_id' => $semic_evento->semic_evento_id]) }}"
                                    method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="nome_minicurso">Nome</label>
                                                    <input type="text" class="form-control"
                                                           name="nome_minicurso">
                                                </div>
                                                <div class="col-3">
                                                    <label for="vagas_minicurso">Vagas</label>
                                                    <input type="number" class="form-control" min="1"
                                                           name="vagas_minicurso" oninput="validity.valid||(value='');">
                                                </div>
                                                <div class="col-3">
                                                    <label for="horas_minicurso">Horas</label>
                                                    <input type="number" class="form-control" min="1"
                                                           oninput="validity.valid||(value='');"
                                                           name="horas_minicurso">
                                                </div>
                                                <div class="col-xl-6 col-xxl-6 col-md-6">
                                                    <label class="form-label">Data e Hora</label>
                                                    <input type="text" id="date-format" name="data_hora"
                                                           class="form-control" placeholder="{{now()}}">
                                                </div>
                                                <div class="row mt-4">
                                                    <h5 class="form-label">Descrição</h5>
                                                    <div class="col-xl-12 col-xxl-12">
                                                        <textarea name="descricao" id="ckeditor"
                                                        ></textarea>
                                                    </div>
                                                </div>
                                                <div class="row mt-4">
                                                    <h5 class="form-label">Descrição Ministrante</h5>
                                                    <div class="col-xl-12 col-xxl-12">
                                                        <textarea name="descricao_ministrante" id="ckeditor2"
                                                        ></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar
                                        </button>
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <div class="row">
                            @foreach($minicursos as $key=>$cursos)
                                <div class="modal fade" id="showminicursomodal-{{$cursos->minicurso_id}}"
                                     style="display: none;z-index: 100;" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">{{$cursos->nome}}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="row ">
                                                    <div class="col-3">
                                                        <div
                                                            class="card border border-1 p-2 justify-content-center align-items-center">
                                                            <strong
                                                                class="text-primary">Vagas </strong>{{$cursos->vagas}}
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div
                                                            class="card border border-1 p-2 justify-content-center align-items-center">
                                                            <strong
                                                                class="text-primary">Inscritos </strong> {{count($cursos->minicurso_semiceventoinscricao)}}
                                                        </div>
                                                    </div>

                                                    <div class="col-3">
                                                        <div
                                                            class="card border border-1 p-2 justify-content-center align-items-center">
                                                            <strong
                                                                class="text-primary">Carga
                                                                Horária </strong>{{$cursos->horas}}h
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div
                                                            class="card border border-1 p-2 justify-content-center align-items-center">
                                                            <strong
                                                                class="text-primary">Data e
                                                                Hora</strong>
                                                            {{ date('d/m/Y', strtotime($cursos->data_hora)) }} - {{date('H:m' , strtotime($cursos->data_hora))}}
                                                        </div>
                                                    </div>
                                                    <h6 class="text-primary">
                                                        Descrição do Minicurso
                                                    </h6>

                                                    <small>
                                                        {!! $cursos->descricao !!}
                                                    </small>
                                                    <h6 class="text-primary">
                                                        Ministrante do minicurso
                                                    </h6>

                                                    <small>
                                                        {!! $cursos->descricao_ministrante !!}
                                                    </small>



                                                </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                                data-bs-dismiss="modal">
                                                            Fechar
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <div class="modal fade" id="editminicursomodal-{{$cursos->minicurso_id}}"
                                     style="display: none;z-index: 100;" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">{{$cursos->nome}}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <form
                                                    action="{{ route('update.minicursos',['minicurso' => $cursos->minicurso_id]) }}"
                                                    method="post">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <label for="nome_minicurso">Nome</label>
                                                                    <input type="text" class="form-control"
                                                                           name="nome_minicurso" value="{{$cursos->nome}}">
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="vagas_minicurso">Vagas</label>
                                                                    <input type="number" class="form-control" min="1"
                                                                           name="vagas_minicurso" oninput="validity.valid||(value='');"
                                                                           value="{{$cursos->vagas}}">
                                                                </div>
                                                                <div class="col-3">
                                                                    <label for="horas_minicurso">Horas</label>
                                                                    <input type="number" class="form-control" min="1"
                                                                           oninput="validity.valid||(value='');"
                                                                           name="horas_minicurso" value="{{$cursos->horas}}">
                                                                </div>
                                                                <div class="col-xl-6 col-xxl-6 col-md-6">
                                                                    <label class="form-label">Data e Hora</label>
                                                                    <input type="text" id="date-format1" name="data_hora"
                                                                           class="form-control" placeholder="{{now()}}" value="{{$cursos->data_hora}}">
                                                                </div>
                                                                <div class="row mt-4">
                                                                    <h5 class="form-label">Descrição</h5>
                                                                    <div class="col-xl-12 col-xxl-12">
                                                        <textarea name="descricao" id="ckeditor-{{$key}}"
                                                        >{!! $cursos->descricao !!} </textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-4">
                                                                    <h5 class="form-label">Descrição Ministrante</h5>
                                                                    <div class="col-xl-12 col-xxl-12">
                                                        <textarea name="descricao_ministrante" id="ckeditor2-{{$key}}"
                                                        >{!! $cursos->descricao_ministrante !!} </textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                                    </div>
                                                </form>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-12">
                                            <a type="button" data-bs-toggle="modal"
                                               data-bs-target="#showminicursomodal-{{$cursos->minicurso_id}}">
                                                <div class="card border border-1">
                                                    <div class="project-info">
                                                        <div class="col-xl-6 my-2 col-lg-6 col-sm-6">
                                                            <p class="text-primary mb-1">{{$cursos->minicurso_id}}</p>
                                                            <h5 class="title font-w600 mb-2"><a
                                                                                                class="text-black">{{$cursos->nome}}</a>
                                                            </h5>
                                                            <div class="text-dark"><strong>Vagas
                                                                    : </strong>{{$cursos->vagas}} |
                                                                <strong>Horas : </strong>{{$cursos->horas}}h
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 my-2 col-lg-6 col-sm-6 ">
                                                            <div class="text-dark mt-4"><strong>Inscritos
                                                                    : </strong>
                                                                <a href="#">

                                                                {{count($cursos->minicurso_semiceventoinscricao)}}
                                                                </a>
                                                            </div>
                                                            <div class="text-dark"><strong>Vagas restantes
                                                                    : </strong>

                                                                @php
                                                                    $vagasRestantes = $cursos->vagas-count($cursos->minicurso_semiceventoinscricao)
                                                                @endphp
                                                                {{ $vagasRestantes }}</div>
                                                        </div>

                                                        <div class="col-xl-2 my-2 col-lg-6 col-sm-6">
                                                            <div
                                                                class="d-flex project-status align-items-end align-content-end justify-content-end">
                                                                <div class="dropdown">
                                                                    <a href="javascript:void(0);"
                                                                       data-bs-toggle="dropdown"
                                                                       aria-expanded="false">
                                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                                             fill="none"
                                                                             xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z"
                                                                                stroke="#575757" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"></path>
                                                                            <path
                                                                                d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z"
                                                                                stroke="#575757" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"></path>
                                                                            <path
                                                                                d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z"
                                                                                stroke="#575757" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"></path>
                                                                        </svg>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <a class="dropdown-item"
                                                                           href="javascript:void(0);"
                                                                           data-bs-toggle="modal"
                                                                           data-bs-target="#editminicursomodal-{{$cursos->minicurso_id}}" onclick="definirData(cursos)">Editar</a>
                                                                        <a class="dropdown-item"
                                                                           href="javascript:void(0);">Deletar</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
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
                <script>
                    ClassicEditor
                        .create(document.querySelector('#ckeditor2'), {})
                        .then(editor => {
                            window.editor = editor;
                        })
                        .catch(err => {
                            console.error(err.stack);
                        });


                    var minicursos = @json($minicursos);
                    for (let i = 0; i < minicursos.length ; i++) {

                        ClassicEditor
                            .create(document.querySelector('#ckeditor-'+i), {})
                            .then(editor => {
                                window.editor = editor;
                            })
                            .catch(err => {
                                console.error(err.stack);
                            });
                        ClassicEditor
                            .create(document.querySelector('#ckeditor2-'+i), {})
                            .then(editor => {
                                window.editor = editor;
                            })
                            .catch(err => {
                                console.error(err.stack);
                            });
                    }


       var datepicker =  $('#date-format1').bootstrapMaterialDatePicker({
            format: 'DD MMMM YYYY HH:mm',


        });

    </script>
@endsection

