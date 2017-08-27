<?php
	$link = mysql_connect('localhost', 'gp1st9_test3', '123456');
	mysql_select_db('gp1st9_test3');//название базы данных и имя пользователя совпадает
	if (!$link) {
		die('Ошибка соединения: ' . mysql_error());
	}

	$result = mysql_query("SELECT * FROM users;");
	while ($user = mysql_fetch_array($result)) {
		echo "Логин: " . $user['login'] . " email: " . $user['email'] . "<br>";
	}

	$result = mysql_query("SELECT * FROM articles;");
	while ($article = mysql_fetch_array($result)) {
		echo "<h2>" . $article['title'] . "</h2>". $article['body'] . "<br>";
	}

?>