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
            <form action="{{ route('pp-i-bolsistas-inscricao.store', ['pp_indicacao_bolsista_id' => $pp_indicacao_bolsista->pp_i_bolsista_id]) }}" method="post">
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
                                                <label class="form-label fw-normal">Curso</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Curso" required name="curso">
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Centro</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Centro" required name="centro">
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Numero de Identidade</label>
                                                <input type="text" class="form-control" placeholder="Identidade" required
                                                    name="numero_identidade">
                                            </div>
                                            <div class="mb-3 col-md-6 col-sm-6">
                                                <label class="form-label fw-normal">Documento de Identidade</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-primary text-white">Upload</span>
                                                    <div class="form-file">
                                                        <input type="file" class="form-file-input form-control" required
                                                            name="documento_identidade">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-md-6 col-sm-6">
                                                <label class="form-label fw-normal">Documento CPF</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-primary text-white">Upload</span>
                                                    <div class="form-file">
                                                        <input type="file" class="form-file-input form-control" required
                                                            name="documento_cpf">
                                                    </div>
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
                                        <h4 class=" text-muted d-inline text-center px-4 pb-2">Identificação do
                                            Orientador(a)
                                        </h4>
                                    </div>
                                    <hr class="mt-3 mb-3">
                                    <div class="basic-form">
                                        <div class="row mt-3">
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Nome Completo</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Nome" required name="nome_orientador">
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Telefone</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Telefone" required name="telefone_orientador">
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">E-mail</label>
                                                <input type="text" class="form-control" placeholder="E-mail" required
                                                    name="email_orientador">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label fw-normal">Título do Projeto do
                                                    Orientador(a)</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Título do Projeto do Orientador(a)" required
                                                    name="titulo_projeto_orientador">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label fw-normal">Título do Plano de Trabalho
                                                    Bolsista</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Título do Plano de Trabalho Bolsista" required
                                                    name="titulo_plano_orientador">
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
                                                        <input type="file" class="form-file-input form-control"
                                                            required name="historico_escolar">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-md-6 col-sm-6">
                                                <label class="form-label fw-normal">Declaração de vínculo do aluno à UEMA
                                                    atualizado (formato PDF)</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-primary text-white">Upload</span>
                                                    <div class="form-file">
                                                        <input type="file" class="form-file-input form-control"
                                                            required name="declaracao_vinculo">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-md-6 col-sm-6">
                                                <label class="form-label fw-normal">Termo de Compromisso do bolsista
                                                    (formato
                                                    PDF)</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-primary text-white">Upload</span>
                                                    <div class="form-file">
                                                        <input type="file" class="form-file-input form-control"
                                                            required name="termo_compromisso_bolsista">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-md-6 col-sm-6">
                                                <label class="form-label fw-normal">Declaração Negativa de Vínculo
                                                    Empregatício
                                                    (formato PDF)</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-primary text-white">Upload</span>
                                                    <div class="form-file">
                                                        <input type="file" class="form-file-input form-control"
                                                            required name="declaracao_negativa_vinculo">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-md-6 col-sm-6">
                                                <label class="form-label fw-normal">Currículo atualizado, gerado na
                                                    Plataforma
                                                    Lattes (formato PDF)</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-primary text-white">Upload</span>
                                                    <div class="form-file">
                                                        <input type="file" class="form-file-input form-control"
                                                            required name="curriculo">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-md-6 col-sm-6">
                                                <label class="form-label fw-normal">Declaração conjuta de estágio (quando
                                                    for o
                                                    caso) (formato PDF)</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-primary text-white">Upload</span>
                                                    <div class="form-file">
                                                        <input type="file" class="form-file-input form-control"
                                                            name="declaracao_conjuta_estagio">
                                                    </div>
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
                                        <h4 class=" text-muted d-inline text-center px-4 pb-2">Informações Bancárias
                                        </h4>
                                    </div>
                                    <hr class="mt-3 mb-3">
                                    <div class="basic-form">
                                        <div class="row mt-3">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label fw-normal">Agência do Banco do Brasil n°</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Identidade" required name="agencia_banco">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label fw-normal">Número da Conta Corrente do Banco do
                                                    Brasil</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Matricula" required name="numero_conta_corrente">
                                            </div>
                                            <div class="mb-3 col-md-6 col-sm-6">
                                                <label class="form-label fw-normal">Comprovante de Conta Corrente do Banco
                                                    do
                                                    Brasil (formato PDF)</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-primary text-white">Upload</span>
                                                    <div class="form-file">
                                                        <input type="file" class="form-file-input form-control"
                                                            required name="comprovante_conta_corrente">
                                                    </div>
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
                                                        <input type="file" class="form-file-input form-control"
                                                            required name="termo_compromisso_orientador">
                                                    </div>
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
                                    <a href="" onclick="history.back()" class="btn btn-dark float-start">Voltar</a>
                                    <button type="submit" class="btn btn-primary float-end">Enviar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class=" footer">
        <div class="copyright">
            <p>
                Todos os direitos reservados Universidade Estadual do Maranhão -
                <a href="https://www.uema.br/" target="_blank">UEMA</a> {{ now()->year }}
            </p>
            <p>
                Coordenação de Tecnologia da Informação e Comunicação -
                <a href="https://ctic.uema.br/" target="_blank">CTIC</a>
            </p>
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
@endsection
