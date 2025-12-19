<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/articles/{article}', [ArticleController::class, 'show'])
    ->name('articles.show');

Route::get('/search', [HomeController::class, 'index'])->name('articles.search');
