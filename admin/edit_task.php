<?php
require_once 'session_required_admin.php';
require_once '../Model/Task.php';
$task = new Task();
$taskInfo = $task->getTaskById($_GET['id']);
if(isset($_POST['submit'])){
    $task_name = $task->filter($_POST['task']);
    $details = $task->filter($_POST['details']);
    $updated_at = date('Y-m-d H:i:s');
    $task->editTask($task_name,$details,$updated_at,$taskInfo->id);
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
    <title>Update Password</title>
</head>

<body>
    <div class="container-fluid">
        <div class=" row profile">
            <div class="col-md-2 sidebar1">
                <?php
                    include 'profile.php' ;
                ?>
            </div>
            <div class="col-md-10 sidebar2">
                <?php include 'navbar.php';?>

                <section id="profile-info">
                    <?php
                    if(!empty($_SESSION['message'])){?>
                        <h3 style="color: red" class="text-center"><?php echo $_SESSION['message']?></h3>
                    <?php }
                    unset($_SESSION['message']);
                    ?>
                    <div class="offset-3 col-md-6">
                        <h3 class="text-center"> Update Task </h3>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="task">Task :</label>
                                <input type="text" name="task" class="form-control" placeholder="Enter task title" value="<?php echo $taskInfo->task ?>" id="task">
                            </div>
                            <div class="form-group">
                                <label for="details">Details:</label>
                                <textarea class="form-control" name="details" id="details" placeholder="Enter details"><?php echo $taskInfo->details ?></textarea>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </section>

                <script src="https://code.jquery.com/jquery-3.5.1.min.js">
                </script>
                <script src="../js/custom.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                <script src="../js/bootstrap.min.js"></script>
</body>

</html>