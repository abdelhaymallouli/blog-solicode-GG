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
        $articles = $this->articleService->searchArticles($request->all());

        if ($request->ajax()) {
            return view('partials.articles-list', compact('articles'));
        }

        return view('search', compact('articles'));
    }

    public function show(Article $article)
    {
        $article = $this->articleService->getArticleForView($article);

        return view('article', compact('article'));
    }
}
