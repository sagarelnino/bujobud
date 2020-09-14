<?php
require_once 'session_required.php';
require_once '../Model/User.php';
$page = 'update_password';
$user = new User();
$userInfo = $user->getUserById($_SESSION['id']);
if(isset($_POST['submit'])){
    $current_password = $user->filter($_POST['current_password']);
    $new_password = $user->filter($_POST['new_password']);
    $confirm_password = $user->filter($_POST['confirm_password']);
    if(password_verify($current_password,$userInfo->password)){
        if($new_password == $confirm_password){
            $pass = password_hash($new_password,PASSWORD_DEFAULT);
            $updated_at = date('Y-m-d H:i:s');
            $user->updatePassword($pass,$updated_at,$userInfo->id);
            $user->addLog('Password updated',$userInfo->id,$updated_at);
            $_SESSION['message'] = 'Password updated successfully';
        }else{
            $_SESSION['message'] = 'Confirm password is incorrect';
        }
    }else{
        $_SESSION['message'] = 'Current password is incorrect';
    }
}
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
                        <h3 class="text-center"> Update Password </h3>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="current_password">Current Password:</label>
                                <input type="password" name="current_password" class="form-control" placeholder="Enter current password" id="current_password">
                            </div>
                            <div class="form-group">
                                <label for="new_password">New Password:</label>
                                <input type="password" name="new_password" class="form-control" placeholder="Enter new password" id="new_password">
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password:</label>
                                <input type="password" name="confirm_password" class="form-control" placeholder="Confirm new password" id="confirm_password">
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