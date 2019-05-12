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
    public static function getParts()
    {
        return self::orderBy('id')->select(['body_part', 'id'])->get();
    }
}
