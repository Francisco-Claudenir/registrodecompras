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
                        @if (Auth::user() != null)
                            > Logado
                        @endif
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
                                                <label class="form-label fw-normal">Campus/Centros</label>
                                                <select
                                                    class="default-select form-control wide @if ($errors->first('centro_id')) is-invalid @endif"
                                                    name="centro_id" required id="centro_id">
                                                    <option value="{{ null }}" selected hidden>Selecione...
                                                    </option>
                                                    @foreach ($centros as $dados)
                                                        <option value="{{ $dados->id }}">{{ $dados->centros }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('centro_id'))
                                                    <div class="invalid-feedback">{{ $errors->first('centro_id') }}</div>
                                                @endif
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Curso</label>
                                                <select class="form-control" name="curso_id" id="curso_id" required>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Numero de Identidade</label>
                                                <input type="text"
                                                    class="form-control @if ($errors->first('numero_identidade')) is-invalid @endif"
                                                    placeholder="Identidade" required name="numero_identidade"
                                                    value="{{ old('numero_identidade') }}">
                                                @if ($errors->has('numero_identidade'))
                                                    <div class="invalid-feedback">{{ $errors->first('numero_identidade') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="mb-3 col-md-6 col-sm-6">
                                                <label class="form-label fw-normal">Documento de Identidade</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-primary text-white">Upload</span>
                                                    <div class="form-file">
                                                        <input type="file"
                                                            class="form-file-input form-control @if ($errors->first('documento_identidade')) is-invalid @endif"
                                                            required name="documento_identidade">
                                                    </div>
                                                </div>
                                                @if ($errors->has('documento_identidade'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('documento_identidade') }}</div>
                                                @endif
                                            </div>
                                            <div class="mb-3 col-md-6 col-sm-6">
                                                <label class="form-label fw-normal">Documento CPF</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-primary text-white">Upload</span>
                                                    <div class="form-file">
                                                        <input type="file"
                                                            class="form-file-input form-control @if ($errors->first('documento_cpf')) is-invalid @endif"
                                                            required name="documento_cpf">
                                                    </div>
                                                </div>
                                                @if ($errors->has('documento_cpf'))
                                                    <div class="invalid-feedback">{{ $errors->first('documento_cpf') }}
                                                    </div>
                                                @endif
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
                                                    placeholder="Nome" required name="nome_orientador"
                                                    value="{{ old('nome_orientador') }}">
                                                @if ($errors->has('nome_orientador'))
                                                    <div class="invalid-feedback">{{ $errors->first('nome_orientador') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Telefone</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @if ($errors->first('telefone_orientador')) is-invalid @endif"
                                                    placeholder="Telefone" required name="telefone_orientador"
                                                    minlength="1" maxlength="11" value="{{ old('telefone_orientador') }}">
                                                @if ($errors->has('telefone_orientador'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('telefone_orientador') }}</div>
                                                @endif
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">E-mail</label>
                                                <input type="text"
                                                    class="form-control @if ($errors->first('email_orientador')) is-invalid @endif"
                                                    placeholder="E-mail" required name="email_orientador"
                                                    value="{{ old('email_orientador') }}">
                                                @if ($errors->has('email_orientador'))
                                                    <div class="invalid-feedback">{{ $errors->first('email_orientador') }}
                                                    </div>
                                                @endif
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
                                                @if ($errors->has('centro_orientador_id'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('centro_orientador_id') }}</div>
                                                @endif
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Título do Projeto do
                                                    Orientador(a)</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @if ($errors->first('titulo_projeto_orientador')) is-invalid @endif"
                                                    placeholder="Título do Projeto do Orientador(a)" required
                                                    name="titulo_projeto_orientador"
                                                    value="{{ old('titulo_projeto_orientador') }}">
                                                @if ($errors->has('titulo_projeto_orientador'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('titulo_projeto_orientador') }}</div>
                                                @endif
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Título do Plano de Trabalho
                                                    Bolsista</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @if ($errors->first('titulo_plano_orientador')) is-invalid @endif"
                                                    placeholder="Título do Plano de Trabalho Bolsista" required
                                                    name="titulo_plano_orientador"
                                                    value="{{ old('titulo_plano_orientador') }}">
                                                @if ($errors->has('titulo_plano_orientador'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('titulo_plano_orientador') }}</div>
                                                @endif
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
                                                @if ($errors->has('historico_escolar'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('historico_escolar') }}</div>
                                                @endif
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
                                                @if ($errors->has('declaracao_vinculo'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('declaracao_vinculo') }}</div>
                                                @endif
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
                                                @if ($errors->has('termo_compromisso_bolsista'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('termo_compromisso_bolsista') }}</div>
                                                @endif
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
                                                @if ($errors->has('declaracao_negativa_vinculo'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('declaracao_negativa_vinculo') }}</div>
                                                @endif
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
                                                @if ($errors->has('curriculo'))
                                                    <div class="invalid-feedback">{{ $errors->first('curriculo') }}</div>
                                                @endif
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
                                                @if ($errors->has('declaracao_conjuta_estagio'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('declaracao_conjuta_estagio') }}</div>
                                                @endif
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
                                                    placeholder="Identidade" required name="agencia_banco"
                                                    value="{{ old('agencia_banco') }}">
                                                @if ($errors->has('agencia_banco'))
                                                    <div class="invalid-feedback">{{ $errors->first('agencia_banco') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label fw-normal">Número da Conta Corrente do Banco do
                                                    Brasil</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @if ($errors->first('numero_conta_corrente')) is-invalid @endif"
                                                    placeholder="Matricula" required name="numero_conta_corrente"
                                                    value="{{ old('numero_conta_corrente') }}">
                                                @if ($errors->has('numero_conta_corrente'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('numero_conta_corrente') }}</div>
                                                @endif
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
                                                    @if ($errors->has('comprovante_conta_corrente'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('comprovante_conta_corrente') }}</div>
                                                    @endif
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
                                                @if ($errors->has('termo_compromisso_orientador'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('termo_compromisso_orientador') }}</div>
                                                @endif
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
                    $('select[name=curso_id]').append('<option>Selecione o curso</option>');

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
