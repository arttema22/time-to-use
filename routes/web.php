<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ClientAuthController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/article/{article:slug}', [ArticleController::class, 'show'])->name('article-show');

// Client Routes
Route::prefix('lk')->group(function () {
    Route::get('/login', [ClientAuthController::class, ''])->name('client.login');
    Route::post('/login', 'Auth\AdminAuthController@login');
    Route::post('/logout', 'Auth\AdminAuthController@logout')->name('client.logout');

    Route::middleware(['client'])->group(function () {
        Route::get('/dashboard', 'AdminDashboardController@index');
    });
});
