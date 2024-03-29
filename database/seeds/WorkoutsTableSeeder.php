<?php

use Illuminate\Database\Seeder;
use App\Workout;
use App\Bodypart;

class WorkoutsTableSeeder extends Seeder
    
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $workouts = [
            ['2019-04-15','bench-presses', 2, 8, 135, 1],
            ['2019-04-15','bench-presses', 2, 8, 155, 1],
            ['2019-04-19', 'squats', 2, 5, 250, 1],
            ['2019-04-19', 'squats', 2, 5, 270, 1],
            ['2019-04-19', 'deadlifts', 3, 6, 275, 1],
            ['2019-04-22', 'overhead-presses', 4, 8, 150, 1],
            ['2019-04-22', 'lat-pulldowns', 4, 10, 165, 1]
        ];
        
        $count = count($workouts);
        foreach ($workouts as $key => $workoutData) {
            //$bodypart_id = Bodypart::where('bodypart_id', '=', 'id');
            
            $workout = new Workout();
            $workout->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $workout->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $workout->date = $workoutData[0];
            $workout->exercise = $workoutData[1];
            $workout->sets = $workoutData[2];
            $workout->reps = $workoutData[3];
            $workout->weight = $workoutData[4];
            $workout->note = "";
            
            switch($workout->exercise) {
                case "bench-presses":
                    $workout->bodypart_id = 2;
                    break;
                case "lat-pulldowns":
                case "deadlifts":
                    $workout->bodypart_id = 3;
                    break;
                case "overhead-presses":
                    $workout->bodypart_id = 4;
                    break;
                case "biceps-curls":
                case "dips":
                    $workout->bodypart_id = 5;
                    break;
                case "squats":
                case "lunges":
                    $workout->bodypart_id = 6;
                    break;
                default:
                    $workout->bodypart_id = 1;
                    
            }
            
            //$workout->bodypart_id = $workoutData[5];
            
            $workout->save();
            $count--;
        }
    }
}
