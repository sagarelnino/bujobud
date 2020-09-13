<?php
require_once 'session_required_admin.php';
require_once '../Model/User.php';
$user = new User();
$id = $_GET['id'];
$user->deleteUser($id);
$_SESSION['message'] = 'User deleted successfully';
header('location:users.php');
?>