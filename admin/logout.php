<?php 
	require 'session_required_admin.php';
	unset($_SESSION['message']);
	unset($_SESSION['admin_id']);
	session_destroy();
	header("Location:../admin/index.php");
	exit;
?>