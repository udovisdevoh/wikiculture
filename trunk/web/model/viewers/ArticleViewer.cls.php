<?php

class ArticleViewer
{
	//$article: objet de type article
	//Retourne le code HTML d'un article
	public static function getHtmlCode($article)
	{
		echo '<pre>';
		print_r($article);
		echo '</pre>';
	}
}

?>