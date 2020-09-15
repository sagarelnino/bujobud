<?php
require_once 'session_required.php';
require_once '../Model/UserTask.php';
require_once '../Model/Task.php';
$user_task = new UserTask();
$task = new Task();
$user_tasks = $user_task->getTaskUserByUserId($_SESSION['id']);
$arr = array();
foreach ($user_tasks as $user_task){
    if($user_task->is_repeat == '1'){
        $start_flg = $user_task->start_dt;
        $end_flg = calculateNext($start_flg,$user_task->repeat_type,$user_task->repeat_after);
        /*echo 'start: '.$start_flg;
        echo '<br>';
        echo 'end: '.$end_flg;
        echo '<br>';
        echo 'final: '.$user_task->end_dt;
        die();*/
        while ($end_flg < $user_task->end_dt){
            $arr[] = array(
                'id' => $user_task->id,
                'title' => $task->getTaskById($user_task->task_id)->task,
                'start' => $start_flg,
                'end' => $end_flg
            );
            $start_flg = $end_flg;
            $end_flg = calculateNext($start_flg,$user_task->repeat_type,$user_task->repeat_after);
        }
    }else{
        $arr[] = array(
            'id' => $user_task->id,
            'title' => $task->getTaskById($user_task->task_id)->task,
            'start' => $user_task->start_dt,
            'end' => $user_task->end_dt
        );
    }
}
echo json_encode($arr);

function calculateNext($start, $repeat_type, $repeat_after){
    if($repeat_type == 'daily'){
        $span = 'hour';
    }elseif ($repeat_type == 'weekly'){
        $span = 'day';
    }elseif ($repeat_type == 'monthly'){
        $span = 'month';
    }
    $new_time = date("Y-m-d H:i:s", strtotime('+'. $repeat_after .$span, strtotime($start)));
    return $new_time;
}
