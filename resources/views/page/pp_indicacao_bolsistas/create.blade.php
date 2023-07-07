@extends('layout.page', [
    'layout' => 'evt',
    'plugins' => ['lightgallery'],
])

@section('title', ' - Login')
@section('content-header')
    <div class="container-fluid ">
        <div class="card">
            <div class="container">
                <div class="d-flex flex-column">
                    <img src="{{ asset('images/semic.png') }}" alt="" srcset="" width="full" height="full">
                    <div class="pt-4 pb-4">
                        <span class="mt-4"><strong>{{ $pp_indicacao_bolsista->nome }}</strong></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <form
                action="{{ route('pp-i-bolsistas-inscricao.store', ['pp_indicacao_bolsista_id' => $pp_indicacao_bolsista->pp_i_bolsista_id]) }}"
                method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-xl-12 p-lg-4 ">
                    <div class="row justify-content-center">
                        <h3 class="text-primary d-inline text-center p-4">Inscrição</h3>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="card border shadow-sm">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <h4 class=" text-muted d-inline text-center px-4 pb-2">Identificação do Bolsista
                                        </h4>
                                    </div>
                                    <hr class="mt-3 mb-3">
                                    <div class="basic-form">
                                        <div class="row mt-3">
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Nome completo do(a) bolsista</label>
                                                <input type="text"
                                                    class="form-control @if ($errors->first('nome_bolsista')) is-invalid @endif"
                                                    placeholder="Nome Bolsista" required name="nome_bolsista"
                                                    value="{{ old('nome_bolsista') }}">
                                                {!! $errors->default->first('nome_bolsista', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">E-mail</label>
                                                <input type="text"
                                                    class="form-control @if ($errors->first('email_bolsista')) is-invalid @endif"
                                                    placeholder="E-mail" required name="email_bolsista"
                                                    value="{{ old('email_bolsista') }}">
                                                {!! $errors->default->first('email_bolsista', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">CPF</label>
                                                <input type="text"
                                                    class="form-control @if ($errors->first('cpf_bolsista')) is-invalid @endif"
                                                    placeholder="CPF" required name="cpf_bolsista"
                                                    value="{{ old('cpf_bolsista') }}" autocomplete="cpf" autofocus
                                                    id="cpf_bolsista">
                                                {!! $errors->default->first('cpf_bolsista', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Numero de Identidade</label>
                                                <input type="text"
                                                    class="form-control @if ($errors->first('numero_identidade')) is-invalid @endif"
                                                    placeholder="Identidade" required name="numero_identidade"
                                                    value="{{ old('numero_identidade') }}">
                                                {!! $errors->default->first('numero_identidade', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Telefone</label>
                                                <input type="text"
                                                    class="form-control @if ($errors->first('telefone_bolsista')) is-invalid @endif"
                                                    placeholder="(99) 99999-9999" required name="telefone_bolsista"
                                                    value="{{ old('telefone_bolsista') }}" autocomplete="phone"
                                                    id="telefone_bolsista">
                                                {!! $errors->default->first('telefone_bolsista', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Cep</label>
                                                <div class="input-group">
                                                    <input type="text" name="endereco_bolsista[cep]" id="cep"
                                                        class="form-control @error('endereco_bolsista.cep') is-invalid @enderror"
                                                        placeholder="00000-000" required
                                                        value="{{ old('endereco_bolsista.cep') }}"
                                                        pattern="/^[0-9]{5}\-[0-9]{3}$/">
                                                    {{-- <div class="input-group-text"> --}}
                                                    <button type="button" class="input-group-text"
                                                        onclick="pesquisacep(cep.value)">
                                                        <span class="flaticon-381-location"></span>

                                                    </button>
                                                </div>
                                                {!! $errors->default->first(
                                                    'endereco_bolsista.cep',
                                                    '<span style="color:red" class="form-text">:message</span>',
                                                ) !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Endereço</label>
                                                <div class="input-group">
                                                    <input type="text" name="endereco_bolsista[endereco]" id="endereco"
                                                        class="form-control @error('endereco_bolsista.endereco') is-invalid @enderror"
                                                        placeholder="Endereço" required autocomplete="endereco"
                                                        value="{{ old('endereco_bolsista.endereco') }}">
                                                </div>
                                                {!! $errors->default->first(
                                                    'endereco_bolsista.endereco',
                                                    '<span style="color:red" class="form-text">:message</span>',
                                                ) !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Número</label>
                                                <div class="input-group">
                                                    <input type="text" name="endereco_bolsista[numero]"
                                                        class="form-control @error('endereco_bolsista.numero') is-invalid @enderror"
                                                        placeholder="Ex 01" value="{{ old('endereco_bolsista.numero') }}">
                                                </div>
                                                {!! $errors->default->first(
                                                    'endereco_bolsista.numero',
                                                    '<span style="color:red" class="form-text">:message</span>',
                                                ) !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="mb-1" for="endereco_bolsista[bairro]">Bairro</label>
                                                <div class="input-group">
                                                    <input type="text" name="endereco_bolsista[bairro]" id="bairro"
                                                        class="form-control @error('endereco_bolsista.bairro') is-invalid @enderror"
                                                        placeholder="Bairro" autocomplete="email" required
                                                        value="{{ old('endereco_bolsista.bairro') }}">
                                                </div>
                                                {!! $errors->default->first('endereco.bairro', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Campus/Centros</label>
                                                <select
                                                    class="default-select form-control wide @if ($errors->first('centro_id')) is-invalid @endif"
                                                    name="centro_id" required id="centro_id">
                                                    <option value="{{ null }}" selected hidden>Selecione...
                                                    </option>
                                                    @foreach ($centros as $dados)
                                                        <option value="{{ $dados->id }}">{{ $dados->centros }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                {!! $errors->default->first('centro_id', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Curso</label>
                                                <select class="form-control" name="curso_id" id="curso_id" required>
                                                </select>
                                                {!! $errors->default->first('curso_id', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="mb-3 col-md-4 col-sm-4">
                                                <label class="form-label fw-normal">Documento de Identidade</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-primary text-white">Upload</span>
                                                    <div class="form-file">
                                                        <input type="file"
                                                            class="form-file-input form-control @if ($errors->first('documento_identidade')) is-invalid @endif"
                                                            required name="documento_identidade">
                                                    </div>
                                                </div>
                                                {!! $errors->default->first('documento_identidade', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="mb-3 col-md-4 col-sm-4">
                                                <label class="form-label fw-normal">Documento CPF</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-primary text-white">Upload</span>
                                                    <div class="form-file">
                                                        <input type="file"
                                                            class="form-file-input form-control @if ($errors->first('documento_cpf')) is-invalid @endif"
                                                            required name="documento_cpf">
                                                    </div>
                                                </div>
                                                {!! $errors->default->first('documento_cpf', '<span style="color:red" class="form-text">:message</span>') !!}
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
                                        <h4 class=" text-muted d-inline text-center px-4 pb-2">Identificação do
                                            Orientador(a)
                                        </h4>
                                    </div>
                                    <hr class="mt-3 mb-3">
                                    <div class="basic-form">
                                        <div class="row mt-3">
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Nome Completo</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @if ($errors->first('nome_orientador')) is-invalid @endif"
                                                    placeholder="Nome Completo" required name="nome_orientador"
                                                    value="{{ old('nome_orientador') }}">
                                                {!! $errors->default->first('nome_orientador', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">CPF Orientador</label>
                                                <input type="text"
                                                    class="form-control @if ($errors->first('cpf_orientador')) is-invalid @endif"
                                                    placeholder="CPF Orientador" required name="cpf_orientador"
                                                    value="{{ old('cpf_orientador') }}" autocomplete="cpf" autofocus
                                                    id="cpf_orientador">
                                                {!! $errors->default->first('cpf_orientador', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Telefone</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @if ($errors->first('telefone_orientador')) is-invalid @endif"
                                                    required name="telefone_orientador"
                                                    value="{{ old('telefone_orientador') }}" id="telefone_orientador" placeholder="(99) 99999-9999">
                                                {!! $errors->default->first('telefone_orientador', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">E-mail</label>
                                                <input type="text"
                                                    class="form-control @if ($errors->first('email_orientador')) is-invalid @endif"
                                                    placeholder="E-mail" required name="email_orientador"
                                                    value="{{ old('email_orientador') }}">
                                                {!! $errors->default->first('email_orientador', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Campus/Centros</label>
                                                <select
                                                    class="default-select form-control wide @if ($errors->first('centro_orientador_id')) is-invalid @endif"
                                                    name="centro_orientador_id" required>
                                                    <option value="{{ null }}" selected hidden>Selecione...
                                                    </option>
                                                    @foreach ($centros as $dados)
                                                        <option value="{{ $dados->id }}">{{ $dados->centros }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                {!! $errors->default->first('centro_orientador_id', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Título do Projeto do
                                                    Orientador(a)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @if ($errors->first('titulo_projeto_orientador')) is-invalid @endif"
                                                    placeholder="Título do Projeto do Orientador(a)" required
                                                    name="titulo_projeto_orientador"
                                                    value="{{ old('titulo_projeto_orientador') }}">
                                                {!! $errors->default->first(
                                                    'titulo_projeto_orientador',
                                                    '<span style="color:red" class="form-text">:message</span>',
                                                ) !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Título do Plano de Trabalho
                                                    Bolsista</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @if ($errors->first('titulo_plano_orientador')) is-invalid @endif"
                                                    placeholder="Título do Plano de Trabalho Bolsista" required
                                                    name="titulo_plano_orientador"
                                                    value="{{ old('titulo_plano_orientador') }}">
                                                {!! $errors->default->first(
                                                    'titulo_plano_orientador',
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
                                        <h4 class=" text-muted d-inline text-center px-4 pb-2">Dados Acadêmicos
                                        </h4>
                                    </div>
                                    <hr class="mt-3 mb-3">
                                    <div class="basic-form">
                                        <div class="row mt-2">
                                            <div class="mb-3 col-md-6 col-sm-6">
                                                <label class="form-label fw-normal">Histórico Escolar atualizado,
                                                    disponível do
                                                    SIGUEMA (formato PDF)</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-primary text-white">Upload</span>
                                                    <div class="form-file">
                                                        <input type="file"
                                                            class="form-file-input form-control @if ($errors->first('historico_escolar')) is-invalid @endif"
                                                            required name="historico_escolar">
                                                    </div>
                                                </div>
                                                {!! $errors->default->first('historico_escolar', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="mb-3 col-md-6 col-sm-6">
                                                <label class="form-label fw-normal">Declaração de vínculo do aluno à UEMA
                                                    atualizado (formato PDF)</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-primary text-white">Upload</span>
                                                    <div class="form-file">
                                                        <input type="file"
                                                            class="form-file-input form-control @if ($errors->first('declaracao_vinculo')) is-invalid @endif"
                                                            required name="declaracao_vinculo">
                                                    </div>
                                                </div>
                                                {!! $errors->default->first('declaracao_vinculo', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="mb-3 col-md-6 col-sm-6">
                                                <label class="form-label fw-normal">Termo de Compromisso do bolsista
                                                    (formato
                                                    PDF)</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-primary text-white">Upload</span>
                                                    <div class="form-file">
                                                        <input type="file"
                                                            class="form-file-input form-control @if ($errors->first('termo_compromisso_bolsista')) is-invalid @endif"
                                                            required name="termo_compromisso_bolsista">
                                                    </div>
                                                </div>
                                                {!! $errors->default->first(
                                                    'termo_compromisso_bolsista',
                                                    '<span style="color:red" class="form-text">:message</span>',
                                                ) !!}
                                            </div>
                                            <div class="mb-3 col-md-6 col-sm-6">
                                                <label class="form-label fw-normal">Declaração Negativa de Vínculo
                                                    Empregatício
                                                    (formato PDF)</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-primary text-white">Upload</span>
                                                    <div class="form-file">
                                                        <input type="file"
                                                            class="form-file-input form-control @if ($errors->first('declaracao_negativa_vinculo')) is-invalid @endif"
                                                            required name="declaracao_negativa_vinculo">
                                                    </div>
                                                </div>
                                                {!! $errors->default->first(
                                                    'declaracao_negativa_vinculo',
                                                    '<span style="color:red" class="form-text">:message</span>',
                                                ) !!}
                                            </div>
                                            <div class="mb-3 col-md-6 col-sm-6">
                                                <label class="form-label fw-normal">Currículo atualizado, gerado na
                                                    Plataforma
                                                    Lattes (formato PDF)</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-primary text-white">Upload</span>
                                                    <div class="form-file">
                                                        <input type="file"
                                                            class="form-file-input form-control @if ($errors->first('curriculo')) is-invalid @endif"
                                                            required name="curriculo">
                                                    </div>
                                                </div>
                                                {!! $errors->default->first('curriculo', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="mb-3 col-md-6 col-sm-6">
                                                <label class="form-label fw-normal">Declaração conjuta de estágio (quando
                                                    for o
                                                    caso) (formato PDF)</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-primary text-white">Upload</span>
                                                    <div class="form-file">
                                                        <input type="file"
                                                            class="form-file-input form-control @if ($errors->first('declaracao_conjuta_estagio')) is-invalid @endif"
                                                            name="declaracao_conjuta_estagio">
                                                    </div>
                                                </div>
                                                {!! $errors->default->first(
                                                    'declaracao_conjuta_estagio',
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
                                        <h4 class=" text-muted d-inline text-center px-4 pb-2">Informações Bancárias
                                        </h4>
                                    </div>
                                    <hr class="mt-3 mb-3">
                                    <div class="basic-form">
                                        <div class="row mt-3">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label fw-normal">Agência do Banco do Brasil n°</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @if ($errors->first('agencia_banco')) is-invalid @endif"
                                                    placeholder="Agência do Banco" required name="agencia_banco"
                                                    value="{{ old('agencia_banco') }}">
                                                {!! $errors->default->first('agencia_banco', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label fw-normal">Número da Conta Corrente do Banco do
                                                    Brasil</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @if ($errors->first('numero_conta_corrente')) is-invalid @endif"
                                                    placeholder="Número da Conta" required name="numero_conta_corrente"
                                                    value="{{ old('numero_conta_corrente') }}">
                                                {!! $errors->default->first(
                                                    'numero_conta_corrente',
                                                    '<span style="color:red" class="form-text">:message</span>',
                                                ) !!}
                                            </div>
                                            <div class="mb-3 col-md-6 col-sm-6">
                                                <label class="form-label fw-normal">Comprovante de Conta Corrente do Banco
                                                    do
                                                    Brasil (formato PDF)</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-primary text-white">Upload</span>
                                                    <div class="form-file">
                                                        <input type="file"
                                                            class="form-file-input form-control @if ($errors->first('comprovante_conta_corrente')) is-invalid @endif"
                                                            required name="comprovante_conta_corrente">
                                                    </div>
                                                    {!! $errors->default->first(
                                                        'comprovante_conta_corrente',
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
                                        <h4 class=" text-muted d-inline text-center px-4 pb-2">Documentação do
                                            Orientador(a)
                                        </h4>
                                    </div>
                                    <hr class="mt-3 mb-3">
                                    <div class="basic-form">
                                        <div class="row mt-3">
                                            <div class="mb-3 col-md-6 col-sm-6">
                                                <label class="form-label fw-normal">Termo de Compromisso (formato
                                                    PDF)</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-primary text-white">Upload</span>
                                                    <div class="form-file">
                                                        <input type="file"
                                                            class="form-file-input form-control @if ($errors->first('termo_compromisso_orientador')) is-invalid @endif"
                                                            required name="termo_compromisso_orientador">
                                                    </div>
                                                </div>
                                                {!! $errors->default->first(
                                                    'termo_compromisso_orientador',
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
            $("#cep").mask("99999-999", {});
            $("#cpf_bolsista").mask("999.999.999-99", {});
            $("#cpf_orientador").mask("999.999.999-99", {});
            $("#telefone_orientador").mask("(99) 99999-9999", {});
            $("#telefone_bolsista").mask("(99) 99999-9999", {});
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

    <script>
        //CEP
        function limpa_formulario_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('endereco').value = ("");
            document.getElementById('bairro').value = ("");

        }



        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('endereco').value = (conteudo.logradouro);
                document.getElementById('bairro').value = (conteudo.bairro);
            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulario_cep();
                sweetAlert("Oops...", "Cep não encontrado", "error");
                document.getElementById('cep').value = ("");
            }
        }



        function pesquisacep(valor) {


            //Nova variável "cep" somente com dígitos.
            var cep = valor.replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep !== "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('endereco').value = "...";
                    document.getElementById('bairro').value = "...";

                    //Cria um elemento javascript.
                    var script = document.createElement('script');

                    //Sincroniza com o callback.
                    script.src = '//viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);

                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulario_cep();
                    sweetAlert("Ops", "Formato de CEP inválido.", "error");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulario_cep();
            }
        }
    </script>
@endsection
