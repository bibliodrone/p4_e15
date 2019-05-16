@extends('layouts.master')

@section('content')
    <div class = "pageHeader">
        <h6>Record Workout details or view past workouts.</h6>
        <p>The 'Bodypart' column will be filled in automatically based on what exercise you choose.</p>
    </div>
        
    <div id = "logUpdateForm">
<!-- Form for creation of new workout log entry -->
    <form id = "main-form" method = 'POST' action = '/update_log'>
        {{ csrf_field() }}
        <fieldset>
            <legend>Record Workout</legend>
            <!-- search function, by body part?
                  $results = Workout::where('bodypart_id', '=', '1')->orderBy('date')->get();
            -->
                <label for = "date">Date
                <input type = "date" name = "date" id = "date" value = {{old("date", "2019-01-01")}}>
                </label>
                <div class = "alignErrors">@include('includes.error-field', ['fieldName' => 'date'])</div>
            <hr>
            <ul class = "listNoStyle">
                <li>
                    <label for = "exercise" class = "labelLeft">Select exercise:
                        <select id = "exercise" name = "exercise">
                            <option hidden value></option>
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
            <div class = "center">
                <input type="submit" class="btn btn-primary" id="submitButton" value="Submit">
            </div>
        </fieldset>
    </form>
    </div>

<!--Display the workout log. Get entries from database, populate "bodypart" column based upon exercise name, and correlate between Workout and Bodypart tables. 
    Delete functionality is mediated through 'delete-message.blade (include)' which displays when a red icon is clicked. -->

    <div class = "float-left-div">
        @include("includes.delete-message")
        @include("includes.edit-field")
        <div id = 'workout-day'>
            <table class = 'log-table'>
            <tr><th class = "toprow"></th><th class = "toprow">Date</th><th class = "toprow">Exercise</th><th class = "toprow">Sets</th><th class = "toprow">Reps</th><th class = "toprow">Weight</th><th class = "toprow">Bodypart</th><th>Note</th><th></th></tr>
                @foreach($workouts as $workout)
                <tr><td class = "delete-icon"><a href = "/delete/{{$workout->id}}">&#x26D4;</a></td><th class = 'rowHeader'>{{ $workout->date }}</th><td>{{ $workout->exercise }}</td><td>{{ $workout->sets }}</td><td>{{ $workout->reps }}</td><td>{{ $workout->weight }}</td><td>{{ $workout->bodypart_id }}</td><td>{{ $workout->note }}</td><td class = "note-icon"><a href = "/note/{{ $workout->id}}">&#x270D;</a></td></tr>
                @endforeach
            </table>
        </div>
        <div class = "form-note"> Click &#x26D4; to delete the accompanying row.</div>
        <div class = "form-note"> Click &#x270D; to add a note to a row. </div>
    </div>
@endsection
            
                