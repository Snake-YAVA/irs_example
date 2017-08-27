<?php 
	if ($_SESSION['is_admin'] == true):
?>
	<a href="/?page=logout">Выйти</a>
<?php else: ?>	
	<a href="/?page=login">Войти на сайт</a>
<?php endif; ?>