<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    public function fixture()
    {
        return $this->belongsTo('App\Fixtures', 'fixture_id');
    }
}
