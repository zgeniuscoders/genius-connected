<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Genius connected</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset("css/all.min.css") }}">
    <link rel='stylesheet' href='{{ asset("css/nprogess.css") }}'/>
    @vite('resources/js/app.js')
</head>
<body class="dark:bg-dark  bg-gray-200 overflow-hidden " id="app">
<router-view/>
<script src="{{ asset("js/nprogress.js") }}"></script>
</body>
</html>
