@extends('layout.page', [
    'layout' => 'evt',
])

@section('title')
@section('content-header')
    <div class="container-fluid ">
        @component('layouts.eventos.header')
            @slot('image')
                @yield('header_img')
            @endslot
        @endcomponent
    @endsection

    @section('content-body')
        @component('layouts.eventos.body')
        @endcomponent
    @endsection

    </div>
@endsection
