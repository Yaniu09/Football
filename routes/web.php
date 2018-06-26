<?php

use App\Group;
use App\Teams;
use App\Fixtures;
use App\Pitch;
use App\Standings;
use App\Score;
use App\Player;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $groups = Group::all();
    $fixtures = Fixtures::all();
    
    return view('welcome', compact('groups','fixtures'));
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'fixtures'], function () {
    Route::get('/', 'FixturesController@index');
    Route::post('/', 'FixturesController@store');
    Route::get('/edit/{fixtures}', 'FixturesController@edit');
    Route::post('/edit/{fixtures}', 'FixturesController@update');
});

Route::group(['prefix' => 'standings'], function () {
    Route::get('/', 'StandingsController@index');
    Route::get('/create', 'StandingsController@create');
});

Route::group(['prefix' => 'player'], function () {
    Route::get('/create', 'PlayerController@create');
    Route::post('/create', 'PlayerController@store');

    Route::get('/edit/{player}', 'PlayerController@edit');
    Route::post('/edit/{player}', 'PlayerController@update');
});

Route::group(['prefix' => 'live-score'], function () {
    Route::get('{id}', function ($id) {
        $fixture = Fixtures::findOrFail($id);
        $score = Score::where('fixture_id', $fixture->id)->first();
        if ($score === null) {
            $score = new Score;
            $score->fixture_id = $fixture->id;
            $score->team_one = 0;
            $score->team_two = 0;
            $score->save();
        }

        return view('fixtures.livescore', compact('fixture', 'score'));
    });
});





/*
|--------------------------------------------------------------------------
| Test Routes Below (Delete these later)
|--------------------------------------------------------------------------
*/

Route::get('/add-score/{fixture_id}/{score_1}/{score_2}', 'ScoreController@add_score');
Route::get('/table-update', 'StandingsController@table_update');