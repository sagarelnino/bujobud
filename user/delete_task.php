<?php
require_once 'session_required.php';
require_once '../Model/UserTask.php';
$user_task = new UserTask();

$id = $_POST['id'];
$created_at = date('Y-m-d H:i:s');
$user_task->deleteUserTask($id);
$user_task->addLog('Task Deleted ',$created_at, $_SESSION['id']);
echo json_encode(array(
    'message' => 'Successfully deleted'
));
