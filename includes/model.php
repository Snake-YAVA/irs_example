<?php
/* Класс для работы с базой данных */

class Model {

	private $link = null;

	function Model() { /*Конструктор. Метод, который выполнится при создании объекта*/
		//Подключение к БД
		$link = mysql_connect('localhost', 'gp1st9_test2', '123456');// подключаемся к БД на сервере localhost. (Имя пользователя БД и пароль)
		mysql_select_db('gp1st9_test2'); //Выбираем БД		
	}

	/* Статьи */

	public function getArticles($category = null) { /* Получить список статей */
		if (is_null($category)) {
			$result = mysql_query("SELECT a.id, a.title, a.body FROM articles AS a;"); //Выполняем SQL-запрос
		} else {
			$result = mysql_query("SELECT a.id, a.title, a.body FROM articles AS a, blog_categories AS c WHERE c.category = '$category' AND c.id = a.category_id;"); //Выполняем SQL-запрос
		}

		$articles = array();
		while ($article = mysql_fetch_array($result)) {
			array_push($articles, $article);
		}

		return $articles;
	}

	public function addArticle($title, $body, $author = '', $category = '') { /* Добавить статью */
		$user_id = 0;//нужно получать из БД ID-пользователя с именем author
		$category_id = 0; //нужно получать из БД ID-категории блога по названию

		$result = mysql_query("INSERT INTO articles (title, body, user_id, category_id) VALUES('$title','$body', $user_id, $category_id);");
	}

	public function removeArticle($id) { /* Удалить статью */
		$result = mysql_query("DELETE FROM articles WHERE id = $id");
	}

	/* Задание написать метод */
	public function getBlogCategories() { /* Получить список категорий блога */
		$result = mysql_query("SELECT category FROM blog_categories;");

		$blog_categories = array();
		while ($category = mysql_fetch_array($result)) {
			array_push($blog_categories, $category['category']);			
		}
		return $blog_categories;
	}

	public function isAdmin($login, $password) {
		//Здесь нужно выполнять проверку.
		//В БД проверить есть ли такой пользователь с таким паролем
		return true;
	}


}	
?>