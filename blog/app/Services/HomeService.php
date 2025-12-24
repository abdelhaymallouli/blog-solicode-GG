<?php

namespace App\Services;

use App\Traits\BaseServiceTrait;

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
        $latestArticles = $this->articleService->getLatestArticles(6);

        return [
            'latestArticles' => $latestArticles,
        ];
    }
}
