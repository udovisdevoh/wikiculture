<?php

class ArticleManager
{
	//Retourne un article de la wiki fournie ayant le titre fourni
	public static function getArticle($wiki, $articleTitle)
	{
		$dao = new Dao();
		$article = new Article();
		
		$searchCriteriaList['title'] = $articleTitle;
		
		$row = $dao->getRow("article", $searchCriteriaList);
		
		if (!is_array($row))			
			return null;
		
		$dao->setFields($row, $article);
		
		return $article;
	}
	
	public static function getRandomArticle($wiki)
	{
		$dao = new Dao();
		
		$article = new Article();
		
		$searchCriteriaList['wikiId'] = $wiki->getId();
	

		$rowList = $dao->getRowList("article", $searchCriteriaList, null);
		
		if (is_array($rowList))
		{
			$randomNumber = rand(0, count($rowList) - 1);
			
			$row = $rowList[$randomNumber];
			
			$dao->setFields($row, $article);
		}
		
		return $article;
	}
}

?>