@extends('layouts.master')

@section('title')
@endsection

@section('head')
@endsection

@section('content')


<div id="main">
    <div id="instructions">
        <h2>My Workout Tracker</h2>
        <ol>
            <p>Record Workout details or view past workouts</p>
        </ol>
    </div>

    <form id = "main-form" method = 'GET' action = '/workout_log'>
        <fieldset>
            <legend>Workout Log</legend>
            
                <label for = "pickDate">Date
                <input type = "date">
                </label>
            <hr>
            <ul class = "listblock">
                <li>
                    <label for = "exerciseName">Exercise name
                        <input type = "text" id = "exerciseName">
                    </label>
                </li>
                <li>
                    <label for = "bpselect">Body-part:</label>
                    <select id = "bpselect">
                        @foreach($validBodyparts as $vbp)
                        <option>{{ $vbp->body_part }}</option>
                        @endforeach
                    </select>
                </li>
            </ul>
                <label for = "sets">
                    <span class = "alignLabel">Sets</span>
                    <input type = "text" id = "sets"></label>
                
                <label for = "reps">
                    <span class = "alignLabel">Reps</span>
                    <input type = "text" id = "reps"></label>
                
                <label for = "weight">
                    <span class = "alignLabel">Weight</span>
                    <input type = "text" id = "weight"></label>
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
            
                