@props(['article'])

<a class="group border border-gray-200 flex flex-col h-full bg-white shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]"
    href="{{ route('articles.show', $article) }}">
    <div class="h-40 flex flex-col justify-center items-center bg-blue-600 rounded-t-xl overflow-hidden relative">
        <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
            src="{{ $article->image ?? 'https://images.unsplash.com/photo-1633356122544-f134324a6cee?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' }}"
            alt="{{ $article->title }}">
        @if($article->categories->isNotEmpty())
            <span
                class="absolute top-3 right-3 py-1 px-3 rounded-full text-xs font-medium bg-white/90 text-gray-800 shadow-sm backdrop-blur-sm">
                {{ $article->categories->first()->name }}
            </span>
        @endif
    </div>
    <div class="p-4 flex-grow">
        <!-- Tags -->
        <div class="flex flex-wrap items-center gap-2 mb-3">
            @foreach($article->tags->take(3) as $tag)
                <span class="px-2 py-1 bg-gray-100 text-xs text-gray-600 rounded hover:bg-gray-200 transition">
                    #{{ $tag->name }}
                </span>
            @endforeach
        </div>
        <h3
            class="text-xl font-semibold text-gray-800 dark:text-gray-300 group-hover:text-primary-600 dark:group-hover:text-white">
            {{ $article->title }}
        </h3>
        <p class="mt-3 text-gray-500 dark:text-gray-400 line-clamp-3">
            {{ Str::limit(strip_tags($article->content), 120) }}
        </p>
    </div>
    <div
        class="mt-auto flex border-t border-gray-100 divide-x divide-gray-100 dark:border-gray-700 dark:divide-gray-700">
        <div class="p-4 flex items-center gap-x-3">
            <img class="w-8 h-8 rounded-full"
                src="https://ui-avatars.com/api/?name={{ urlencode($article->user->name) }}&background=random"
                alt="{{ $article->user->name }}">
            <div>
                <span class="block text-sm font-semibold text-gray-800 dark:text-gray-200">
                    {{ $article->user->name }}
                </span>
                <span class="block text-xs text-gray-500">
                    {{ $article->created_at->isoFormat('D MMM YYYY') }}
                </span>
            </div>
        </div>
        <div class="p-4 flex items-center gap-x-1 text-gray-500 border-l border-gray-100 dark:border-gray-700 ml-auto">
            <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <path
                    d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" />
            </svg>
            <span class="text-xs font-medium">{{ $article->comments_count ?? 0 }}</span>
        </div>
    </div>
</a>