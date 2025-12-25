<?php

namespace App\Services;


class HomeService extends BaseService
{


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
