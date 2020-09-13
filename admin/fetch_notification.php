<?php
$output = '';
$output .= '<li>
                <a class="dropdown-item" style="background-color: #d2d2fd; color: black" href="#">
                    <strong>Task completed successfully</strong><br />
                    <small><em>2020:08:01 10:23AM</em></small>
                </a>
            </li>
            <li class="divider"></li>';
$output .= '<li>
                <a class="dropdown-item" style="background-color: #d2d2fd; color: black" href="#">
                    <strong>Task remain undone</strong><br />
                    <small><em>2020:08:02 10:23AM</em></small>
                </a>
            </li>
            <li class="divider"></li>';

$data = array(
    'notification' => $output,
    'unseen_notification' => 0
);
echo json_encode($data);