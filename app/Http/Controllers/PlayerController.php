<?php

namespace App\Http\Controllers;

use App\Group;
use App\Teams;
use App\Fixtures;
use App\Pitch;
use App\Standings;
use App\Score;
use App\Player;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();
        return view('players', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $player = new Player;
        $player->team_id = $request->team_id;
        $player->name = $request->name;
        $player->number = $request->number;
        $player->position = $request->position;
        // $player->yellow = $request->yellow;
        // $player->red = $request->red;
        // $player->goals = $request->goals;
        // $player->assists = $request->assists;
        $player->save();

        return redirect('players')->with('alert-success', 'Successfully added player');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        return view('player.edit', compact('player'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        $player->team_id = $request->team_id;
        $player->name = $request->name;
        $player->number = $request->number;
        $player->position = $request->position;
        // $player->yellow = $request->yellow;
        // $player->red = $request->red;
        // $player->goals = $request->goals;
        // $player->assists = $request->assists;
        $player->save();
        return redirect()->back()->with('alert-success', 'Successfully edited match fixtures');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        //
    }
}
