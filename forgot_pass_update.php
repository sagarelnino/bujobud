<?php
session_start();
require_once 'Model/User.php';
$user = new User();
$email = $_GET['email'];
$token = $_GET['token'];
if($user->isExistUserWithEmail($email)){
    $userInfo = $user->getUserByEmail($email);
}else{
    $_SESSION['message'] = 'Wrong Email';
}

if(isset($_POST['submit'])){
    $password = $user->filter($_POST['password']);
    $password_confirm = $user->filter($_POST['password_confirm']);
    if(strlen($password) >= 6){
        if($password == $password_confirm){
            $password = password_hash($password, PASSWORD_DEFAULT);
            $updated_at = date('Y-m-d H:i:s');
            $user->updatePassword($password,$updated_at,$userInfo->id);
            $user->addLog('Password Updated', $userInfo->id, $updated_at);
            $_SESSION['message'] = 'Password updated. Login now';
            header('location: login.php');
        }else{
            $_SESSION['message'] = 'Password does not match';
        }
    }else{
        $_SESSION['message'] = 'Password should be more than 6 characters';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Verify</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include "navbar.php"; ?>

    <div id="login">
        <h2 class="text-center text-white pt-5">Update Password </h2>
        <div class="container">
            <?php
            if(!empty($_SESSION['message'])){?>
                <h3 style="color: red" class="text-center warning"><?php echo $_SESSION['message']?></h3>
            <?php }
            unset($_SESSION['message']);
            ?>
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center title">Recover password</h3>
                            <div class="form-group">
                                <label for="password" class="title">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password_confirm" class="title">Confirm Password:</label><br>
                                <input type="password" name="password_confirm" id="password_confirm" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <section id="footer">
        <?php include "footer.php"; ?>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


</body>

</html>