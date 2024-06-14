<?php

namespace App\Http\Controllers\Offer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    //
    public function index()
    {


        $page = 'offer';

        $currentLocale = app()->currentLocale();

        return view('offer.index-' . $currentLocale, compact('page'));
    }
}
