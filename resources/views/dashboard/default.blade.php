<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | @yield("title")</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset("css/all.min.css") }}">
    @vite('resources/js/app.js')
</head>
<body class="dark:bg-dark bg-gray-100">
@include("dashboard.components.left-nav")
<div class="relative left-300" style="width: calc(100% - 300px);">
    @include("dashboard.components.top-nav")
    @yield("main")
</div>
</body>
</html>
