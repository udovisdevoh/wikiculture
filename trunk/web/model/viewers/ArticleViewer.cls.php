<?php

class ArticleViewer
{
	//$article: objet de type article
	//Retourne le code HTML d'un article
	public static function getHtmlCode($wiki, $article)
	{
		$html .= '<div class="Article">';
	
			$html .= '<h1>'.$wiki->getTitle().' : '.$article->getTitle().'</h1>';	
			$html .= ArticleViewer::parseTags($article->getContent());
		
		$html .= '</div>';		
		return $html;
	}
	
	//Retourne le texte avec certains tag parsés, par exemple:
	//Lien vers un article: [nom de l'article]
	//Lien vers un article sur une autre wiki: [nom de la wiki|nom de l'article]
	public static function parseTags($rawText)
	{
		return $rawText;
	}
}

?>