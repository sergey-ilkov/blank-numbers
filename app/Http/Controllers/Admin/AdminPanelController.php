<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Actor;
use App\Models\Admin\Celebrity;
use App\Models\Admin\Movie;
use App\Models\Admin\Occupation;
use App\Models\Blocking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AdminPanelController extends Controller
{
    //

    public function index(Request $request)
    {


        $info = [];
        // ? blockings
        $blockings = Blocking::where('blocking', true)->count();
        $info['blockings'] = $blockings ?? 0;

        // ? celebrities
        $celebrities = Celebrity::all();
        $info['celebrities']['all'] = $celebrities->count() ?? 0;
        $info['celebrities']['published'] = $celebrities->where('published', 1)->count() ?? 0;
        $info['celebrities']['not-published'] = $celebrities->where('published', 0)->count() ?? 0;

        // ? occupations
        $occupations = Occupation::count();
        $info['occupations'] = $occupations ?? 0;

        // ? actors
        $actors = Actor::count();
        $info['actors'] = $actors ?? 0;
        // ? movies
        $movies = Movie::count();
        $info['movies'] = $movies ?? 0;


        return view('admin.home.index', compact('info'));
    }
}
