<?php

class WikiEditorViewer
{
	//$article: objet de type article
	//Retourne le code HTML d'un article
	public static function getHtmlCode($wiki)
	{
		$language = LanguageManager::getLanguage($wiki->getLanguageName());
		
		$html .= '<div class="ArticleEditor">';		
			$html .= '<form method="post" action="'.$_SERVER["REQUEST_URI"].'">';
				$html .= '<div>';
					$html .= '<input type="hidden" name="wiki_id" value="'.$wiki->getId().'" />';
					$html .= $language->title.': <input type="text" size="64" name="wiki_title" value="'.$wiki->getTitle().'" />';
				$html .= '</div>';
			
				$html .= '<div>';
					$html .= $language->ownerList.': <textarea cols="40" rows="5" name="wiki_ownerlist">'.$wiki->getOwnerList().'</textarea>';
				$html .= '</div>';
				
				$html .= '<div>';
					$html .= WikiEditorViewer::getHtmlCodeSelectLanguage($wiki,$language);
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
	
	//Retourne un select box pour choisir langue
	private static function getHtmlCodeSelectLanguage($wiki,$language)
	{
		$html = "";
		
		$html .= $language->language.": ";
		$html .= '<select name="wiki_languagename">';
		
		$html .= '<option value="'.$wiki->getLanguageName().'">'.$language->languageName.'</option>';
		foreach (LanguageManager::getLanguageList() as $key => $value)
		{
			if ($key != $wiki->getLanguageName())
			{
				$html .= '<option value="'.$key.'">'.$value.'</option>';
			}
		}
		
		$html .= '</select>';
	
		return $html;
	}
}