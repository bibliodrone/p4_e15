<?php
namespace App\Http\Controllers;
// "use" imports functions into this namespace.
use Illuminate\Http\Request;
use App\Workout;
use App\Bodypart;

class WorkoutController extends Controller
{   
    public function index()
    {
        $validExercises = ["bench-presses", "lat-pulldowns", "deadlifts", "overhead-presses","biceps-curls", "dips", "squats", "lunges"];
        //$workouts = Workout::with("bodyparts")->get();
        $workouts = Workout::orderBy("date")->with("bodypart")->get();
        
        //assign bodypart id based on exercise name...
        foreach ($workouts as $workout) {

            $bodypart = $workout->bodypart;
            $workout->bodypart_id = $bodypart->body_part;
        }
        
        $validBodyparts = Bodypart::orderBy("id")->select(["body_part", "id"])->get();
        
        return view("workout.workout")->with([
            "workouts" => $workouts,
            "validBodyparts" => $validBodyparts,
            "validExercises" => $validExercises,
    ]); //. $result; 
        
    }
    
    
    public function updateLog(Request $request)
    {    
        $request->validate([
            "date"=>"required|date",
            "exercise"=>"filled",
            "sets"=>"required|digits_between: 1, 10",
            "reps"=>"required|digits_between: 1, 50",
            "weight"=>"required|digits_between: 1, 999"
        ]);
        
        
        $bodypart_id = 1;
        
        switch($request->exercise) {
                case "bench-presses":
                    $bodypart_id = 2;
                    break;
                case "lat-pulldowns":
                case "deadlifts":
                    $bodypart_id = 3;
                    break;
                case "overhead-presses":
                    $bodypart_id = 4;
                    break;
                case "biceps-curls":
                case "dips":
                    $bodypart_id = 5;
                    break;
                case "squats":
                case "lunges":
                    $bodypart_id = 6;
                    break;
                default:
                    $bodypart_id = 1;
        }
        
        
        $workout = new Workout();
        /* using dynamic properties, with validation above;
           could also use, e.g.:
               $request->input("exercise", null);
        */  
        $workout->date = $request->date;
        $workout->exercise = $request->exercise;
        $workout->sets = $request->sets;
        $workout->reps = $request->reps;
        $workout->weight = $request->weight;
        $workout->bodypart_id = $bodypart_id;
        $workout->save();
        
        $returnMessage = "Update Processed";
        
        return redirect("/")->with(["returnMessage"=>$returnMessage])->withInput();
    }
    
    public function showResults(Request $request) 
    {
        /*$date = $request->session()->get("date", "");
        $exercise = $request->session()->get("exercise", "");
        $sets = $request->session()->get("sets", "");
        $reps = $request->session()->get("reps", "");
        $weight = $request->session()->get("weight", "");
        
        $validExercises = ["bench-presses", "lat-pulldowns", "deadlifts", "overhead-presses","biceps-curls", "dips", "squats", "lunges"];
        $validBodyparts = Bodypart::orderBy("id")->select(["body_part", "id"])->get();*/
        
        $returnMessage = $request->session()->get("returnMessage", "no message");
        return view("workout.workout")->with([
                "returnMessage" => $returnMessage
        ]);
        
    }
    
    public function delete($id)
    {
        $workout = Workout::find($id);
        
        if (!$workout) {
            $returnMessage = "Workout record not found";
            return redirect ("/")->with(["returnMessage"=>$returnMessage]);
        }else{
            $deleteMessage = "Delete Row -- Are you sure?";
            return redirect("/")->with(["deleteMessage"=>$deleteMessage, "workoutId" => $workout]);
        
        }
    }
    
    public function destroy($id)
    {
        $workout = Workout::find($id);
        $workout->delete();
        $returnMessage = "Workout log entry deleted"; 
        return redirect("/")->with(["returnMessage"=>$returnMessage]);            
    }
} 