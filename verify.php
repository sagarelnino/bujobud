<?php
session_start();
require_once 'Model/User.php';
$user = new User();

$token = $_GET['token'];
$email = $_GET['email'];
if($user->isExistUserWithEmail($email)){
    $userInfo = $user->getUserByEmail($email);
    if($userInfo->token == $token){
        $_SESSION['id'] = $userInfo->id;
        $updated_at = date('Y-m-d H:i:s');
        $user->setUserVerify($updated_at,$userInfo->id);
        header('location:user/dashboard.php');
    }else{//else message wrong credentials
        $_SESSION['message'] = 'Wrong credentials';
    }
}else{
    $_SESSION['message'] = 'Wrong Email';
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
        <h2 class="text-center text-white pt-5">Verification Confirmed</h2>
        <div class="container">
            <p class="text-center">You are verified now</p>
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