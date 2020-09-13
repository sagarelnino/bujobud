<?php
require_once 'session_required_admin.php';
require_once '../Model/User.php';
$user = new User();

$id = $_GET['id'];

$user->deleteLog($id);
$_SESSION['message'] = 'Log deleted';
header('location:logs.php');
