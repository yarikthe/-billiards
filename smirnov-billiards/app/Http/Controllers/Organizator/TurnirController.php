<?php

namespace App\Http\Controllers\Organizator;

use Intervention\Image\ImageManagerStatic as Image;
use File; 
use App\Turnir;
use App\Player;
use App\SetPleyer;
use App\Raund;
use Auth;
use DB;
use Illuminate\Http\Request;

class TurnirController //extends Controller
{
    public function index()
    {   //whereBetween('reservation_from', [$from, $to])->get();
        //->where('isPublic', 1)
        $turnirs = Turnir::where('organizator_id', Auth::user()->id)->where('isDone', 0)->where('date_start', '<', date('Y-m-d H:i:s'))->get();
        $turnirsclose = Turnir::where('organizator_id', Auth::user()->id)->where('isDone', 1)->get();
        $turnirfuture = Turnir::where('organizator_id', Auth::user()->id)->where('date_start', '>', date('Y-m-d H:i:s'))->where('isDone', 0)->get();

        return view('turnirs.index', compact("turnirs", "turnirsclose", "turnirfuture"));
    }

    public function new(){

        $players = Player::all();

        return view('turnirs.new', compact("players"));
    }
    
    public function insert(Request $request){
        
        $turnir = new Turnir();

        $turnir->name = $request->input('name');
        $turnir->desc = $request->input('desc');
        $turnir->place = $request->input('place');
        $turnir->prizMoney = $request->input('prizMoney');
        $turnir->date_start = $request->input('date_start');
        $turnir->date_end = $request->input('date_end');
        $turnir->win_player_id = 0;
        $turnir->pointWin = 0;
        $turnir->isPiblic = $request->input('isPiblic');
        $turnir->isDone = 0;
        $turnir->organizator_id = Auth::user()->id;

        if ( $turnir->save()){

            //insert player to set_pleyers
            $last_id = DB::getPdo()->lastInsertId();

            foreach($request->players_id as $key => $item)
            {
                $set_players = new SetPleyer();
                $set_players->turnir_id = $last_id;
                $set_players->player_id = $request->players_id[$key];                   
                $set_players->save();
            } 

            return redirect('/organizator/turnirs/');

        }else{
            return redirect('/error');
        }

    }

    public function close($id){

        $close = Turnir::find($id);
        $close->isDone = 1;
        
        if($close->save()){

            return redirect('/organizator/turnirs/');

        }else{
            return redirect('/error');
        }
    }

    public function delete($id){

        $delete = Turnir::find($id);
        
        if($delete->delete()){

            return redirect('/organizator/turnirs/');

        }else{
            return redirect('/error');
        }
    }

    public function cancel($id){
        // is not public turnir
        $cancel = Turnir::find($id);
        $cancel->isPiblic = 0;
        
        if($cancel->save()){

            return redirect('/organizator/turnirs/');

        }else{
            return redirect('/error');
        }
    }

    public function public($id){

        $public = Turnir::find($id);
        $public->isPiblic = 1;
        
        if($public->save()){

            return redirect('/organizator/turnirs/');

        }else{
            return redirect('/error');
        }
    }

    public function hidden($id){

        $hidden = Turnir::find($id);
        $hidden->isPiblic = 0;
        
        if($hidden->save()){

            return redirect('/organizator/turnirs/');

        }else{
            return redirect('/error');
        }
    }

    public function show($id){

        $show = Turnir::find($id);
        $players = SetPleyer::where("turnir_id", $id)->get();
        $player = Player::all();
        $raund = Raund::where("turnir_id", $id)->get();

        return view("turnirs.show", compact("show", "players", "player", "raund"));
    }   

    public function edit($id)
    {
        $edit = Turnir::find($id);
        $players = Player::all();
        $player = SetPleyer::where("turnir_id", $id)->get();

        return view('turnirs.edit', compact("players", "edit", "player"));
    }

    public function update(Request $request, $id)
    {
        $turnir = Turnir::find($id);

        $turnir->name = $request->name;
        $turnir->desc = $request->desc;
        $turnir->place = $request->place;
        $turnir->prizMoney = $request->prizMoney;
        $turnir->date_start = $request->date_start;
        $turnir->date_end = $request->date_end;
        $turnir->win_player_id = 0;
        $turnir->pointWin = 0;
        $turnir->isPiblic = $request->isPiblic;
        $turnir->isDone = 0;
        $turnir->organizator_id = Auth::user()->id;

        if ( $turnir->save()){

            return redirect('/organizator/turnirs');

        }else{
            return redirect('/error');
        }
    }

    public function remove($id)
    {
        $player = SetPleyer::where("player_id", $id);

        if($player->delete()){

            return redirect('/organizator/turnirs');

        }else{
            return redirect('/error');
        }
    }

    public function playeradd(Request $request)
    {

        foreach($request->players_id as $key => $item)
        {
            $set_players = new SetPleyer();
            $set_players->turnir_id = $request->t_id;
            $set_players->player_id = $request->players_id[$key];                   
            $set_players->save();
        } 

        return redirect('/organizator/turnirs');

    }

    public function insertRaund(Request $request){

        $raund = new Raund();
        $raund->name = $request->input('name');
        $raund->turnir_id = $request->input('turnir_id');
        $raund->player_01_ID = $request->input('player_01_ID');
        $raund->player_02_ID = $request->input('player_02_ID');
        $raund->dateRaund = $request->input('dateRaund');
        $raund->koefWin01 = $request->input('koefWin01');
        $raund->koefWin02 = $request->input('koefWin02');
        $raund->win_player_id = 0;
        $raund->pointPlayer01 = 0;
        $raund->pointPlayer02 = 0;
        $raund->isDone = 0;

        if($raund->save()){
            return redirect('/organizator/turnirs');
        }

    }

    public function deleteRaund($id){

        $raund = Raund::find($id);

        if($raund->delete()){

            return redirect('/organizator/turnirs');

        }else{
            return redirect('/error');
        }
    }

    public function showwin($id)
    {
        $raund = Raund::find($id);
        $player = Player::all();

        return view("turnirs.win", compact("player", "raund"));
    }

    public function winRaund(Request $request, $id)
    {
        $raund = Raund::find($id);
        $raund->isDone = 1;
        $raund->win_player_id = $request->input('win_player_id');
        $raund->pointPlayer01 = $request->input('pointPlayer01');
        $raund->pointPlayer02 = $request->input('pointPlayer02');

        if($raund->save()){

            return redirect('/organizator/turnirs');

        }else{
            return redirect('/error');
        }
    }
    
    public function genarateRound($turnirID)
    {
        // get count player in turnir

        $players = SetPleyer::where("turnir_id", $turnirID);
        $countPlayers = $players->count();
        
        for($i = 1; $i <= $countPlayers; $i++){
            
        }

        // range point player  set point range: 0 - 200; 200 - 500; 500 - 700; 700 - 900; 900 - 1000+


        return redirect('/organizator/turnirs');
    }

    public function roundWin()
    {
        // set id win player in round
    }

    public function koefSetOnPlayers()
    {
        // set koef on 2 players in on round
    }
}
