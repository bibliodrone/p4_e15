@if(session("editMessage"))
<!-- Used to add/edit the Note field -->
<div>
    <em>Add note to this entry:</em>
    <table class = "log-table">
        <tr><th>Date</th><th>Exercise</th><th>Sets</th><th>Reps</th><th>Weight</th></tr>
        <tr>
            <td>{{session("workoutId")->date}}</td>
            <td>{{session("workoutId")->exercise}}</td>
            <td>{{session("workoutId")->sets}}</td>
            <td>{{session("workoutId")->reps}}</td>
            <td>{{session("workoutId")->weight}}</td>
        </tr>
    </table>
    <hr>
    <!--<span>{{ session ("editMessage")}}</span>-->
    <form method = "POST" action = "/addNote/{{session("workoutId")->id}}">
        {{ csrf_field() }}
        <label for = "note">Note: <input type = "text" name = "note"></label>
        <input type = "submit" class = "confirm" value = "Save">
        <span class = "delete confirm">
            <a href = "/">Cancel</a>
        </span>
    </form>
    
</div>
@endif