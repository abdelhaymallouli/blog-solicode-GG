@extends('layouts.public')

@section('title', 'Recherche')

@section('content')
    <!-- Search & Filter Section -->
    <div class="relative bg-white border-b border-gray-200 dark:bg-slate-900 dark:border-gray-700 z-10">
        <!-- Optional: Background Decoration -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full pointer-events-none opacity-50">
            <div
                class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-blue-50 blur-[120px] rounded-full dark:bg-blue-900/20">
            </div>
        </div>

        <!-- Reduced max-width from 85rem to 5xl and padding from py-12 to py-10 -->
        <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="max-w-2xl mx-auto text-center mb-8">
                <h2 class="text-2xl font-extrabold md:text-3xl md:leading-tight dark:text-white tracking-tight">
                    Découvrez nos <span class="text-blue-600">Articles</span>
                </h2>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    Explorez les dernières actualités, tutoriels et astuces du monde du développement.
                </p>
            </div>

            <!-- Reduced max-width from 4xl to 3xl -->
            <form id="search-form" action="{{ route('articles.search') }}" method="GET" class="max-w-3xl mx-auto mb-6">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                @if(request('tag'))
                    <div class="mb-4 text-center">
                        <span
                            class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-sm font-medium bg-blue-100 text-blue-800 dark:bg-blue-800/30 dark:text-blue-500">
                            Tag: #{{ request('tag') }}
                            <a href="{{ route('articles.search', request()->except('tag')) }}"
                                class="flex-shrink-0 size-4 inline-flex items-center justify-center rounded-full hover:bg-blue-200 focus:outline-none focus:bg-blue-200 focus:text-blue-500 dark:hover:bg-blue-900 dark:focus:bg-blue-900">
                                <span class="sr-only">Remove tag filter</span>
                                <svg class="flex-shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </a>
                        </span>
                    </div>
                    <input type="hidden" name="tag" value="{{ request('tag') }}">
                @endif

                <div class="flex flex-col sm:flex-row gap-3">
                    <!-- Category Dropdown -->
                    <div class="relative inline-block w-full sm:w-48 flex-shrink-0">
                        <button id="filterDropdownBtn" type="button"
                            class="w-full h-12 py-2.5 px-4 inline-flex justify-between items-center gap-x-2 text-sm font-semibold rounded-xl border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 transition-all">
                            <span id="currentFilterText" class="truncate">
                                @if(request('category'))
                                    {{ ucfirst(request('category')) }}
                                @else
                                    Catégories
                                @endif
                            </span>
                            <svg id="filterChevron" class="w-4 h-4 transition-transform duration-200"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6" />
                            </svg>
                        </button>

                        <div id="filterDropdownMenu"
                            class="hidden absolute left-0 right-0 mt-2 min-w-48 bg-white border border-gray-200 rounded-xl shadow-lg dark:bg-slate-900 dark:border-gray-700 z-[70] overflow-hidden">
                            <div class="p-1.5 space-y-0.5">
                                <a href="{{ route('articles.search', request()->only('q')) }}"
                                    data-category-name="Toutes les catégories" data-category-slug=""
                                    class="filter-item flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm transition-all {{ !request('category') ? 'bg-blue-600 text-white' : 'text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' }}">
                                    Toutes les catégories
                                </a>

                                @foreach($globalCategories as $category)
                                    @php
                                        $isActive = request('category') == $category->slug;
                                    @endphp
                                    <a href="{{ route('articles.search', array_merge(request()->query(), ['category' => $category->slug])) }}"
                                        data-category-name="{{ $category->name }}" data-category-slug="{{ $category->slug }}"
                                        data-category-color="{{ $category->bg_color }}"
                                        class="filter-item flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm transition-all {{ $isActive ? 'bg-blue-600 text-white' : 'text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' }}">
                                        <i data-lucide="{{ $category->icon }}"
                                            class="w-4 h-4 {{ $isActive ? 'text-white' : $category->color }}"></i>
                                        {{ $category->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Search Input -->
                    <div class="relative group flex-grow">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-4 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400 group-focus-within:text-blue-600 transition-colors"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8" />
                                <path d="m21 21-4.3-4.3" />
                            </svg>
                        </div>
                        <input id="search-input" type="text" name="q" value="{{ request('q') }}"
                            class="h-12 py-3 px-4 ps-10 block w-full bg-white border-gray-200 shadow-sm rounded-xl text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:placeholder-gray-500 dark:focus:ring-blue-600 transition-all"
                            placeholder="Rechercher un sujet...">

                        @if(request('q') || request('category'))
                            <div class="absolute inset-y-0 end-0 flex items-center pe-2">
                                <a href="{{ route('articles.search') }}"
                                    class="p-2 text-gray-400 hover:text-red-500 transition-colors" title="Réinitialiser">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Results Grid -->
    <div id="articles-container" class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        @include('partials.articles-list')
    </div>

    @push('scripts')
        @vite(['resources/js/search.js'])
    @endpush
@endsection