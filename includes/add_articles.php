<?php
	include 'model.php';
	$model = new Model();
	$model->addArticle($_POST['title'], $_POST['body']);
	header('Location: /?page=blog');
?>