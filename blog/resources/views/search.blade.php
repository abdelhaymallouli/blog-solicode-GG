@extends('layouts.public')

@section('title', 'Recherche')

@section('content')
    <!-- Search & Filter Section -->
    <div class="bg-white border-b border-gray-200 dark:bg-slate-800 dark:border-gray-700">
        <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="max-w-2xl mx-auto text-center mb-8">
                <h2 class="text-2xl font-bold md:text-3xl md:leading-tight dark:text-white">Rechercher dans le blog
                </h2>
            </div>

            <!-- Search Bar -->
            <form id="search-form" action="{{ route('articles.search') }}" method="GET" class="max-w-2xl mx-auto mb-6">
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-4 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8" />
                            <path d="m21 21-4.3-4.3" />
                        </svg>
                    </div>
                    <input id="search-input" type="text" name="q" value="{{ request('q') }}"
                        class="py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-transparent dark:text-gray-400 dark:focus:ring-gray-600"
                        placeholder="Rechercher...">
                </div>
            </form>

            <!-- Filters -->
            <div id="category-filters" class="flex flex-wrap justify-center gap-2">
                <a href="{{ route('articles.search') }}"
                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent {{ !request('category') ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800 hover:bg-gray-200' }}">
                    Tous
                </a>
                @foreach(['laravel', 'php', 'android', 'design'] as $cat)
                    <a href="{{ route('articles.search', ['category' => $cat]) }}"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent {{ request('category') == $cat ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800 hover:bg-gray-200' }} uppercase">
                        {{ $cat }}
                    </a>
                @endforeach
            </div>
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
                const filterLinks = document.querySelectorAll('#category-filters a');

                // Debounce function to limit request rate
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
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            container.style.opacity = '1';
                        });
                }

                function attachPaginationListeners() {
                    // Target Laravel Tailwind pagination links specifically
                    const links = container.querySelectorAll('nav[role="navigation"] a');
                    links.forEach(link => {
                        link.addEventListener('click', function (e) {
                            e.preventDefault();
                            fetchArticles(this.href);
                        });
                    });
                }

                // Perform search
                const performSearch = () => {
                    if (!searchForm) return;
                    const url = new URL(searchForm.action);
                    const params = new URLSearchParams(new FormData(searchForm));

                    // Keep existing category filter if present in URL
                    const currentUrl = new URL(window.location.href);
                    if (currentUrl.searchParams.has('category')) {
                        params.append('category', currentUrl.searchParams.get('category'));
                    }

                    url.search = params.toString();
                    fetchArticles(url.toString());
                };

                // Search Input with Debounce
                if (searchInput) {
                    searchInput.addEventListener('input', debounce(performSearch, 300));
                }

                // Search Form Submit
                if (searchForm) {
                    searchForm.addEventListener('submit', function (e) {
                        e.preventDefault();
                        performSearch();
                    });
                }

                // Category Filters
                filterLinks.forEach(link => {
                    link.addEventListener('click', function (e) {
                        e.preventDefault();

                        // Update active state visual
                        filterLinks.forEach(l => {
                            l.classList.remove('bg-blue-100', 'text-blue-800');
                            l.classList.add('bg-gray-100', 'text-gray-800');
                        });
                        this.classList.remove('bg-gray-100', 'text-gray-800');
                        this.classList.add('bg-blue-100', 'text-blue-800');

                        fetchArticles(this.href);
                    });
                });

                // Initial pagination listeners
                attachPaginationListeners();

                // Handle browser back/forward buttons
                window.addEventListener('popstate', function () {
                    fetchArticles(window.location.href);
                });
            });
        </script>
    @endpush
@endsection