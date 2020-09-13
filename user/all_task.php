<?php
require_once 'session_required.php';
require_once '../Model/UserTask.php';
require_once '../Model/Task.php';
$user_task = new UserTask();
$task = new Task();
$user_tasks = $user_task->getSortedTaskUserByUserId($_SESSION['id']);
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
    <title>My Tasks</title>
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
                    <h3>All Tasks</h3>
                    <?php
                    if(!empty($_SESSION['message'])){?>
                        <h3 style="color: red" class="text-center"><?php echo $_SESSION['message']?></h3>
                    <?php }
                    unset($_SESSION['message']);
                    ?>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Task</th>
                            <th>Details</th>
                            <th>Start Date</th>
                            <th>Created On</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($user_tasks as $singleUserTask){?>
                            <tr>
                                <td><?php echo $task->getTaskById($singleUserTask->task_id)->task ?></td>
                                <td><?php echo $singleUserTask->details ?></td>
                                <td><?php echo $singleUserTask->start_dt ?></td>
                                <td><?php echo $singleUserTask->created_at ?></td>
                                <td>
                                    <a href="update_task_user.php?id=<?php echo $singleUserTask->id?>" class="btn btn-info">Update</a>
                                    <a href="delete_task_user.php?id=<?php echo $singleUserTask->id?>" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
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
