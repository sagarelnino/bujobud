<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php if($page == 'dashboard'){ echo 'active'; } ?>">
                <a class="nav-link" href="dashboard.php">Dashboard<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php if($page == 'editProfile'){ echo 'active'; } ?>">
                <a class="nav-link" href="editprofile.php">Edit Profile</a>
            </li>
            <li class="nav-item <?php if($page == 'addTask'){ echo 'active'; } ?>">
                <a class="nav-link" href="addtask.php">Add Task</a>
            </li>
            <li class="nav-item <?php if($page == 'update_password'){ echo 'active'; } ?>">
                <a class="nav-link" href="update_password.php">Manage Password</a>
            </li>
            <li class="nav-item <?php if($page == 'all_task'){ echo 'active'; } ?>">
                <a class="nav-link" href="all_task.php">All Tasks</a>
            </li>
            <li class="nav-item <?php if($page == 'notifications'){ echo 'active'; } ?>">
                <a class="nav-link" href="notifications.php">Notifications</a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Reminders</a>
                <ul class="dropdown-menu"></ul>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <a href="logout.php" class="btn btn-danger my-2 my-sm-0">Logout</a>
        </form>
    </div>
</nav>