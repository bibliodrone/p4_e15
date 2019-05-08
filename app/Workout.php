<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    public static function dump($workouts = null)
    {
        # Empty array that will hold all our book data
        $data = [];
        
        if (is_null($workouts)) {
            $workouts = self::all();
        }
        foreach ($workouts as $workout) {
            $data[] = $workout->exercise . ' ' . $workout->sets . '  ' . $workout->reps;
        }
        dump($data);
    }
}
    