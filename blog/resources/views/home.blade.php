
@extends('layouts.app')

@section('content')

<main class="flex-grow">
    <!-- ========== HERO ========== -->
    <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-10">
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
            @forelse($articles as $article)
                <a class="group border border-gray-200 flex flex-col h-full bg-white shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]"
                    href="{{-- TODO: Replace with real article route, e.g. route('articles.show', $article->slug) --}}#">
                    <div class="h-40 flex flex-col justify-center items-center bg-blue-600 rounded-t-xl overflow-hidden relative">
                        <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                            src="{{ $article->featured_image ?? 'https://images.unsplash.com/photo-1633356122544-f134324a6cee?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' }}"
                            alt="{{ $article->title }}">
                        <span class="absolute top-3 right-3 py-1 px-3 rounded-full text-xs font-medium bg-white/90 text-gray-800 shadow-sm backdrop-blur-sm">
                            {{ $article->category->name ?? 'Catégorie' }}
                        </span>
                    </div>
                    <div class="p-4 flex-grow">
                        <div class="flex items-center gap-x-2 mb-3">
                            @foreach($article->tags as $tag)
                                <span class="px-2 py-1 bg-gray-100 text-xs text-gray-600 rounded hover:bg-gray-200 transition">#{{ $tag->name }}</span>
                            @endforeach
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-300 group-hover:text-primary-600 dark:group-hover:text-white">
                            {{ $article->title }}
                        </h3>
                        <p class="mt-3 text-gray-500 dark:text-gray-400 line-clamp-3">
                            {{ Str::limit(strip_tags($article->content), 150) }}
                        </p>
                    </div>
                    <div class="mt-auto flex border-t border-gray-100 divide-x divide-gray-100 dark:border-gray-700 dark:divide-gray-700">
                        <div class="p-4 flex items-center gap-x-3">
                            <img class="w-8 h-8 rounded-full"
                                src="{{ $article->author->avatar ?? 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?...'}}"
                                alt="{{ $article->author->name ?? 'Auteur' }}">
                            <div>
                                <span class="block text-sm font-semibold text-gray-800 dark:text-gray-200">
                                    {{ $article->author->name ?? 'Auteur' }}
                                </span>
                            </div>
                        </div>
                        <div class="p-4 flex items-center gap-x-1 text-gray-500 border-l border-gray-100 dark:border-gray-700 ml-auto">
                            <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" />
                            </svg>
                            <span class="text-xs font-medium">{{ $article->comments_count ?? 0 }}</span>
                        </div>
                    </div>
                </a>
            @empty
                <p class="col-span-full text-center text-gray-500">Aucun article pour le moment.</p>
            @endforelse
        </div>

        <div class="mt-12 text-center">
            <a class="inline-flex justify-center items-center gap-x-2 text-center bg-white border border-gray-200 text-gray-700 text-sm font-medium rounded-full hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-6 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-slate-800 dark:hover:text-white"
                href="{{ route('articles.search') }}">
                Voir tous les articles
                <svg class="w-2.5 h-2.5" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M5.27921 2L10.9257 7.64645C11.1209 7.84171 11.1209 8.15829 10.9257 8.35355L5.27921 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </a>
        </div>
    </div>
    <!-- ========== END RECENT ARTICLES ========== -->
</main>

@endsection
