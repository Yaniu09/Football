<?php

use App\Group;
use App\Teams;

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
    foreach ($groups as $group) {
        # code...
    }
    $groupa = Teams::where('group_id' , 1)->get();
    $groupb = Teams::where('group_id' , 2)->get();
    $groupc = Teams::where('group_id' , 3)->get();
    $groupd = Teams::where('group_id' , 4)->get();
    return view('welcome',compact('groups','groupa','groupb','groupc','groupd   '));
});
