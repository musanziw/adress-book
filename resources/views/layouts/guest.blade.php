<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Maadini') }}</title>
    @vite(['public/css/dashlite.min.css', 'public/js/bundle.js', 'public/js/scripts.js', 'resources/js/app.js',])
</head>
<body class="nk-body bg-white npc-general pg-auth">
<div class="nk-app-root">
    <div class="nk-main ">
        <div class="nk-wrap nk-wrap-nosidebar">
            <div class="nk-content">
                <div class="nk-block nk-block-middle nk-auth-body wide-xs">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</body>
</html>
