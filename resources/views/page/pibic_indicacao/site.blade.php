@extends('layout.page', [
    'layout' => 'evt',
])

@section('title', ' - Pibic')
@section('content-header')
    <div class="container-fluid ">
        <div class="card">
            <div class="container">
                <div class="d-flex flex-column">
                    <img src="{{ asset('images/pp_na_ciencia/topo.png') }}" alt="" srcset="" width="full"
                        height="full">
                    <div class="pt-4 pb-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    @include('sweet::alert')
    <div class="container-fluid vh- ">
        <div class="card">
            @foreach ($pibics as $dados)
                <div class="col-xl-12 p-lg-4 p-2">
                    <div class="row justify-content-center">
                        <div class="col-lg-7 col-md-9 col-sm-10">
                            <div class="card border shadow-sm">
                                <img src="{{ asset('images/pp_na_ciencia/card-logo.jpg') }}" alt=""
                                    class="img-fluid w-100 rounded" width="80" height="60">
                                <div class="card-body">

                                    <h3 class="text-black">{{ $dados->nome }}</h3>

                                    <p>{{ $dados->descricao }}</p>
                                    <a class="btn btn-info" href="{{ route('pibic.page',['pibicindicacao_id'=> $dados->pibicindicacao_id])}}">Ver
                                        Mais</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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