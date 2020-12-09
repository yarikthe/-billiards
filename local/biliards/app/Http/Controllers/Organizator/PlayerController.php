<?php

namespace App\Http\Controllers\Organizator;
use Intervention\Image\ImageManagerStatic as Image;
use File; 
use App\Player;

use Illuminate\Http\Request;

class PlayerController //extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::orderBy("created_at", "DESC")->paginate(4);

        return view('plyaers.index', compact("players"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function new(){

        return view('plyaers.new');
    }

    public function insert(Request $request)
    {
        //new player create
        $player = new Player();
        
        $player->name = $request->input('name');

        $filename = '';

        $request->validate([
            'img' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);


        if($request->hasFile('img')){
     
          $avatar = $request->file('img'); 
          $filename = time() . '.' . $avatar->getClientOriginalExtension();
          //Image::make($avatar)->save( storage_path() . '/app/public/files/img/players/' . $filename );
          Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/players/') . $filename );
        }

        $player->photo = $filename;
        $player->sportTitul = $request->input('sportTitul');
        $player->city = $request->input('city');
        $player->dateBorn = $request->input('dateBorn');
        $player->countPointStart = $request->input('countPointStart');
        $player->countWin = $request->input('countWin');
        $player->countLoss = $request->input('countLoss');
        
        if($player->save()){
            return redirect('/organizator/players/');
        }else{
            return redirect('/error');
        }

    }

    public function update_avatar(Request $request){

        // Handle the user upload of avatar
        if($request->hasFile('avatar')){
          
          $avatar = $request->file('avatar');
          $filename = time() . '.' . $avatar->getClientOriginalExtension();
          Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
    
          $user = Auth::user();
          $user->avatar = $filename;
          $user->save();
        }
    
        return view('profile', array('user' => Auth::user()) );
    
      }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show player by id

        $player = Player::find($id);

        return view('plyaers.show', compact('player'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
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
            return redirect('/organizator/players');
        }else{
            return redirect('/error');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $player = Player::find($id);

        return view('plyaers.edit', compact('player'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy($playerID)
    {
        // Delete player by id
        $player = Player::find($playerID);

        $path = "uploads/players/";
        $img = $player->photo;

        if(File::exists(public_path($path . $img))){
            
            File::delete(public_path($path . $img));
            
            if( $player->delete() ){

                return redirect('/organizator/players');
            }else{
                return redirect('/error');
            }

        }else{
            dd('File does not exists.');
        }

    }
}
