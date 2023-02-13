@extends('lubbuck.layout.base')

@section('body')
    @include('lubbuck.layout.partials.loader.dots')
    <div id="main-wrapper">
        @include('lubbuck.layout.partials.header.brand')
        @include('lubbuck.layout.partials.header.header')
        @include('lubbuck.layout.partials.left-sidebar.sidebar')
        @include('lubbuck.layout.partials.right-sidebar.sidebar')
        @include('lubbuck.layout.partials.content.wrapper')
        @include('lubbuck.layout.partials.footer.footer')
    </div>
@endsection

@section('scripts')
@endsection
