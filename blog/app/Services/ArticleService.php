<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Services\Traits\BaseServiceTrait;

class ArticleService
{
    use BaseServiceTrait;

    /**
     * Get public articles with filters
     */
    public function getPublicArticles(array $filters = []): LengthAwarePaginator
    {
        $query = Article::query()
            ->with(['categories', 'tags', 'user', 'comments'])
            ->where('is_featured', true);

        // Search filter
        $this->applySearchFilter($query, $filters['search'] ?? null, ['title', 'content']);

        // Category filter
        if (!empty($filters['category'])) {
            $query->whereHas('categories', function ($q) use ($filters) {
                $q->where('slug', $filters['category']);
            });
        }

        // Tag filter
        if (!empty($filters['tag'])) {
            $query->whereHas('tags', function ($q) use ($filters) {
                $q->where('slug', $filters['tag']);
            });
        }

        // Order & paginate
        $this->applyOrder($query);
        return $this->paginateQuery($query, 9);
    }

    /**
     * Get single article by slug
     */
    public function getBySlug(string $slug): Article
    {
        return Article::with(['categories', 'tags', 'user', 'comments'])
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();
    }
}
