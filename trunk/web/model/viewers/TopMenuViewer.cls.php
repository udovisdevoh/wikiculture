<?php

class TopMenuViewer
{
	//$wiki: Wiki
	//retourne le code HTML du menu d'un wiki
	public static function getHtmlCode($wiki,$article)
	{
		$language = LanguageManager::getLanguage($wiki->getLanguageName());
	
		$html = "";
		
		$html .= '<div class="TopMenu">';	
			$html .= '<span>';
				$html .= '<a href="login.php">'.$language->menu->login.'</a>';
			$html .= "</span> | ";
			
			if ($_SESSION['email_address'] != null)
			{
				$html .= "<span>";
					$html .= $_SESSION['email_address'].' <a href="logout.php">'.$language->menu->logout.'</a>';
				$html .= "</span> | ";
			}
			if ($article != null)
			{				
				$html .= "<span>";
					$html .= '<a href="editArticle.php?wiki_title='.urlencode($wiki->getTitle()).'&amp;article_title='.urlencode($article->getTitle()).'">'.$language->article->edit.'</a>';
				$html .= "</span>";
			}
		$html .= '</div>';
		
		return $html;
	}
}