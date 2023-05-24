<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('page_description')" />
    <meta property="og:title"
        content="{{ config('temauema.system.name.prefix') . ' - ' . config('temauema.system.name.name') }}" />
    <meta property="og:description" content="{{ config('temauema.system.name.prefix') }}  @yield('title')" />
    <meta property="og:image" content="{{ asset(config('temauema.')) }}" />
    <meta name="format-detection" content="telephone=no">
    <title>{{ config('temauema.system.name.name') }} @yield('title')</title>
    <link rel="icon" type="image/svg" sizes="16x16" href="{{ asset(config('temauema.system.favIcon')) }}">
    <link rel="stylesheet" href="{{ asset('css/Ultis.css') }}">

    @php
        $plugins = isset($plugins) ? $plugins : [];
    @endphp

@yield('css')
    @foreach ($plugins as $plugin)
        @foreach (config('temauema.plugins.' . $plugin . '.css') as $style)
            <link href="{{ asset($style) }}" rel="stylesheet" type="text/css" />
        @endforeach
    @endforeach

    {{-- css para todas as blades --}}
    @foreach (config('temauema.css') as $style)
        <link href="{{ asset($style) }}" rel="stylesheet" type="text/css" />
    @endforeach
</head>

<body>
    @yield('body')

    {{-- js para todas as blades --}}
    @foreach (config('temauema.jsTop') as $script)
        <script src="{{ asset($script) }}" type="text/javascript"></script>
    @endforeach

    @foreach ($plugins as $plugin)
        @foreach (config('temauema.plugins.' . $plugin . '.js') as $script)
            <script src="{{ asset($script) }}" type="text/javascript"></script>
        @endforeach
    @endforeach

    {{-- js para todas as blades --}}
    <script>
        const typography = "{{ config($layout . '.typography') }}"
        const version = "{{ config($layout . '.version') }}"
        const layout = "{{ config($layout . '.layout') }}"
        const primary = "{{ config($layout . '.primary') }}"
        const headerBg = "{{ config($layout . '.headerBg') }}"
        const navheaderBg = "{{ config($layout . '.navheaderBg') }}"
        const sidebarBg = "{{ config($layout . '.sidebarBg') }}"
        const sidebarStyle = "{{ config($layout . '.sidebarStyle') }}"
        const sidebarPosition = "{{ config($layout . '.sidebarPosition') }}"
        const headerPosition = "{{ config($layout . '.headerPosition') }}"
        const containerLayout = "{{ config($layout . '.containerLayout') }}"
    </script>

    @foreach (config('temauema.jsBottom') as $script)
        <script src="{{ asset($script) }}" type="text/javascript"></script>
    @endforeach
    @yield('scripts')
</body>

</html>
