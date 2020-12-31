<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Tweet;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tweets = Tweet::latest()->get();
        return view('home', [
            'tweets' => auth()->user()->timeline()
        ]);
    }
}
