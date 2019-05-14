@extends('layouts.master')

@section('content')

<!--<div id="main">
    <h2>My Workout Tracker</h2>
    @if(session("return-message"))
    <div>{{ session ("return-message")}}</div>
    @endif-->
    
    <p>Record Workout details or view past workouts.</p>
    <p>The 'Bodypart' column will be filled in automatically based on what exercise you choose.</p>
    <div id = "logUpdateForm">
    <form id = "main-form" method = 'POST' action = '/update_log'>
        {{ csrf_field() }}
        <fieldset>
            <legend>Record Workout</legend>
            <!-- search function, by body part?
                  $results = Workout::where('bodypart_id', '=', '1')->orderBy('date')->get();
            -->
                <label for = "date">Date
                <input type = "date" name = "date", value = {{old("date", "2019-01-01")}}>
                </label>
                <div class = "alignErrors">@include('includes.error-field', ['fieldName' => 'date'])</div>
            <hr>
            <ul class = "listNoStyle">
                <li>
                     <!--<select name="system">
                        <option value="tometric" {{ (old("system")=="tometric") ? "selected" : ""}} >Imperial to Metric   </option>
                        <option value="toimperial" {{ (old("system")=="toimperial") ? "selected" : "" }}>Metric to Imperial  </option>
                    </select>-->
                    
                    
                    <label for = "exercise" class = "labelLeft">Select exercise:
                        <select id = "exercise" name = "exercise">
                            <option></option>
                            @foreach ($validExercises as $ve)
                            <option value = "{{ $ve }}" {{ (old("exercise") == "$ve") ? "selected" : "" }}>{{$ve}}</option>
                            @endforeach
                        </select>
                    </label>
                    <div class = "alignErrors">
                        @include('includes.error-field', ['fieldName' => 'exercise'])
                    </div>
                </li>
            </ul>
            <ul class = "listNoStyle listblock">
                <li>
                    <label for = "sets" class = "inp">
                        Sets
                        <input type = "number" min = "1" max = "10" id = "sets" name = "sets" value = {{old("sets", "1")}}>
                    </label>
                    <div class = "alignErrors">
                        @include('includes.error-field', ['fieldName' =>  'sets'])
                    </div>
                </li>
                <li>
                    <label for = "reps" class = "inp">
                        Reps
                        <input type = "number" min = "1" max = "50" value = {{old("reps", "1")}} id = "reps" name = "reps">
                    </label>
                    <div class = "alignErrors">
                        @include('includes.error-field', ['fieldName' =>  'reps'])
                    </div>
                </li>
                <li>
                    <label for = "weight" class = "inp">
                        <!-- For simplicity the weight increments are set to an integer. 
                             A future improvement would be to implement fractional amounts, e.g. '2.5' -->
                        Weight
                        <input type = "number" min = "1" max = "999" step = "1" value = {{old("weight", "10")}} id = "weight" name = "weight">
                    </label>
                    <div class = "alignErrors">
                        @include('includes.error-field', ['fieldName' => 'weight'])
                    </div>
                </li>
            </ul>
             <input type="submit" class="btn btn-primary" id="submitButton" value="Submit">
        </fieldset>
    </form>
    </div>
    <div class = "left-div">
        <div id = "delete-note"> Click &#x26D4; to delete a row.</div>
        @include("includes.delete-message")
        <div id = 'workoutDay'>
            <table class = 'log-table'>
            <tr><th class = "toprow"></th><th class = "toprow">Date</th><th class = "toprow">Exercise</th><th class = "toprow">Sets</th><th class = "toprow">Reps</th><th class = "toprow">Weight</th><th class = "toprow">Bodypart</th></tr>
                @foreach($workouts as $workout)
                <tr><td><a href = "/delete/{{$workout->id}}">&#x26D4;</a></td><th class = 'rowHeader'>{{ $workout->date }}</th><td>{{ $workout->exercise }}</td><td>{{ $workout->sets }}</td><td>{{ $workout->reps }}</td><td>{{ $workout->weight }}</td><td>{{ $workout->bodypart_id }}</td></tr>
                @endforeach
            </table>
            <!--@if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif-->
        </div>
    </div>
@endsection
            
                