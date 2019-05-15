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
        /*  Define exercises displayed in the log-update form's dropdown menu.
            For now, the choices are limited to some of the most common exercises.
            >>> Future: consider allowing user to enter custom names for exercises, 
                or failing that, expand the list. 
        */
        $validExercises = ["bench-presses", "lat-pulldowns", "deadlifts", "overhead-presses","biceps-curls", "dips", "squats", "lunges"];
        
        $workouts = Workout::orderBy("date")->with("bodypart")->get();
        $workouts = $workouts->sortByDesc("date");
        
        //assign bodypart id tag based on exercise name...
        foreach ($workouts as $workout) {

            $bodypart = $workout->bodypart;
            $workout->bodypart_id = $bodypart->body_part;
        }
        
        $validBodyparts = Bodypart::orderBy("id")->select(["body_part", "id"])->get();
        
        return view("workout.workout")->with([
            "workouts" => $workouts,
            "validBodyparts" => $validBodyparts,
            "validExercises" => $validExercises,
    ]);
        
    }
        
    public function updateLog (Request $request)
    {    
        $request->validate([
            "date"=>"required|date",
            "exercise"=>"filled",
            "sets"=>"required|digits_between: 1, 10",
            "reps"=>"required|digits_between: 1, 50",
            "weight"=>"required|digits_between: 1, 999"
        ]);
        
        /* The switch statement with the "bodypart id" is a bit convoluted but I set it up 
           in this fashion to incorporate a pivot table relationship, linking a "bodypart id"
           in the workouts table to a bodypart string in the bodyparts table. The "bodypart"
           is sort of an automatically-assigned tag for the exercise entered by the user. 
        "*/
        
        /* Default 1 = 'none' */
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
        $workout->note = "";
        $workout->save();
        
        
        $returnMessage = "Log Entry Added";
        
        return redirect("/")->with(["returnMessage"=>$returnMessage])->withInput();
    }
    
    public function note($id)
    {
        $workout = Workout::find($id);
        
        if (!$workout) {
            $returnMessage = "Workout record not found";
            return redirect ("/")->with(["returnMessage"=>$returnMessage]);
        } else {
            $editMessage = "Update information";
            return redirect("/")->with(["editMessage"=>$editMessage, "workoutId" => $workout]);
        }
    }
    
    public function addNote(Request $request, $id) {
        $request->validate(["note"=>"string"]);
        
        $workout = Workout::find($id);        
        $workout->note = $request->input("note");
        $returnMessage = "Note '" . $workout->note . "' added.";
        
        $workout->save();
        
        return redirect("/")->with(["returnMessage"=>$returnMessage]);   
        
    }
    
    public function delete($id)
    {
        $workout = Workout::find($id);
        
        if (!$workout) {
            $returnMessage = "Workout record not found";
            return redirect ("/")->with(["returnMessage"=>$returnMessage]);
        } else {
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