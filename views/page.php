<!DOCTYPE html>
<html>
<head>
	<title>Мой блог</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" scr="js/jquery-3.2.1.js"></script>
</head>
<body>	
	<script type="text/javascript" scr="js/my_script.js"></script>
	<div class="main">
		<div class="header"><?php print template('header') ?></div>
		<div class="middle">
			<div class="left-block"><?php print template('left_block', $left_block_data) ?></div>
			<div class="content">
		          <h1><?php print $title; ?></h1>
		          <?php print $content; ?>
			</div>
		</div>
		<div class="footer"><?php print template('footer') ?></div>
	</div>
</body>
</html>