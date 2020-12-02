<?php

namespace App\Http\Controllers\Admin;
use Intervention\Image\ImageManagerStatic as Image;
use File; 
use App\Player;
use App\Turnir;
use App\Claim;
use App\SetPleyer;
use App\Raund;
use App\PR;
use App\User;
use App\Stavka;
use Auth;
use DB;
use Illuminate\Http\Request;

class AdminController //extends Controller
{

    public function conformUserToOrg($id)
    {   
        $user = User::find($id);
        $claim = Claim::where("user_id", $id)->first();

        $user->role = "org";
        $user->name = $claim->company;

        $claim->isOk = 1;

        if($user->save()){

            $claim->save();

            return redirect("/admin/users");
        }

    }

    public function users()
    {
        $claim1 = Claim::where("isOK", 1)->get();
        $claim0 = Claim::where("isOK", 0)->get();

        if(request()->has('role'))
        {
    
            $user = User::where("role", request('role'))->get();
    
        }else{
    
            $user = User::where("role","!=", "admin")->get();
       }

        return view("admin.users", compact("user", "claim1", "claim0"));
    }

    public function usersDelete($id)
    {
        $user = User::find($id);

        if($user->delete()){

            return redirect("/admin/users");
        }
    }

    public function turnirs()
    {

    }

    public function players()
    {
        $players = Player::orderBy("created_at", "DESC")->paginate(4);

        return view('admin.players', compact("players"));
    }

    public function show($id)
    {
        //show player by id

        $player = Player::find($id);

        return view('admin.plyaers.show', compact('player'));
    }


    public function update(Request $request, $playerID)
    {
        //edit player info by id
        $player = Player::find($playerID);

        $player->name = $request->name;
        $player->sportTitul = $request->sportTitul;
        $player->city = $request->city;
        $player->dateBorn = $request->dateBorn;
        $player->countPointStart = $request->countPointStart;

        if($player->save()){
            return redirect('/admin/players');
        }else{
            return redirect('/error');
        }
    }

    public function edit($id)
    {
        //
        $player = Player::find($id);

        return view('admin.plyaers.edit', compact('player'));
    }

    public function destroy($playerID)
    {
        // Delete player by id
        $player = Player::find($playerID);

        $path = "uploads/players/";
        $img = $player->photo;

        if(File::exists(public_path($path . $img))){
            
            File::delete(public_path($path . $img));
            
            if( $player->delete() ){

                return redirect('/admin/players');
            }else{
                return redirect('/error');
            }

        }else{
            dd('File does not exists.');
        }

    }

    public function indexturnirs()
    {   //whereBetween('reservation_from', [$from, $to])->get();
        //->where('isPublic', 1)
        $turnirs = Turnir::where('isDone', 0)->where('date_start', '<', date('Y-m-d H:i:s'))->get();
        $turnirsclose = Turnir::where('isDone', 1)->get();
        $turnirfuture = Turnir::where('date_start', '>', date('Y-m-d H:i:s'))->where('isDone', 0)->get();

        return view('admin.turnirs.index', compact("turnirs", "turnirsclose", "turnirfuture"));
    }

    public function newturnirs(){

        $players = Player::all();

        return view('admin.turnirs.new', compact("players"));
    }
    
    public function insertturnirs(Request $request){
        
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

            return redirect('/admin/turnirs/');

        }else{
            return redirect('/error');
        }

    }

    public function closeturnirs($id){

        $close = Turnir::find($id);
        $close->isDone = 1;

        $set = SetPleyer::where("turnir_id", $id)->get();
        
        foreach($set as $i)
        {
            $player = Player::where("id", $i->player_id)->orderBy("countPointStart", "DESC")->first();
            $close->win_player_id = $player->id;
            $close->pointWin = $player->countPointStart;
        }
       
        
        if($close->save()){

            return redirect('/admin/turnirs/');

        }else{
            return redirect('/error');
        }
    }

    public function deleteturnirs($id){

        $delete = Turnir::find($id);
        
        if($delete->delete()){

            return redirect('/admin/turnirs/');

        }else{
            return redirect('/error');
        }
    }

    public function cancelturnirs($id){
        // is not public turnir
        $cancel = Turnir::find($id);
        $cancel->isPiblic = 0;
        
        if($cancel->save()){

            return redirect('/admin/turnirs/');

        }else{
            return redirect('/error');
        }
    }

    public function publicturnirs($id){

        $public = Turnir::find($id);
        $public->isPiblic = 1;
        
        if($public->save()){

            return redirect('/admin/turnirs/');

        }else{
            return redirect('/error');
        }
    }

    public function hiddenturnirs($id){

        $hidden = Turnir::find($id);
        $hidden->isPiblic = 0;
        
        if($hidden->save()){

            return redirect('/admin/turnirs/');

        }else{
            return redirect('/error');
        }
    }

    public function showturnirs($id){

        $show = Turnir::find($id);
        $players = SetPleyer::where("turnir_id", $id)->get();
        $player = Player::all();
        $raund = Raund::where("turnir_id", $id)->get();

        return view("admin.turnirs.show", compact("show", "players", "player", "raund"));
    }   

    public function editturnirs($id)
    {
        $edit = Turnir::find($id);
        $players = Player::all();
        $player = SetPleyer::where("turnir_id", $id)->get();

        return view('admin.turnirs.edit', compact("players", "edit", "player"));
    }

    public function updateturnirs(Request $request, $id)
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

            return redirect('/admin/turnirs');

        }else{
            return redirect('/error');
        }
    }

    public function removeturnirs($id)
    {
        $player = SetPleyer::where("player_id", $id);

        if($player->delete()){

            return redirect('/admin/turnirs');

        }else{
            return redirect('/error');
        }
    }

    public function playeraddturnirs(Request $request)
    {

        foreach($request->players_id as $key => $item)
        {
            $set_players = new SetPleyer();
            $set_players->turnir_id = $request->t_id;
            $set_players->player_id = $request->players_id[$key];                   
            $set_players->save();
        } 

        return redirect('/admin/turnirs');

    }

    public function insertRaundturnirs(Request $request){

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

        $p1 = Player::where("id", $request->input('player_01_ID'))->pluck("name");
        $p2 = Player::where("id", $request->input('player_02_ID'))->pluck("name");

        if($raund->save()){

            $rid = $raund->id;

                $pr = new PR();
                $pr->name = $p1;
                $pr->user_id = $request->input('player_01_ID');
                $pr->raund_id = $rid;
                $pr->save();

                $pr2 = new PR();
                $pr2->name = $p2;
                $pr2->user_id = $request->input('player_02_ID');
                $pr2->raund_id = $rid;
                $pr2->save();

            
            
            return redirect('/admin/turnirs');
        }

    }

    public function deleteRaundturnirs($id){

        $raund = Raund::find($id);

        if($raund->delete()){

            $p = PR::where('raund_id', $id)->get();

            foreach($p as $i){
                $i->delete();
            }
  
            return redirect('/admin/turnirs');

        }else{
            return redirect('/error');
        }
    }

    public function showwinturnirs($id)
    {
        $raund = Raund::find($id);
        $player = Player::all();

        return view("admin.turnirs.win", compact("player", "raund"));
    }

    public function winRaundturnirs(Request $request, $id)
    {
        $raund = Raund::find($id);
        $raund->isDone = 1;
        $raund->win_player_id = $request->input('win_player_id');
        $raund->pointPlayer01 = $request->input('pointPlayer01');
        $raund->pointPlayer02 = $request->input('pointPlayer02');

        if($raund->save()){

            $koef1 = $raund->koefWin01;
            $koef2 = $raund->koefWin02;
    
            $pl1 = $raund->player_01_ID;
            $pl2 = $raund->player_02_ID;

            $winer = $request->input('win_player_id');

            if($winer == $pl1){

                $stavka = Stavka::where("raund_id",$id)->where("player_id", $winer)->get();

                foreach($stavka as $item)
                {
                    $item->isWin = 1;
                    $item->total = floatval($item->money) * floatval($koef1);
                    $item->save();
    
                    $usr = User::find($item->user_id);
                    $usr->balance = $usr->balance + $item->total;
                    $usr->save();
                }

                $players = Player::find($request->input('win_player_id'));
                $players->countPointStart = $players->countPointStart + $request->input('pointPlayer01');
                $players->save();

            }elseif($winer == $pl2){

                $stavka2 = Stavka::where("raund_id",$id)->where("player_id", $winer)->get();
                
                foreach($stavka2 as $item)
                {
                    $item->isWin = 1;
                    $item->total = floatval($item->money) * floatval($koef2);
                    $item->save();
    
                    $usr = User::find($item->user_id);
                    $usr->balance = $usr->balance + $item->total;
                    $usr->save();
                }

                $players2 = Player::find($request->input('win_player_id'));
                $players2->countPointStart = $players2->countPointStart + $request->input('pointPlayer02');
                $players2->save();

            }else{
                $stavka3 = Stavka::where("raund_id",$id)->where("player_id", "!=", $winer)->get();
                
                foreach($stavka3 as $item)
                {
                    $item->isWin = 0;
                    $item->total = floatval($item->money) - (floatval($item->money)  * 2);
                    $item->save();
    
                    $usr = User::find($item->user_id);
                    $usr->balance = $usr->balance - $item->total;
                    $usr->save();
                }
            }

           

            return redirect('/admin/turnirs');

        }else{
            return redirect('/error');
        }
    }
    
    public function genarateRoundturnirs($turnirID)
    {
        // get count player in turnir

        $players = SetPleyer::where("turnir_id", $turnirID);
        $countPlayers = $players->count();
        
        for($i = 1; $i <= $countPlayers; $i++){
            
        }

        // range point player  set point range: 0 - 200; 200 - 500; 500 - 700; 700 - 900; 900 - 1000+


        return redirect('/admin/turnirs');
    }

    public function tableturnirs($id)
    {
        
        $turnir = Turnir::find($id);
        $raund = Raund::where("turnir_id", $id)->get();
        $player = Player::all();
        $setPlayer = SetPleyer::where("turnir_id", $id)->get();
        $user = User::where("id", $turnir->organizator_id)->first();

        return view("admin.turnirs.table", compact("turnir", "raund", "player", "setPlayer", "user"));
    }

    public function stat(){

        return view("statistics");
    }

    public function forecast(){

        return view("forecast");
    }
}   