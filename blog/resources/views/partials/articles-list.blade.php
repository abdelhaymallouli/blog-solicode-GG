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