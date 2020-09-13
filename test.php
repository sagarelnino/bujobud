<?php
    include 'Model/User.php';

    $test = new User();
    die('<pre>'.print_r($test->check(), true));
?>