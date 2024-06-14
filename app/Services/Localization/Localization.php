<?php

namespace App\Services\Localization;

use Illuminate\Support\Facades\App;

class Localization
{
    public static function setLocale()
    {
        $locale = request()->segment(1);

        if ($locale && $locale == 'uk') {

            return '';
        }

        if ($locale && in_array($locale, config('app.available_locales'))) {
            App::setLocale($locale);
            return $locale;
        }

        App::setLocale('uk');

        return '';
    }
}