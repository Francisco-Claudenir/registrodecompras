@extends('lubbuck.layout.base')

@section('body')
    @include('lubbuck.layout.partials.loader.index')
    <div id="main-wrapper">
        @include('lubbuck.layout.partials.brand.index')
        @include('lubbuck.layout.partials.header.index')
        @include('lubbuck.layout.partials.left-sidebar.index')
        @include('lubbuck.layout.partials.right-sidebar.index')
        @include('lubbuck.layout.partials.content.index')
        @include('lubbuck.layout.partials.footer.index')
    </div>
@endsection

@section('scripts')
@endsection
