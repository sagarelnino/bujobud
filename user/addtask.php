<?php
    require_once 'session_required.php';
    require_once '../Model/UserTask.php';
    require_once '../Model/Task.php';
    $page = 'addTask';
    $user_task = new UserTask();
    $task = new Task();
    $tasks = $task->getTasks();
    if(isset($_POST['submit'])){
        $task_id = $user_task->filter($_POST['task_id']);
        $start_date = $user_task->filter($_POST['start_date']);
        $start_time = $user_task->filter($_POST['start_time']);
        $start_dt = $start_date.' '.$start_time;
        $is_repeat = $_POST['is_repeat'];
        $repeat_type = $_POST['repeat_type'];
        $repeat_after = $_POST['repeat_after'];
        $end_date = $_POST['end_date'];
        $end_time = $_POST['end_time'];
        $end_dt = $end_date.' '.$end_time;
        $details = $user_task->filter($_POST['details']);
        $user_id = $_SESSION['id'];
        $status = NULL;
        $created_at = date('Y-m-d H:i:s');
        $user_task->addUserTask($user_id,$task_id,$details,$start_dt,$is_repeat,$repeat_type,$repeat_after,$end_dt,$created_at);
        $user_task->addLog('Task added by user id '.$user_id,$user_id,$created_at);
        $_SESSION['message'] = 'New task added successfully';
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo.ico">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style_updated.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="profile.css">
    <title>Add Task</title>
</head>

<body>
    <div class="container-fluid">
        <div class=" row profile">
            <div class="col-md-2 sidebar1">
                <?php include 'profile.php'; ?>
            </div>
            <div class="col-md-10 sidebar2">
                <?php include 'navbar.php';?>
                <section class="add-task">
                    <div class="container new-task">
                        <h3>Add Your New Task</h3>
                        <?php
                        if(!empty($_SESSION['message'])){?>
                            <h3 style="color: red" class="text-center"><?php echo $_SESSION['message']?></h3>
                        <?php }
                        unset($_SESSION['message']);
                        ?>
                        <form class="info-form col-md-8 offset-2" method="POST" onchange="myfun()" onsubmit="return validate()">
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
                                <label class="form-check-label" for="exampleCheck1">Start Date</label>
                                <input name="start_date" type="date" class="form-control" id="start_date">
                                <span class="error-message" id="start_date_error"></span>
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
                                    <label class="form-check-label" for="exampleCheck1">End Date</label>
                                    <input name="end_date" type="date" class="form-control" id="end_date">
                                    <span class="error-message" id="end_date_error"></span>
                                </div>
                                <div class="form-group">
                                    <label class="form-check-label" for="exampleCheck1">Select End Time</label>
                                    <input name="end_time" type="time" class="form-control" id="end_time">
                                    <span class="error-message" id="end_time_error"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Task Details</label>
                                <textarea name="details" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div> <br>
                            <button type="submit" name="submit" class="btn btn-primary">Add Task</button>
                        </form>
                    </div>
                </section>
            </div>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js">
    </script>
    <script src="../js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
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
            if(document.getElementById('start_date').value === ''){
                document.getElementById('start_date_error').style.display = 'block';
                document.getElementById('start_date_error').innerText = 'Please add one';
                check = 0;
            }else{
                document.getElementById('start_date_error').style.display = 'none';
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
                if(document.getElementById('end_date').value === ''){
                    document.getElementById('end_date_error').style.display = 'block';
                    document.getElementById('end_date_error').innerText = 'Please add one';
                    check = 0;
                }else{
                    document.getElementById('end_date_error').style.display = 'none';
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