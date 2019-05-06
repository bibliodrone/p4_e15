<?php
namespace App\Http\Controllers;
// 'use' imports functions into this namespace.
use Illuminate\Http\Request;
use App\Workout;

class WorkoutController extends Controller
{
    public function index()
    {
        $workouts = Workout::orderBy('id')->get();
        $dateviews = $workouts->groupBy([
            'date']);
    
        return view('workout.workout')->with(['workouts' => $workouts, 'dateviews' => $dateviews]); //. $result; 
        
    }
    
    public function getLog()
    {
        $results = Workout::all();
        dump($results->toArray());
    }
}