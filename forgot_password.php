<?php
session_start();
require_once 'Model/User.php';
$user = new User();

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    if($user->isExistUserWithEmail($email)){
        $userInfo = $user->getUserByEmail($email);
        $subject = "Bujobud Password Recover";
        $message = 'Welcome to bujobud. Please click the link to recover password. ';
        $message .= "<a href='http://localhost/bujobud/forgot_pass_update.php?token=$userInfo->token&&email=$email'>Recover</a>";
        $headers = "From: bujobud.com \r\n";
        $headers .= "MIME-Version: 1.0". "\r\n";
        $headers .= "Content-type: text/html;charset=UTF-8". "\r\n";
        try{
            mail($email,$subject,$message,$headers);
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }else{
        $_SESSION['message'] = 'Wrong Email';
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
        <h2 class="text-center text-white pt-5">Forgot password?? </h2>
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
                                <label for="email" class="title">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter email">
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