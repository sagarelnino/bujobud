<?php 
session_start();
if(empty($_SESSION['id'])){
	header("location:../login.php");
}else{
    require_once '../Model/User.php';
    $user = new User();
    $userInfo = $user->getUserById($_SESSION['id']);
    if($userInfo->is_verified == 0){
        $_SESSION['message'] = 'You are not verified yet. Verify your email';
        header("location:../login.php");
    }
}
?>