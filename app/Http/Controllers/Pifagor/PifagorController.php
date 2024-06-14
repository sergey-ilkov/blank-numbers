<?php

namespace App\Http\Controllers\Pifagor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PifagorController extends Controller
{
    //
    public function index()
    {


        $page = 'pythagoras';

        return view('pifagor.index', compact('page'));
    }
}