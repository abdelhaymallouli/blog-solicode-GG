@extends('layouts.public')

@section('content')
    <!-- ========== HERO ========== -->
    <!-- <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div
                class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden dark:bg-slate-800 dark:border-gray-700">
                <div class="relative overflow-hidden">
                    <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-20">
                        <div class="text-center">
                            <h1 class="text-4xl sm:text-6xl font-bold text-gray-800 tracking-tight dark:text-white">
                                Apprendre, Construire, <span class="text-primary-600">Coder.</span>
                            </h1>
                            <p class="mt-3 text-lg text-gray-600 max-w-2xl mx-auto dark:text-gray-400">
                                La plateforme de ressources pour les développeurs Solicode. Retrouvez nos tutoriels fil
                                rouge, veilles technologiques et projets open-source.
                            </p>
                            <div class="mt-7 sm:mt-12 mx-auto max-w-xl relative">
                                <form action="{{ route('articles.search') }}" method="GET">
                                    <div class="relative z-10 flex gap-x-3 p-3 bg-white border rounded-lg shadow-lg shadow-gray-100 dark:bg-slate-900 dark:border-gray-700 dark:shadow-gray-900/[.2]">
                                        <div class="w-full">
                                            <label for="hs-search-article-1" class="sr-only">Rechercher</label>
                                            <input 
                                                type="text" 
                                                name="q" 
                                                id="hs-search-article-1"
                                                class="py-2.5 px-4 block w-full border-transparent rounded-lg text-gray-800 placeholder-gray-400 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none transition-colors dark:bg-slate-800 dark:text-gray-200 dark:placeholder-gray-500 dark:focus:bg-slate-700 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                                placeholder="Rechercher un tutoriel, une techno...">
                                        </div>
                                        <div>
                                            <button 
                                                type="submit"
                                                class="w-[46px] h-[46px] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 active:bg-blue-800 transition-all disabled:opacity-50 disabled:pointer-events-none">
                                                <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="11" cy="11" r="8" />
                                                    <path d="m21 21-4.3-4.3" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <div class="hidden md:block absolute top-0 end-0 -translate-y-4 translate-x-20">
                                    <svg class="w-16 h-auto text-orange-500" width="121" height="135" viewBox="0 0 121 135"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 16.4754C11.7688 27.4499 21.2452 57.3224 5 89.0164" stroke="currentColor"
                                            stroke-width="10" stroke-linecap="round" />
                                        <path d="M33.6761 112.104C44.6984 98.1239 74.2618 57.7976 83.8341 5"
                                            stroke="currentColor" stroke-width="10" stroke-linecap="round" />
                                        <path d="M50.5525 130C65.9472 120.269 112.917 75.3405 116 19.4913" stroke="currentColor"
                                            stroke-width="10" stroke-linecap="round" />
                                    </svg>
                                </div>
                                <div class="hidden md:block absolute bottom-0 start-0 translate-y-5 -translate-x-24">
                                    <svg class="w-40 h-auto text-cyan-500" width="347" height="188" viewBox="0 0 347 188"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4 82.4591C54.7956 92.8751 30.9771 162.782 68.2065 181.385C112.642 203.59 127.943 78.57 122.161 25.5053C120.504 2.2376 93.4028 -8.11128 89.7468 25.5053C85.8633 61.2125 130.186 199.678 180.982 146.248L214.898 107.02C224.322 95.4118 242.9 79.2851 258.6 107.02C254.247 79.9695 248.647 55.8699 256.886 26.1882C265.408 -4.49854 300.957 7.03741 319.664 32.7441"
                                            stroke="currentColor" stroke-width="10" stroke-linecap="round" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    <!-- ========== END HERO ========== -->

    <!-- ========== HERO ========== -->
    <div class="relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 -z-10">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-50 via-white to-indigo-50"></div>
            <div class="absolute inset-0"
                style="background-image: radial-gradient(circle at 1px 1px, rgb(229 231 235 / 0.4) 1px, transparent 0); background-size: 40px 40px;">
            </div>
        </div>

        <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="space-y-8">
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

                    <!-- Main Heading -->
                    <div>
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-900 leading-tight">
                            Apprenez à coder avec
                            <span class="text-blue-600 block mt-2">Solicode</span>
                        </h1>
                        <p class="mt-6 text-lg text-gray-600 leading-relaxed">
                            La plateforme de ressources pour les développeurs Solicode. Retrouvez nos tutoriels fil rouge,
                            veilles technologiques et projets open-source pour maîtriser les dernières technologies.
                        </p>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('articles.search') }}"
                            class="inline-flex items-center gap-2 px-6 py-3.5 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-all shadow-lg shadow-blue-600/30 hover:shadow-xl hover:shadow-blue-600/40 hover:-translate-y-0.5">
                            <span>Explorer les Articles</span>
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                        <a href="#about"
                            class="inline-flex items-center gap-2 px-6 py-3.5 bg-white text-gray-700 font-semibold rounded-lg border-2 border-gray-200 hover:border-blue-600 hover:text-blue-600 transition-all">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>En savoir plus</span>
                        </a>
                    </div>

                    <!-- Stats -->
                    <!-- <div class="grid grid-cols-3 gap-6 pt-8 border-t border-gray-200">
                        <div>
                            <div class="text-3xl font-bold text-gray-900">150+</div>
                            <div class="text-sm text-gray-600 mt-1">Tutoriels</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-gray-900">50+</div>
                            <div class="text-sm text-gray-600 mt-1">Projets</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-gray-900">1000+</div>
                            <div class="text-sm text-gray-600 mt-1">Étudiants</div>
                        </div>
                    </div> -->
                </div>

                <!-- Right Image -->
                <div class="relative lg:order-last order-first">
                    <!-- Main Image Container -->
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                        <!-- Replace this image URL with your school image -->
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=2071&auto=format&fit=crop"
                            alt="Solicode Students" class="w-full h-[500px] object-cover" />
                        <!-- Overlay gradient -->
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/20 to-transparent"></div>
                    </div>

                    <!-- Floating Cards -->
                    <div
                        class="absolute -bottom-6 -left-6 bg-white rounded-xl shadow-xl p-4 border border-gray-100 max-w-[200px]">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-lg bg-green-100 flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <div class="text-lg font-bold text-gray-900">98%</div>
                                <div class="text-xs text-gray-600">Taux de réussite</div>
                            </div>
                        </div>
                    </div>

                    <div class="absolute -top-6 -right-6 bg-white rounded-xl shadow-xl p-4 border border-gray-100">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-lg bg-blue-100 flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <div>
                                <div class="text-lg font-bold text-gray-900">120+</div>
                                <div class="text-xs text-gray-600">Apprenants actifs</div>
                            </div>
                        </div>
                    </div>

                    <!-- Decorative Elements -->
                    <div
                        class="absolute -z-10 -top-10 -right-10 w-72 h-72 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse">
                    </div>
                    <div class="absolute -z-10 -bottom-11 -left-10 w-72 h-72 bg-indigo-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse"
                        style="animation-delay: 2s;"></div>
                </div>
            </div>
        </div>

        <!-- Bottom Wave -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg class="w-full h-auto text-white" viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg"
                preserveAspectRatio="none">
                <path
                    d="M0 0L60 10C120 20 240 40 360 46.7C480 53 600 47 720 43.3C840 40 960 40 1080 46.7C1200 53 1320 67 1380 73.3L1440 80V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0V0Z"
                    fill="currentColor" />
            </svg>
        </div>
    </div>
    <!-- ========== END HERO ========== -->

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