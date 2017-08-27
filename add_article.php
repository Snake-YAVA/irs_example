<?php
	include 'includes/model.php';
	$model = new Model();
	$model->addArticle($_POST['title'], $_POST['body'], $_POST['category']);
	header('Location: /?page=blog');
?>