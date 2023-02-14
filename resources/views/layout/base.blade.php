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
    <meta name="description" content="@yield('page_description', $page_description ?? '')" />
    <meta property="og:title" content="UEMA - Universidade Estadual do Maranhão" />
    @php
        $title = config('temauema.prefix_name') . ' ' . config('temauema.name') . ' ' . config('temauema.sufix_name');
    @endphp
    <meta property="og:description" content="{{ $title }}" />
    <meta property="og:image" content="https://zenix.dexignzone.com/laravel/social-image.png" />
    <meta name="format-detection" content="telephone=no">
    <title>{{ $title }}</title>
    <link rel="icon" type="image/ico" sizes="16x16"
        href="{{ asset(config('importations.base.favicon')) }}">

    @php
        $plugins = isset($plugins) ? $plugins : [];
    @endphp

    @foreach ($plugins as $plugin)
        @foreach (config('temauema.importations.plugins.' . $plugin . '.css') as $style)
            <link href="{{ asset($style) }}" rel="stylesheet" type="text/css" />
        @endforeach
    @endforeach

    {{-- css para todas as blades --}}
    @foreach (config('temauema.importations.base.css') as $style)
        <link href="{{ asset($style) }}" rel="stylesheet" type="text/css" />
    @endforeach
</head>

<body>
    @yield('body')

    {{-- js para todas as blades --}}
    @foreach (config('temauema.importations.base.js.top') as $script)
        <script src="{{ asset($script) }}" type="text/javascript"></script>
    @endforeach

    @foreach ($plugins as $plugin)
        @foreach (config('temauema.importations.plugins.' . $plugin . '.js') as $script)
            <script src="{{ asset($script) }}" type="text/javascript"></script>
        @endforeach
    @endforeach

    {{-- js para todas as blades --}}
    @foreach (config('temauema.importations.base.js.bottom') as $script)
        <script src="{{ asset($script) }}" type="text/javascript"></script>
    @endforeach
    @yield('scripts')
</body>

</html>
