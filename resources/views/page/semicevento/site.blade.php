@extends('layout.page', [
    'layout' => 'evt',
])

@section('title', ' - Semic_Evento')
@section('content-header')
    <div class="container-fluid ">
        <div class="card">
            <div class="container">
                <div class="d-flex justify-content-center pb-4">
                    <img class="img-fluid w-80" src="{{ asset('images/logo_SEMIC.png') }}" alt="" srcset=""  width="350" height="70">
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
            @foreach ($semiceventos as $dados)
                <div class="col-xl-12 p-lg-4 p-2">
                    <div class="row justify-content-center">
                        <div class="col-lg-7 col-md-9 col-sm-10">
                            <div class="card border shadow-sm">
                                <img src="{{ asset('storage/' .$dados->banner) }}" alt=""
                                class="img-fluid w-100 rounded" width="80" height="70">
                                <div class="card-body">

                                    <h3 class="text-black">{{ $dados->nome }}</h3>

                                    <p>{{ $dados->descricao }}</p>
                                    <a class="btn btn-info"
                                        href="{{ route('semicevento.page', ['semic_evento_id' => $dados->semic_evento_id]) }}">Ver
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
