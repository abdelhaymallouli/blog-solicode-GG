<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;

class HomeController extends Controller
{
    public function __construct(
        protected ArticleService $articleService
    ) {
    }

    public function index()
    {
        $featuredArticle = $this->articleService->getFeaturedArticle();
        $latestArticles = $this->articleService->getLatestArticles(6, $featuredArticle?->id);

        return view('home', compact('featuredArticle', 'latestArticles'));
    }
}
