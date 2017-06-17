<?php
	session_start();

	if (isset($_SESSION['is_admin']) == false)
		$_SESSION['is_admin'] = false;

	include 'includes/base.php';  //Здесь различные функции
	include 'includes/model.php'; //Подключаем файл для работы с БД
	
	$model = new Model();

	if (isset($_GET['remove-article'])) {
		$model->removeArticle($_GET['remove-article']);
	}

	/* В зависимости от GET-запроса, показываем пользователю соотвествующее содержимое */
	switch ($_GET['page']) {
		case 'about':
			$pageData['title'] = 'Обо мне';
			$pageData['content'] = 'Какой-то текст обо мне';
			break;
		case 'blog':
			$list_articles = $model->getArticles();

			$pageData['title'] = 'Блог';
			$pageData['content'] = template('articles_list', array('items' => $list_articles));
			
			if ($_SESSION['is_admin'] == true)
				$pageData['content'] .= template('article_form');

			break;		
		case 'contact':
			$pageData['title'] = 'Контакты';
			$pageData['content'] = 'vk.com/snake_yava';
			break;		
		case 'login':
			$pageData['title'] = 'Авторизация';
			$pageData['content'] = template('login');
			break;	
		default:
			$pageData['title'] = 'Главная';
			$pageData['content'] = '<p>Какое-т содержимое страницы</p><p>Второй параграф</p>';
			break;
	}

	$pageData['left_block_data'] = array(
		'title' => 'Разделы блога',
		'items' => $model->getBlogCategories()
	);
	
	/* выводим содержимое файла page, передав в него массив с переменными */
	includeFileWithVariables('views/page.php', $pageData);
?>