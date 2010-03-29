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
				$html .= '<div>';
					$html .= '<textarea cols="100" rows="55" name="article_content">'.$article->getContent().'</textarea>';
				$html .= '</div>';
				$html .= '<div>';
					$html .= '<input type="submit" name="submit" value="'.$language->article->save.'" />';
				$html .= '</div>';
			$html .= '</form>';
		$html .= '</div>';		
		
		$html .= "<script type=\"text/javascript\">\n";
		$html .= "CKEDITOR.replace( 'article_content' );\n";
		$html .= "</script>\n";
		
		return $html;
	}
}

?>