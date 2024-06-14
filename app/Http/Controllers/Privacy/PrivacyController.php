<?php

namespace App\Http\Controllers\Privacy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    //
    public function index()
    {


        $page = 'privacy';

        $currentLocale = app()->currentLocale();

        return view('privacy.index-' . $currentLocale, compact('page'));
    }
}
