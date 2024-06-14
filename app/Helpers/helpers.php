<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;


if (!function_exists('active_link')) {

    function active_link(string $name, string $class = 'active'): string
    {
        return  Route::is("$name*") ? $class : '';
    }
}


if (!function_exists('alert')) {

    function alert(string $value, string $type = 'success')
    {
        session(['alert' => $value, 'alert_type' => $type]);
    }
}

if (!function_exists('getUrlLanguage')) {

    function getUrlLanguage(string $locale)
    {

        $url = '';
        $path = '';

        $pathArr =  explode('/', Request::path());


        if (in_array($pathArr[0], config('app.available_locales'))) {
            $pathArr = array_slice($pathArr, 1);
            $path = implode('/', $pathArr);
        } else if ($pathArr[0] !== '') {
            $path = implode('/', $pathArr);
        }

        if ($locale == 'uk') {
            $url = url('/') . '/' . $path;
        } else {
            $url = url('/') . '/' .  $locale . '/' . $path;
        }



        return $url;
    }
}


if (!function_exists('clearTags')) {

    function clearTags(string $value)
    {
        return strip_tags($value);
    }
}
