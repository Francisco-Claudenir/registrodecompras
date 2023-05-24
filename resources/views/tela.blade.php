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
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <form action="" method="post">
                @csrf
                <div class="col-xl-12 p-lg-4 ">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="card border shadow-sm">
                                <img src="{{ asset('images/semic2.jpg') }}" alt="" class="img-fluid w-100 rounded"
                                    width="100" height="100">
                                <div class="card-body">
                                    <a class="post-title" href="post-details.html">
                                        <h3 class="text-black">Collection of textile samples lay spread</h3>
                                    </a>
                                    <p>A wonderful serenity has take possession of my entire soul like these sweet
                                        morning of spare which enjoy whole heart.A wonderful serenity has take
                                        possession of my entire soul like these sweet morning
                                        of spare which enjoy whole heart.</p>
                                    <button class="btn btn-primary me-2"><span class=""><i
                                                class="fa fa-heart"></i></span>Like</button>
                                    <button class="btn btn-secondary" data-bs-toggle="modal"
                                        data-bs-target="#replyModal"><span class=""><i
                                                class="fa fa-reply"></i></span>Reply</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 p-lg-4 ">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="card border shadow-sm">
                                <img src="{{ asset('images/semic2.jpg') }}" alt="" class="img-fluid w-100 rounded"
                                    width="100" height="100">
                                <div class="card-body">
                                    <a class="post-title" href="post-details.html">
                                        <h3 class="text-black">Collection of textile samples lay spread</h3>
                                    </a>
                                    <p>A wonderful serenity has take possession of my entire soul like these sweet
                                        morning of spare which enjoy whole heart.A wonderful serenity has take
                                        possession of my entire soul like these sweet morning
                                        of spare which enjoy whole heart.</p>
                                    <button class="btn btn-primary me-2"><span class=""><i
                                                class="fa fa-heart"></i></span>Like</button>
                                    <button class="btn btn-secondary" data-bs-toggle="modal"
                                        data-bs-target="#replyModal"><span class=""><i
                                                class="fa fa-reply"></i></span>Reply</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 p-lg-4 ">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="card border shadow-sm">
                                <img src="{{ asset('images/semic2.jpg') }}" alt="" class="img-fluid w-100 rounded"
                                    width="100" height="100">
                                <div class="card-body">
                                    <a class="post-title" href="post-details.html">
                                        <h3 class="text-black">Collection of textile samples lay spread</h3>
                                    </a>
                                    <p>A wonderful serenity has take possession of my entire soul like these sweet
                                        morning of spare which enjoy whole heart.A wonderful serenity has take
                                        possession of my entire soul like these sweet morning
                                        of spare which enjoy whole heart.</p>
                                    <button class="btn btn-primary me-2"><span class=""><i
                                                class="fa fa-heart"></i></span>Like</button>
                                    <button class="btn btn-secondary" data-bs-toggle="modal"
                                        data-bs-target="#replyModal"><span class=""><i
                                                class="fa fa-reply"></i></span>Reply</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 p-lg-4 ">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="card border shadow-sm">
                                <img src="{{ asset('images/semic2.jpg') }}" alt="" class="img-fluid w-100 rounded"
                                    width="100" height="100">
                                <div class="card-body">
                                    <a class="post-title" href="post-details.html">
                                        <h3 class="text-black">Collection of textile samples lay spread</h3>
                                    </a>
                                    <p>A wonderful serenity has take possession of my entire soul like these sweet
                                        morning of spare which enjoy whole heart.A wonderful serenity has take
                                        possession of my entire soul like these sweet morning
                                        of spare which enjoy whole heart.</p>
                                    <button class="btn btn-primary me-2"><span class=""><i
                                                class="fa fa-heart"></i></span>Like</button>
                                    <button class="btn btn-secondary" data-bs-toggle="modal"
                                        data-bs-target="#replyModal"><span class=""><i
                                                class="fa fa-reply"></i></span>Reply</button>
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
