<?php

use Illuminate\Support\Facades\Route;
use App\Services\Localization\Localization;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Offer\OfferController;
use App\Http\Controllers\Pifagor\PifagorController;
use App\Http\Controllers\Privacy\PrivacyController;
use App\Http\Controllers\Celebrity\CelebrityController;




Route::group(
    [
        'prefix' => Localization::setLocale()
    ],
    function () {
        // ? Home
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::post('/', [HomeController::class, 'send'])->name('send');
        // ? Pifagor
        Route::get('/pifagor', [PifagorController::class, 'index'])->name('pythagoras');
        // ? Offer
        Route::get('/offer', [OfferController::class, 'index'])->name('offer');
        // ? Privacy
        Route::get('/privacy_policy', [PrivacyController::class, 'index'])->name('privacy');

        // ? Celebrity
        Route::get('/celebrities', [CelebrityController::class, 'index'])->name('celebrities');

        Route::post('/celebrities', [CelebrityController::class, 'getCelebrities'])->name('celebrities.getCelebrities');

        Route::post('/celebrities/filters', [CelebrityController::class, 'getFilters'])->name('celebrities.getFilter');

        Route::post('/celebrities/send', [CelebrityController::class, 'send'])->name('celebrities.send');
    }
);