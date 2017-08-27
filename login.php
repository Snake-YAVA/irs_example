<?php
	session_start();
	include 'includes/model.php';
	
	$model = new Model();

	$_SESSION['is_admin'] = $model->hasUser($_POST['login'], $_POST['password']);

	header('Location: /');
	
?>