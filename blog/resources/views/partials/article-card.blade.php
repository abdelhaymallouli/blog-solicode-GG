@props(['article'])

<a class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl hover:shadow-lg transition-all duration-300 dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]"
    href="{{ route('articles.show', $article) }}">
    <div class="h-48 flex flex-col justify-center items-center bg-blue-600 rounded-t-xl overflow-hidden relative">
        <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
            src="{{ $article->image ?? 'https://images.unsplash.com/photo-1633356122544-f134324a6cee?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' }}"
            alt="{{ $article->title }}">
        @if($article->categories->isNotEmpty())
            <span
                class="absolute top-3 right-3 py-1.5 px-3 rounded-full text-xs font-semibold bg-white text-blue-600 shadow-sm">
                {{ $article->categories->first()->name }}
            </span>
        @endif
    </div>
    <div class="p-5 flex-grow flex flex-col">
        <!-- Tags -->
        <div class="flex flex-wrap items-center gap-2 mb-4">
            @foreach($article->tags->take(3) as $tag)
                <span
                    class="px-2.5 py-1 inline-flex items-center text-xs font-medium bg-blue-50 text-blue-600 rounded-full dark:bg-blue-900/30 dark:text-blue-500">
                    #{{ $tag->name }}
                </span>
            @endforeach
        </div>

        <h3
            class="text-xl font-bold text-gray-900 dark:text-white group-hover:text-blue-600 transition-colors line-clamp-2 mb-2 font-heading">
            {{ $article->title }}
        </h3>

        <p class="text-gray-500 dark:text-gray-400 line-clamp-3 text-sm leading-relaxed flex-grow">
            {{ Str::limit(strip_tags($article->content), 120) }}
        </p>
    </div>

    <div class="mt-auto border-t border-gray-100 dark:border-gray-700">
        <div class="p-4 flex items-center justify-between">
            <div class="flex items-center gap-x-3">
                <img class="w-8 h-8 rounded-full ring-2 ring-white dark:ring-slate-900"
                    src="https://ui-avatars.com/api/?name={{ urlencode($article->user->name) }}&background=random"
                    alt="{{ $article->user->name }}">
                <div>
                    <span class="block text-sm font-semibold text-gray-800 dark:text-gray-200">
                        {{ $article->user->name }}
                    </span>
                    <span class="block text-xs text-gray-500 font-medium">
                        {{ $article->created_at->isoFormat('D MMM') }}
                    </span>
                </div>
            </div>

            <div class="flex items-center gap-x-1 text-gray-400 group-hover:text-blue-500 transition-colors">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" />
                </svg>
                <span class="text-xs font-semibold">{{ $article->comments_count ?? 0 }}</span>
            </div>
        </div>
    </div>
</a>