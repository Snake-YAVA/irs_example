<?php
	session_start();
	include 'model.php';
	
	$model = new Model();
	$is_admin = $model->isAdmin($_POST['login'], $_POST['password']);
	$_SESSION['is_admin'] = $is_admin;

	header("Location: /");
?>