<?php
    require_once 'session_required.php';
    require_once '../Model/Task.php';
    $task = new Task();
    $tasks = $task->getTasks();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo.ico">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style_updated.css">
    <link rel="stylesheet" href="../css/modal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

    <link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>


    <link rel="stylesheet" href="profile.css">
    <title>Dashboard</title>
</head>

<body>
<div class="container-fluid">
    <div class="row profile">
        <div class="col-md-2 sidebar1">
            <?php include 'profile.php'; ?>
        </div>
        <div class="col-md-10 sidebar2">
            <?php include 'navbar.php'; ?>
            <div class="col-md-12">
                <div class="cal-div">
                    <!--Set up your HTML markup-->
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <form class="info-form col-md-8 offset-2">
            <div class="form-group">
                <label for="task_id">Select Task</label>
                <select class="custom-select" name="task_id" id="task_id" required>
                    <option value="NULL">Choose new task</option>
                    <?php foreach ($tasks as $task){ ?>
                        <option value="<?php echo $task->id?>" title="<?php $task->details ?>"><?php echo $task->task?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="details">Task Details</label>
                <textarea name="details" class="form-control" id="details" rows="3" placeholder="Enter task details"></textarea>
            </div>
            <div class="form-group">
                <label for="start_time">Start Time</label>
                <input type="time" class="form-control" name="start_time" id="start_time" placeholder="Enter start time" required>
            </div>
            <button type="button" name="submit" class="btn btn-primary" id="add_task">Add Task</button>
        </form>
    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/custom.js"></script>


<script>
    function reset() {
        document.getElementById('task_id').value = null;
        document.getElementById('details').value = '';
        document.getElementById('start_time').value = '';
    }
    $(document).ready(function() {
        var calendar = $('#calendar').fullCalendar({
            editable:true,
            header:{
                left:'prev,next today',
                center:'title',
                right:'month,agendaWeek,agendaDay'
            },
            events: 'load.php',
            selectable: true,
            select: function(start, end, allDay)
            {
                // Get the modal
                var modal = document.getElementById("myModal");

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                modal.style.display = "block";

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                    modal.style.display = "none";
                };

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                };
                document.getElementById('add_task').addEventListener('click',function () {
                    var task_id = $('#task_id').val();
                    var details = $('#details').val();
                    start_ind = moment(start).format('Y-MM-DD');
                    var start_time = $('#start_time').val();
                    /*start_ind = start_date.substr(0, start_date.lastIndexOf(' '));*/
                    /*end_ind = moment(end).format('Y-MM-DD');*/
                    /*end_date = end_date.substr(0, end_date.lastIndexOf(' '));*/
                    /*var end_time = $('#end_time').val();*/
                    var start_final = start_ind + ' ' + start_time;
                    $.ajax({
                        url:"add_task.php",
                        type:"POST",
                        data:{task_id:task_id, start_date:start_final, details:details},
                        success:function()
                        {
                            calendar.fullCalendar('refetchEvents');
                            reset();
                            modal.style.display = "none";
                            alert("Task Added Successfully");
                        }
                    })
                });
                /*var title = prompt("Enter Event Title");


                if(title)
                {
                    var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url:"insert.php",
                        type:"POST",
                        data:{title:title, start:start, end:end},
                        success:function()
                        {
                            calendar.fullCalendar('refetchEvents');
                            alert("Added Successfully");
                        }
                    })
                }*/
            },
            editable:true,
            /*eventResize:function(event)
            {
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                var title = event.title;
                var id = event.id;
                $.ajax({
                    url:"update.php",
                    type:"POST",
                    data:{title:title, start:start, end:end, id:id},
                    success:function(){
                        calendar.fullCalendar('refetchEvents');
                        alert('Event Update');
                    }
                })
            },*/

            eventDrop:function(event)
            {
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                var id = event.id;
                $.ajax({
                    url:"update_task.php",
                    type:"POST",
                    data:{start:start, id:id},
                    success:function()
                    {
                        calendar.fullCalendar('refetchEvents');
                        alert("Event Updated");
                    }
                });
            },

            eventClick:function(event)
            {
                if(confirm("Are you sure you want to remove it?"))
                {
                    var id = event.id;
                    $.ajax({
                        url:"delete_task.php",
                        type:"POST",
                        data:{id:id},
                        success:function()
                        {
                            calendar.fullCalendar('refetchEvents');
                            alert("Event Removed");
                        }
                    })
                }
            }

        });
    });
</script>




</body>

</html>
