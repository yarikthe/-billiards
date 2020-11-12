<?php

namespace App\Http\Controllers;

use App\Models\Turnir;
use Illuminate\Http\Request;

class TurnirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //new turnir
        $turnir = new Turnir();

        $turnir->name = $request->input('name');
        $turnir->desc = $request->input('desc');
        $turnir->prizMoney = $request->input('prizMoney');
        $turnir->place = $request->input('place');
        $turnir->date_start = $request->input('date_start');
        $turnir->date_end = $request->input('date_end');
        $turnir->pointWin = 10;//$request->input('pointWin');
        $turnir->organizator_id = Auth::user()->id;

        if($turnir->save()){
            return redirect('/turnirs');
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
     * @param  \App\Models\Turnir  $turnir
     * @return \Illuminate\Http\Response
     */
    public function show(Turnir $turnir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Turnir  $turnir
     * @return \Illuminate\Http\Response
     */
    public function edit(Turnir $turnir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Turnir  $turnir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Turnir $turnir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Turnir  $turnir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Turnir $turnir)
    {
        //
    }
}
