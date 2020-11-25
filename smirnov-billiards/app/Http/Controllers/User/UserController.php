<?php

namespace App\Http\Controllers\User;

use Intervention\Image\ImageManagerStatic as Image;
use File; 
use App\Turnir;
use App\User;
use App\Player;
use App\SetPleyer;
use App\Raund;
use App\Claim;
use App\Stavka;
use Auth;
use DB;
use Illuminate\Http\Request;

class UserController //extends Controller
{

    public function org(Request $request){

        $claim = new Claim();
        $claim->user_id = $request->input("user_id");
        $claim->dateClaim = date('Y-m-d');
        $claim->company = $request->input("company");

        if($claim->save())
        {
            return redirect("/home");
        }
    }

    public function turnirs(){

        $turnirs = Turnir::where('isDone', 0)->where('date_start', '<', date('Y-m-d H:i:s'))->get();
        $turnirsclose = Turnir::where('isDone', 1)->get();

        return view("user.turnirs", compact("turnirs", "turnirsclose"));
    }

    public function sportman()
    {
        $players = Player::all();

        return view("user.sportman", compact("players"));
    }

    public function profile($id)
    {
        $player = Player::find($id);

        return view('user.profile', compact('player'));
    }

    public function delete($id)
    {
        $user = User::find($id);

        Auth::logout();

        if ($user->delete()) {

            return redirect('/');
        }
    }

    public function stavka(){

        $stavka = Stavka::where('user_id', Auth::user()->id)->get();
        $turnirs = Turnir::where('isDone', 0)->where('date_start', '<', date('Y-m-d H:i:s'))->get();
        $players = SetPleyer::all();
        $player = DB::table('players')->pluck("name","id");
        $raund = DB::table('raunds')->pluck("name","id");
        $raunds = Raund::all();
        $players_raund = Player::all();

        return view("user.stavka", compact("stavka", "turnirs", "players", "player", "raund", "raunds", "players_raund"));
    }

    public function newstavka(Request $request){

        $stavka = new Stavka();

        $stavka->user_id = Auth::user()->id;
        $stavka->turnir_id = $request->input("turnir_id");
        $stavka->raund_id = $request->input("raund_id");
        $stavka->player_id = $request->input("player_id");
        $stavka->money = $request->input("money");
        $stavka->dateStavka = date('Y-m-d');
        $stavka->isWin = 2;
        $stavka->total = 0;

        if($stavka->save()){

            return redirect("/user/stavka");
        }

    }

    public function forecast()
    {
        return view("user.forecast");
    }

    public function turnir($id)
    {
        $show = Turnir::find($id);
        $players = SetPleyer::where("turnir_id", $id)->get();
        $player = Player::all();
        $raund = Raund::where("turnir_id", $id)->get();

        return view("user.turnir", compact("show", "players", "player", "raund"));
    }

    public function getRaund($id)
    {

        $raund = Raund::where("turnir_id",$id)->pluck('name','id');

        return json_encode($raund);
    }

    public function getPlayer($id)
    {
        // $playerRaund = Raund::where("id",$id)->get();
        $player = Player::where("id", $id)->pluck('name','id');

        return json_encode($player);
    }


    public function importBalance($id, Request $request){

        $user = User::find($id);

        $user->balance = $request->input("balance");

        if($user->save()){

            return redirect("user/stavka");
        }
    }
}