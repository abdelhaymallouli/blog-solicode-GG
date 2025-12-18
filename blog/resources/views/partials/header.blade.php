<header
    class="sticky top-0 z-50 w-full bg-white/90 backdrop-blur border-b border-gray-200 dark:bg-slate-900/90 dark:border-gray-700">
    <nav class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">

        {{-- Logo --}}
        <a href="{{ route('home') }}"
           class="flex items-center gap-2 text-xl font-bold text-gray-900 dark:text-white">
            <span class="w-8 h-8 flex items-center justify-center bg-blue-600 text-white rounded-lg">⌘</span>
            Soli<span class="text-blue-600">Code</span>
        </a>

        {{-- Links --}}
        <div class="hidden sm:flex items-center gap-4">
            <a href="{{ route('home') }}"
               class="px-3 py-2 rounded-lg text-sm font-medium
               {{ request()->routeIs('home') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-800' }}">
                Accueil
            </a>

            @foreach($categories ?? [] as $category)
                <a href="{{ route('search', ['category' => $category->slug]) }}"
                   class="px-3 py-2 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-800">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>

        {{-- Auth --}}
        <div class="flex items-center gap-2">
            @guest
                <a href="{{ route('login') }}"
                   class="px-3 py-2 text-sm font-medium text-gray-600 hover:text-blue-600">
                    Connexion
                </a>
                <a href="{{ route('register') }}"
                   class="px-4 py-2 bg-blue-600 text-white rounded-full text-sm font-semibold hover:bg-blue-700">
                    S'inscrire
                </a>
            @else
                <span class="text-sm text-gray-600 dark:text-gray-300">
                    {{ auth()->user()->name }}
                </span>
            @endguest
        </div>

    </nav>
</header>
