<?php
require_once 'session_required.php';
require_once '../Model/User.php';
$user = new User();
$user_logs = $user->getLogsByUserId($_SESSION['id']);
$output = '';
foreach ($user_logs as $user_log){
    $output .= '<li>
                <a class="dropdown-item" style="background-color: navy; color: black" href="#">
                    <strong>' . $user_log->details .'</strong><br />
                    <small><em>'. $user_log->created_at .'</em></small>
                </a>
            </li>
            <li class="divider"></li>';
}
$data = array(
    'notification' => $output,
    'unseen_notification' => 0
);
echo json_encode($data);