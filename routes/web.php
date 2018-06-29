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
    $fixtures = Fixtures::take(5)->get();
    
    // dd($fixtures[0]->score);

    return view('welcome', compact('groups','fixtures'));
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'fixtures'], function () {
    Route::get('/', 'FixturesController@index');
    Route::post('/', 'FixturesController@store')->middleware('auth');
    Route::get('/edit/{fixtures}', 'FixturesController@edit')->middleware('auth');
    Route::post('/edit/{fixtures}', 'FixturesController@update')->middleware('auth');

    Route::get('/live-5', function () {
        $groups = Group::all();
        $fixtures = Fixtures::take(5)->get();
        
        return view('fixtures.live-5', compact('groups', 'fixtures'));
    });
    Route::get('/live-all', function () {
        $data = Fixtures::all();
        $dates = $data->groupBy('date');
        // dd($dates->toArray());
        $groups = Group::all();
        $pitches = Pitch::all();

        return view('fixtures.live', compact('dates', 'fixtures', 'groups', 'pitches'));
    });    
});

Route::group(['prefix' => 'standings'], function () {
    Route::get('/', 'StandingsController@index')->middleware('auth');
    Route::get('/create', 'StandingsController@create')->middleware('auth');
    Route::get('/table', function () {
        $groups = Group::all();
        $fixtures = Fixtures::all();

        return view('standings.table', compact('groups'));
    });
});

Route::group(['prefix' => 'player'], function () {
    Route::get('/create', 'PlayerController@create')->middleware('auth');
    Route::post('/create', 'PlayerController@store')->middleware('auth');

    Route::get('/top', function () {
        $goals = Player::where('goals', '>=', '1')->orderBy('goals', 'desc')->take('10')->get();
        return view('players.top', compact('goals'));
    });

    Route::get('/edit/{player}', 'PlayerController@edit')->middleware('auth');
    Route::post('/edit/{player}', 'PlayerController@update')->middleware('auth');
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
    })->middleware('auth');

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
    })->middleware('auth');

    Route::get('{fixture_id}/add-yellow/{player_id}/{team}', function ($fixture_id, $player_id, $team) {
        $player = Player::findOrFail($player_id);
        $player->yellow += 1;
        $player->save();
        
        return redirect()->back();
    })->middleware('auth');

    Route::get('{fixture_id}/add-red/{player_id}/{team}', function ($fixture_id, $player_id, $team) {
        $player = Player::findOrFail($player_id);
        $player->red += 1;
        $player->save();
        
        return redirect()->back();
    })->middleware('auth');

    Route::get('{fixture_id}/{score_id}/finish-match', function ($fixture_id, $score_id) {
        $fixture = Fixtures::findOrFail($fixture_id);
        $score = Score::findOrFail($score_id);

        $fixture->match_end = '1';
        $fixture->save();

        $score_1 = $score->team_one;
        $score_2 = $score->team_two;
        if ($score_1 == $score_2) {
            $score->draw = '1';
        }
        $score->save();

        $standing_one = Standings::find($fixture->team_one_id);
        
        $standing_one->gf += $score_1;
        $standing_one->ga += $score_2;
        $standing_one->save();

        // ------------------------------------------- //

        $standing_two = Standings::find($fixture->team_two_id);
        
        $standing_two->ga += $score_1;
        $standing_two->gf += $score_2;
        $standing_two->save();

        // ------------------------------------------- //
        
        if ($score_1 > $score_2) {
            $standing_one->w += 1;
            $standing_one->save();

            $standing_two->l += 1;
            $standing_two->save();
        }
        if ($score_1 == $score_2) {
            $standing_one->d += 1;
            $standing_one->save();

            $standing_two->d += 1;
            $standing_two->save();
        }
        if ($score_1 < $score_2) {
            $standing_one->l += 1;
            $standing_one->save();

            $standing_two->w += 1;
            $standing_two->save();
        }

        return redirect('table-update');
    })->middleware('auth');
});

Route::get('/table-update', 'StandingsController@table_update')->middleware('auth');





/*
|--------------------------------------------------------------------------
| Test Routes Below (Delete these later)
|--------------------------------------------------------------------------
*/

Route::get('/add-score/{fixture_id}/{score_1}/{score_2}', 'ScoreController@add_score')->middleware('auth');

