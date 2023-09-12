@extends('layout.page', [
    'layout' => 'evt',
    'plugins' => ['lightgallery'],
])

@section('title', ' - Inscrição')
@section('content-header')
    <div class="container-fluid ">
        <div class="card">
            <div class="container">
                <div class="d-flex flex-column">
                    <img src="{{ asset('images/semic.png') }}" alt="" srcset="" width="full"
                        height="full">
                    <div class="pt-4 pb-4">
                        <span class="mt-4"><strong>{{ $semic->nome }}</strong></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
           
           <form action="{{ route('semic.inscricao.store', ['semic_id' => $semic]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-xl-12 p-lg-4 ">
                    <div class="row justify-content-center">
                        <h3 class="text-primary d-inline text-center p-4">Inscrição</h3>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="card border shadow-sm">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <h4 class=" text-muted d-inline text-center px-4 pb-2">Identificação
                                        </h4>
                                    </div>
                                    <hr class="mt-3 mb-3">
                                    <div class="basic-form">
                                        <div class="row mt-3">
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Nome completo do(a) professor orientador
                                                    *</label>
                                                <input type="text"
                                                    class="form-control @if ($errors->first('nome_semicinscricao')) is-invalid @endif"
                                                    placeholder="Nome Professor Orientador" required
                                                    name="nome_semicinscricao" value="{{ old('nome_semicinscricao') }}">
                                                {!! $errors->default->first('nome_semicinscricao', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">E-mail *</label>
                                                <input type="text"
                                                    class="form-control @if ($errors->first('email_semicinscricao')) is-invalid @endif"
                                                    placeholder="E-mail" required name="email_semicinscricao"
                                                    value="{{ old('email_semicinscricao') }}">
                                                {!! $errors->default->first('email_semicinscricao', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">CPF *</label>
                                                <input type="text"
                                                    class="form-control @if ($errors->first('cpf_semicinscricao')) is-invalid @endif"
                                                    placeholder="CPF" required name="cpf_semicinscricao"
                                                    value="{{ old('cpf_semicinscricao') }}" autocomplete="cpf" autofocus
                                                    id="cpf_semicinscricao">
                                                {!! $errors->default->first('cpf_semicinscricao', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Matrícula *</label>
                                                <div class="input-group">
                                                    <input type="text" name="matricula_semicinscricao"
                                                        id="matricula_semicinscricao"
                                                        class="form-control @error('matricula_semicinscricao') is-invalid @enderror"
                                                        placeholder="Matrícula" required autocomplete="matricula"
                                                        value="{{ old('matricula_semicinscricao') }}">
                                                </div>
                                                {!! $errors->default->first(
                                                    'matricula_semicinscricao',
                                                    '<span style="color:red" class="form-text">:message</span>',
                                                ) !!}
                                            </div>

                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Titulação </label>
                                                <div class="input-group">
                                                    <input type="text" name=" titulacao_semicinscricao"
                                                        id=" titulacao_semicinscricao"
                                                        class="form-control @error(' titulacao_semicinscricao') is-invalid @enderror"
                                                        placeholder="Titulação" autocomplete="titulacao"
                                                        value="{{ old(' titulacao_semicinscricao') }}">
                                                </div>
                                                {!! $errors->default->first(
                                                    ' titulacao_semicinscricao',
                                                    '<span style="color:red" class="form-text">:message</span>',
                                                ) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="card border shadow-sm">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <h4 class=" text-muted d-inline text-center px-4 pb-2">Área pretendida
                                        </h4>
                                    </div>
                                    <hr class="mt-3 mb-3">
                                    <div class="basic-form">
                                        <div class="row ">
                                            <h6 class="text-muted form-label py-2 fw-normal">Grande Área de conhecmento *</h6>
                                            @foreach ($grandeArea as $area)
                                                <div class="mb-3 col-md-3">
                                                    <p lass="text-muted d-inline form-label fw-normal text-center">
                                                        {{ $area->nome }}
                                                    </p>
                                                    @foreach ($area->grandeArea_subArea as $sub)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="areaconhecimento_id"
                                                                value="{{ $sub->areaconhecimento_id }}" />
                                                            <label class="form-check-label">
                                                                {{ $sub->nome }}

                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        </div>
                                        {!! $errors->default->first('areaconhecimento_id', '<span style="color:red" class="form-text">:message</span>') !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="card border shadow-sm">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <h4 class=" text-muted d-inline text-center px-4 pb-2">Projetos
                                        </h4>
                                    </div>
                                    <hr class="mt-3 mb-3">
                                    <div class="mb-11 col-md-12">
                                        <label class="form-label fw-normal">Titulo do projeto do orientador cadastrado no
                                            PIBIC ciclo {{now()->subYear()->format('Y')}}-{{ now()->format('Y') }}*</label>
                                        <input type="text"
                                            class="form-control @if ($errors->first('titulo_capitulo_semicinscricao')) is-invalid @endif"
                                            placeholder="Titulo do projeto do orientador" required name="titulo_capitulo_semicinscricao"
                                            value="{{ old('titulo_capitulo_semicinscricao') }}" autocomplete="Titulo do projeto do orientador"
                                            autofocus id="titulo_capitulo_semicinscricao">
                                        {!! $errors->default->first(
                                            'titulo_capitulo_semicinscricao',
                                            '<span style="color:red" class="form-text">:message</span>',
                                        ) !!}
                                    </div>
                                    <br>
                                    <div class="mb-11 col-md-12">
                                        <label class="form-label fw-normal">Título do capítulo submetido para a coletânea
                                            *</label>
                                        <div class="input-group">
                                            <input type="text" name="titulo_projeto_semicinscricao"
                                                id="titulo_projeto_semicinscricao"
                                                class="form-control @error('titulo_projeto_semicinscricao') is-invalid @enderror"
                                                placeholder="Título do capítulo submetido para a coletânea" required autocomplete="Título do capítulo submetido para a coletânea"
                                                value="{{ old('titulo_projeto_semicinscricao') }}">
                                        </div>
                                        {!! $errors->default->first(
                                            'titulo_projeto_semicinscricao',
                                            '<span style="color:red" class="form-text">:message</span>',
                                        ) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="card border shadow-sm">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <h4 class=" text-muted d-inline text-center px-4 pb-2">Anexos
                                        </h4>
                                    </div>
                                    <hr class="mt-3 mb-3">
                                    <div class="basic-form">
                                        <div class="row mt-3">
                                            <div class="mb-3 col-md-6 col-sm-6">
                                                <label class="form-label fw-normal">Capítulo * (formato
                                                    PDF)</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-primary text-white">Upload</span>
                                                    <div class="form-file">
                                                        <input type="file"
                                                            class="form-file-input form-control @if ($errors->first('anexo_capitulo_semicinscricao')) is-invalid @endif"
                                                            required name="anexo_capitulo_semicinscricao">
                                                    </div>
                                                </div>
                                                {!! $errors->default->first(
                                                    'anexo_capitulo_semicinscricao',
                                                    '<span style="color:red" class="form-text">:message</span>',
                                                ) !!}

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="card border shadow-sm">
                                <div class="card-body">
                                    <a href="" onclick="history.back()"
                                        class="btn btn-dark float-start">Voltar</a>
                                    <button type="submit" class="btn btn-primary float-end">Enviar</button>
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
    <script src="/js/jquery.maskedinput.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#cpf_semicinscricao").mask("999.999.999-99", {});
        })
    </script>
    <script>
        $('#lightgallery2').lightGallery({
            loop: true,
            thumbnail: true,
            exThumbImage: 'data-exthumbimage'
        });
    </script>

    <script>
        $('.curso').hide();

        $('select[name=centro_id]').change(function() {

            var centro = $(this).val();

            $('.curso').show();

            var dados = {
                _token: '{{ csrf_token() }}',
                centro: centro
            };

            $.ajax({
                url: '{{ route('getCurso') }}',
                type: 'POST',
                data: dados,
                dataType: 'json',
                beforeSend: function() {
                    $('select[name=curso_id]').append('<option>Carregando</option>')
                },
                success: function(cursos) {

                    $('select[name=curso_id]').empty();
                    $('select[name=curso_id]').append('<option value="">Selecione o curso</option>');

                    $.each(cursos, function(key, value) {
                        console.log(key, value);
                        $('select[name=curso_id]').append('<option value="' + value.id +
                            '">' + value.cursos + '</option>');
                    });

                }
            });


        });
    </script>


@endsection
