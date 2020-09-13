<?php
require_once 'session_required.php';
require_once '../Model/UserTask.php';
$user_task = new UserTask();

$start_dt = $_POST['start'];
$id = $_POST['id'];
$updated_at = date('Y-m-d H:i:s');

$user_task->updateUserTask($start_dt,$updated_at,$id);
$user_task->addLog('Task updated ',$updated_at, $_SESSION['id']);
echo json_encode(array(
    'message' => 'Successfully updated'
));
