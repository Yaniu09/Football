<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fixtures extends Model
{
    public function team1()
    {
        return $this->belongsTo('App\Teams', 'team_one_id');
    }

    public function team2()
    {
        return $this->belongsTo('App\Teams', 'team_two_id');
    }

    public function pitch()
    {
        return $this->belongsTo('App\Pitch', 'pitch_id');
    }
}
