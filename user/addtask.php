<?php
    require_once 'session_required.php';
    require_once '../Model/UserTask.php';
    require_once '../Model/Task.php';
    $user_task = new UserTask();
    $task = new Task();
    $tasks = $task->getTasks();
    if(isset($_POST['submit'])){
        $task_id = $user_task->filter($_POST['task_id']);
        $start_date = $user_task->filter($_POST['start_date']);
        $start_time = $user_task->filter($_POST['start_time']);
        $start = $start_date.' '.$start_time;
        $details = $user_task->filter($_POST['details']);
        $user_id = $_SESSION['id'];
        $status = NULL;
        $created_at = date('Y-m-d H:i:s');
        $user_task->addUserTask($task_id,$user_id,$details,$start,$created_at);
        $user_task->addLog('Task added by user id '.$user_id,$user_id,$created_at);
        $_SESSION['message'] = 'New task added successfully';
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                        <form class="info-form col-md-8 offset-2" method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Select Task</label>
                                <select class="custom-select" name="task_id">
                                    <option value="NULL">Choose new task</option>
                                    <?php foreach ($tasks as $singleTask){?>
                                        <option value="<?php echo $singleTask->id?>" title="<?php echo $singleTask->details?>"><?php echo $singleTask->task?></option>
                                    <?php } ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-check-label" for="exampleCheck1">Start Date</label>
                                <input name="start_date" type="date" class="form-control" id="datecheck">
                            </div>
                            <div class="form-group">
                                <label class="form-check-label" for="exampleCheck1">Select Start Time</label>
                                <input name="start_time" type="time" class="form-control" id="timecheck">
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
</body>
</html>