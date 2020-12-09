<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
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

class PublicController extends Controller
{

    public function showTurnir($id)
    {
        $show = Turnir::find($id);
        $players = SetPleyer::where("turnir_id", $id)->get();
        $player = Player::all();
        $raund = Raund::where("turnir_id", $id)->get();

        return view("turnirs.public", compact("show", "players", "player", "raund"));
    }

    public function showPlayer($id)
    {
        $player = Player::find($id);

        return view('public.player', compact('player'));   
    }

    public function table($id)
    {
        $turnir = Turnir::find($id);
        $raund = Raund::where("turnir_id", $id)->get();
        $player = Player::all();
        $setPlayer = SetPleyer::where("turnir_id", $id)->get();
        $user = User::where("id", $turnir->organizator_id)->first();

        return view("public.table", compact("turnir", "raund", "player", "setPlayer", "user"));
    }

    public function contact() { 
        
        return view('public.contact'); 
    }

    public function about()
    { 
        return view('public.about'); 
    }

    public function error()
    { 
        return view('public.error'); 
    }
}