<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    public static function dump($books = null)
    {
        # Empty array that will hold all our book data
        $data = [];
        # Determine if we should use $books as was passed to this method
        # or query for all books
        if (is_null($workouts)) {
            # Query for all the books
            $workouts = self::all();
        }
        # Load the data array with the book info we want
        foreach ($workouts as $workout) {
            $data[] = $workout->exercise . ' ' . $workout->sets . '  ' . $workout->reps;
        }
        dump($data);
    }
}
    