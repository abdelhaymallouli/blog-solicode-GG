<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoliCode Blog - @yield('title', 'Accueil')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/solicode-logo.png') }}" type="image/x-icon">

    <!-- Google Fonts Inter & Outfit -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@500;600;700&display=swap"
        rel="stylesheet">

    <!-- Vite Assets (Tailwind CSS + JS) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Tailwind CSS -->

</head>

<body class="bg-gray-50 flex flex-col min-h-screen dark:bg-slate-900">

    @include('partials.nav')

    <main class="flex-grow">
        @yield('content')
    </main>

    @include('partials.footer')

    @stack('scripts')
</body>

</html>