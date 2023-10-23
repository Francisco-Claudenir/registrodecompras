@extends('layout.page', [
    'layout' => 'evt',
    'plugins' => ['lightgallery','wizard'],
])

@section('title', ' - Inscrição')
@section('content-header')
    <div class="container-fluid ">
        <div class="card">
            <div class="container">

                <div class="d-flex flex-column">
                    <img src="{{ asset('images/semic.png') }}" alt="" srcset="" width="full" height="full">
                    <div class="pt-4 pb-4">
                        <span class="mt-4"><strong>{{ $semic_evento->nome }}</strong></span>
                    </div>
                </div>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif
        <div class="card">
            <form action="{{ route('semic.eventoinscricao.store', ['semic_evento_id' => $semic_evento]) }}"
                  method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="col-xl-12 p-lg-4 ">
                    <div class="row justify-content-center">
                        <h3 class="text-primary d-inline text-center p-4">Inscrição Semic Evento</h3>
                    </div>

                    <div id="smartwizard" class="form-wizard order-create sw sw-theme-default sw-justified">
                        <ul class="nav nav-wizard">
                            <li><a class="nav-link inactive active" href="#wizard_Service">
                                    <span>1</span>
                                </a></li>
                            <li><a class="nav-link inactive" href="#wizard_Time">
                                    <span>2</span>
                                </a></li>
                            <li><a class="nav-link inactive" href="#wizard_Details">
                                    <span>3</span>
                                </a></li>
                            <li><a class="nav-link inactive" href="#wizard_Payment">
                                    <span>4</span>
                                </a></li>
                        </ul>
                        <div class="tab-content" style="height: 335px;">
                            <div id="wizard_Service" class="tab-pane" role="tabpanel" style="display: block;">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">First Name*</label>
                                                <input type="text" name="firstName" class="form-control"
                                                       placeholder="Parsley" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Last Name*</label>
                                                <input type="text" name="lastName" class="form-control"
                                                       placeholder="Montana" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Email Address*</label>
                                                <input type="email" class="form-control" id="inputGroupPrepend2"
                                                       aria-describedby="inputGroupPrepend2"
                                                       placeholder="example@example.com.com" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Phone Number*</label>
                                                <input type="text" name="phoneNumber" class="form-control"
                                                       placeholder="(+1)408-657-9007" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <div class="form-group">
                                                <label class="text-label">Where are you from*</label>
                                                <input type="text" name="place" class="form-control" required="">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div id="wizard_Time" class="tab-pane" role="tabpanel" style="display: none;">
                                <div class="row">
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Company Name*</label>
                                            <input type="text" name="firstName" class="form-control"
                                                   placeholder="Cellophane Square" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Company Email Address*</label>
                                            <input type="email" class="form-control" id="emial1"
                                                   placeholder="example@example.com.com" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Company Phone Number*</label>
                                            <input type="text" name="phoneNumber" class="form-control"
                                                   placeholder="(+1)408-657-9007" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="text-label">Your position in Company*</label>
                                            <input type="text" name="place" class="form-control" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="wizard_Details" class="tab-pane" role="tabpanel" style="display: none;">
                                <div class="row">
                                    <div class="col-sm-4 mb-2">
                                        <h4>Monday *</h4>
                                    </div>
                                    <div class="col-6 col-sm-4 mb-2">
                                        <div class="form-group">
                                            <input class="form-control" value="9.00" type="number" name="input1"
                                                   id="input1">
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 mb-2">
                                        <div class="form-group">
                                            <input class="form-control" value="6.00" type="number" name="input2"
                                                   id="input2">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 mb-2">
                                        <h4>Tuesday *</h4>
                                    </div>
                                    <div class="col-6 col-sm-4 mb-2">
                                        <div class="form-group">
                                            <input class="form-control" value="9.00" type="number" name="input3"
                                                   id="input3">
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 mb-2">
                                        <div class="form-group">
                                            <input class="form-control" value="6.00" type="number" name="input4"
                                                   id="input4">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 mb-2">
                                        <h4>Wednesday *</h4>
                                    </div>
                                    <div class="col-6 col-sm-4 mb-2">
                                        <div class="form-group">
                                            <input class="form-control" value="9.00" type="number" name="input5"
                                                   id="input5">
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 mb-2">
                                        <div class="form-group">
                                            <input class="form-control" value="6.00" type="number" name="input6"
                                                   id="input6">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 mb-2">
                                        <h4>Thrusday *</h4>
                                    </div>
                                    <div class="col-6 col-sm-4 mb-2">
                                        <div class="form-group">
                                            <input class="form-control" value="9.00" type="number" name="input7"
                                                   id="input7">
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 mb-2">
                                        <div class="form-group">
                                            <input class="form-control" value="6.00" type="number" name="input8"
                                                   id="input8">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 mb-2">
                                        <h4>Friday *</h4>
                                    </div>
                                    <div class="col-6 col-sm-4 mb-2">
                                        <div class="form-group">
                                            <input class="form-control" value="9.00" type="number" name="input9"
                                                   id="input9">
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 mb-2">
                                        <div class="form-group">
                                            <input class="form-control" value="6.00" type="number" name="input10"
                                                   id="input10">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="wizard_Payment" class="tab-pane" role="tabpanel" style="display: none;">
                                <div class="row emial-setup">
                                    <div class="col-lg-3 col-sm-6 col-6">
                                        <div class="form-group">
                                            <label for="mailclient11" class="mailclinet mailclinet-gmail">
                                                <input type="radio" name="emailclient" id="mailclient11">
                                                <span class="mail-icon">
																<i class="mdi mdi-google-plus" aria-hidden="true"></i>
															</span>
                                                <span class="mail-text">I'm using Gmail</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-6">
                                        <div class="form-group">
                                            <label for="mailclient12" class="mailclinet mailclinet-office">
                                                <input type="radio" name="emailclient" id="mailclient12">
                                                <span class="mail-icon">
																<i class="mdi mdi-office" aria-hidden="true"></i>
															</span>
                                                <span class="mail-text">I'm using Office</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-6">
                                        <div class="form-group">
                                            <label for="mailclient13" class="mailclinet mailclinet-drive">
                                                <input type="radio" name="emailclient" id="mailclient13">
                                                <span class="mail-icon">
																<i class="mdi mdi-google-drive" aria-hidden="true"></i>
															</span>
                                                <span class="mail-text">I'm using Drive</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-6">
                                        <div class="form-group">
                                            <label for="mailclient14" class="mailclinet mailclinet-another">
                                                <input type="radio" name="emailclient" id="mailclient14">
                                                <span class="mail-icon">
																<i class="fas fa-question-circle"
                                                                   aria-hidden="true"></i>
															</span>
                                                <span class="mail-text">Another Service</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="skip-email text-center">
                                            <p>Or if want skip this step entirely and setup it later</p>
                                            <a href="javascript:void(0)">Skip step</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="toolbar toolbar-bottom" role="toolbar" style="text-align: right;">
                            <button class="btn btn-primary sw-btn-prev disabled" type="button">Anterior</button>
                            <button class="btn btn-primary sw-btn-next" type="button">Proximo</button>
                        </div>
                    </div>


                    {{--                    <div class="row justify-content-center">--}}
                    {{--                        <h3 class="text-primary d-inline text-center p-4">Inscrição Semic_evento</h3>--}}
                    {{--                        <div class="col-lg-8 col-md-12 col-sm-12">--}}
                    {{--                            <div class="card border shadow-sm">--}}
                    {{--                                <div class="card-body">--}}
                    {{--                                    <div class="row justify-content-center">--}}
                    {{--                                        <h4 class=" text-muted d-inline text-center px-4 pb-2">Identificação--}}
                    {{--                                        </h4>--}}
                    {{--                                    </div>--}}
                    {{--                                    <hr class="mt-3 mb-3">--}}
                    {{--                                    <div class="basic-form">--}}
                    {{--                                        <div class="row mt-3">--}}
                    {{--                                            <div class="mb-3 col-md-12">--}}
                    {{--                                                <label class="form-label fw-normal">Nome Orientador *</label>--}}
                    {{--                                                <input type="text"--}}
                    {{--                                                       class="form-control @if ($errors->first('nome_orientador')) is-invalid @endif"--}}
                    {{--                                                       placeholder="Nome Orientador" required name="nome_orientador"--}}
                    {{--                                                       value="{{ old('nome_orientador') }}">--}}
                    {{--                                                {!! $errors->default->first('nome_orientador', '<span style="color:red" class="form-text">:message</span>') !!}--}}
                    {{--                                            </div>--}}

                    {{--                                            <div class="mb-3 col-md-6">--}}
                    {{--                                                <label class="form-label fw-normal">Titulo Trabalho *</label>--}}
                    {{--                                                <input type="text"--}}
                    {{--                                                       class="form-control @if ($errors->first('titulo_trabalho')) is-invalid @endif"--}}
                    {{--                                                       placeholder="Titulo Trabalho" required name="titulo_trabalho"--}}
                    {{--                                                       value="{{ old('titulo_trabalho') }}" autocomplete="cpf" autofocus--}}
                    {{--                                                       id="titulo_trabalho">--}}
                    {{--                                                {!! $errors->default->first('titulo_trabalho', '<span style="color:red" class="form-text">:message</span>') !!}--}}
                    {{--                                            </div>--}}
                    {{--                                            <div class="mb-3 col-md-6 col-sm-6">--}}
                    {{--                                                <label class="form-label fw-normal">Arquivo *</label>--}}
                    {{--                                                <div class="input-group mb-3">--}}
                    {{--                                                    <span class="input-group-text bg-primary text-white">Upload</span>--}}
                    {{--                                                    <div class="form-file">--}}
                    {{--                                                        <input type="file"--}}
                    {{--                                                               class="form-file-input form-control @if ($errors->first('arquivo')) is-invalid @endif"--}}
                    {{--                                                               required name="arquivo">--}}
                    {{--                                                    </div>--}}
                    {{--                                                </div>--}}
                    {{--                                                {!! $errors->default->first(--}}
                    {{--                                                    'arquivo',--}}
                    {{--                                                    '<span style="color:red" class="form-text">:message</span>',--}}
                    {{--                                                ) !!}--}}
                    {{--                                            </div>--}}

                    {{--                                            <div class="mb-3 col-md-8">--}}
                    {{--                                                <label class="form-label fw-normal ">Cota Bolsa *</label>--}}
                    {{--                                                <select class="default-select form-control " tabindex="null"--}}
                    {{--                                                        name="cota_bolsa" required>--}}
                    {{--                                                    <option disabled selected value="">--}}
                    {{--                                                        Selecione--}}
                    {{--                                                        uma opção--}}
                    {{--                                                    </option>--}}
                    {{--                                                    @foreach (config('tipoPibic.tipo') as $item)--}}
                    {{--                                                        <option value={{ $item }}>--}}
                    {{--                                                            {{ $item }}</option>--}}
                    {{--                                                    @endforeach--}}
                    {{--                                                    {!! $errors->default->first('semicevento_inscricao_cotabolsa', '<span style="color:red" class="form-text">:message</span>') !!}--}}
                    {{--                                                </select>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="col-lg-8 col-md-12 col-sm-12">--}}
                    {{--                            <div class="card border shadow-sm">--}}
                    {{--                                <div class="card-body">--}}
                    {{--                                    <div class="row justify-content-center">--}}
                    {{--                                        <h4 class=" text-muted d-inline text-center px-4 pb-2">Minicursos--}}
                    {{--                                        </h4>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="row">--}}
                    {{--                                        @foreach($semic_evento->semic_evento_minicursos as $minicurso)--}}
                    {{--                                            <div class="col-3">--}}
                    {{--                                                <div class="card border p-2">--}}
                    {{--                                                    <div class="row justify-content-center">--}}
                    {{--                                                        <h6 class="text-muted d-inline text-center px-4 pb-2">{{$minicurso->nome}}</h6>--}}
                    {{--                                                    </div>--}}
                    {{--                                                    <div class="row">--}}

                    {{--                                                        <span class="text"><strong>Vagas : </strong>{{$minicurso->vagas}}</span>--}}
                    {{--                                                        <span class="text"><strong>Horas : </strong>{{$minicurso->horas}}</span>--}}
                    {{--                                                    </div>--}}
                    {{--                                                    <div class="form-check custom-checkbox mb-3 checkbox-info pt-2">--}}
                    {{--                                                        <input type="checkbox" class="form-check-input"--}}
                    {{--                                                               id="customCheckBox2" name="minicurso[]" value="{{$minicurso->minicurso_id}}" >--}}
                    {{--                                                        <label class="form-check-label" for="customCheckBox2">Participar</label>--}}
                    {{--                                                    </div>--}}
                    {{--                                                </div>--}}
                    {{--                                            </div>--}}
                    {{--                                        @endforeach--}}
                    {{--                                    </div>--}}


                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}

                    {{--                        <div class="col-lg-8 col-md-12 col-sm-12">--}}
                    {{--                            <div class="card border shadow-sm">--}}
                    {{--                                <div class="card-body">--}}
                    {{--                                    <a href="" onclick="history.back()"--}}
                    {{--                                       class="btn btn-dark float-start">Voltar</a>--}}
                    {{--                                    <button type="submit" class="btn btn-primary float-end">Enviar</button>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
            </form>
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

