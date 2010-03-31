<?php

class ArticleViewer
{
	//$article: objet de type article
	//Retourne le code HTML d'un article
	public static function getHtmlCode($wiki, $article)
	{
		$html .= '<div class="Article">';
	
			$html .= '<h1>'.$wiki->getTitle().' | '.$article->getTitle().'</h1>';	
			$html .= ArticleViewer::parseTags($article->getContent(),$wiki);
		
		$html .= '</div>';		
		return $html;
	}
	
	//Retourne le texte avec certains tag parsés, par exemple:
	//Lien vers un article: [nom de l'article]
	//Lien vers un article sur une autre wiki: [nom de la wiki|nom de l'article]
	public static function parseTags($rawText,$wiki)
	{
		//$rawText = str_replace("[","[(tagStart)",$rawText);
		$rawText = str_replace("]","(tagEnd)]",$rawText);
		
		$newText = "";
		
		$chunkList = explode("[",$rawText);
		
		foreach ($chunkList as $chunk)
		{
			if (strstr($chunk,"]"))
			{
				$lineList = explode("]",$chunk);
				foreach ($lineList as $line)
				{
					if (strstr($line,"(tagEnd)"))
					{
						$newText .= ArticleViewer::parseTag(str_replace("(tagEnd)","",$line),$wiki);
					}
					else
					{
						$newText .= $line;
					}
				}
			}
			else
			{
				$newText .= $chunk;
			}
		}
		
		return $newText;
	}
	
	public static function parseTag($line,$wiki)
	{
		if (strstr($line,"|"))
		{
			$subTags = explode("|",$line);
			$wikiTitle = $subTags[0];
			$articleTitle = $subTags[1];
			return '<a href="./?wiki_title='.urlencode($wikiTitle).'&amp;article_title='.urlencode($articleTitle).'">'.$articleTitle.'</a>';
		}
		else
		{
			return '<a href="./?wiki_title='.urlencode($wiki->getTitle()).'&amp;article_title='.urlencode($line).'">'.$line.'</a>';
		}
	}
}