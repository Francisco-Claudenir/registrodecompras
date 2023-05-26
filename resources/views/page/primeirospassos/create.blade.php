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
                        <span class="mt-4"><strong>{{ $primeiropasso->nome }}</strong></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="col-xl-12 p-lg-4 ">
                <span>{{ Auth::user() }}</span>
                <div class="row justify-content-center">
                    <h3 class="text-primary d-inline text-center p-4">Inscrição</h3>
                    <div class="col-lg-8 col-md-11 col-sm-11">
                        <div class="card border shadow-sm">
                            <div class="card-body">
                                <form
                                    action="{{ route('primeirospassos.inscricao.store', $primeiropasso->primeiropasso_id) }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="basic-form">
                                        <div class="row">
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Identidade</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Identidade" name="identidade">
                                                {!! $errors->default->first('identidade', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">Matricula</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Matricula" name="matricula">
                                                {!! $errors->default->first('matricula', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label fw-normal">centro</label>
                                                <input type="text" class="form-control" placeholder="Centro"
                                                    name="centro">
                                                {!! $errors->default->first('centro', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                            <div class="mb-3 col-md-12 col-sm-12">
                                                <label class="form-label fw-normal">Cópia do Contrato</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text bg-primary text-white">Upload</span>
                                                    <div class="form-file">
                                                        <input type="file" class="form-file-input form-control"
                                                            name="copiacontrato">
                                                    </div>
                                                </div>
                                                {!! $errors->default->first('copiacontrato', '<span style="color:red" class="form-text">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mt-4 ">
                                    <div class="row justify-content-center">
                                        <h5 class=" text-muted d-inline text-center px-4 pb-2">Área do Projeto de Pesquisa
                                        </h5>
                                        <div class="row ">
                                            <h6 class="text-muted form-label py-2 fw-normal">Grande Área de conhecmento</h6>
                                            @foreach ($grandeArea as $area)
                                                <div class="mb-3 col-md-3">
                                                    <p lass="text-muted d-inline form-label fw-normal text-center">
                                                        {{ $area->nome }}
                                                    </p>
                                                    @foreach ($area->grandeArea_subArea as $sub)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="areaconhecimento_id"
                                                                value="{{ $sub->areaconhecimento_id }}">
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
                                    <div class="row pt-4">
                                        <div class="mb-3 col-md-5">
                                            <label class="form-label fw-normal">Título de Projeto de Pesquisa</label>
                                            <input type="text" class="form-control" name="tituloprojetopesquisa">
                                            {!! $errors->default->first(
                                                'tituloprojetopesquisa',
                                                '<span style="color:red" class="form-text">:message</span>',
                                            ) !!}
                                        </div>
                                        <div class="mb-3 col-md-7">
                                            <label class="form-label fw-normal">Projeto de Pesquisa</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text bg-primary text-white">Upload</span>
                                                <div class="form-file">
                                                    <input type="file" class="form-file-input form-control"
                                                        name="projetopesquisa">
                                                </div>
                                            </div>
                                            {!! $errors->default->first('projetopesquisa', '<span style="color:red" class="form-text">:message</span>') !!}
                                        </div>
                                        <div class="mb-3 col-md-7">
                                            <label class="form-label fw-normal">Resumo do Projeto</label>
                                            <textarea class="form-control" rows="6" id="comment" name="resumoprojeto"></textarea>
                                            {!! $errors->default->first('resumoprojeto', '<span style="color:red" class="form-text">:message</span>') !!}
                                        </div>
                                        <div class="mb-3 col-md-5">
                                            <label class="form-label fw-normal">Chefe Imediato</label>
                                            <input type="text" class="form-control" name="chefeimediato">
                                            {!! $errors->default->first('chefeimediato', '<span style="color:red" class="form-text">:message</span>') !!}
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label fw-normal">Parecer do Comitê de Ética</label>
                                            <div class="input-group mb-6">
                                                <span class="input-group-text bg-primary text-white">Upload</span>
                                                <div class="form-file">
                                                    <input type="file" class="form-file-input form-control"
                                                        name="parecercomite">
                                                </div>
                                            </div>
                                            {!! $errors->default->first('parecercomite', '<span style="color:red" class="form-text">:message</span>') !!}
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label fw-normal">Currículo Lattes atualizado a partir de
                                                2018</label>
                                            <div class="input-group mb-6">
                                                <span class="input-group-text bg-primary text-white">Upload</span>
                                                <div class="form-file">
                                                    <input type="file" class="form-file-input form-control"
                                                        name="curriculolattes">
                                                </div>
                                            </div>
                                            {!! $errors->default->first('curriculolattes', '<span style="color:red" class="form-text">:message</span>') !!}
                                        </div>
                                        <hr class="mt-4">
                                        <div class="row justify-content-center mb-4">
                                            <h5 class=" text-muted d-inline text-center px-4 pb-2">Plano de Trabalho
                                            </h5>
                                            <div class="row ">
                                                <div class="mb-3 col-md-5">
                                                    <label class="form-label fw-normal">Título</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="mb-3 col-md-7">
                                                    <label class="form-label fw-normal">Projeto de Pesquisa</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text bg-primary text-white">Upload</span>
                                                        <div class="form-file">
                                                            <input type="file" class="form-file-input form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label fw-normal">Resumo do Projeto</label>
                                                    <textarea class="form-control" rows="6" id="comment"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('primeirospassos.index', 1) }}"
                                        class="btn btn-danger float-start">Voltar</a>
                                    <button type="submit" class="btn btn-primary float-end">Enviar</button>

                                </form>
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
