<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/accueil', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/articles', [ArticleController::class, 'index'])->middleware(['auth', 'verified'])->name('articles');
Route::get('/articles/create', [ArticleController::class, 'create'])->middleware(['auth', 'verified'])->name('articles.create');
Route::post('/articles', [ArticleController::class, 'store'])->middleware(['auth', 'verified'])->name('articles.store');

Route::get('/evenements', function () {
    return view('events');
})->middleware(['auth', 'verified'])->name('events');

Route::get('/formation', function () {
    return view('studies');
})->middleware(['auth', 'verified'])->name('studies');

Route::get('/classement', function () {
    return view('leaderboard');
})->middleware(['auth', 'verified'])->name('leaderboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
