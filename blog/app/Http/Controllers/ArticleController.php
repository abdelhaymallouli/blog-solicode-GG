<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct(
        protected ArticleService $articleService
    ) {
    }

    public function index(Request $request)
    {
        $filters = $request->only(['q', 'category', 'tag']);
        $articles = $this->articleService->searchArticles($filters);

        if ($request->ajax()) {
            return view('partials.articles-list', compact('articles'));
        }

        return view('search', compact('articles'));
    }

    public function show(Article $article)
    {
        // Validate and load article with relationships
        $article = $this->articleService->getArticleForDisplay($article);

        // Increment view count
        $this->articleService->incrementViewCount($article);

        return view('article', compact('article'));
    }
}
