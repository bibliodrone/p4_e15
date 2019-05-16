# Project 4
+ By: Gerry Walden
+ Production URL: <http://p4.geraldbrentwalden.me>

## Feature summary
+ App has a simple interface that displays a form to record data about a weight-lifting workout, and beside that a view of the most
recent entries, sorted by date/descending.
+ A string for "bodypart" will be added to the row automatically after the user submits their data. e.g.: the bench-press is a "chest" exercise. This could be thought of as an auto-generated tag. Part of the reason I did this was to display the pivot table functionality.
+ The user can click on an icon next to each row in the table, to delete the corresponding entry. 
+ After the workout log entry is added to the table, it will immediately display as the view refreshes. The user can at this point click the "note" icon to add a short text note to the workout entry (editing the 'note' column, which is blank when first generated).  
  
## Database summary
There are really only two tables in the database. I realized that adding more was unnecessary and over-complicated for what I ended up creating.
+ Workout has a "belongs-to" relationship to Bodypart.
+ Bodypart has a "has-many" relationship to Workout.

## Outside resources
I consulted Stack Overflow for information on the "option" tag and how to have an initial blank option in my select input, that would pass HTML validation (option without "label" attr cannot be blank) but still trigger Laravel's validation mechanism for catching required fields. I remember this came up in the class video as well. I had to experiment a bit to see what would meet my needs, and the result was:
    `<option hidden value label = "Make a selection"></option>`


## Code style divergences
There may be a few inconsistencies in the use of single or double quotes. After reading the issues forum post about the quirks of how single-quoted strings are handled, I've decided to use double quotes from now on (except for nesting purposes, of course). 

the nu HTML checker is still showing a warning for my page (shown below), but I've decided it is OK to leave for now. I will do a bit of research into what "using a polyfill" would entail 

`Warning: The date input type is not supported in all browsers. Please be sure to test, and consider using a polyfill.
From line 32, column 17; to line 32, column 82
          <input type = "date" name = "date" id = "date" value = 2019-01-01>↩`



## Notes for instructor
There are a lot of stylistic tweaks I would apply using Javascript, to make certain aesthetic and usability improvements. For instance, the way the "edit" and "delete" views pop into view and displace the table is not ideal. Also, there are a few cases where a div containing an '<a>' element is styled to match a nearby button, and I would want to attach a click event to those, so that clicking the div but not the 'a' tag inside it would still work to 'activate' the link, thus functioning in a more button-like manner. This is true for the 'delete' and 'edit' icons, as well -- the user has to click right on the <a> tag to activate those.
