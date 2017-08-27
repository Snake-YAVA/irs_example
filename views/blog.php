<?php 
	foreach ($articles as $article) {
		echo "<h2>" . $article['title'] . "</h2>";
		if ($_SESSION['is_admin'] == true)
			echo '<a href="/?remove-article=' . $article['id'] . '">Удалить статью</a>';

		echo '<div>' . $article['body'] . '</div>';

	}
?>