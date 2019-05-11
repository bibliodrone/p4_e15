@extends('layouts.master')

@section('title')
@endsection

@section('head')
@endsection

@section('content')


<div id="main">
    <div id="instructions">
        <h2>Workout Log</h2>
        <ol>
            <p>Record Workout details or view past workouts</p>
        </ol>
    </div>

    <form id = "main-form" method = 'GET' action = '/workout_log'>
        <fieldset>
            <legend>Workout</legend>
            <ul>
                <li>
                    <label for = "exerciseName">Exercise name</label>
                    <input type = "text" id = "exerciseName">
                </li>
            
            </ul>
        </fieldset>
    </form>
    
    
    <div id = 'workoutDay'>
        <table class = 'log-table'>
        <tr><th>Date</th><th>Routine</th><th>sets</th><th>reps</th><th>Weight</th><th>Bodypart</th></tr>
            @foreach($workouts as $workout)
            <tr><th class = 'rowHeader'>{{ $workout->date }}</th><td>{{ $workout->exercise }}</td><td>{{ $workout->sets }}</td><td>{{ $workout->reps }}</td><td>{{ $workout->weight }}</td><td>{{ $workout->bodypart_id }}</td></tr>
            @endforeach
        </table>
    </div>
@endsection
            
                