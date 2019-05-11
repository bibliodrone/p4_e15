<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    public static function dump($workouts = null)
    {
        $data = [];
        
        if (is_null($workouts)) {
            $workouts = self::all();
        }
        foreach ($workouts as $workout) {
            $data[] = $workout->routine. ' ' . $workout->sets . '  ' . $workout->reps;
        }
        dump($data);
    }
    
    #relationship method belongs to many routines
    public function bodyparts()
    {
        return $this->belongsTo('App\Bodypart');
    }
}
    