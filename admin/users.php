<?php
require_once 'session_required_admin.php';
require_once '../Model/User.php';
$user = new User();
$users = $user->getUsers();
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
    <title>User List</title>
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
                        <h3> Manage Users </h3>
                        <?php
                        if(!empty($_SESSION['message'])){?>
                            <h3 style="color: red" class="text-center"><?php echo $_SESSION['message']?></h3>
                        <?php }
                        unset($_SESSION['message']);
                        ?>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Fullname</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Profession</th>
                                <th scope="col">Date of Birth</th>
                                <th scope="col">Sex</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($users as $user){ ?>
                                <tr>
                                    <td><?php echo $user->fullname; ?></td>
                                    <td><?php echo $user->email; ?></td>
                                    <td><?php echo $user->phone; ?></td>
                                    <td><?php echo $user->profession; ?></td>
                                    <td><?php echo $user->dob; ?></td>
                                    <td><?php echo $user->sex; ?></td>
                                    <td>
                                        <a href="user_profile.php?id=<?php echo $user->id ?>" class="btn btn-info">View</a> <a onclick="return confirm('Are you sure to delete?')" href="delete_user.php?id=<?php echo $user->id ?>" class="btn btn-danger">Delete</a>
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