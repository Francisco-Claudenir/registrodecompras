@extends('layout.page', [
    'layout' => 'home',
])

@section('title', ' - Programas e Eventos')

@section('content')
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
                                    <p class="fs-12 mb-4 op6">Lorem Ipsum é simplesmente uma simulação de texto da indústria
                                        tipográfica e de impressos, e vem sendo utilizado desde o século XVI,</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="{{route('site.primeiropasso')}}" class="btn btn-outline-info btn-xxs pull-right">Ver Eventos</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <!--Primeiros Passos -->
                    <div class="card-bx stacked card">
                        <div class="card-info  ">
                            <h2 class="num-text text-dark mb-2 font-w500">Primeiros Passos Indicação Bolsistas</h2>
                            <div class="d-flex">
                                <div class="me-4 text-dark">
                                    <p class="fs-12 mb-4 op6">Lorem Ipsum é simplesmente uma simulação de texto da indústria
                                        tipográfica e de impressos, e vem sendo utilizado desde o século XVI,</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="{{route('site.pp-indicacao-bolsistas')}}" class="btn btn-outline-info btn-xxs pull-right">Ver Eventos</a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <!--Primeiros Passos Indicação Bolsista -->
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card-bx stacked card">
                        <div class="card-info  ">
                            <h2 class="num-text text-dark mb-2 font-w500">Primeiros Passos Na Ciência - Indicação Bolsista
                            </h2>
                            <div class="d-flex">
                                <div class="me-4 text-dark">
                                    <p class="fs-12 mb-4 op6">Lorem Ipsum é simplesmente uma simulação de texto da indústria
                                        tipográfica e de impressos, e vem sendo utilizado desde o século XVI,</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-outline-info btn-xxs pull-right">Ver Eventos</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Semic -->
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card-bx stacked card">
                        <div class="card-info  ">
                            <h2 class="num-text text-dark mb-2 font-w500">Semic</h2>
                            <div class="d-flex">
                                <div class="me-4 text-dark">
                                    <p class="fs-12 mb-4 op6">Lorem Ipsum é simplesmente uma simulação de texto da indústria
                                        tipográfica e de impressos, e vem sendo utilizado desde o século XVI,</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-outline-info btn-xxs pull-right">Ver Eventos</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Bati -->
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="card-bx stacked card">
                        <div class="card-info  ">
                            <h2 class="num-text text-dark mb-2 font-w500">Bati</h2>
                            <div class="d-flex">
                                <div class="me-4 text-dark">
                                    <p class="fs-12 mb-4 op6">Lorem Ipsum é simplesmente uma simulação de texto da indústria
                                        tipográfica e de impressos, e vem sendo utilizado desde o século XVI,</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-outline-info btn-xxs pull-right">Ver Eventos</button>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    </div>
@endsection
