<?php
	foreach ($items as $item) {
		echo "<h2>" . $item['title'] . "</h2>";
		echo $item['body'];
	}
?>