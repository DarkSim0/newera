<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\schedules;

use App\studentRegist;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $checker = studentRegist::all();
        $data = schedules::where('status','like','%pending%')->get();
        return view('home');
    }
}
