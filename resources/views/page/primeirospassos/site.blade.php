@extends('layout.page', [
    'layout' => 'evt',
])

@section('title', ' - Login')
@section('content-header')
    <div class="container-fluid ">
        <div class="card">
            <div class="container">
                <div class="d-flex flex-column">
                    <img src="{{ asset('images/semic.png') }}" alt="" srcset="" width="full" height="full">
                    <div class="pt-4 pb-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid vh- ">
        <div class="card">
            @foreach ($primeirospassos as $dados)
                <div class="col-xl-12 p-lg-4 p-2">
                    <div class="row justify-content-center">
                        <div class="col-lg-7 col-md-9 col-sm-10">
                            <div class="card border shadow-sm">
                                <img src="{{ asset('images/semicbg.jpg') }}" alt="" class="img-fluid w-100 rounded"
                                    width="80" height="60">
                                <div class="card-body">

                                    <h3 class="text-black">{{ $dados->nome }}</h3>

                                    <p>{{ $dados->descricao }}</p>
                                    <a class="btn btn-secondary"
                                        href="{{ route('primeirospassos.page', ['primeiropasso_id' => $dados->primeiropasso_id]) }}">Ver
                                        Mais</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <div class="footer">
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
@endsection
