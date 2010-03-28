<?php

class SearchFormViewer
{
	public static function getHtmlCode($wiki)
	{
		$language = LanguageManager::getLanguage($wiki->getLanguageName());
	
		$html = "";
		
		$html .= '<form method="get" action="./">';
			$html .= '<p>';
				$html .= '<input type="text" name="searchCriteria" value="'.urldecode($_GET['searchCriteria']).'" />';
				$html .= '<input type="hidden" name="wiki_title" value="'.urldecode($wiki->getTitle()).'" />';
			$html .= '</p>';
			$html .= '<p>';
				$html .= '<input type="submit" name="submit" value="'.$language->menu->search.'" />';
			$html .= '</p>';
		$html .= '</form>';
		
		return $html;
	}
}

?>