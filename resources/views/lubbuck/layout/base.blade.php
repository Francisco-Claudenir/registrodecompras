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
        $title = config('lubbuck.prefix_name') . ' ' . config('lubbuck.name') . ' ' . config('lubbuck.sufix_name');
    @endphp
    <meta property="og:description" content="{{ $title }}" />
    <meta property="og:image" content="https://zenix.dexignzone.com/laravel/social-image.png" />
    <meta name="format-detection" content="telephone=no">
    <title>{{ $title }}</title>
    <link rel="icon" type="image/ico" sizes="16x16"
        href="{{ asset(config('lubbuck.importations.base.favicon')) }}">

    @php
        $importations = isset($importations) ? $importations : [];
    @endphp

    @foreach ($importations as $importation)
        @foreach (config('lubbuck.importations.plugins.' . $importation . '.css') as $style)
            <link href="{{ asset($style) }}" rel="stylesheet" type="text/css" />
        @endforeach
    @endforeach

    {{-- css para todas as blades --}}
    @foreach (config('lubbuck.importations.base.css') as $style)
        <link href="{{ asset($style) }}" rel="stylesheet" type="text/css" />
    @endforeach
</head>

<body>
    @yield('body')

    {{-- js para todas as blades --}}
    @foreach (config('lubbuck.importations.base.js.top') as $script)
        <script src="{{ asset($script) }}" type="text/javascript"></script>
    @endforeach

    @foreach ($importations as $importation)
        @foreach (config('lubbuck.importations.plugins.' . $importation . '.js') as $script)
            <script src="{{ asset($script) }}" type="text/javascript"></script>
        @endforeach
    @endforeach

    {{-- js para todas as blades --}}
    @foreach (config('lubbuck.importations.base.js.bottom') as $script)
        <script src="{{ asset($script) }}" type="text/javascript"></script>
    @endforeach
    @yield('scripts')
</body>

</html>
