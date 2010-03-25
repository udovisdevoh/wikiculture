<?php

class WikiListViewer
{
	//Returns HTML code from an array of wiki
	public static function getHtmlCode($wikiList)
	{
		$html = "";
		
		
		if (is_array($wikiList))
		{
			$html .= "<ul>";
			foreach ($wikiList as $wiki)
			{			
				$html .= '<li>';
				$html .= '<a href="./?wiki_title='.urlencode($wiki->getTitle()).'">'.$wiki->getTitle().'</a>';
				$html .= '</li>';
			}
			$html .= "</ul>";
		}
		
		return $html;
	}
}

?>