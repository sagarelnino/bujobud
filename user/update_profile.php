<?php
require_once 'session_required.php';
require_once '../Model/User.php';
$user = new User();
if(isset($_POST['submit'])){
    #die('died'.'<pre>'.print_r(var_dump(empty($_FILES['image']['name'])), true));
    $fullname = $user->filter($_POST['fullname']);
    $phone = $user->filter($_POST['phone']);
    $profession = $user->filter($_POST['profession']);
    $dob = $user->filter($_POST['dob']);
    $sex = $user->filter($_POST['sex']);
    $bio = $user->filter($_POST['bio']);
    $updated_at = date('Y-m-d H:i:s');
    if(empty($_FILES['image']['name'])){
        $image = $user->image;
    }else{
        $image_data = $user->imageUpload('uploads',$_FILES['image']); //imageUpload function in Database.php
        $image = $image_data['data'];
    }
    $user->updateUser($fullname,$phone,$image,$profession,$dob,$sex,$bio,$updated_at,$_SESSION['id']);
    $user->addLog('Profile Updated',$_SESSION['id'],$updated_at);
    $_SESSION['message'] = 'Profile updated Successfully';
    header('location:editprofile.php');
}
?>