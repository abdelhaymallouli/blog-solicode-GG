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
            <form action="{{ route('articles.search') }}" method="GET" class="max-w-2xl mx-auto mb-6">
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-4 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8" />
                            <path d="m21 21-4.3-4.3" />
                        </svg>
                    </div>
                    <input type="text" name="q" value="{{ request('q') }}"
                        class="py-3 px-4 ps-11 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-transparent dark:text-gray-400 dark:focus:ring-gray-600"
                        placeholder="Rechercher...">
                </div>
            </form>

            <!-- Filters -->
            <div class="flex flex-wrap justify-center gap-2">
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
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($articles as $article)
                @include('partials.article-card', ['article' => $article])
            @empty
                <div class="col-span-full text-center py-10">
                    <p class="text-gray-500">Aucun article trouvé.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-10">
            <div class="mb-4 text-center sm:text-left text-sm text-gray-700 dark:text-gray-400">
                Showing <span class="font-medium">{{ $articles->count() }}</span> of <span
                    class="font-medium">{{ $articles->total() }}</span> results
            </div>
            {{ $articles->links('components.pagination') }}
        </div>
    </div>
@endsection