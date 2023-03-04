<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Genius connected | @yield("title")</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-dark h-screen flex items-center justify-center bg-cover" style="background-image: url('{{ asset("images/dot.png") }}')">
    <main>
        @yield("main_content")
    </main>
</body>
</html>
