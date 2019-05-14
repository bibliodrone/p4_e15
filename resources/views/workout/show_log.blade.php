@extends('layouts.master')
@section('show_log')  
<div id = 'workoutDay'>
    <p>Show Log</p>
        <table class = 'log-table'>
        <tr><th class = "toprow">Date</th><th class = "toprow">Exercise</th><th class = "toprow">Sets</th><th class = "toprow">Reps</th><th class = "toprow">Weight</th><th class = "toprow">Bodypart</th></tr>
            <tr><th class = 'rowHeader'>{{ $date }}</th><td>{{ $exercise }}</td><td>{{ $sets }}</td><td>{{ $reps }}</td><td>{{ $weight }}</td><td>{{ $bodypart_id }}</td></tr>
        </table>
         <div id = 'returnMessage'>
            Return Message:
            @include('includes.return-message')
        </div>
    </div>
@endsection