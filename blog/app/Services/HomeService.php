<?php

namespace App\Services;

use App\Services\Traits\BaseServiceTrait;

class HomeService
{
    use BaseServiceTrait;

    public function __construct(
        protected ArticleService $articleService
    ) {
    }

    /**
     * Get all data required for the homepage
     */
    public function getHomePageData(): array
    {
        $featuredArticle = $this->articleService->getFeaturedArticle();
        $latestArticles = $this->articleService->getLatestArticles(6);

        return [
            'featuredArticle' => $featuredArticle,
            'latestArticles' => $latestArticles,
        ];
    }
}
