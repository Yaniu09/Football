<?php

namespace App\Http\Controllers;

use App\Group;
use App\Fixtures;
use App\Pitch;
use Illuminate\Http\Request;

class FixturesController extends Controller
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
     * @param  \App\Fixtures  $fixtures
     * @return \Illuminate\Http\Response
     */
    public function show(Fixtures $fixtures)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fixtures  $fixtures
     * @return \Illuminate\Http\Response
     */
    public function edit(Fixtures $fixtures)
    {
        $groups = Group::all();
        $pitches = Pitch::all();
        return view('fixtures.edit', compact('fixtures', 'groups', 'pitches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fixtures  $fixtures
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fixtures $fixtures)
    {
        $fixture->pitch_id = $request->pitch_id;
        $fixture->team_one_id = $request->team_one_id;
        $fixture->team_two_id = $request->team_two_id;
        $fixture->date = $request->date;
        $fixture->time_start = $request->time_start;
        $fixture->time_end = $request->time_end;
        $fixture->save();

        return redirect()->back()->with('alert-success', 'Successfully edited match fixtures');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fixtures  $fixtures
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fixtures $fixtures)
    {
        //
    }
}
