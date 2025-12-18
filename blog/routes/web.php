<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [ArticleController::class, 'index'])->name('articles.search');
Route::get('/articles/{article:slug}', [ArticleController::class, 'show'])->name('articles.show');
