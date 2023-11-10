@extends('layout.page', [
'layout' => 'evt',
'plugins' => ['lightgallery','wizard'],
])

@section('title', ' - Inscrição')
@section('content-header')
@include('sweet::alert')
<div class="container-fluid ">
    <div class="card">
        <div class="container">

            <div class="d-flex justify-content-center pb-4">
                <img class="img-fluid w-80" src="{{ asset('images/logo_SEMIC.png') }}" alt="" srcset=""  width="350" height="70">
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
        <form action="{{ route('semic.eventoinscricao.store', ['semic_evento_id' => $semic_evento]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-xl-12 p-lg-4 ">
                <div class="row justify-content-center">
                    <h3 class="text-primary d-inline text-center p-4">Inscrição</h3>
                </div>
                <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12 col-sm-12">
                        <h4 for="">Você deseja se inscrever como Ouvinte?</h4>
                        <div class="basic-form">
                            <div class="mb-3 mb-0">
                                <label class="radio-inline me-3"><input type="radio" required id="sim_radio_ouvinte" name="radio_ouvinte" value="1"> Sim</label>
                                <label class="radio-inline me-3"><input type="radio" required id="nao_radio_ouvinte" name="radio_ouvinte" value="0"> Não</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <h4 for="">Você deseja se inscrever no Minicurso?</h4>
                        <div class="basic-form">
                            <div class="mb-3 mb-0">
                                <label class="radio-inline me-3"><input type="radio" required id="sim_radio_minicurso" name="radio_minicurso" value="1"> Sim</label>
                                <label class="radio-inline me-3"><input type="radio" required id="nao_radio_minicurso" name="radio_minicurso" value="0"> Não</label>
                            </div>
                        </div>
                    </div>
                    <div id="campo_minicurso" class="col-lg-8 col-md-12 col-sm-12"></div>
                    <div class="col-lg-8 col-md-12 col-sm-12" id="pergunta_participante">
                        <h4 for="">Você será um apresentador (Bolsista PIBIC / PIVIC 2022-2023)?</h4>
                        <div class="basic-form">
                            <div class="mb-3 mb-0">
                                <label class="radio-inline me-3"><input type="radio" required id="sim_radio_participante" name="radio_participante" value="1"> Sim</label>
                                <label class="radio-inline me-3"><input type="radio" required id="nao_radio_participante" name="radio_participante" value="0"> Não</label>
                            </div>
                        </div>
                    </div>
                    <div id="campo_participante" class="col-lg-8 col-md-12 col-sm-12"></div>
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <div class="card border shadow-sm">
                            <div class="card-body">
                                <a href="" onclick="history.back()" class="btn btn-dark float-start">Voltar</a>
                                <button id="button_enviar" type="submit" class="btn btn-primary float-end">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>
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
<script>
    document.getElementById("sim_radio_minicurso").addEventListener("click", function() {
        var htmlminicurso = `
                        <div class="card border shadow-sm">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <h4 class=" text-muted d-inline text-center px-4 pb-2">Minicursos
                                    </h4>
                                </div>
                                <div class="row">
                                    @foreach($semic_evento->semic_evento_minicursos as $minicurso)
                                    <div class="col-3">
                                        <div class="card border p-2">
                                            <div class="row justify-content-center">
                                                <h6 class="text-muted d-inline text-center px-4 pb-2">{{$minicurso->nome}}</h6>
                                            </div>
                                            <div class="row">

                                                <span class="text"><strong>Vagas : </strong>{{$minicurso->vagas}}</span>
                                                <span class="text"><strong>Horas : </strong>{{$minicurso->horas}}</span>
                                            </div>
                                            <div class="form-check custom-checkbox mb-3 checkbox-info pt-2">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox2" name="minicurso[]" value="{{$minicurso->minicurso_id}}">
                                                <label class="form-check-label" for="customCheckBox2">Participar</label>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    `;
        $('#campo_minicurso').html(htmlminicurso);
    })
    document.getElementById("nao_radio_minicurso").addEventListener("click", function() {
        document.getElementById("campo_minicurso").value = "",
            $('#campo_minicurso').html("");
    })
</script>

<script>
    document.getElementById("sim_radio_participante").addEventListener("click", function() {
        var htmlparticipante = `<div class="card border shadow-sm">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <h4 class=" text-muted d-inline text-center px-4 pb-2">Identificação
                                    </h4>
                                </div>
                                <hr class="mt-3 mb-3">
                                <div class="basic-form">
                                    <div class="row mt-3">
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label fw-normal">Nome Orientador *</label>
                                            <input type="text" class="form-control @if ($errors->first('nome_orientador')) is-invalid @endif" placeholder="Nome Orientador" required name="nome_orientador" value="{{ old('nome_orientador') }}">
                                            {!! $errors->default->first('nome_orientador', '<span style="color:red" class="form-text">:message</span>') !!}
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label fw-normal">Título do Trabalho (Igual ao título do plano de trabalho cadastrado) *</label>
                                            <input type="text" class="form-control @if ($errors->first('titulo_trabalho')) is-invalid @endif" placeholder="Titulo Trabalho" required name="titulo_trabalho" value="{{ old('titulo_trabalho') }}" autocomplete="cpf" autofocus id="titulo_trabalho">
                                            {!! $errors->default->first('titulo_trabalho', '<span style="color:red" class="form-text">:message</span>') !!}
                                        </div>
                                        <div class="mb-3 col-md-6 col-sm-6">
                                            <label class="form-label fw-normal">Resumo (Arquivo tipo docx)*</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text bg-primary text-white">Upload</span>
                                                <div class="form-file">
                                                    <input type="file" class="form-file-input form-control @if ($errors->first('arquivo')) is-invalid @endif" required name="arquivo">
                                                </div>
                                            </div>
                                            {!! $errors->default->first(
                                            'arquivo',
                                            '<span style="color:red" class="form-text">:message</span>',
                                            ) !!}
                                        </div>

                                        <div class="mb-3 col-md-8">
                                            <label class="form-label fw-normal ">Cota Bolsa *</label>
                                            <select class="default-select form-control " tabindex="null" name="cota_bolsa" required>
                                                <option disabled selected value="">
                                                    Selecione
                                                    uma opção
                                                </option>
                                                @foreach (config('tipoPibic.cota_bolsa') as $item)
                                                <option value={{ $item }}>
                                                    {{ $item }}
                                                </option>
                                                @endforeach
                                                {!! $errors->default->first('semicevento_inscricao_cotabolsa', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`;
        $('#campo_participante').html(htmlparticipante);
    })
    document.getElementById("nao_radio_participante").addEventListener("click", function() {
        document.getElementById("campo_participante").value = "",
            $('#campo_participante').html("");
    })
</script>
@endsection
