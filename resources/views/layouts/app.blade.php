<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['public/css/dashlite.min.css', 'public/js/bundle.js', 'public/js/scripts.js', 'resources/css/app.js',])
</head>
<body class="nk-body bg-white has-sidebar">
<div class="nk-app-root">
    <div class="nk-main">
        @include('partials.sidebar')
        <div class="nk-wrap ">
            {{ $slot }}
        </div>
    </div>
</div>
</body>
</html>
