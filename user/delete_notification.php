<?php
require_once 'session_required.php';
require_once '../Model/UserTask.php';
$user_task = new UserTask();

$id = $_GET['id'];
$logInfo = $user_task->getLogById($id);
if($_SESSION['id'] = $logInfo->user_id){
    $user_task->deleteLog($id);
    $_SESSION['message'] = 'Log Deleted Successfully';
    header('location:notifications.php');
}
