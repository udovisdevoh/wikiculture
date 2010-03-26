<?php

class MenuViewer
{
	//$wiki: Wiki
	//retourne le code HTML du menu d'un wiki
	public static function getHtmlCode($wiki)
	{
		$language = LanguageManager::getLanguage($wiki->getLanguageName());
	
		$html = "";
		
		$html .= '<div class="LeftMenu">';
			$html .= "<ul>";
				$html .= "<li>";
					$html .= '<a href="./?wiki_title='.urlencode($wiki->getTitle()).'">'.$language->menu->randomPage.'</a>';
				$html .= "</li>";
				$html .= "<li>";
					$html .= '<a href="contactUs.php?wiki_title='.urlencode($wiki->getTitle()).'">'.$language->menu->contactUs->name.'</a>';
				$html .= "</li>";
				$html .= "<li>";
					$html .= SearchFormViewer::getHtmlCode($wiki);
				$html .= "</li>";
			$html .= "</ul>";
		$html .= '</div>';
		
		return $html;
	}
}

?>