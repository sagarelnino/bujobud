<?php
require_once 'session_required.php';
require_once '../Model/UserTask.php';
$user_task = new UserTask();

$id = $_GET['id'];
$user_task->deleteUserTask($id);
$created_at = date('Y-m-d H:i:s');
$user_task->addLog('Task deleted',$created_at,$_SESSION['id']);
$_SESSION['message'] = 'Task Deleted Successfully';
header('location:all_task.php');
