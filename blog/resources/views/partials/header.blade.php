<header
    class="sticky top-0 z-50 flex flex-wrap sm:justify-start sm:flex-nowrap w-full bg-white/90 backdrop-blur-xl border-b border-gray-200 text-sm py-3 dark:bg-slate-900/90 dark:border-gray-700 transition-all duration-300 shadow-sm">
    <nav class="max-w-[85rem] w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between" aria-label="Global">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <a class="flex-none inline-flex items-center gap-x-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white group"
                href="{{ route('home') }}">
                <div
                    class="flex justify-center items-center w-8 h-8 rounded-lg bg-blue-600 text-white shadow-lg shadow-blue-600/20 group-hover:scale-105 transition-transform duration-300">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" />
                    </svg>
                </div>
                <span>Soli<span class="text-blue-600">Code</span></span>
            </a>

            <!-- Mobile Button -->
            <div class="sm:hidden">
                <button type="button"
                    class="hs-collapse-toggle p-2 inline-flex justify-center items-center gap-2 rounded-lg border border-gray-200 font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800"
                    data-hs-collapse="#navbar-collapse" aria-controls="navbar-collapse" aria-label="Toggle navigation">
                    <svg class="hs-collapse-open:hidden w-4 h-4" width="16" height="16" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                    </svg>
                    <svg class="hs-collapse-open:block hidden w-4 h-4" width="16" height="16" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Collapse -->
        <div id="navbar-collapse" class="hidden overflow-hidden transition-all duration-300 basis-full grow sm:block">
            <div
                class="flex flex-col gap-y-4 gap-x-0 mt-5 sm:flex-row sm:items-center sm:justify-end sm:gap-y-0 sm:gap-x-3 sm:mt-0 sm:pl-7">
                <!-- Links -->
                <a class="inline-flex items-center gap-x-2 font-medium {{ Route::is('home') ? 'text-blue-600 bg-blue-50 dark:bg-blue-900/20 dark:text-blue-500' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-800' }} py-2 px-3 rounded-lg transition-colors"
                    href="{{ route('home') }}" aria-current="page">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                        <polyline points="9 22 9 12 15 12 15 22" />
                    </svg>
                    Accueil
                </a>
                <a class="inline-flex items-center gap-x-2 font-medium {{ request('category') == 'laravel' ? 'text-blue-600 bg-blue-50 dark:bg-blue-900/20 dark:text-blue-500' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-800' }} py-2 px-3 rounded-lg transition-all"
                    href="{{ route('articles.search', ['category' => 'laravel']) }}">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="m12 19 7-7 3 3-7 7-3-3z" />
                        <path d="m18 13-1.5-7.5L2 2l3.5 14.5L13 18l5-5z" />
                        <path d="m2 2 7.586 7.586" />
                        <circle cx="11" cy="11" r="2" />
                    </svg>
                    Laravel
                </a>
                <a class="inline-flex items-center gap-x-2 font-medium {{ request('category') == 'php' ? 'text-blue-600 bg-blue-50 dark:bg-blue-900/20 dark:text-blue-500' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-800' }} py-2 px-3 rounded-lg transition-all"
                    href="{{ route('articles.search', ['category' => 'php']) }}">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M12 2a10 10 0 1 0 10 10 4 4 0 0 1-5-5 4 4 0 0 1-5-5" />
                        <path d="M8.5 8.5v.01" />
                        <path d="M16 12v.01" />
                        <path d="M12 16v.01" />
                        <path d="M12 11.5v-2" />
                        <path d="M16 8v3.5a2.5 2.5 0 1 0 5 0v-1.5a6 6 0 0 0-4.2-5.6" />
                    </svg>
                    PHP
                </a>
                <a class="inline-flex items-center gap-x-2 font-medium {{ request('category') == 'mobile' ? 'text-blue-600 bg-blue-50 dark:bg-blue-900/20 dark:text-blue-500' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-800' }} py-2 px-3 rounded-lg transition-all"
                    href="{{ route('articles.search', ['category' => 'mobile']) }}">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <rect width="14" height="20" x="5" y="2" rx="2" ry="2" />
                        <path d="M12 18h.01" />
                    </svg>
                    Mobile
                </a>

                <div class="hidden sm:block w-px h-6 bg-gray-300 dark:bg-gray-700 mx-2"></div>

                <div class="flex flex-col sm:flex-row gap-2 sm:gap-3 items-center">
                    <a class="font-medium text-gray-600 hover:text-blue-600 hover:bg-blue-50 py-2 px-3 rounded-lg transition-all dark:text-gray-400 dark:hover:text-blue-500 dark:hover:bg-blue-900/20"
                        href="#">Connexion</a>
                    <a class="py-2.5 px-5 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 shadow-sm"
                        href="#">S'inscrire</a>
                </div>
            </div>
        </div>
    </nav>
</header>