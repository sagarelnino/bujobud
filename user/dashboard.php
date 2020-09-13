<?php
    require_once 'session_required.php';
    require_once '../Model/Task.php';
    $page = 'dashboard';
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
        <form class="info-form col-md-8 offset-2" onchange="myfun()">
            <div class="form-group">
                <label for="exampleInputEmail1">Select Task</label>
                <select class="form-control" name="task_id" id="task_id">
                    <option value="">Choose new task</option>
                    <?php foreach ($tasks as $singleTask){?>
                        <option value="<?php echo $singleTask->id?>" title="<?php echo $singleTask->details?>"><?php echo $singleTask->task?></option>
                    <?php } ?>

                </select>
                <span class="error-message" id="task_id_error"></span>
            </div>
            <div class="form-group">
                <label class="form-check-label" for="exampleCheck1">Select Start Time</label>
                <input name="start_time" type="time" class="form-control" id="start_time">
                <span class="error-message" id="start_time_error"></span>
            </div>
            <div class="form-group">
                <label class="form-check-label" for="exampleCheck1">Repeat</label>
                <input type="radio" name="is_repeat" id="is_repeat_1" value="0" checked> No
                <input type="radio" name="is_repeat" id="is_repeat_2" value="1"> Yes
            </div>
            <div id="repeat-info">
                <div class="form-group">
                    <label class="form-check-label" for="exampleCheck1">Repeat Type</label>
                    <select class="form-control" name="repeat_type" id="repeat_type">
                        <option value="">Select One</option>
                        <option value="daily">Daily</option>
                        <option value="weekly">Weekly</option>
                        <option value="monthly">Monthly</option>
                        <option value="yearly">Yearly</option>
                    </select>
                    <span class="error-message" id="repeat_type_error"></span>
                </div>
                <div class="form-group">
                    <label class="form-check-label" for="exampleCheck1">Repeat After</label>
                    <input name="repeat_after" type="number" min="1" class="form-control" id="repeat_after">
                    <span class="error-message" id="repeat_after_error"></span>
                </div>
                <div class="form-group">
                    <label class="form-check-label" for="exampleCheck1">Select End Time</label>
                    <input name="end_time" type="time" class="form-control" id="end_time">
                    <span class="error-message" id="end_time_error"></span>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Task Details</label>
                <textarea name="details" class="form-control" id="details" rows="3"></textarea>
            </div> <br>
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
        document.getElementById('end_time').value = '';
        document.getElementById('repeat_type').value = '';
        document.getElementById('repeat_after').value = '';
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
                    var check = 1;
                    if(document.getElementById('task_id').value === ''){
                        document.getElementById('task_id_error').style.display = 'block';
                        document.getElementById('task_id_error').innerText = 'Please Select One';
                        check = 0;
                    }else{
                        document.getElementById('task_id_error').style.display = 'none';
                    }

                    if(document.getElementById('start_time').value === ''){
                        document.getElementById('start_time_error').style.display = 'block';
                        document.getElementById('start_time_error').innerText = 'Please add one';
                        check = 0;
                    }else{
                        document.getElementById('start_time_error').style.display = 'none';
                    }
                    if(document.getElementById('is_repeat_2').checked){
                        if(document.getElementById('repeat_type').value === ''){
                            document.getElementById('repeat_type_error').style.display = 'block';
                            document.getElementById('repeat_type_error').innerText = 'Please add one';
                            check = 0;
                        }else{
                            document.getElementById('repeat_type_error').style.display = 'none';
                        }

                        if(document.getElementById('repeat_after').value === ''){
                            document.getElementById('repeat_after_error').style.display = 'block';
                            document.getElementById('repeat_after_error').innerText = 'Please add one';
                            check = 0;
                        }else{
                            document.getElementById('repeat_after_error').style.display = 'none';
                        }

                        if(document.getElementById('end_time').value === ''){
                            document.getElementById('end_time_error').style.display = 'block';
                            document.getElementById('end_time_error').innerText = 'Please add one';
                            check = 0;
                        }else{
                            document.getElementById('end_time_error').style.display = 'none';
                        }
                    }
                    if(check === 1){
                        var task_id = $('#task_id').val();
                        var details = $('#details').val();
                        var start_date = moment(start).format('Y-MM-DD');
                        var start_time = $('#start_time').val();
                        var is_repeat = $('#is_repeat_1').val();
                        var repeat_type = $('#repeat_type').val();
                        var repeat_after = $('#repeat_after').val();
                        var end_date = moment(end).format('Y-MM-DD');
                        var end_time = $('#end_time').val();
                        var start_final = start_date + ' ' + start_time;
                        var end_final = end_date + ' ' + end_time;
                        $.ajax({
                            url:"add_task.php",
                            type:"POST",
                            data:{task_id:task_id, start_date:start_final, is_repeat:is_repeat,repeat_type:repeat_type,repeat_after:repeat_after, end_date:end_final, details:details},
                            success:function()
                            {
                                calendar.fullCalendar('refetchEvents');
                                reset();
                                modal.style.display = "none";
                                alert("Task Added Successfully");
                            }
                        })
                    }
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
<script>
    function myfun(){
        if(document.getElementById('is_repeat_2').checked){
            document.getElementById('repeat-info').style.display = 'block';
        }else if(document.getElementById('is_repeat_1').checked){
            document.getElementById('repeat-info').style.display = 'none';
        }
    }
    function validate() {
        var check = 1;
        if(document.getElementById('task_id').value === ''){
            document.getElementById('task_id_error').style.display = 'block';
            document.getElementById('task_id_error').innerText = 'Please Select One';
            check = 0;
        }else{
            document.getElementById('task_id_error').style.display = 'none';
        }

        if(document.getElementById('start_time').value === ''){
            document.getElementById('start_time_error').style.display = 'block';
            document.getElementById('start_time_error').innerText = 'Please add one';
            check = 0;
        }else{
            document.getElementById('start_time_error').style.display = 'none';
        }
        if(document.getElementById('is_repeat_2').checked){
            if(document.getElementById('repeat_type').value === ''){
                document.getElementById('repeat_type_error').style.display = 'block';
                document.getElementById('repeat_type_error').innerText = 'Please add one';
                check = 0;
            }else{
                document.getElementById('repeat_type_error').style.display = 'none';
            }

            if(document.getElementById('repeat_after').value === ''){
                document.getElementById('repeat_after_error').style.display = 'block';
                document.getElementById('repeat_after_error').innerText = 'Please add one';
                check = 0;
            }else{
                document.getElementById('repeat_after_error').style.display = 'none';
            }

            if(document.getElementById('end_time').value === ''){
                document.getElementById('end_time_error').style.display = 'block';
                document.getElementById('end_time_error').innerText = 'Please add one';
                check = 0;
            }else{
                document.getElementById('end_time_error').style.display = 'none';
            }
        }
        if(check === 1){
            return true;
        }
        return false;
    }
</script>



</body>

</html>
