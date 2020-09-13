<?php 
session_start();
if(empty($_SESSION['admin_id'])){
	header("location:../admin/index.php");
}
?>