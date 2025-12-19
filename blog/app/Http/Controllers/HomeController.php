<?php

namespace App\Http\Controllers;
use App\Services\ArticleService;
use App\Services\CategoryService;
use App\Services\TagService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // create your functions here 
        public function __construct(
        private ArticleService $articleService,
        private CategoryService $categoryService,
        private TagService $tagService
    ) {}

    // Display a listing of the resource.
    public function index(Request $request)
    {
        $articles = $this->articleService->getPublicArticles($request->all());
        $categories = $this->categoryService->getCategories();
        $tags = $this->tagService->getTags();

        return view('home', compact('articles', 'categories', 'tags'));
    }
}
