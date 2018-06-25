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

Route::get('/add-score/{fixture_id}/{score_1}/{score_2}', 'ScoreController@add_score');
Route::get('/table-update', 'StandingsController@table_update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');