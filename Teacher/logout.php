<?php
	session_start();
	unset($_SESSION['teacher_id']);
	header('location:login.php');
?>