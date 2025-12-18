<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::where('status', 'published')
            ->with(['user', 'tags', 'categories'])
            ->withCount('comments');

        if ($request->has('q')) {
            $search = $request->get('q');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            });
        }

        if ($request->has('category')) {
            $slug = $request->get('category');
            $query->whereHas('categories', function ($q) use ($slug) {
                $q->where('slug', $slug);
            });
        }

        if ($request->has('tag')) {
            $slug = $request->get('tag');
            $query->whereHas('tags', function ($q) use ($slug) {
                $q->where('slug', $slug);
            });
        }

        $articles = $query->latest()->paginate(9)->withQueryString();

        if ($request->ajax()) {
            return view('partials.articles-list', compact('articles'));
        }

        return view('search', compact('articles'));
    }

    public function show(Article $article)
    {
        if ($article->status !== 'published') {
            abort(404);
        }

        // Increment view count
        $article->increment('view_count');

        $article->load(['user', 'tags', 'categories', 'comments.user']);

        return view('article', compact('article'));
    }
}
