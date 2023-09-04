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
                    <img src="{{ asset('images/semic.png') }}" alt="" srcset="" width="full" height="full">
                    <div class="pt-4 pb-4">
                        <span class="mt-4"><strong>{{ $bati->nome }}</strong></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">

            <form action="{{-- route('semic.inscricao.store', ['semic_id' => $semic]) --}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-xl-12 p-lg-4 ">
                    <div class="row justify-content-center">
                        <h3 class="text-primary d-inline text-center p-4">Inscrição</h3>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="card border shadow-sm">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <h4 class=" text-muted d-inline text-center px-4 pb-2">Identificação do(a)
                                            Orientador(a)
                                        </h4>
                                    </div>
                                    <hr class="mt-3 mb-3">
                                    <div class="basic-form">
                                        <div class="row mt-3">
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Nome completo *</label>
                                                <input type="text"
                                                    class="form-control @if ($errors->first('nome_semicinscricao')) is-invalid @endif"
                                                    placeholder="Nome Professor Orientador" required
                                                    name="nome_semicinscricao" value="{{-- old('nome_semicinscricao') --}}">
                                                {!! $errors->default->first('nome_semicinscricao', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>

                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">CPF *</label>
                                                <input type="text"
                                                    class="form-control @if ($errors->first('cpf_semicinscricao')) is-invalid @endif"
                                                    placeholder="CPF" required name="cpf_semicinscricao"
                                                    value="{{-- old('cpf_semicinscricao') --}}" autocomplete="cpf" autofocus
                                                    id="cpf_semicinscricao">
                                                {!! $errors->default->first('cpf_semicinscricao', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Identidade </label>
                                                <div class="input-group">
                                                    <input type="text" name=" Identidade" id=" identidade"
                                                        class="form-control @error(' identidade') is-invalid @enderror"
                                                        placeholder="Titulação" autocomplete="Identidade"
                                                        value="{{ old('identidade') }}">
                                                </div>
                                                {!! $errors->default->first(' identidade', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Endereço</label>
                                                <div class="input-group">
                                                    <input type="text" name="matricula_semicinscricao"
                                                        id="matricula_semicinscricao"
                                                        class="form-control @error('matricula_semicinscricao') is-invalid @enderror"
                                                        placeholder="Matrícula" required autocomplete="matricula"
                                                        value="{{-- old('matricula_semicinscricao') --}}">
                                                </div>
                                                {!! $errors->default->first(
                                                    'matricula_semicinscricao',
                                                    '<span style="color:red" class="form-text">:message</span>',
                                                ) !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Telefone *</label>
                                                <div class="input-group">
                                                    <input type="text" name="matricula_semicinscricao"
                                                        id="matricula_semicinscricao"
                                                        class="form-control @error('matricula_semicinscricao') is-invalid @enderror"
                                                        placeholder="Matrícula" required autocomplete="matricula"
                                                        value="{{-- old('matricula_semicinscricao') --}}">
                                                </div>
                                                {!! $errors->default->first(
                                                    'matricula_semicinscricao',
                                                    '<span style="color:red" class="form-text">:message</span>',
                                                ) !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">E-mail *</label>
                                                <input type="text"
                                                    class="form-control @if ($errors->first('email_semicinscricao')) is-invalid @endif"
                                                    placeholder="E-mail" required name="email_semicinscricao"
                                                    value="{{-- old('email_semicinscricao') --}}">
                                                {!! $errors->default->first('email_semicinscricao', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Matrícula *</label>
                                                <div class="input-group">
                                                    <input type="text" name="matricula_semicinscricao"
                                                        id="matricula_semicinscricao"
                                                        class="form-control @error('matricula_semicinscricao') is-invalid @enderror"
                                                        placeholder="Matrícula" required autocomplete="matricula"
                                                        value="{{-- old('matricula_semicinscricao') --}}">
                                                </div>
                                                {!! $errors->default->first(
                                                    'matricula_semicinscricao',
                                                    '<span style="color:red" class="form-text">:message</span>',
                                                ) !!}
                                            </div>
                                            <div class="mb-5 col-md-8">
                                                <label class="form-label fw-normal">Centro</label>
                                                <select class="default-select-btn form-control form-custom wide mb-"
                                                    tabindex="null" name="centro_id" required>
                                                    <option disabled selected value="">
                                                        Selecione
                                                        uma opção</option>
                                                    @foreach ($centros as $centro)
                                                        <option value={{ $centro->id }}>
                                                            {{ $centro->centros }}</option>
                                                    @endforeach
                                                    {!! $errors->default->first('centro', '<span style="color:red" class="form-text">:message</span>') !!}
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Departamento *</label>
                                                <div class="input-group">
                                                    <input type="text" name="departamento" id="departamento"
                                                        class="form-control @error('departamento') is-invalid @enderror"
                                                        placeholder="Departamento" required autocomplete="matricula"
                                                        value="{{ old('departamento') }}">
                                                </div>
                                                {!! $errors->default->first('departamento', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Laboratório</label>
                                                <div class="input-group">
                                                    <input type="text" name="laboratório" id="laboratório"
                                                        class="form-control @error('laboratório') is-invalid @enderror"
                                                        placeholder="laboratório" required autocomplete="laboratório"
                                                        value="{{ old('laboratório') }}">
                                                </div>
                                                {!! $errors->default->first('laboratório', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Regime de trabalho *</label>
                                                <div class="input-group">
                                                    <input type="text" name="regime_de_trabalho"
                                                        id="regime_de_trabalho"
                                                        class="form-control @error('regime_de_trabalho') is-invalid @enderror"
                                                        placeholder="Regime de trabalho" required autocomplete="matricula"
                                                        value="{{ old('regime_de_trabalho') }}">
                                                </div>
                                                {!! $errors->default->first('regime_de_trabalho', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="mb-10 col-md-12">
                                                <label class="form-label fw-normal">Titulação/Categoria Funcional *</label>
                                                <div class="input-group">
                                                    <input type="text" name="titulacao_categoria_funcional"
                                                        id="titulacao_categoria_funcional"
                                                        class="form-control @error('titulacao_categoria_funcional') is-invalid @enderror"
                                                        placeholder="Titulacao/Categoria funcional" required
                                                        autocomplete="matricula"
                                                        value="{{ old('titulacao_categoria_funcional') }}">
                                                </div> <br>
                                                {!! $errors->default->first(
                                                    'titulacao_categoria_funcional',
                                                    '<span style="color:red" class="form-text">:message</span>',
                                                ) !!}
                                            </div>
                                            
                                            <div  class="mb-10 col-md-12">
                                                <div class="alert alert-primary">
                                                        <label >Encontra-se vinculado a algum Programa de Pós-Graduação da UEMA na qualidade de Docente Permanente?</label><br>
                                                    <label for="modalidade_bolsa1"><input type="radio"
                                                            name="modalidade_bolsa" id="modalidade_bolsa1" value="BATI - I">
                                                        Sim</label><br>
                                                    <label for="modalidade_bolsa2"><input type="radio"
                                                            name="modalidade_bolsa" id="modalidade_bolsa2" value="BATI - II">
                                                        Não</label>
        
                                                </div>
                                             {{--   <div>
                                                    <h5 >Encontra-se vinculado a algum Programa de Pós-Graduação da UEMA na qualidade de Docente Permanente?</h5>
                                                    <label for="modalidade_bolsa1"><input type="radio"
                                                            name="modalidade_bolsa" id="modalidade_bolsa1" value="BATI - I">
                                                        Sim</label><br>
                                                    <label for="modalidade_bolsa2"><input type="radio"
                                                            name="modalidade_bolsa" id="modalidade_bolsa2" value="BATI - II">
                                                        Não</label>
                                                </div>   --}}
                                            </div>
                                            <div class="mb-10 col-md-12">
                                                <label class="form-label fw-normal" >Em caso afirmativo, indique o programa. Caso esteja vinculado a mais de um programa, indicar qual será utilizado 
                                                    como referência para avaliar a produção docente.</ç>
                                                @foreach (config('ppgraduacao.ppgraduacao') as $item)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="ppgraduacao"
                                                            value="{{ $item }}" >
                                                        <label class="form-check-label">
                                                            {{ $item }}
                                                        </label>
                                                    </div>
                                                @endforeach
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
                                        <h4 class=" text-muted d-inline text-center px-4 pb-2">Informações sobre o(s)
                                            Projeto(s) de Pesquisa beneficiado(s) com a bolsa BATI
                                        </h4>
                                    </div>
                                    <hr class="mt-3 mb-3">
                                    <div class="basic-form">
                                        <div class="row ">
                                            <h6 class="text-muted form-label py-2 fw-normal">Grande Área de conhecmento *
                                            </h6>
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
                                            {!! $errors->default->first('areaconhecimento_id', '<span style="color:red" class="form-text">:message</span>') !!}
                                        </div>

                                        <div class="row ">
                                            <hr class="mt-3 mb-3">
                                            <div class="mb-3 col-md-6 col-sm-6">
                                                <label class="form-label fw-normal">Anexar (formato PDF) a relação dos
                                                    Projetos de Pesquisa *</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-primary text-white">Upload</span>
                                                    <div class="form-file">
                                                        <input type="file"
                                                            class="form-file-input form-control @if ($errors->first('anexo_pdf_projetospesquisa')) is-invalid @endif"
                                                            required name="anexo_pdf_projetospesquisa">
                                                    </div>
                                                </div>
                                                {!! $errors->default->first(
                                                    'anexo_pdf_projetospesquisa',
                                                    '<span style="color:red" class="form-text">:message</span>',
                                                ) !!}
                                            </div>
                                            <div class="mb-3 col-md-6 col-sm-6">
                                                <label class="form-label fw-normal">Anexar (formato PDF) o(s) Termo(s) de
                                                    Outorga</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-primary text-white">Upload</span>
                                                    <div class="form-file">
                                                        <input type="file"
                                                            class="form-file-input form-control @if ($errors->first('anexo_pdf_termooutorga')) is-invalid @endif"
                                                            required name="anexo_pdf_termooutorga">
                                                    </div>
                                                </div>
                                                {!! $errors->default->first(
                                                    'anexo_pdf_termooutorga',
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
                                        <h4 class=" text-muted d-inline text-center px-4 pb-2">Plano(s) de Trabalho do
                                            Bolsista (anexar em formato PDF)
                                        </h4>
                                    </div>
                                    <hr class="mt-3 mb-3">
                                    <div class="shadow p-3 mb-5 bg-white rounded">
                                        <div class="mb-3 col-md-6 col-sm-6">
                                            <label class="form-label fw-normal">Modalidade de Bolsa solicitada *</label>
                                            <div>
                                                <label for="modalidade_bolsa1"><input type="radio"
                                                        name="modalidade_bolsa" id="modalidade_bolsa1" value="BATI - I">
                                                    BATI - I</label><br>
                                                <label for="modalidade_bolsa2"><input type="radio"
                                                        name="modalidade_bolsa" id="modalidade_bolsa2" value="BATI - II">
                                                    BATI - II</label>
                                            </div>
                                        </div>
                                        <div class="alert alert-primary">

                                            <label class="form-label fw-normal" style="margin: 5px;">Plano de Trabalho
                                                1</label>

                                        </div>
                                        <div class="mb-11 col-md-12">
                                            <label class="form-label fw-normal">Título*</label>
                                            <div class="input-group">
                                                <input type="text" name="titulo" id="titulo"
                                                    class="form-control @error('titulo') is-invalid @enderror"
                                                    placeholder="Título" required autocomplete="Título"
                                                    value="{{ old('titulo') }}">
                                            </div>
                                            {!! $errors->default->first('titulo', '<span style="color:red" class="form-text">:message</span>') !!}
                                        </div>
                                        <br>
                                        <div class="mb-11 col-md-12">
                                            <div class="form-group">
                                                <label class="form-label fw-normal">Resumo*</label>
                                                <textarea class="form-control" id=""resumotextarea rows="3" placeholder="Resumo" required></textarea>
                                            </div>
                                            {!! $errors->default->first('titulo', '<span style="color:red" class="form-text">:message</span>') !!}
                                        </div>

                                        <div class="basic-form">
                                            <div class="row mt-3">
                                                <div class="mb-12 col-md-12 col-sm-12">
                                                    <label class="form-label fw-normal">Anexar Arquivo (formato PDF)
                                                        *</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text bg-primary text-white">Upload</span>
                                                        <div class="form-file">
                                                            <input type="file"
                                                                class="form-file-input form-control @if ($errors->first('anexo_pdf_curriculolattes')) is-invalid @endif"
                                                                required name="anexo_pdf_curriculolattes">
                                                        </div>
                                                    </div>
                                                    {!! $errors->default->first(
                                                        'anexo_pdf_curriculolattes',
                                                        '<span style="color:red" class="form-text">:message</span>',
                                                    ) !!}

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="shadow p-3 mb-5 bg-white rounded">
                                        <div class="mb-3 col-md-6 col-sm-6">
                                            <label class="form-label fw-normal">Modalidade de Bolsa solicitada </label>
                                            <div>
                                                <label for="modalidade_bolsa1"><input type="radio"
                                                        name="modalidade_bolsa" id="modalidade_bolsa1" value="BATI - I">
                                                    BATI - I</label><br>
                                                <label for="modalidade_bolsa2"><input type="radio"
                                                        name="modalidade_bolsa" id="modalidade_bolsa2" value="BATI - II">
                                                    BATI - II</label>
                                            </div>
                                        </div>
                                        <div class="alert alert-primary">

                                            <label class="form-label fw-normal" style="margin: 5px;">Plano de Trabalho
                                                2</label>

                                        </div>
                                        <div class="mb-11 col-md-12">
                                            <label class="form-label fw-normal">Título</label>
                                            <div class="input-group">
                                                <input type="text" name="titulo" id="titulo"
                                                    class="form-control @error('titulo') is-invalid @enderror"
                                                    placeholder="Título" required autocomplete="Título"
                                                    value="{{ old('titulo') }}">
                                            </div>
                                            {!! $errors->default->first('titulo', '<span style="color:red" class="form-text">:message</span>') !!}
                                        </div>
                                        <br>
                                        <div class="mb-11 col-md-12">
                                            <div class="form-group">
                                                <label class="form-label fw-normal">Resumo</label>
                                                <textarea class="form-control" id=""resumotextarea rows="3" placeholder="Resumo" required></textarea>
                                            </div>
                                            {!! $errors->default->first('titulo', '<span style="color:red" class="form-text">:message</span>') !!}
                                        </div>

                                        <div class="basic-form">
                                            <div class="row mt-3">
                                                <div class="mb-12 col-md-12 col-sm-12">
                                                    <label class="form-label fw-normal">Anexar Arquivo (formato
                                                        PDF)</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text bg-primary text-white">Upload</span>
                                                        <div class="form-file">
                                                            <input type="file"
                                                                class="form-file-input form-control @if ($errors->first('anexo_pdf_curriculolattes')) is-invalid @endif"
                                                                required name="anexo_pdf_curriculolattes">
                                                        </div>
                                                    </div>
                                                    {!! $errors->default->first(
                                                        'anexo_pdf_curriculolattes',
                                                        '<span style="color:red" class="form-text">:message</span>',
                                                    ) !!}

                                                </div>
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
                                        <h4 class=" text-muted d-inline text-center px-4 pb-2">Produção Docente
                                        </h4>
                                    </div>
                                    <hr class="mt-3 mb-3">
                                    <div class="basic-form">
                                        <div class="row mt-3">
                                            <div class="mb-3 col-md-6 col-sm-6">
                                                <label class="form-label fw-normal">Currículo Lattes atualizado a partir de
                                                    2018 (formato PDF) *</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-primary text-white">Upload</span>
                                                    <div class="form-file">
                                                        <input type="file"
                                                            class="form-file-input form-control @if ($errors->first('anexo_pdf_curriculolattes')) is-invalid @endif"
                                                            required name="anexo_pdf_curriculolattes">
                                                    </div>
                                                </div>
                                                {!! $errors->default->first(
                                                    'anexo_pdf_curriculolattes',
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

@section('css')
    <style>
        .bootstrap-select .btn {
            height: 3.5rem !important;
        }

        @media (max-width: 1402px) {
            .bootstrap-select .btn {
                height: 2.5rem !important;
            }

        }

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



@endsection
