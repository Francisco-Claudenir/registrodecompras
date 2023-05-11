@extends('layout.page', [
    'layout' => 'evt',
])

@section('title', ' - Login')
@section('content-header')
    <div class="container">
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
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container d-inline-flex p-2 align-items-center">
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex ">
                            <li class="nav-item">
                                <a class="nav-link active bell dz-theme-mode" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Post</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Galeria</a>
                            </li>
                        </ul>
                        <span class="navbar-text">

                        </span>
                    </div>
                </div>
            </nav>

            <div class="container d-flex justify-content-center">

                <div class="card overflow-hidden shadow w-80 mb-5 rounded" style="width: 56rem;">
                    <img src="{{ asset('images/semicbg.jpg') }}" alt="" srcset="">
                    <div class="card-body">
                        <h3 class="text-muted">Semic 2023</h3>

                        <p>A wonderful serenity has take possession of my entire soul like these sweet morning of spare
                            which enjoy whole heart.A wonderful serenity has take possession of my entire soul like these
                            sweet morning of spare which enjoy whole heart.</p>

                        <button class="btn btn-primary" type="submit">Saiba mais</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('content')




@endsection
