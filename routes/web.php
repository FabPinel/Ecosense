<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\LeaderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/accueil', [HomeController::class, 'accueil'])->middleware(['auth', 'verified'])->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/articles', [ArticleController::class, 'index'])->middleware(['auth', 'verified'])->name('articles');
Route::get('/articles/create', [ArticleController::class, 'create'])->middleware(['auth', 'verified'])->name('articles.create');
Route::post('/articles', [ArticleController::class, 'store'])->middleware(['auth', 'verified'])->name('articles.store');
Route::get('/articles/{id}', [ArticleController::class, 'getArticleById'])->name('articles.show');
Route::post('/articles/{articleId}/comment', [ArticleController::class, 'storeComment'])->name('articles.storeComment');

Route::get('/evenements', [EventController::class, 'index'])->name('events');
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/evenements/{id}', [EventController::class, 'getEventById'])->name('events.show');
Route::post('/events/{event}/participate', [EventController::class, 'toggleParticipation'])->name('events.participate');

Route::get('/formation', [StudyController::class, 'index'])->name('studies');
Route::get('/studies/create', [StudyController::class, 'create'])->name('studies.create');
Route::post('/studies', [StudyController::class, 'store'])->name('studies.store');
Route::get('/formation/{id}', [StudyController::class, 'getStudyById'])->name('studies.show');
Route::post('/studies/{study}/follow', [StudyController::class, 'toggleFollow'])->name('studies.follow');


Route::get('/classement', [LeaderController::class, 'leaderboard'])->name('leaderboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
