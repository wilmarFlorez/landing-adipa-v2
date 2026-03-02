<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'ADIPA | Cursos de Psicología y Salud Mental')</title>

    {{-- Primary meta --}}
    <meta name="description" content="@yield('description', 'Formación continua en psicología y salud mental para profesionales. Cursos online, en vivo y presenciales.')">
    <meta name="keywords"    content="@yield('keywords', 'cursos psicología, salud mental, diplomados, formación continua, ADIPA')">
    <link rel="canonical"    href="@yield('canonical', url()->current())">

    {{-- Open Graph --}}
    <meta property="og:type"        content="@yield('og_type', 'website')">
    <meta property="og:url"         content="@yield('og_url', url()->current())">
    <meta property="og:title"       content="@yield('og_title', 'ADIPA | Cursos de Psicología y Salud Mental')">
    <meta property="og:description" content="@yield('og_description', 'Formación continua en psicología y salud mental para profesionales. Cursos online, en vivo y presenciales.')">
    <meta property="og:image"       content="@yield('og_image', asset('images/og-adipa.png'))">
    <meta property="og:locale"      content="es_CL">
    <meta property="og:site_name"   content="ADIPA">

    {{-- Twitter Card --}}
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:title"       content="@yield('twitter_title', 'ADIPA | Cursos de Psicología y Salud Mental')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Formación continua en psicología y salud mental para profesionales. Cursos online, en vivo y presenciales.')">
    <meta name="twitter:image"       content="@yield('twitter_image', asset('images/og-adipa.png'))">

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
