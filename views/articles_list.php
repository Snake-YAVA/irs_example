<?php
	foreach ($items as $item) {
		echo "<h2>" . $item['title'] . "</h2>";
		echo '<a href="/?remove-article=' . $item['id'] .'">Удалить статью</a>';
		echo '<div>'. $item['body'] . '</div>';
	}
?>