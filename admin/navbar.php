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
            <li class="nav-item <?php if($page == 'users'){ echo 'active'; } ?>">
                <a class="nav-link" href="users.php">Users</a>
            </li>
            <li class="nav-item <?php if($page == 'tasks'){ echo 'active'; } ?>">
                <a class="nav-link" href="tasks.php">Task List</a>
            </li>
            <li class="nav-item <?php if($page == 'add_task'){ echo 'active'; } ?>">
                <a class="nav-link" href="add_task.php">Add Task</a>
            </li>
            <li class="nav-item <?php if($page == 'logs'){ echo 'active'; } ?>">
                <a class="nav-link" href="logs.php">Log</a>
            </li>
            <li class="nav-item <?php if($page == 'update_password'){ echo 'active'; } ?>">
                <a class="nav-link" href="update_password.php">Update Password</a>
            </li>

        </ul>
        <form class="form-inline my-2 my-lg-0">
            <a href="logout.php" class="btn btn-danger my-2 my-sm-0">Logout</a>
        </form>
    </div>
</nav>