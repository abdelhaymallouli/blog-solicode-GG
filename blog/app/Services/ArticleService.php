<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Traits\BaseServiceTrait;

class ArticleService
{
    use BaseServiceTrait;

    /**
     * Get featured article for homepage
     */
    public function getFeaturedArticle(): ?Article
    {
        $featuredArticle = Article::where('is_featured', true)
            ->where('status', 'published')
            ->withCount('comments')
            ->latest()
            ->first();

        // If no featured article, just take the latest one
        if (!$featuredArticle) {
            $featuredArticle = Article::where('status', 'published')
                ->withCount('comments')
                ->latest()
                ->first();
        }

        return $featuredArticle;
    }

    /**
     * Get latest articles for homepage
     */
    public function getLatestArticles(int $limit = 6, ?int $excludeId = null): Collection
    {
        $query = Article::where('status', 'published')
            ->with(['user', 'tags', 'categories'])
            ->withCount('comments');

        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        return $query->latest()
            ->take($limit)
            ->get();
    }

    /**
     * Search articles with filters and pagination
     */
    public function searchArticles(array $filters = []): LengthAwarePaginator
    {
        $query = Article::where('status', 'published')
            ->with(['user', 'tags', 'categories'])
            ->withCount('comments');

        // Apply search filter
        if (!empty($filters['q'])) {
            $this->applySearchFilter($query, $filters['q'], ['title', 'content']);
        }

        // Apply category filter
        if (!empty($filters['category'])) {
            $query->whereHas('categories', function ($q) use ($filters) {
                $q->where('slug', $filters['category']);
            });
        }

        // Apply tag filter
        if (!empty($filters['tag'])) {
            $query->whereHas('tags', function ($q) use ($filters) {
                $q->where('slug', $filters['tag']);
            });
        }

        $this->applyOrder($query);
        return $this->paginateQuery($query, 9);
    }

    /**
     * Get article by slug with all relationships
     */
    public function getArticleBySlug(string $slug): Article
    {
        return Article::where('slug', $slug)
            ->where('status', 'published')
            ->with(['user', 'tags', 'categories', 'comments.user'])
            ->firstOrFail();
    }

    /**
     * Get article with all relationships for display and increment view count
     */
    public function getArticleForView(Article $article): Article
    {
        // Use existing method to load and validate
        $article = $this->getArticleForDisplay($article);

        // Increment view count
        $this->incrementViewCount($article);

        return $article;
    }

    /**
     * Get article with all relationships for display
     * Validates article is published and loads all necessary relationships
     */
    public function getArticleForDisplay(Article $article): Article
    {
        // Validate article is published
        if ($article->status !== 'published') {
            abort(404);
        }

        // Load all relationships
        $article->load(['user', 'tags', 'categories', 'comments.user']);

        return $article;
    }

    /**
     * Increment article view count
     */
    public function incrementViewCount(Article $article): void
    {
        $article->increment('view_count');
    }
}

