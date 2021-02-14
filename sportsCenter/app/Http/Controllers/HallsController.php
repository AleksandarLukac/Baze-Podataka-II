<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HallsController extends Controller
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
    public function show($sport)
    {
        $fillteredCourts = \App\Court::get()->where('kind', $sport);
        //$fillteredCourts = \App\Court::find(1)->kind;
        //$fillteredHalls = \App\Hall::get()->where('id', $fillteredCourts->hall);
        $fillteredHalls = $fillteredCourts->map(function($name,$key){
            return $name->hall_id;
        });
        dd($fillteredHalls->toArray());

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
