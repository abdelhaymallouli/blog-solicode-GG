<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;

class HomeController extends Controller
{
    public function __construct(
        protected \App\Services\HomeService $homeService
    ) {
    }

    public function index()
    {
        $data = $this->homeService->getHomePageData();

        return view('home', $data);
    }
}
