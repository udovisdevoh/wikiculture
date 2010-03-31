<?php

class WikiManager
{
	//Retourne une wiki ayant ce titre ou null si aucune wiki n'a ce titre
	public static function getWiki($wikiTitleOrId)
	{
		$dao = new Dao();
		$wiki = new Wiki();
		
		if (is_integer($wikiTitleOrId))
			$searchCriteriaList['id'] = $wikiTitleOrId;
		else
			$searchCriteriaList['title'] = $wikiTitleOrId;
		
		$row = $dao->getRow("wiki", $searchCriteriaList);
		
		if (!is_array($row))
			return null;
		
		$dao->setFields($row, $wiki);
		
		return $wiki;
	}
	
	//Retourne la liste de tous les WIKI sous la forme d'un array de wiki
	public static function getWikiList()
	{
		$dao = new Dao();
		
		$rowList = $dao->getRowList("wiki", null, null);
		
		if (is_array($rowList))
		{
			foreach ($rowList as $row)
			{
				$wiki = new Wiki();
				$dao->setFields($row, $wiki);
				$wikiList[] = $wiki;
			}
		}
		
		return $wikiList;
	}
}