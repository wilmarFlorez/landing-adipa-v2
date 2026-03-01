<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'ADIPA | Cursos de Psicología y Salud Mental')</title>
    <meta name="description" content="@yield('description', 'Formación continua en psicología y salud mental para profesionales. Cursos online, en vivo y presenciales.')">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="stylesheet" href="/css/app.css">

    @stack('head')
</head>
<body>

    <a class="u-skip-link" href="#main-content">Saltar al contenido principal</a>

    @include('partials.header')

    <main id="main-content" role="main">
        @yield('content')
    </main>

    @include('partials.footer')

    <script src="/js/app.js"></script>

    @stack('scripts')

</body>
</html>
