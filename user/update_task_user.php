<?php
    require_once 'session_required.php';
    require_once '../Model/UserTask.php';
    $page = 'all_task';
    $user_task = new UserTask();
    $taskUserInfo = $user_task->getTaskUserById($_GET['id']);
    $task_date_time = explode(' ',$taskUserInfo->start_dt);
    $task_date = $task_date_time[0];
    $task_time = $task_date_time[1];
    if(isset($_POST['submit'])){
        $start_date = $user_task->filter($_POST['start_date']);
        $start_time = $user_task->filter($_POST['start_time']);
        $start = $start_date.' '.$start_time;
        $updated_at = date('Y-m-d H:i:s');
        $user_task->updateUserTask($start,$updated_at,$taskUserInfo->id);
        $user_task->addLog('Task updated',$taskUserInfo->user_id,$updated_at);
        $_SESSION['message'] = 'Task updated successfully';
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
                        <h3>Update Your Task</h3>
                        <?php
                        if(!empty($_SESSION['message'])){?>
                            <h3 style="color: red" class="text-center"><?php echo $_SESSION['message']?></h3>
                        <?php }
                        unset($_SESSION['message']);
                        ?>
                        <form class="info-form col-md-8 offset-2" method="POST">
                            <div class="form-group">
                                <label class="form-check-label" for="exampleCheck1">Start Date</label>
                                <input name="start_date" type="date" value="<?php echo $task_date?>" class="form-control" id="datecheck">
                            </div>
                            <div class="form-group">
                                <label class="form-check-label" for="exampleCheck1">Select Start Time</label>
                                <input name="start_time" type="time" value="<?php echo $task_time?>" class="form-control" id="timecheck">
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