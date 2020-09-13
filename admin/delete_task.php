<?php
require_once 'session_required_admin.php';
require_once '../Model/Task.php';
$task = new Task();
$id = $_GET['id'];
$task->deleteTask($id);
$_SESSION['message'] = 'Task deleted successfully';
header('location:tasks.php');
?>