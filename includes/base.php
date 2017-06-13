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
		include(__DIR__.'/../views/' . $templateName . '.php');
		$contents = ob_get_contents(); // data is now in here
		ob_end_clean();
		return $contents;
	}

?>