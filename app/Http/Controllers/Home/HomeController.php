<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Mail\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    //

    public function index()
    {

        $page = 'home';

        return view('home.index', compact('page'));
    }

    public function send(Request $request)
    {


        $validated = $request->validate([
            'order' => 'required|string',
            'price' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|string|email',
            'phone' => 'nullable|string',
            'telegram' => 'nullable|string',
            'message' => 'required|string',
            'birthday' => 'required|string',
            'city-time' => 'required|string',
            'birthday-partner' => 'nullable|string',
            'city-time-partner' => 'nullable|string',

        ]);


        $order = Arr::map($validated, function ($value, $key) {
            return $value != null ? clearTags($value) : $value;
        });



        Mail::to('tatyana.blank@gmail.com')->send(new Order($order));



        return response()->json([
            'status' => 'ok',
        ]);
    }
}
