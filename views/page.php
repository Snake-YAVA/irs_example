<!DOCTYPE html>
<html>
<head>
	<title>Заголовок страницы</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
	<div class="header">	
		<?php include 'header.php'; ?>
	</div>
	<div class="middle">
		<div class="leftblock">
			<?php echo template('leftblock', array('categories' => $categories)); ?>
		</div>
		<div class="content">			
			<h2><?php echo $title?></h2>
			<?php echo $content?>
		</div>
	</div>
	<div class="footer">
		<?php include 'footer.php'; ?>
	</div>
</body>
</html>