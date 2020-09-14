<?php
    require_once 'session_required_admin.php';
    $page = 'dashboard';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style_updated.css">
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
                <div class="pl-4 mt-3">
                    <h3>Important Links</h3>
                    <ul>
                        <li><a href="add_task.php" class="mt-2 btn btn-outline-success">Add Task</a> </li>
                        <li><a href="tasks.php" class="mt-2 btn btn-outline-success">All Tasks</a> </li>
                        <li><a href="users.php" class="mt-2 btn btn-outline-success">Users</a> </li>
                        <li><a href="update_password.php" class="mt-2 btn btn-outline-success">Update Password</a> </li>
                        <li><a href="logs.php" class="mt-2 btn btn-outline-success">Log</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/custom.js"></script>

</body>

</html>