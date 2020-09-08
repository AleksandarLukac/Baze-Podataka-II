<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Club;

class ClubsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$someClub = \App\Club::get();
        //$someClub->coaches()->attach([3,4]);
        //$someClub = Club::with('coaches')->first();

        $clubs = Club::with(['coaches'])->get();
        $users = Club::with(['users'])->get();
        //dd($someClub);
        return view('clubs',compact('clubs'), compact('users') );
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($club)
    {
        $requiredClub = Club::find($club);

        return view('club', ['club'=> $requiredClub]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
