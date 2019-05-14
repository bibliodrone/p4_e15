@if(session("deleteMessage"))
<div class = "alert-danger">
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
    <span>{{ session ("deleteMessage")}}</span>
    <form method = "POST" action = "/delete/{{session("workoutId")->id}}">
        {{ method_field("delete") }}
        {{ csrf_field() }}
        <input type = "submit" class = "deleteConfirm confirm" value = "Confirm Delete">
    </form>
    <div class = "deleteConfirm cancel">
        <a href = "/">Cancel Delete</a>
    </div>
</div>
@endif