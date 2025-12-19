<header
    class="sticky top-0 z-50 w-full bg-white/90 backdrop-blur border-b border-gray-200 shadow-sm">
    <nav class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-3 flex items-center justify-between">

        {{-- Logo --}}
        <a href="{{ route('home') }}"
           class="flex items-center gap-2 text-xl font-bold text-gray-900">
            <span
                class="flex items-center justify-center w-8 h-8 rounded-lg bg-blue-600 text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" />
                </svg>
            </span>
            Soli<span class="text-blue-600">Code</span>
        </a>

        {{-- Desktop Menu --}}
        <div class="hidden md:flex items-center gap-2">
            <a href="{{ route('home') }}"
               class="px-3 py-2 rounded-lg text-sm font-medium text-blue-600 bg-blue-50">
                Accueil
            </a>

            <a href="{{ route('articles.index', ['category' => 'laravel']) }}"
               class="px-3 py-2 rounded-lg text-sm text-gray-600 hover:bg-gray-100">
                Laravel
            </a>

            <a href="{{ route('articles.index', ['category' => 'php']) }}"
               class="px-3 py-2 rounded-lg text-sm text-gray-600 hover:bg-gray-100">
                PHP
            </a>

            <a href="{{ route('articles.index', ['category' => 'mobile']) }}"
               class="px-3 py-2 rounded-lg text-sm text-gray-600 hover:bg-gray-100">
                Mobile
            </a>
        </div>

        {{-- Actions --}}
        <div class="hidden md:flex items-center gap-3">
            @auth
                <span class="text-sm text-gray-600">
                    Bonjour, {{ auth()->user()->name }}
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-sm text-red-500 hover:underline">
                        Déconnexion
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}"
                   class="text-sm text-gray-600 hover:text-blue-600">
                    Connexion
                </a>

                <a href="{{ route('register') }}"
                   class="px-4 py-2 text-sm font-semibold rounded-full bg-blue-600 text-white hover:bg-blue-700">
                    S'inscrire
                </a>
            @endauth
        </div>

    </nav>
</header>
