<?php

use App\Group;
use App\Teams;
use App\Fixtures;
use App\Pitch;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $groups = Group::all();
    return view('welcome', compact('groups'));
});

Route::get('/fixtures', function () {
    $fixtures = Fixtures::all();
    $groups = Group::all();
    $pitches = Pitch::all();
    return view('fixture', compact('fixtures', 'groups', 'pitches'));
});

Route::post('/fixtures', function (Request $request) {
    $fixture = new Fixtures;
    $fixture->pitch_id = $request->pitch_id;
    $fixture->team_one_id = $request->team_one_id;
    $fixture->team_two_id = $request->team_two_id;
    $fixture->date = $request->date;
    $fixture->time_start = $request->time_start;
    $fixture->time_end = $request->time_end;
    $fixture->save();

    return redirect('fixtures')->with('alert-success', 'Successfully added match fixtures');
});