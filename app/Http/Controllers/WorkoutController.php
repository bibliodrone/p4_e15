<?php
namespace App\Http\Controllers;
// 'use' imports functions into this namespace.
use Illuminate\Http\Request;
use App\Workout;
use App\Bodypart;

class WorkoutController extends Controller
{
    public function index()
    {
        $workouts = Workout::with('bodyparts')->get();
        
    
        return view('workout.workout')->with(['workouts' => $workouts]); //. $result; 
        
    }
    
    public function getLog()
    {
        $workouts = Workout::orderBy('id')->get();
        
        foreach ($workouts as $workout) {
            dump($workout->day.':');
        }
    }
}