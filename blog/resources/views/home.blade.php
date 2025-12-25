@extends('layouts.public')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">

                <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                    <div class="sm:text-center lg:text-left">
                        <!-- Badge -->
                        <div
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-100 text-blue-700 text-sm font-medium">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            <span>Formation & Développement</span>
                        </div>

                        <h1 class="text-4xl tracking-tight mt-5 font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                            <span class="block xl:inline">Apprenez à coder avec</span>
                            <span class="block text-blue-600 xl:inline">Solicode</span>
                        </h1>
                        <p
                            class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            La plateforme de ressources pour les développeurs Solicode. Retrouvez nos tutoriels fil rouge,
                            veilles technologiques et projets open-source pour maîtriser les dernières technologies.
                        </p>
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start gap-3">
                            <div class="rounded-md shadow">
                                <a href="{{ route('articles.search') }}"
                                    class="w-full flex items-center justify-center px-6 py-3 border border-transparent text-sm font-semibold rounded-lg text-white bg-blue-600 hover:bg-blue-700 md:text-base transition-all shadow-lg shadow-blue-600/20">
                                    Explorer les Articles
                                </a>
                            </div>
                            <div class="mt-3 sm:mt-0">
                                <a href="#about"
                                    class="w-full flex items-center justify-center px-6 py-3 border border-transparent text-sm font-semibold rounded-lg text-blue-700 bg-blue-100 hover:bg-blue-200 md:text-base transition-all">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    &nbsp; En savoir plus
                                </a>
                            </div>
                        </div>
                    </div>
                </main>

                <!-- Triangle Decoration for Desktop -->
                <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2"
                    fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                    <polygon points="50,0 100,0 50,100 0,100" />
                </svg>
            </div>
        </div>

        <!-- Hero Image / Illustration -->
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="{{ asset('images/banner2.jpg') }}"
                alt="Solicode Banner">
        </div>
    </div>

    <!-- Statistics Section -->
    <div class="bg-blue-900 border-t border-blue-800">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:py-16 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 gap-4 md:grid-cols-5 text-center">
                <div>
                    <p class="text-3xl font-extrabold text-white">150+</p>
                    <p class="text-blue-200">Tutoriels</p>
                </div>
                <div>
                    <p class="text-3xl font-extrabold text-white">50+</p>
                    <p class="text-blue-200">Projets</p>
                </div>
                <div>
                    <p class="text-3xl font-extrabold text-white">400+</p>
                    <p class="text-blue-200">Étudiants</p>
                </div>
                <div>
                    <p class="text-3xl font-extrabold text-white">98%</p>
                    <p class="text-blue-200">Succès</p>
                </div>
                <div class="col-span-2 md:col-span-1">
                    <p class="text-3xl font-extrabold text-white">120+</p>
                    <p class="text-blue-200">Apprenants actifs</p>
                </div>
            </div>
        </div>
    </div>

    <!-- ========== RECENT ARTICLES ========== -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
            <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">Articles Récents</h2>
            <p class="mt-1 text-gray-600 dark:text-gray-400">Découvrez les dernières publications de la communauté.
            </p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($latestArticles as $article)
                @include('partials.article-card', ['article' => $article])
            @endforeach
        </div>

        <div class="mt-12 text-center">
            <a class="inline-flex justify-center items-center gap-x-2 text-center bg-white border border-gray-200 text-gray-700 text-sm font-medium rounded-full hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-6 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-slate-800 dark:hover:text-white"
                href="{{ route('articles.search') }}">
                Voir tous les articles
                <svg class="w-2.5 h-2.5" w="16" h="16" viewBox="0 0 16 16" fill="none">
                    <path d="M5.27921 2L10.9257 7.64645C11.1209 7.84171 11.1209 8.15829 10.9257 8.35355L5.27921 14"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg>
            </a>
        </div>
    </div>
    <!-- ========== END RECENT ARTICLES ========== -->
@endsection