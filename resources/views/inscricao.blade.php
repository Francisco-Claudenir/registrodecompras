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
                        <span class="mt-4"><strong>SEMIC - Seminário de iniciação científica</strong></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="col-xl-12 p-4">
                <div class="row justify-content-center">
                    <h3 class="text-primary d-inline text-center p-4">Inscrição</h3>
                    <div class="col-10">
                        <div class="card border shadow-sm">
                            <div class="card-body">
                                <div class="basic-form">
                                    <form>
                                        <div class="row">
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Matricula</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="1234 Main St">
                                            </div>
                                            <div class="mb-3 col-md-2">
                                                <label class="form-label fw-normal">centro</label>
                                                <input type="email" class="form-control" placeholder="Email">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label fw-normal">centro</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">Upload</span>
                                                    <div class="form-file">
                                                        <input type="file" class="form-file-input form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label fw-normal">Chefe imediato</label>
                                    <input type="text" class="form-control">
                                </div>
                                <hr class="mt-4 mb-4">
                                <div class="mb-3 col-md-3">
                                    <label class="form-label fw-normal">Grande Área de conhecmento</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gridRadios" value="option1"
                                            checked="">
                                        <label class="form-check-label">
                                            First radio
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label fw-normal">Título de Projeto de Pesquisa</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label fw-normal">Resumo do Projeto</label>
                                    <textarea class="form-control" rows="6" id="comment"></textarea>
                                </div>

                                <hr class="mt-4 mb-4">





                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            Check me out
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Sign in</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
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
            height: 55px; !important
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
