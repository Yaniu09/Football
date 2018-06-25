<?php

namespace App\Http\Controllers;

use App\Standings;
use Illuminate\Http\Request;

class StandingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Standings::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();
        foreach ($groups as $group) {
            foreach ($group->teams as $team) {
                $standing = new Standings;
                $standing->group_id = $group->id;
                $standing->team_id = $team->id;
                $standing->save();
            }
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Standings  $standings
     * @return \Illuminate\Http\Response
     */
    public function show(Standings $standings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Standings  $standings
     * @return \Illuminate\Http\Response
     */
    public function edit(Standings $standings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Standings  $standings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Standings $standings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Standings  $standings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Standings $standings)
    {
        //
    }

    public function table_update()
    {
        $standings = Standings::all();
        foreach ($standings as $standing) {
            $standing->gd = $standing->gf - $standing->ga;
            $standing->pts = ($standing->w * 3) + $standing->d;
            $standing->save();

            $team = Teams::find($standing->team_id);
            $team->pts = $standing->pts;
            $team->save();
        }
        return redirect('/');
    }
}
