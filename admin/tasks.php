<?php
require_once 'session_required_admin.php';
require_once '../Model/Task.php';
$page = 'tasks';
$task = new Task();
$tasks = $task->getTasks();
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
    <title>Task List</title>
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
                    <div class="col-md-12">
                        <h3> Task List </h3>
                        <?php
                        if(!empty($_SESSION['message'])){?>
                            <h3 style="color: red" class="text-center"><?php echo $_SESSION['message']?></h3>
                        <?php }
                        unset($_SESSION['message']);
                        ?>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Task</th>
                                <th scope="col">Details</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Updated at</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($tasks as $task){ ?>
                                <tr>
                                    <td><?php echo $task->task; ?></td>
                                    <td><?php echo $task->details; ?></td>
                                    <td><?php echo $task->created_at; ?></td>
                                    <td><?php echo $task->updated_at; ?></td>
                                    <td>
                                        <a href="edit_task.php?id=<?php echo $task->id ?>" class="btn btn-info">Edit</a> <a onclick="return confirm('Are you sure to delete?')" href="delete_task.php?id=<?php echo $task->id ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php }
                            ?>
                            </tbody>
                        </table>


                    </div>
                </section>

                <script src="https://code.jquery.com/jquery-3.5.1.min.js">
                </script>
                <script src="../js/custom.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                <script src="../js/bootstrap.min.js"></script>
</body>

</html>
