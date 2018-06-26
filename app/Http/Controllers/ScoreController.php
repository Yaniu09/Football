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

class ScoreController extends Controller
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
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function show(Score $score)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function edit(Score $score)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Score $score)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function destroy(Score $score)
    {
        //
    }

    public function add_score($fixture_id, $score_1, $score_2)
    {
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
    }
}
