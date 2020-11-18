<?php

namespace App\Http\Controllers\Organizator;

use Intervention\Image\ImageManagerStatic as Image;
use File; 
use App\Turnir;
use App\Player;
use App\SetPleyer;
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
        $cancel->isPublic = 0;
        
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

        return view("turnirs.show", compact("show", "players", "player"));
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
}
