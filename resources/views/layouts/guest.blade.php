<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ route('login') ? 'login' : '' }} | Mutiara Property</title>

        <!-- Styles -->
        <link rel="stylesheet" href="/dist/css/app.css" />

    </head>
    <body class="login">
        {{ $slot }}
    </body>

    <script src="/dist/js/app.js"></script>
</html>
