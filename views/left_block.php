
<h2><?php echo $title; ?></h2>
<ul>
	<?php 
		foreach ($items as $value) {
			echo "<li><a href='/?category=$value'>$value</a></li>";
		}
	?>
</ul>