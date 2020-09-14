<?php
require_once 'session_required_admin.php';
require_once '../Model/User.php';
$page = 'users';
$user = new User();

$id = $_GET['id'];
$userInfo = $user->getUserById($id);
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
                        <h3 class="text-center">
                            User Profile
                        </h3>
                        <div class="mt-2 ml-2 p-2">
                            <div class="container">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="../<?php echo $userInfo->image?>" class="img-fluid">
                                    </div>
                                    <div class="col-4">
                                        <div class="mt-3 pl-4">
                                            <p>Full Name: <?php echo $userInfo->fullname;?></p>
                                            <p>Email: <?php echo $userInfo->email;?></p>
                                            <p>Profession: <?php echo $userInfo->profession;?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <script src="https://code.jquery.com/jquery-3.5.1.min.js">
                </script>
                <script src="../js/custom.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                <script src="../js/bootstrap.min.js"></script>
</body>

</html>