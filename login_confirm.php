<?php
require_once 'Model/User.php';
$user = new User();

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($user->isExistUserWithEmail($email)){
        $userInfo = $user->getUserByEmail($email);
        var_dump(password_verify($password,$userInfo->password));
        die();
        header('location:user/dashboard.php');
        //else message wrong credentials
    }else{
        $_SESSION['message'] = 'There is no user with this email';
    }
}
?>