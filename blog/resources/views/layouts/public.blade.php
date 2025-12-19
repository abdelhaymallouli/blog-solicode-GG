<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoliCode Blog - @yield('title', 'Accueil')</title>

    <!-- Google Fonts Inter & Outfit -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@500;600;700&display=swap"
        rel="stylesheet">

    <!-- Vite Assets (Tailwind CSS + JS) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=typography"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'Arial', 'sans-serif'],
                        heading: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        primary: { 50: '#eff6ff', 100: '#dbeafe', 200: '#bfdbfe', 300: '#93c5fd', 400: '#60a5fa', 500: '#3b82f6', 600: '#2563eb', 700: '#1d4ed8', 800: '#1e40af', 900: '#1e3a8a', 950: '#172554' }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50 flex flex-col min-h-screen dark:bg-slate-900">

    @include('partials.nav')

    <main class="flex-grow">
        @yield('content')
    </main>

    @include('partials.footer')

    <script>
        // Simple dropdown toggle with debugging
        document.addEventListener('DOMContentLoaded', function () {
            const dropdownBtn = document.getElementById('categoriesDropdownBtn');
            const dropdown = document.getElementById('categoriesDropdown');
            const chevron = document.getElementById('categoriesChevron');

            console.log('Dropdown elements:', { btn: !!dropdownBtn, menu: !!dropdown });

            if (dropdownBtn && dropdown) {
                dropdownBtn.addEventListener('click', function (e) {
                    console.log('Dropdown button clicked');
                    e.stopPropagation();
                    const isHidden = dropdown.classList.contains('hidden');

                    if (isHidden) {
                        dropdown.classList.remove('hidden');
                        if (chevron) chevron.classList.add('rotate-180');
                        console.log('Dropdown opened');
                    } else {
                        dropdown.classList.add('hidden');
                        if (chevron) chevron.classList.remove('rotate-180');
                        console.log('Dropdown closed');
                    }
                });

                document.addEventListener('click', function (e) {
                    if (!dropdown.contains(e.target) && !dropdownBtn.contains(e.target)) {
                        if (!dropdown.classList.contains('hidden')) {
                            dropdown.classList.add('hidden');
                            if (chevron) chevron.classList.remove('rotate-180');
                            console.log('Dropdown closed by outside click');
                        }
                    }
                });
            }
        });
    </script>

    @stack('scripts')
</body>

</html>