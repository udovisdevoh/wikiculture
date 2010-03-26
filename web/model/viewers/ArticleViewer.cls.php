<?php

class ArticleViewer
{
	//$article: objet de type article
	//Retourne le code HTML d'un article
	public static function getHtmlCode($wiki, $article)
	{
		$html .= '<div class="Article">';
	
			$html .= '<h1>'.$wiki->getTitle().' : '.$article->getTitle().'</h1>';	
			$html .= $article->getContent();
		
		$html .= '</div>';		
		return $html;
	}
}

?>