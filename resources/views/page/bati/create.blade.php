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
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif
        <div class="card">
            <form action="{{ route('bati.inscricao.store', ['bati_id' => $bati]) }}" method="post"
                enctype="multipart/form-data">
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
                                                    class="form-control @if ($errors->first('nome_bati_inscricao')) is-invalid @endif"
                                                    placeholder="Nome" required name="nome_bati_inscricao"
                                                    value="{{ old('nome_bati_inscricao') }}" >
                                                {!! $errors->default->first('nome_bati_inscricao', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>

                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">CPF *</label>
                                                <input type="text"
                                                    class="form-control @if ($errors->first('cpf_bati_inscricao')) is-invalid @endif"
                                                    placeholder="CPF" required name="cpf_bati_inscricao"
                                                    value="{{ old('cpf_bati_inscricao') }}" autocomplete="cpf" autofocus
                                                    id="cpf_bati_inscricao">
                                                {!! $errors->default->first('cpf_bati_inscricao', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Identidade </label>
                                                <div class="input-group">
                                                    <input type="text" name=" bati_inscricao_identidade"
                                                        id=" bati_inscricao_identidade"
                                                        class="form-control @error(' bati_inscricao_identidade') is-invalid @enderror"
                                                        placeholder="Identidade" autocomplete="bati_inscricao_identidade"
                                                        value="{{ old('bati_inscricao_identidade') }}">
                                                </div>
                                                {!! $errors->default->first(
                                                    ' bati_inscricao_identidade',
                                                    '<span style="color:red" class="form-text">:message</span>',
                                                ) !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Endereço</label>
                                                <div class="input-group">
                                                    <input type="text" name="bati_inscricao_endereco"
                                                        id="bati_inscricao_endereco"
                                                        class="form-control @error('bati_inscricao_endereco') is-invalid @enderror"
                                                        placeholder="Endereço" autocomplete="endereço"
                                                        value="{{ old('bati_inscricao_endereco') }}">
                                                </div>
                                                {!! $errors->default->first(
                                                    'bati_inscricao_endereco',
                                                    '<span style="color:red" class="form-text">:message</span>',
                                                ) !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Telefone *</label>
                                                <div class="input-group">
                                                    <input type="text" name="telefone_bati_inscricao"
                                                        id="telefone_bati_inscricao"
                                                        class="form-control @error('telefone_bati_inscricao') is-invalid @enderror"
                                                        placeholder="Telefone" required autocomplete="telefone"
                                                        value="{{ old('telefone_bati_inscricao') }}">
                                                </div>
                                                {!! $errors->default->first(
                                                    'telefone_bati_inscricao',
                                                    '<span style="color:red" class="form-text">:message</span>',
                                                ) !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">E-mail *</label>
                                                <input type="text"
                                                    class="form-control @if ($errors->first('email_bati_inscricao')) is-invalid @endif"
                                                    placeholder="E-mail" required name="email_bati_inscricao"
                                                    value="{{ old('email_bati_inscricao') }}">
                                                {!! $errors->default->first('email_bati_inscricao', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Matrícula *</label>
                                                <div class="input-group">
                                                    <input type="text" name="matricula_bati_inscricao"
                                                        id="matricula_bati_inscricao"
                                                        class="form-control @error('matricula_bati_inscricao') is-invalid @enderror"
                                                        placeholder="Matrícula" required autocomplete="matricula"
                                                        value="{{ old('matricula_bati_inscricao') }}">
                                                </div>
                                                {!! $errors->default->first(
                                                    'matricula_bati_inscricao',
                                                    '<span style="color:red" class="form-text">:message</span>',
                                                ) !!}
                                            </div>
                                            <div class="mb-3 col-md-8">
                                                <label class="form-label fw-normal ">Centro *</label>
                                                <select class="default-select form-control " tabindex="null"
                                                    name="centro_id" required>
                                                    <option disabled selected value="">
                                                        Selecione
                                                        uma opção</option>
                                                    @foreach ($centros as $centro)
                                                        <option value={{ $centro->id }}>
                                                            {{ $centro->centros }}</option>
                                                    @endforeach
                                                    {!! $errors->default->first('centro_id', '<span style="color:red" class="form-text">:message</span>') !!}
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Departamento *</label>
                                                <div class="input-group">
                                                    <input type="text" name="departamento_bati_inscricao"
                                                        id="departamento_bati_inscricao"
                                                        class="form-control @error('departamento_bati_inscricao') is-invalid @enderror"
                                                        placeholder="Departamento" required autocomplete="matricula"
                                                        value="{{ old('departamento_bati_inscricao') }}">
                                                </div>
                                                {!! $errors->default->first(
                                                    'departamento_bati_inscricao',
                                                    '<span style="color:red" class="form-text">:message</span>',
                                                ) !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Laboratório</label>
                                                <div class="input-group">
                                                    <input type="text" name="laboratório_bati_inscricao"
                                                        id="laboratório_bati_inscricao"
                                                        class="form-control @error('laboratório_bati_inscricao') is-invalid @enderror"
                                                        placeholder="Laboratório"
                                                        autocomplete="laboratório_bati_inscricao"
                                                        value="{{ old('laboratório_bati_inscricao') }}">
                                                </div>
                                                {!! $errors->default->first(
                                                    'laboratório_bati_inscricao',
                                                    '<span style="color:red" class="form-text">:message</span>',
                                                ) !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Regime de trabalho *</label>
                                                <div class="input-group">
                                                    <input type="text" name="regime_de_trabalho_bati_inscricao"
                                                        id="regime_de_trabalho_bati_inscricao"
                                                        class="form-control @error('regime_de_trabalho_bati_inscricao') is-invalid @enderror"
                                                        placeholder="Regime de trabalho" required autocomplete="matricula"
                                                        value="{{ old('regime_de_trabalho_bati_inscricao') }}">
                                                </div>
                                                {!! $errors->default->first(
                                                    'regime_de_trabalho_bati_inscricao',
                                                    '<span style="color:red" class="form-text">:message</span>',
                                                ) !!}
                                            </div>
                                            <div class="mb-10 col-md-12">
                                                <label class="form-label fw-normal">Titulação/Categoria Funcional *</label>
                                                <div class="input-group">
                                                    <input type="text"
                                                        name="titulacao_categoria_funcional_bati_inscricao"
                                                        id="titulacao_categoria_funcional_bati_inscricao"
                                                        class="form-control @error('titulacao_categoria_funcional_bati_inscricao') is-invalid @enderror"
                                                        placeholder="Titulacao/Categoria funcional" required
                                                        autocomplete="matricula"
                                                        value="{{ old('titulacao_categoria_funcional_bati_inscricao') }}">
                                                </div> <br>
                                                {!! $errors->default->first(
                                                    'titulacao_categoria_funcional_bati_inscricao',
                                                    '<span style="color:red" class="form-text">:message</span>',
                                                ) !!}
                                            </div>

                                            <div class="mb-10 col-md-12">
                                                <div class="alert alert-primary">
                                                    <label>Encontra-se vinculado a algum Programa de Pós-Graduação da UEMA
                                                        na qualidade de Docente Permanente?</label><br>
                                                    <label><input type="radio" name="opcao_1" value="SIM">
                                                        Sim</label><br>
                                                    <label><input type="radio" name="opcao_1" value="NAO">
                                                        Não</label>
                                                </div>
                                            </div>
                                            <div class="mb-10 col-md-12">
                                                <h6 class="text-muted form-label py-2 fw-normal">Em caso afirmativo,
                                                    indique o programa. Caso esteja vinculado a mais de um programa, indicar
                                                    qual será utilizado
                                                    como referência para avaliar a produção docente.</h6>
                                                @foreach (config('ppgraduacao.ppgraduacao') as $item)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="ppgraduacao[]" value="{{ $item }}">
                                                        <label class="form-check-label">
                                                            {{ $item }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                                {!! $errors->default->first('ppgraduacao', '<span style="color:red" class="form-text">:message</span>') !!}
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
                                                                name="areaconhecimento_id" required
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
                                                            class="form-file-input form-control @if ($errors->first('anexo_pdf_bati_inscricao_projetospesquisa')) is-invalid @endif"
                                                            required name="anexo_pdf_bati_inscricao_projetospesquisa">
                                                    </div>
                                                </div>
                                                {!! $errors->default->first(
                                                    'anexo_pdf_bati_inscricao_projetospesquisa',
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
                                                            class="form-file-input form-control @if ($errors->first('anexo_pdf_bati_inscricao_termooutorga')) is-invalid @endif"
                                                            name="anexo_pdf_bati_inscricao_termooutorga">
                                                    </div>
                                                </div>
                                                {!! $errors->default->first(
                                                    'anexo_pdf_bati_inscricao_termooutorga',
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
                                            @foreach ($modalidade_bolsas as $modalidade_bolsa)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="modalidade_bolsa_bati_inscricao" required
                                                        value="{{ $modalidade_bolsa->modalidade_id }}" />
                                                    <label class="form-check-label">
                                                        {{ $modalidade_bolsa->nome }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="alert alert-primary">

                                            <label class="form-label fw-normal" style="margin: 5px;">Plano de Trabalho
                                                1</label>

                                        </div>
                                        <div class="mb-11 col-md-12">
                                            <label class="form-label fw-normal">Título*</label>
                                            <div class="input-group">
                                                <input type="text" name="titulo_bati_inscricao"
                                                    id="titulo_bati_inscricao"
                                                    class="form-control @error('titulo_bati_inscricao') is-invalid @enderror"
                                                    placeholder="Título" required autocomplete="Título"
                                                    value="{{ old('titulo_bati_inscricao') }}">
                                            </div>
                                            {!! $errors->default->first(
                                                'titulo_bati_inscricao',
                                                '<span style="color:red" class="form-text">:message</span>',
                                            ) !!}
                                        </div>
                                        <br>
                                        <div class="mb-11 col-md-12">
                                            <div class="form-group">
                                                <label class="form-label fw-normal">Resumo*</label>
                                                <textarea class="form-control" @error('resumo_bati_incricao') is-invalid @enderror" name="resumo_bati_incricao" id="resumo_bati_incricao" rows="3"
                                                    placeholder="Resumo" autocomplete="Resumo" required
                                                    value="{{ old('resumo_bati_incricao') }}"></textarea>
                                            </div>
                                            {!! $errors->default->first('resumo_bati_incricao', '<span style="color:red" class="form-text">:message</span>') !!}
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
                                                                class="form-file-input form-control @if ($errors->first('anexo_pdf_arquivo_bati_inscricao')) is-invalid @endif"
                                                                required name="anexo_pdf_arquivo_bati_inscricao">
                                                        </div>
                                                    </div>
                                                    {!! $errors->default->first(
                                                        'anexo_pdf_arquivo_bati_inscricao',
                                                        '<span style="color:red" class="form-text">:message</span>',
                                                    ) !!}

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="shadow p-3 mb-5 bg-white rounded">
                                        <div class="mb-3 col-md-6 col-sm-6">
                                            <label class="form-label fw-normal">Modalidade de Bolsa solicitada </label>
                                            @foreach ($modalidade_bolsas as $modalidade_bolsa)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="modalidade_bolsa_bati_inscricao_2"
                                                        value="{{ $modalidade_bolsa->modalidade_id }}" />
                                                    <label class="form-check-label">
                                                        {{ $modalidade_bolsa->nome }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="alert alert-primary">

                                            <label class="form-label fw-normal" style="margin: 5px;">Plano de Trabalho
                                                2</label>

                                        </div>
                                        <div class="mb-11 col-md-12">
                                            <label class="form-label fw-normal">Título</label>
                                            <div class="input-group">
                                                <input type="text" name="titulo_bati_inscricao_2"
                                                    id="titulo_bati_inscricao_2"
                                                    class="form-control @error('titulo_bati_inscricao_2') is-invalid @enderror"
                                                    placeholder="Título" autocomplete="Título"
                                                    value="{{ old('titulo_bati_inscricao_2') }}">
                                            </div>
                                            {!! $errors->default->first(
                                                'titulo_bati_inscricao_2',
                                                '<span style="color:red" class="form-text">:message</span>',
                                            ) !!}
                                        </div>
                                        <br>
                                        <div class="mb-11 col-md-12">
                                            <div class="form-group">
                                                <label class="form-label fw-normal">Resumo</label>
                                                <textarea class="form-control" name="resumo_bati_incricao_2" id="resumo_bati_incricao_2" rows="3"
                                                    placeholder="Resumo"></textarea>
                                            </div>
                                            {!! $errors->default->first(
                                                'resumo_bati_incricao_2',
                                                '<span style="color:red" class="form-text">:message</span>',
                                            ) !!}
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
                                                                class="form-file-input form-control @if ($errors->first('anexo_pdf_arquivo_bati_inscricao_2')) is-invalid @endif"
                                                                name="anexo_pdf_arquivo_bati_inscricao_2">
                                                        </div>
                                                    </div>
                                                    {!! $errors->default->first(
                                                        'anexo_pdf_arquivo_bati_inscricao_2',
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
                                                            class="form-file-input form-control @if ($errors->first('anexo_pdf_curriculolattes_bati_inscricao')) is-invalid @endif"
                                                            required name="anexo_pdf_curriculolattes_bati_inscricao">
                                                    </div>
                                                </div>
                                                {!! $errors->default->first(
                                                    'anexo_pdf_curriculolattes_bati_inscricao',
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
            $("#cpf_bati_inscricao").mask("999.999.999-99", {});
        })
    </script>
    <script>
        $('#lightgallery2').lightGallery({
            loop: true,
            thumbnail: true,
            exThumbImage: 'data-exthumbimage'
        });
    </script>

    <script src="/js/jquery.maskedinput.js"></script>
    <script type="text/javascript">
        $(function() {

            $("#telefone_bati_inscricao").mask("(99) 99999-9999", {});
        })
    </script>
@endsection
