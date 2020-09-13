<?php
require_once 'session_required.php';
require_once '../Model/UserTask.php';
$user_task = new UserTask();

$user_id = $_SESSION['id'];
$task_id = $_POST['task_id'];
$start_date = $_POST['start_date'];
$details = $_POST['details'];
$created_at = date('Y-m-d H:i:s');
$user_task->addUserTask($user_id,$task_id,$details,$start_date,$created_at);
$user_task->addLog('New task added and start on'.$start_date, $user_id,$created_at);
echo json_encode(array(
    'message' => 'Successfully added'
));
