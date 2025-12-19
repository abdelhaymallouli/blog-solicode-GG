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

        <div class="relative max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="max-w-2xl mx-auto text-center mb-10">
                <h2 class="text-3xl font-extrabold md:text-4xl md:leading-tight dark:text-white tracking-tight">
                    Découvrez nos <span class="text-blue-600">Articles</span>
                </h2>
                <p class="mt-2 text-gray-600 dark:text-gray-400">Explorez les dernières actualités, tutoriels et astuces du
                    monde du développement.</p>
            </div>

            <!-- Unified Search & Filter Bar -->
            <form id="search-form" action="{{ route('articles.search') }}" method="GET" class="max-w-4xl mx-auto mb-12">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                <div class="flex flex-col sm:flex-row gap-3">
                    <!-- Category Dropdown -->
                    <div class="relative inline-block w-full sm:w-56 flex-shrink-0">
                        <button id="filterDropdownBtn" type="button"
                            class="w-full h-14 py-2.5 px-4 inline-flex justify-between items-center gap-x-2 text-sm font-semibold rounded-2xl border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 transition-all">
                            <span id="currentFilterText" class="truncate">
                                @if(request('category'))
                                    {{ ucfirst(request('category')) }}
                                @else
                                    Toutes les catégories
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
                                <!-- All Categories -->
                                <a href="{{ route('articles.search', request()->only('q')) }}"
                                    data-category-name="Toutes les catégories" data-category-slug=""
                                    class="filter-item flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm transition-all {{ !request('category') ? 'bg-blue-600 text-white' : 'text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' }}">
                                    Toutes les catégories
                                </a>

                                @php
                                    $categoriesMeta = [
                                        'laravel' => ['color' => 'text-red-500'],
                                        'php' => ['color' => 'text-indigo-500'],
                                        'android' => ['color' => 'text-green-500'],
                                        'design' => ['color' => 'text-pink-500']
                                    ];
                                @endphp

                                @foreach($categoriesMeta as $cat => $meta)
                                    <a href="{{ route('articles.search', array_merge(request()->query(), ['category' => $cat])) }}"
                                        data-category-name="{{ ucfirst($cat) }}" data-category-slug="{{ $cat }}"
                                        class="filter-item flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm transition-all {{ request('category') == $cat ? 'bg-blue-600 text-white' : 'text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' }}">
                                        <span
                                            class="w-2 h-2 rounded-full {{ request('category') == $cat ? 'bg-white' : str_replace('text-', 'bg-', $meta['color']) }}"></span>
                                        {{ ucfirst($cat) }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Search Input -->
                    <div class="relative group flex-grow">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-4 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400 group-focus-within:text-blue-600 transition-colors"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8" />
                                <path d="m21 21-4.3-4.3" />
                            </svg>
                        </div>
                        <input id="search-input" type="text" name="q" value="{{ request('q') }}"
                            class="h-14 py-4 px-4 ps-12 block w-full bg-white border-gray-200 shadow-sm rounded-2xl text-base focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:placeholder-gray-500 dark:focus:ring-blue-600 transition-all"
                            placeholder="Rechercher un sujet, un tutoriel...">

                        @if(request('q') || request('category'))
                            <div class="absolute inset-y-0 end-0 flex items-center pe-2">
                                <a href="{{ route('articles.search') }}"
                                    class="p-2 text-gray-400 hover:text-red-500 transition-colors" title="Réinitialiser">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const container = document.getElementById('articles-container');
                const searchForm = document.getElementById('search-form');
                const searchInput = document.getElementById('search-input');

                // Dropdown Elements
                const filterDropdownBtn = document.getElementById('filterDropdownBtn');
                const filterDropdownMenu = document.getElementById('filterDropdownMenu');
                const filterChevron = document.getElementById('filterChevron');
                const currentFilterText = document.getElementById('currentFilterText');
                const filterItems = document.querySelectorAll('.filter-item');

                function debounce(func, wait) {
                    let timeout;
                    return function (...args) {
                        clearTimeout(timeout);
                        timeout = setTimeout(() => func.apply(this, args), wait);
                    };
                }

                function fetchArticles(url) {
                    container.style.opacity = '0.5';

                    fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                        .then(response => {
                            if (!response.ok) throw new Error('Network response was not ok');
                            return response.text();
                        })
                        .then(html => {
                            container.innerHTML = html;
                            container.style.opacity = '1';
                            history.pushState(null, '', url);
                            attachPaginationListeners();

                            const currentUrl = new URL(url);
                            const category = currentUrl.searchParams.get('category');

                            // SYNC DROPDOWN UI
                            if (currentFilterText && filterItems) {
                                let found = false;
                                filterItems.forEach(item => {
                                    const dot = item.querySelector('span');
                                    if (item.dataset.categorySlug === (category || "")) {
                                        item.classList.add('bg-blue-600', 'text-white');
                                        item.classList.remove('text-gray-800', 'hover:bg-gray-100', 'dark:text-gray-400', 'dark:hover:bg-gray-700', 'dark:hover:text-white');
                                        currentFilterText.textContent = item.dataset.categoryName;
                                        if (dot) dot.classList.add('bg-white');
                                        found = true;
                                    } else {
                                        item.classList.remove('bg-blue-600', 'text-white');
                                        item.classList.add('text-gray-800', 'hover:bg-gray-100', 'dark:text-gray-400', 'dark:hover:bg-gray-700', 'dark:hover:text-white');
                                        if (dot) dot.classList.remove('bg-white');
                                    }
                                });
                                if (!found) currentFilterText.textContent = "Toutes les catégories";
                            }

                            // Update hidden input in search form
                            let hiddenInput = searchForm.querySelector('input[name="category"]');
                            if (category) {
                                if (!hiddenInput) {
                                    hiddenInput = document.createElement('input');
                                    hiddenInput.type = 'hidden';
                                    hiddenInput.name = 'category';
                                    searchForm.appendChild(hiddenInput);
                                }
                                hiddenInput.value = category;
                            } else if (hiddenInput) {
                                hiddenInput.remove();
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            container.style.opacity = '1';
                        });
                }

                function attachPaginationListeners() {
                    const links = container.querySelectorAll('nav[role="navigation"] a');
                    links.forEach(link => {
                        link.addEventListener('click', function (e) {
                            e.preventDefault();
                            fetchArticles(this.href);
                        });
                    });
                }

                const performSearch = () => {
                    if (!searchForm) return;
                    const url = new URL(searchForm.action);
                    const params = new URLSearchParams(new FormData(searchForm));
                    url.search = params.toString();
                    fetchArticles(url.toString());
                };

                if (searchInput) {
                    searchInput.addEventListener('input', debounce(performSearch, 300));
                }

                if (searchForm) {
                    searchForm.addEventListener('submit', function (e) {
                        e.preventDefault();
                        performSearch();
                    });
                }

                // Dropdown Toggle
                if (filterDropdownBtn) {
                    console.log('Filter dropdown elements initialized');
                    filterDropdownBtn.addEventListener('click', function (e) {
                        console.log('Filter button clicked');
                        e.stopPropagation();
                        filterDropdownMenu.classList.toggle('hidden');
                        filterChevron.classList.toggle('rotate-180');
                    });
                } else {
                    console.error('Filter dropdown button NOT found');
                }

                // Close Dropdown on outside click
                document.addEventListener('click', function (e) {
                    if (filterDropdownMenu && !filterDropdownMenu.contains(e.target) && !filterDropdownBtn.contains(e.target)) {
                        if (!filterDropdownMenu.classList.contains('hidden')) {
                            console.log('Closing filter dropdown from outside click');
                            filterDropdownMenu.classList.add('hidden');
                            filterChevron.classList.remove('rotate-180');
                        }
                    }
                });

                // Filter Item Clicks
                filterItems.forEach(item => {
                    item.addEventListener('click', function (e) {
                        e.preventDefault();

                        // Close menu
                        filterDropdownMenu.classList.add('hidden');
                        filterChevron.classList.remove('rotate-180');

                        // Update Button Text
                        currentFilterText.textContent = this.dataset.categoryName;

                        // Update Active Classes
                        filterItems.forEach(i => {
                            i.classList.remove('bg-blue-600', 'text-white');
                            i.classList.add('text-gray-800', 'hover:bg-gray-100', 'dark:text-gray-400', 'dark:hover:bg-gray-700', 'dark:hover:text-white');

                            // Revert dot color
                            const dot = i.querySelector('span');
                            if (dot) {
                                dot.classList.remove('bg-white');
                                const originalColor = dot.classList.value.match(/bg-\w+-\d+/);
                                if (!originalColor) {
                                    // If it was already white, we need to find its metadata color
                                    // But for simplicity, we just reload the fetch which will handle partial re-renders if needed.
                                }
                            }
                        });

                        this.classList.add('bg-blue-600', 'text-white');
                        this.classList.remove('text-gray-800', 'hover:bg-gray-100', 'dark:text-gray-400', 'dark:hover:bg-gray-700', 'dark:hover:text-white');

                        const activeDot = this.querySelector('span');
                        if (activeDot) activeDot.classList.add('bg-white');

                        fetchArticles(this.href);
                    });
                });

                attachPaginationListeners();

                window.addEventListener('popstate', function () {
                    fetchArticles(window.location.href);
                });
            });
        </script>
    @endpush
@endsection