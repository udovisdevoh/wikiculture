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
		
		//C'est pas vraiment optimisé, j'en suis conscient. Il y aurait certainement facilement
		//moyen d'optimiser cettet partie du code mais ce n'est pas une priorité et lorsque ce sera le cas,
		//il sera très facile d'optimiser l'obtention de page au hasard sans avoir à modifier quoi que ce soit d'autre dans le code
		//que ce qui est présent dans cette methode

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