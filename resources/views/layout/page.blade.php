@extends('layout.base')

@php
    $layout = isset($layout) ? 'temauema.layouts.' . $layout : 'temauema.layouts.default';
@endphp

@section('body')
    @include('layout.partials.loader.index')
    <div id="main-wrapper">
        @if (config($layout . '.hasHeader'))
            @include('layout.partials.brand.index')
            @include('layout.partials.header.index')
        @endif
        @if (config($layout . '.hasSideBar'))
            @include('layout.partials.left-sidebar.index')
        @endif
        @if (config($layout . '.hasRightSidebar'))
            @include('layout.partials.right-sidebar.index')
        @endif
        @include('layout.partials.content.index')
        @if (config($layout . '.hasFooter'))
            @include('layout.partials.footer.index')
        @endif
    </div>
@endsection
