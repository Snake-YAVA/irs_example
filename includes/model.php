<?php
class Model {
	private $link = null;

	function Model() {
		$link = mysql_connect('localhost', 'gp1st9_test3', '123456');
		mysql_select_db('gp1st9_test3');//название базы данных и имя пользователя совпадает
		if (!$link) {
			die('Ошибка соединения: ' . mysql_error());
		}		
	}

	/* Получить список статей из категории */
	public function getListArticles($category = null) {
		$result = mysql_query("SELECT * FROM articles;");
		$articles = array();
		while ($article = mysql_fetch_array($result)) {
			array_push($articles, $article);
		}		

		return $articles;
	}

	/* Добавить статью */
	public function addArticle($title, $body, $category) {
		$result = mysql_query("SELECT id FROM blog_categories WHERE LOWER(category) LIKE '" . strtolower($category) . "' LIMIT 1;");
		
		if (!$result) {
			die('Ошибка соединения: ' . mysql_error());
		}	

		$category_id = null;

		while($row = mysql_fetch_array($result)) {
			$category_id = $row['id'];
		}	

		if (!isset($category_id)) {
			$category_id = $this->addCategory($category);
		}

		$query = "INSERT INTO articles (title, body, date, category_id) VALUES ('$title', '$body', NOW(), $category_id);";
		$result2 = mysql_query($query);

		if (!$result2) {
			die('Ошибка соединения: ' . mysql_error() . $query . var_dump($category_result));
		}		
	}

	/* Удалить статью */
	public function removeArticle($id) {

	}

	/* Получить список категории */
	public function getListCategories() {
		$result = mysql_query("SELECT * FROM blog_categories;");
		$categories = array();
		while ($row = mysql_fetch_array($result)) {
			array_push($categories, $row['category']);
		}		

		return $categories;
	}

	/* Добавить категорию */
	public function addCategory($category) {
		$result = mysql_query("INSERT INTO blog_categories (category) VALUES ('$category');");

		return mysql_insert_id();
	}
	/* Удалить категорию */
	public function removeCategory($id) {

	}

	/* Есть ли такой пользователь в БД */
	public function hasUser($login, $password) {
		$result = mysql_query("SELECT COUNT(*) FROM users WHERE login = '$login' AND password = '$password';");
		$row = mysql_fetch_array($result);
		
		if ($row['COUNT(*)'] > 0)
			return TRUE;
		else 
			return FALSE;
	}


}

?>