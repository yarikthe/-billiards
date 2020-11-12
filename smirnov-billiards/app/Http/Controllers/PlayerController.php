<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::all();

        return view('players.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
          Image::make($avatar)->save( storage_path() . '/app/public/files/img/players/' . $filename );
          // Image::make($avatar)->resize(300, 300)->save( public_path('/img/portfolio/') . $filename );
        }

        $player->photo = $filename;
        $player->sportTitul = $request->input('sportTitul');
        $player->city = $request->input('city');
        $player->dateBorn = $request->input('dateBorn');
        $player->countPointStart = $request->input('countPointStart');
        
        if($player->save()){
            return redirect('/players');
        }else{
            return redirect('/error');
        }

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

        return view('players.show', compact('player'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $playerID)
    {
        //edit player info by id
        $player = Player::find($playerID);

        $player->name = $request->input('name');

        if($request->hasFile('avatar')){
	      
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/storage/files/1/img/avatars/' . $filename ) );
  
            $player->photo = $filename;
        }

        $player->sportTitul = $request->input('sportTitul');
        $player->city = $request->input('city');
        $player->dateBorn = $request->input('dateBorn');
        $player->countPointStart = $request->input('countPointStart');

        if($player->save()){
            return redirect('/players');
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
    public function update()
    {
        //
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

        if( $player->delete() ){

            return redirect('/players');
        }else{
            return redirect('/error');
        }
    }
}
