<?php

use App\Group;
use App\Teams;
use App\Fixtures;
use App\Pitch;
use App\Standings;
use App\Score;
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
    $fixtures = Fixtures::all();
    
    return view('welcome', compact('groups','fixtures'));
});

Route::get('/fixtures', function () {
    $data = Fixtures::all();
    $dates = $data->groupBy('date');
    // dd($dates->toArray());
    $groups = Group::all();
    $pitches = Pitch::all();
    return view('fixture', compact('dates', 'fixtures', 'groups', 'pitches'));
});

Route::get('/create-standings', function () {
    $groups = Group::all();
    foreach ($groups as $group) {
        foreach ($group->teams as $team) {
            $standing = new Standings;
            $standing->group_id = $group->id;
            $standing->team_id = $team->id;
            $standing->save();
        }
    }
});

Route::get('/standings', function () {
    return Standings::all();
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

Route::get('/players', function () {
    $groups = Group::all();
    return view('players', compact('groups'));
});


Route::post('/players', function (Request $request) {
    $player = new Player;
    $player->team_id = $request->team_id;
    $player->name = $request->name;
    $player->number = $request->number;
    $player->position = $request->position;
    $player->yellow = $request->yellow;
    $player->red = $request->red;
    $player->goals = $request->goals;
    $player->assists = $request->assists;
    $player->save();

    return redirect('players')->with('alert-success', 'Successfully added player');
});


Route::get('/add-score/{fixture_id}/{score_1}/{score_2}', function ($fixture_id, $score_1, $score_2) {
    // $fixture_id = $request->fixture_id;
    // $score_1 = $request->score_1;
    // $score_2 = $request->score_2;

    $score = new Score;
    $score->fixture_id = $fixture_id;
    $score->team_one = $score_1;
    $score->team_two = $score_2;
    if ($score_1 == $score_2) {
        $score->draw = '1';
    }
    $score->save();

    $fixture = $score->fixture;
    $standing_one = Standings::find($fixture->team_one_id);
    $standing_one->mp += 1;
    if ($score_1 > $score_2) {
        $standing_one->w += 1;
    }
    if ($score_1 == $score_2) {
        $standing_one->d += 1;
    }
    if ($score_1 < $score_2) {
        $standing_one->l += 1;
    }
    $standing_one->gf += $score_1;
    $standing_one->ga += $score_2;
    $standing_one->save();

    // ------------------------------------------- //

    $standing_two = Standings::find($fixture->team_two_id);
    $standing_two->mp += 1;
    if ($score_1 > $score_2) {
        $standing_two->w += 1;
    }
    if ($score_1 == $score_2) {
        $standing_two->d += 1;
    }
    if ($score_1 < $score_2) {
        $standing_two->l += 1;
    }
    $standing_two->gf += $score_1;
    $standing_two->ga += $score_2;
    $standing_two->save();

    return redirect('table-update');
});

Route::get('/table-update', function(){
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
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
