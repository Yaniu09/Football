<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function standing()
    {
        return $this->hasOne('App\Standings', 'team_id');
    }

    public function player()
    {
        return $this->hasMany('App\Player', 'team_id');
    }
}
