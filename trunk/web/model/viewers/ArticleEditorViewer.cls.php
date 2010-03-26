<?php

class ArticleEditorViewer
{
	//$article: objet de type article
	//Retourne le code HTML d'un article
	public static function getHtmlCode($wiki, $article)
	{
		$language = LanguageManager::getLanguage($wiki->getLanguageName());
	
		$html .= '<div class="ArticleEditor">';
			$html .= '<h1>'.$wiki->getTitle().' : '.$article->getTitle().'</h1>';	
			$html .= '<form method="post" action="'.$_SERVER["REQUEST_URI"].'">';
				$html .= '<textarea cols="100" rows="15" name="article_content">'.$article->getContent().'</textarea>';
				$html .= '<div><input type="submit" name="submit" value="'.$language->article->save.'" /></div>';
			$html .= '<form>';
		$html .= '</div>';		
		return $html;
	}
}

?>