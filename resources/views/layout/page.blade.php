@extends('layout.base')

@php
    $layout = isset($layout) ? 'temauema.layouts.' . $layout : 'temauema.layouts.default';
@endphp

@section('body')
    @include('layout.partials.loader.index')
    <div id="main-wrapper">
        @include('layout.partials.brand.index')
        @include('layout.partials.header.index')
        @include('layout.partials.left-sidebar.index')
        @include('layout.partials.right-sidebar.index')
        @include('layout.partials.content.index')
        @include('layout.partials.footer.index')
    </div>
@endsection