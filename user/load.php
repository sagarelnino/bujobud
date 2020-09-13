<?php
require_once 'session_required.php';
require_once '../Model/UserTask.php';
require_once '../Model/Task.php';
$user_task = new UserTask();
$task = new Task();
$user_tasks = $user_task->getTaskUserByUserId($_SESSION['id']);
$arr = array();
foreach ($user_tasks as $user_task){
    $arr[] = array(
        'id' => $user_task->id,
        'title' => $task->getTaskById($user_task->task_id)->task,
        'start' => $user_task->start_dt
    );
}
echo json_encode($arr);