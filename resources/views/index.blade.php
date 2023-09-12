@extends('layout.page', [
    'layout' => 'home',
])

@section('title', ' - Programas e Eventos')

@section('content')
    @include('sweet::alert')
    <div class="container-fluid">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <!--Primeiros Passos -->
                    <div class="card-bx stacked card">
                        <div class="card-info  ">
                            <h2 class="num-text text-dark mb-2 font-w500">Primeiros Passos Na Ciência</h2>
                            <div class="d-flex">
                                <div class="me-4 text-dark">
                                    <p class="fs-12 mb-4 op6">O Programa Primeiros Passos na Ciência é voltado para o
                                        desenvolvimento do pensamento científico e da iniciação à pesquisa de estudantes de
                                        graduação do ensino superior</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('site.primeiropasso') }}"
                                    class="btn btn-outline-info btn-xxs pull-right">Ver Eventos</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <!--Primeiros Passos -->
                    <div class="card-bx stacked card">
                        <div class="card-info  ">
                            <h2 class="num-text text-dark mb-2 font-w500">Primeiros Passos Indicação Bolsista</h2>
                            <div class="d-flex">
                                <div class="me-4 text-dark">
                                    <p class="fs-12 mb-4 op6">O Programa Primeiros Passos Indicação Bolsista é voltado para o
                                        desenvolvimento do pensamento científico e da iniciação à pesquisa de estudantes de
                                        graduação do ensino superior</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('site.pp-indicacao-bolsistas') }}"
                                    class="btn btn-outline-info btn-xxs pull-right">Ver Eventos</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <!--Pibic Indicação -->
                    <div class="card-bx stacked card">
                        <div class="card-info  ">
                            <h2 class="num-text text-dark mb-2 font-w500">Pibic Indicação</h2>
                            <div class="d-flex">
                                <div class="me-4 text-dark">
                                    <p class="fs-12 mb-4 op6">O Programa Institucional de Bolsas de Iniciação Científica (PIBIC)
                                        visa apoiar a política de Iniciação Científica desenvolvida nas Instituições de Ensino e/ou Pesquisa,
                                        por meio da concessão de bolsas de Iniciação Científica (IC) a estudantes de graduação integrados na pesquisa científica.</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('site.pibic-indicacao') }}"
                                   class="btn btn-outline-info btn-xxs pull-right">Ver Eventos</a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-4 col-md-6 col-sm-6">
                    <!--Primeiros Passos -->
                    <div class="card-bx stacked card">
                        <div class="card-info  ">
                            <h2 class="num-text text-dark mb-2 font-w500">Semic</h2>
                            <div class="d-flex">
                                <div class="me-4 text-dark">
                                    <p class="fs-12 mb-4 op6">O Programa Semic</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('site.semic') }}"
                                    class="btn btn-outline-info btn-xxs pull-right">Ver Eventos</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-lg-4 col-md-6 col-sm-6">
                    <!--Primeiros Passos -->
                    <div class="card-bx stacked card">
                        <div class="card-info  ">
                            <h2 class="num-text text-dark mb-2 font-w500">Bati</h2>
                            <div class="d-flex">
                                <div class="me-4 text-dark">
                                    <p class="fs-12 mb-4 op6">O Programa Bati</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('site.bati') }}"
                                    class="btn btn-outline-info btn-xxs pull-right">Ver Eventos</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
