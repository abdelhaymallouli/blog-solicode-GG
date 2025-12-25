<header
    class="sticky top-0 z-50 flex flex-wrap sm:justify-start sm:flex-nowrap w-full bg-white/90 backdrop-blur-xl border-b border-gray-200 text-sm py-3 dark:bg-slate-900/90 dark:border-gray-700 transition-all duration-300 shadow-sm">
    <nav class="max-w-[85rem] w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between" aria-label="Global">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <a class="flex-none inline-flex items-center group" href="{{ route('home') }}">
                <img src="{{ asset('images/solicode-logo.png') }}" alt="SoliCode Logo"
                    class="h-20 w-auto group-hover:scale-105 transition-transform duration-300">
            </a>

            <!-- Mobile Button -->
            <div class="sm:hidden">
                <button type="button" id="navbar-toggle"
                    class="p-2 inline-flex justify-center items-center gap-2 rounded-lg border border-gray-200 font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800"
                    aria-controls="navbar-collapse" aria-label="Toggle navigation">
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
        <div id="navbar-collapse" class="hidden transition-all duration-300 basis-full grow sm:block">
            <div
                class="flex flex-col gap-y-4 gap-x-0 mt-5 sm:flex-row sm:items-center sm:justify-end sm:gap-y-0 sm:gap-x-3 sm:mt-0 sm:pl-7">

                <!-- Home Link -->
                <a class="inline-flex items-center gap-x-2 font-medium {{ Route::is('home') ? 'text-blue-600 bg-blue-50 dark:bg-blue-900/20 dark:text-blue-500' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-800' }} py-2 px-3 rounded-lg transition-colors"
                    href="{{ route('home') }}">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                        <polyline points="9 22 9 12 15 12 15 22" />
                    </svg>
                    Accueil
                </a>

                <!-- Categories Dropdown -->
                <div class="relative">
                    <button id="categoriesDropdownBtn" type="button"
                        class="inline-flex items-center gap-x-2 w-full sm:w-auto text-gray-600 hover:text-gray-900 font-medium py-2 px-3 rounded-lg hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-800 transition-all {{ in_array(request('category'), ['laravel', 'php', 'android', 'design', 'education', 'activities']) ? 'text-blue-600 bg-blue-50 dark:bg-blue-900/20 dark:text-blue-500' : '' }}">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="7" height="7" />
                            <rect x="14" y="3" width="7" height="7" />
                            <rect x="14" y="14" width="7" height="7" />
                            <rect x="3" y="14" width="7" height="7" />
                        </svg>
                        Catégories
                        <svg id="categoriesChevron" class="w-4 h-4 transition-transform duration-200"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </button>

                    <div id="categoriesDropdown"
                        class="hidden absolute top-full left-0 sm:left-auto sm:right-0 mt-2 w-48 bg-white sm:shadow-xl rounded-lg p-2 dark:bg-gray-800 border border-gray-200 dark:border-gray-700"
                        style="z-index: 9999;">

                        <!-- Laravel -->
                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm font-medium {{ request('category') == 'laravel' ? 'text-blue-600 bg-blue-50 dark:bg-blue-900/30 dark:text-blue-400' : 'text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' }} transition-colors"
                            href="{{ route('articles.search', ['category' => 'laravel']) }}">
                            <svg class="w-4 h-4 text-red-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="m12 19 7-7 3 3-7 7-3-3z" />
                                <path d="m18 13-1.5-7.5L2 2l3.5 14.5L13 18l5-5z" />
                                <path d="m2 2 7.586 7.586" />
                                <circle cx="11" cy="11" r="2" />
                            </svg>
                            Laravel
                        </a>

                        <!-- PHP -->
                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm font-medium {{ request('category') == 'php' ? 'text-blue-600 bg-blue-50 dark:bg-blue-900/30 dark:text-blue-400' : 'text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' }} transition-colors"
                            href="{{ route('articles.search', ['category' => 'php']) }}">
                            <svg class="w-4 h-4 text-indigo-500" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2a10 10 0 1 0 10 10 4 4 0 0 1-5-5 4 4 0 0 1-5-5" />
                                <path d="M8.5 8.5v.01" />
                                <path d="M16 12v.01" />
                                <path d="M12 16v.01" />
                            </svg>
                            PHP
                        </a>

                        <!-- Android -->
                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm font-medium {{ request('category') == 'android' ? 'text-blue-600 bg-blue-50 dark:bg-blue-900/30 dark:text-blue-400' : 'text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' }} transition-colors"
                            href="{{ route('articles.search', ['category' => 'android']) }}">
                            <svg class="w-4 h-4 text-green-500" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <rect width="14" height="20" x="5" y="2" rx="2" ry="2" />
                                <path d="M12 18h.01" />
                            </svg>
                            Android
                        </a>

                        <!-- Design -->
                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm font-medium {{ request('category') == 'design' ? 'text-blue-600 bg-blue-50 dark:bg-blue-900/30 dark:text-blue-400' : 'text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' }} transition-colors"
                            href="{{ route('articles.search', ['category' => 'design']) }}">
                            <svg class="w-4 h-4 text-pink-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="m21.64 3.64-1.28-1.28a1.21 1.21 0 0 0-1.72 0L2.36 18.64a1.21 1.21 0 0 0 0 1.72l1.28 1.28a1.2 1.2 0 0 0 1.72 0L21.64 5.36a1.2 1.2 0 0 0 0-1.72Z" />
                                <path d="m14 7 3 3" />
                                <path d="M5 6v4" />
                                <path d="M19 14v4" />
                                <path d="M10 2v2" />
                                <path d="M7 8H3" />
                                <path d="M21 16h-4" />
                                <path d="M11 3H9" />
                            </svg>
                            Design
                        </a>

                        <!-- Education -->
                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm font-medium {{ request('category') == 'education' ? 'text-blue-600 bg-blue-50 dark:bg-blue-900/30 dark:text-blue-400' : 'text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' }} transition-colors"
                            href="{{ route('articles.search', ['category' => 'education']) }}">
                            <svg class="w-4 h-4 text-amber-500" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 10v6M2 10l10-5 10 5-10 5z" />
                                <path d="M6 12v5c3 3 9 3 12 0v-5" />
                            </svg>
                            Education
                        </a>

                        <!-- Activities -->
                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm font-medium {{ request('category') == 'activities' ? 'text-blue-600 bg-blue-50 dark:bg-blue-900/30 dark:text-blue-400' : 'text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' }} transition-colors"
                            href="{{ route('articles.search', ['category' => 'activities']) }}">
                            <svg class="w-4 h-4 text-cyan-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.71-2.16 0-3" />
                                <path d="m2.3 2.3 7.2 7.2" />
                                <path d="m14 11 9-9" />
                                <path d="m9 14-7 9" />
                                <path d="m21.7 21.7-7.2-7.2" />
                                <path d="M11 14c-1.26 1.5-5 2-5 2s.5-3.74 2-5c.84-.71 2.16-.71 3 0" />
                                <path d="M13 10c1.26-1.5 5-2 5-2s-.5 3.74-2 5c-.84.71-2.16.71-3 0" />
                            </svg>
                            Activities
                        </a>
                    </div>
                </div>

                <!-- Search Input -->
                <div class="flex-1 max-w-xs mx-auto sm:mx-0">
                    <form action="{{ route('articles.search') }}" method="GET" class="relative group">
                        <input type="text" name="q" value="{{ request('q') }}"
                            class="h-9 py-2 px-4 ps-10 block w-full bg-gray-100 border-transparent rounded-xl text-sm focus:bg-white focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-800 dark:border-transparent dark:text-gray-300 dark:placeholder-gray-500 dark:focus:ring-blue-600 transition-all font-medium"
                            placeholder="Rechercher...">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-3.5 h-3.5 text-gray-400 group-focus-within:text-blue-600 transition-colors"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8" />
                                <path d="m21 21-4.3-4.3" />
                            </svg>
                        </div>
                    </form>
                </div>

                <div class="hidden sm:block w-px h-6 bg-gray-300 dark:bg-gray-700 mx-2"></div>

                <!-- Auth Buttons -->
                <!-- <div class="flex flex-col sm:flex-row gap-2 sm:gap-3 items-center">
                    <a class="font-medium text-gray-600 hover:text-blue-600 hover:bg-blue-50 py-2 px-3 rounded-lg transition-all dark:text-gray-400 dark:hover:text-blue-500 dark:hover:bg-blue-900/20"
                        href="#">Connexion</a>
                    <a class="py-2.5 px-5 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent bg-blue-600 text-white hover:bg-blue-700 transition-all shadow-sm"
                        href="#">S'inscrire</a>
                </div> -->
            </div>
        </div>
    </nav>
</header>