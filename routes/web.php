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

    Route::get('/top', function () {
        $goals = Player::orderBy('goals')->get();
        return view('players.top', compact('goals'));
    });

    Route::get('/edit/{player}', 'PlayerController@edit');
    Route::post('/edit/{player}', 'PlayerController@update');
});

Route::group(['prefix' => 'live-score'], function () {
    Route::get('{id}', function ($id) {
        $fixture = Fixtures::findOrFail($id);
        
        if ($fixture->match_end == 1) {
            return redirect()->back();
        }

        $score = Score::where('fixture_id', $fixture->id)->first();
        if ($score === null) {
            $score = new Score;
            $score->fixture_id = $fixture->id;
            $score->team_one = 0;
            $score->team_two = 0;
            $score->save();

            $fixture->team1->standing->mp += 1;
            $fixture->team1->standing->save();

            $fixture->team2->standing->mp += 1;
            $fixture->team2->standing->save();
        }
        
        // dd($fixture->team1->players);
        
        return view('fixtures.livescore', compact('fixture', 'score'));
    });

    Route::get('{fixture_id}/add-goal/{player_id}/{team}', function ($fixture_id, $player_id, $team) {
        $player = Player::findOrFail($player_id);
        $player->goals += 1;
        $player->save();
        $fixture = Fixtures::findOrFail($fixture_id);

        if ($team == 1) {
            $score = Score::where('fixture_id', $fixture->id)->first();
            $score->team_one += 1;
            $score->save();
        }
        if ($team == 2) {
            $score = Score::where('fixture_id', $fixture->id)->first();
            $score->team_two += 1;
            $score->save();
        }

        return redirect()->back();
    });

    Route::get('{fixture_id}/add-yellow/{player_id}/{team}', function ($fixture_id, $player_id, $team) {
        $player = Player::findOrFail($player_id);
        $player->yellow += 1;
        $player->save();
        
        return redirect()->back();
    });

    Route::get('{fixture_id}/add-red/{player_id}/{team}', function ($fixture_id, $player_id, $team) {
        $player = Player::findOrFail($player_id);
        $player->red += 1;
        $player->save();
        
        return redirect()->back();
    });

    Route::get('{fixture_id}/{score_id}/finish-match', function ($fixture_id, $score_id) {
        $fixture = Fixtures::findOrFail($fixture_id);
        $score = Score::findOrFail($score_id);

        $score_1 = $score->team_one;
        $score_2 = $score->team_two;
        if ($score_1 == $score_2) {
            $score->draw = '1';
        }
        $score->save();

        $standing_one = Standings::where('team_id', $fixture->team_one_id)->first();
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

        $standing_two = Standings::where('team_id', $fixture->team_two_id)->first();
        if ($score_1 > $score_2) {
            $standing_two->w += 1;
        }
        if ($score_1 == $score_2) {
            $standing_two->d += 1;
        }
        if ($score_1 < $score_2) {
            $standing_two->l += 1;
        }
        $standing_two->gf += $score_2;
        $standing_two->ga += $score_1;
        $standing_two->save();

        $fixture->match_end = 1;
        $fixture->save();

        return redirect('table-update');
    });
});







/*
|--------------------------------------------------------------------------
| Test Routes Below (Delete these later)
|--------------------------------------------------------------------------
*/

Route::get('/add-score/{fixture_id}/{score_1}/{score_2}', 'ScoreController@add_score');
Route::get('/table-update', 'StandingsController@table_update');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
