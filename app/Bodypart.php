<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bodypart extends Model
{
    public function workouts()
    {
        return $this->hasMany('App\Workout');
    }
    //
}
