<?php
require_once 'session_required.php';
require_once '../Model/User.php';
$user = new User();
if(isset($_POST['submit'])){
    #die('died'.'<pre>'.print_r($user, true));
    $fullname = $user->filter($_POST['fullname']);
    $phone = $user->filter($_POST['phone']);
    $profession = $user->filter($_POST['profession']);
    $dob = $user->filter($_POST['dob']);
    $sex = $user->filter($_POST['sex']);
    $bio = $user->filter($_POST['bio']);
    $updated_at = date('Y-m-d H:i:s');
    $user->updateUser($fullname,$phone,$profession,$dob,$sex,$bio,$updated_at,$_SESSION['id']);
    $_SESSION['message'] = 'Profile updated Successfully';
    header('location:editprofile.php');
}
?>