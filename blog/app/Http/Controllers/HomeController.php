<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
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

        $latestArticles = Article::where('status', 'published')
            ->where('id', '!=', $featuredArticle?->id)
            ->with(['user', 'tags', 'categories'])
            ->withCount('comments')
            ->latest()
            ->take(6)
            ->get();

        return view('home', compact('featuredArticle', 'latestArticles'));
    }
}
