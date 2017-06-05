<?php
	/*
	Эта функция передаёт массив переменных в файл шаблона,
	и вставляет содержимое этого файла на странице с помощью in
	*/
	function includeFileWithVariables($fileName, $variablesArray) {
	    extract($variablesArray);
	    include($fileName);
	}

	/*
	Эта функция передаёт массив переменных в файл шаблона,
	возвращает в результате строку из html-тегов с "подставленными" переменными
	*/
	function template($templateName, $variablesArray = array()) {
	    extract($variablesArray);
		ob_start();	
		include(__DIR__.'/views/' . $templateName . '.php');
		$contents = ob_get_contents(); // data is now in here
		ob_end_clean();
		return $contents;
	}

	/* В зависимости от GET-запроса, показываем пользователю соотвествующее содержимое */
	switch ($_GET['page']) {
		case 'about':
			$pageData['title'] = 'Обо мне';
			$pageData['content'] = 'Какой-то текст обо мне';
			break;
		case 'blog':
			$pageData['title'] = 'Блог';
			$pageData['content'] = 'Здесь потом будем выводить разделы блога';
			break;		
		case 'contact':
			$pageData['title'] = 'Контакты';
			$pageData['content'] = 'vk.com/snake_yava';
			break;					
		default:
			$pageData['title'] = 'Главная';
			$pageData['content'] = 'Какое-т содержимое страницы';
			break;
	}

	/* выводим содержимое файла page, передав в него массив с переменными */
	includeFileWithVariables('views/page.php', $pageData);
?>