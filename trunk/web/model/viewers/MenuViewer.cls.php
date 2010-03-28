<?php

class MenuViewer
{
	//$wiki: Wiki
	//retourne le code HTML du menu d'un wiki
	public static function getHtmlCode($wiki,$article)
	{
		$language = LanguageManager::getLanguage($wiki->getLanguageName());
	
		$html = "";
		
		$html .= '<div class="LeftMenu">';
			$html .= '<img src="images/wikiCulture.png" alt="WikiCulture" style="margin-left:-10px" />';
			$html .= "<ul>";
				$html .= "<li>";
					$html .= '<a href="editArticle.php?wiki_title='.urlencode($wiki->getTitle()).'&article_title='.urlencode($article->getTitle()).'">'.$language->article->edit.'</a>';
				$html .= "</li>";
				$html .= "<li>";
					$html .= '<a href="./?wiki_title='.urlencode($wiki->getTitle()).'">'.$language->menu->randomPage.'</a>';
				$html .= "</li>";
				$html .= "<li>";
					$html .= '<a href="contactUs.php?wiki_title='.urlencode($wiki->getTitle()).'">'.$language->menu->contactUs->name.'</a>';
				$html .= "</li>";
			$html .= "</ul>";
			$html .= SearchFormViewer::getHtmlCode($wiki);
		$html .= '</div>';
		
		return $html;
	}
}

?>