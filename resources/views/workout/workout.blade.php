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
    <!--<table id = 'log-table'>
        <tr>
            <th>Date</th><th>Exercise</th><th>Sets</th><th>Reps</th><th>Weight</th></tr>   
            @foreach($workouts as $workout)
                <tr>
                    <td>{{$workout->date}}</td>
                    <td>{{$workout->exercise}}</td>
                    <td>{{$workout->sets}}</td>
                    <td>{{$workout->reps}}</td>
                    <td>{{$workout->weight}}</td>
                </tr>
            @endforeach
    </table>-->
    @foreach($dateviews as $dateview)
    <div id = 'workoutDay'>
        <h4>{{ $dateview{0}->date  }}</h4>
        <table id = 'log-table'>
            <tr><th>Exercise</th><th>Sets</th><th>Reps</th><th>Weight</th></tr>
            @foreach($dateview as $date)
            <tr><td>{{ $date->exercise }}:</td><td>{{$date->sets}}</td><td>{{$date->reps}}</td><td>{{ $date->weight }}</td></tr>
            @endforeach
        </table>
    </div>
        @endforeach
@endsection
            
            