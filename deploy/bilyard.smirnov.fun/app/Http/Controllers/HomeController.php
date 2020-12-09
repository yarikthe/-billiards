<?php

namespace App\Http\Controllers;

use App\Turnir;
use App\Player;
use App\SetPleyer;
use App\Raund;
use App\PR;
use App\User;
use App\Stavka;
use Auth;
use DB;
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
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
