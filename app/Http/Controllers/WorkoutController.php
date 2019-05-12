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
        //$workouts = Workout::with('bodyparts')->get();
        $workouts = Workout::with('bodypart')->get();
        //assign bodypart id based on exercise name...
        foreach ($workouts as $workout) {

            $bodypart = $workout->bodypart;
            $workout->bodypart_id = $bodypart->body_part;
        }
        
        $validBodyparts = Bodypart::orderBy('id')->select(['body_part', 'id'])->get();
        
        return view('workout.workout')->with([
            'workouts' => $workouts,
            'validBodyparts' => $validBodyparts
        ]); //. $result; 
        
    }
    
    public function getLog()
    {
        $workouts = Workout::with('bodypart')->get();
        //assign bodypart id based on exercise name...
        foreach ($workouts as $workout) {

            $bodypart = $workout->bodypart;
            $workout->bodypart_id = $bodypart->body_part;
        }
        
        $validBodyparts = Bodypart::orderBy('id')->select(['body_part', 'id'])->get();
        
        /*return view('workout.workout')->with([
            'workouts' => $workouts,
            'bodyparts' => $validBodyparts
        ]); */
    
        foreach ($validBodyparts as $vbp) {
            dump($vbp->body_part);
        }
    }
} 