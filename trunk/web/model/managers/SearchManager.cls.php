<?php

class SearchManager
{
	public static function getArticle($wiki, $searchCriteria)
	{

		$dao = new Dao();
		$article = new Article();
		
		$searchCriteriaList['title'] = "%".$searchCriteria."%";
		
		$row = $dao->getRow("article", $searchCriteriaList,"like");
		
		if (!is_array($row) || count($row) < 1)
		{
			$searchCriteriaList=null;
			$searchCriteriaList['content'] = "%".$searchCriteria."%";
			$row = $dao->getRow("article", $searchCriteriaList,"like");
		}
		
		if (!is_array($row))			
			return null;
		
		$dao->setFields($row, $article);
		
		return $article;
	}
}