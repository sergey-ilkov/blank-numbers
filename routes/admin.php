<?php

use App\Http\Controllers\Admin\ActorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\SuperAdminMiddleware;
use App\Http\Controllers\Admin\AdminPanelController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\CelebrityController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\OccupationController;

// ? login
Route::prefix('blankadmin')->group(function () {

    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
});


// ? role all
Route::prefix('blankadmin')->middleware('auth')->group(function () {

    Route::get('/', [AdminPanelController::class, 'index'])->name('admin.home');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});


// ? role admin and superadmin
Route::prefix('blankadmin')->middleware('auth', AdminMiddleware::class)->group(function () {

    // ? occupation
    Route::get('/occupations', [OccupationController::class, 'index'])->name('occupations.index');
    Route::get('/occupations/create', [OccupationController::class, 'create'])->name('occupations.create');
    Route::post('/occupations', [OccupationController::class, 'store'])->name('occupations.store');
    Route::get('/occupations/{id}/edit', [OccupationController::class, 'edit'])->name('occupations.edit');
    Route::patch('/occupations/{id}', [OccupationController::class, 'update'])->name('occupations.update');
    Route::delete('/occupations/{id}', [OccupationController::class, 'destroy'])->name('occupations.destroy');

    Route::get('/occupations/filter', [OccupationController::class, 'filter'])->name('occupations.filter');



    // ? actor
    Route::get('/actors', [ActorController::class, 'index'])->name('actors.index');
    Route::get('/actors/create', [ActorController::class, 'create'])->name('actors.create');
    Route::post('/actors', [ActorController::class, 'store'])->name('actors.store');
    Route::get('/actors/{id}/edit', [ActorController::class, 'edit'])->name('actors.edit');
    Route::patch('/actors/{id}', [ActorController::class, 'update'])->name('actors.update');
    Route::delete('/actors/{id}', [ActorController::class, 'destroy'])->name('actors.destroy');

    Route::get('/actors/filter', [ActorController::class, 'filter'])->name('actors.filter');

    // ? movie
    Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');

    Route::post('/movies/search', [MovieController::class, 'search'])->name('movies.search');


    Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');
    Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');
    Route::get('/movies/{id}/edit', [MovieController::class, 'edit'])->name('movies.edit');
    Route::patch('/movies/{id}', [MovieController::class, 'update'])->name('movies.update');
    Route::delete('/movies/{id}', [MovieController::class, 'destroy'])->name('movies.destroy');

    Route::get('/movies/filter', [MovieController::class, 'filter'])->name('movies.filter');


    // ? celebrity
    Route::get('/celebrities', [CelebrityController::class, 'index'])->name('celebrities.index');

    Route::post('/celebrities/search', [CelebrityController::class, 'search'])->name('celebrities.search');

    Route::get('/celebrities/create', [CelebrityController::class, 'create'])->name('celebrities.create');
    Route::post('/celebrities', [CelebrityController::class, 'store'])->name('celebrities.store');
    Route::get('/celebrities/{id}/edit', [CelebrityController::class, 'edit'])->name('celebrities.edit');
    Route::patch('/celebrities/{id}', [CelebrityController::class, 'update'])->name('celebrities.update');
    Route::delete('/celebrities/{id}', [CelebrityController::class, 'destroy'])->name('celebrities.destroy');

    Route::get('/celebrities/filter', [CelebrityController::class, 'filter'])->name('celebrities.filter');
});


// ? role superadmin
Route::prefix('blankadmin')->middleware('auth', SuperAdminMiddleware::class)->group(function () {
    // ? register
    Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    // ? languages
    Route::get('/languages', [LanguageController::class, 'index'])->name('languages.index');
    Route::get('/languages/create', [LanguageController::class, 'create'])->name('languages.create');
    Route::post('/languages', [LanguageController::class, 'store'])->name('languages.store');
    Route::get('/languages/{id}/edit', [LanguageController::class, 'edit'])->name('languages.edit');
    Route::patch('/languages/{id}', [LanguageController::class, 'update'])->name('languages.update');
    Route::delete('/languages/{id}', [LanguageController::class, 'destroy'])->name('languages.destroy');
});

// ? comment
// Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
// Route::post('/register', [RegisterController::class, 'store'])->name('register.newstore');
