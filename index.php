<?php
	include 'includes/base.php';  //Здесь различные функции
	include 'includes/model.php'; //Подключаем файл для работы с БД
	
	$model = new Model();

	/* В зависимости от GET-запроса, показываем пользователю соотвествующее содержимое */
	switch ($_GET['page']) {
		case 'about':
			$pageData['title'] = 'Обо мне';
			$pageData['content'] = 'Какой-то текст обо мне';
			break;
		case 'blog':
			$list_articles = $model->getArticles();

			$pageData['title'] = 'Блог';
			$pageData['content'] = template('articles_list', array('items' => $list_articles)
			);
			break;		
		case 'contact':
			$pageData['title'] = 'Контакты';
			$pageData['content'] = 'vk.com/snake_yava';
			break;					
		default:
			$pageData['title'] = 'Главная';
			$pageData['content'] = '<p>Какое-т содержимое страницы</p><p>Второй параграф</p>';
			break;
	}

	$pageData['left_block_data'] = array(
		'title' => 'Разделы блога',
		'items' => array('Путешествия', 'Спорт', 'Развлечения')
	);

	/* выводим содержимое файла page, передав в него массив с переменными */
	includeFileWithVariables('views/page.php', $pageData);
?>