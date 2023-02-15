@extends('layout.base')

@section('body')
    @include('layout.partials.loader.index')
    <div id="main-wrapper">
        @include('layout.partials.brand.index')
        @include('layout.partials.header.index')

        @if (config('temauema.StyleLayout.hasSideBar'))
            @include('layout.partials.left-sidebar.index')
        @endif
        @include('layout.partials.right-sidebar.index')
        @include('layout.partials.content.index')
        @include('layout.partials.footer.index')
    </div>
@endsection

@section('scripts')
@endsection
