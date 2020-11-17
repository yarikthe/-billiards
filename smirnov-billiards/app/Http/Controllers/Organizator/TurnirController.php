<?php

namespace App\Http\Controllers\Organizator;
use Intervention\Image\ImageManagerStatic as Image;
use File; 
use App\Turnir;
use App\Player;
use Auth;
use Illuminate\Http\Request;

class TurnirController //extends Controller
{
    public function index()
    {
        $turnirs = Turnir::all();

        return view('turnirs.index', compact("turnirs"));
    }

    public function new(){

        $players = Player::all();

        return view('turnirs.new', compact("players"));
    }
    
    public function insert(Request $request){
        
        $turnir = new Turnir();

        $turnir->name = $request->input('name');
        $turnir->desc = $request->input('desc');
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

            return redirect('/organizator/turnirs/');

        }else{
            return redirect('/error');
        }

    }

    public function delete($id){

    }

    public function show($id){

    }

    public function update(Request $request, $id)
    {

    }
}
