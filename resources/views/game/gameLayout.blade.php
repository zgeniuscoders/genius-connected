<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Games | @yield("title")</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset("css/all.min.css") }}">
    @yield("extra-css")
    @vite('resources/js/app.js')
</head>
<body class="dark:bg-dark bg-gray-100 relative overflow-hidden">
{{--<img src="{{ asset("images/game.svg") }}" alt="" class="absolute bottom-0" style="opacity: 10;width: 600px">--}}
@yield("main")
<script>

</script>
</body>
</html>

