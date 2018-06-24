<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Standings extends Model
{
    public function group()
    {
        return $this->hasMany('App\Group');
    }

    public function team()
    {
        return $this->hasOne('App\Team');
    }
}
