<!DOCTYPE html>
<html lang="en">

<head>
    <title>Workout Log</title>
    <meta charset="utf-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="/css/styles.css" rel="stylesheet">

    @yield("head")
</head>
<body>    
    <header>
        <h2>My Workout Tracker</h2>
   </header>
    
    <section id = "main">
        @yield("content")
    </section>
     @if(session("returnMessage"))
        <div class = "alert-popup">{{ session ("returnMessage")}}</div>
    @endif
    <footer>
        &copy; {{date('Y')}} Gerald Walden
    </footer>

</body>

</html>
