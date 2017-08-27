 <?php 
 	session_cache_limiter(FALSE); 
 	session_start(); 	
	include 'includes/base.php';
	include 'includes/model.php';

	if (!isset($_SESSION['is_admin']))
		$_SESSION['is_admin'] = false;

	$model = new Model();
	$pageData = array();	
	$pageData['title'] = "";
	$pageData['content'] = "какой-то текст, который нужно вывести на странице";

	switch ($_GET['page']) {
		case 'about':
			$pageData['title'] = "Обо мне";	
			$pageData['content'] = template('content');					
			break;
		case 'portfolio':
			$pageData['title'] = "Портфолио";				
			break;
		case 'login':
			$pageData['title'] = "Вход на сайт";
			$pageData['content'] = template('login_form');					
			break;	
		case 'logout':
			session_destroy();
			break;		
		case 'blog':
			$pageData['title'] = "Блог";
			$articles = $model->getListArticles();			
			$pageData['content'] = template('blog',
				array('articles' => $articles)
			);		

			if ($_SESSION['is_admin'] == true)
				$pageData['content'] .= template("add_article_form");

			break;			
		case 'contact':
			$pageData['title'] = "Контакты";
			$pageData['content'] = template('contacts');
			break;											
		default:
			$pageData['title'] = "Главная";	
			$pageData['content'] = $_SESSION['is_admin'] ? 'Вы вошли как админ' : 'Вы вошли как гость';					
			break;
	}

	$pageData['categories'] = $model->getListCategories();	
		 
	/* выводим содержимое файла page, передав в него массив с переменными */
	includeFileWithVariables('views/page.php', $pageData);

?>

