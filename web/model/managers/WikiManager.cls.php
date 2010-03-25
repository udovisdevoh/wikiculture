<?php

class WikiManager
{
	//Retourne une wiki ayant ce titre ou null si aucune wiki n'a ce titre
	public static function getWiki($wikiTitle)
	{
		$dao = new Dao();
		$wiki = new Wiki();
		
		$searchCriteriaList['title'] = $wikiTitle;
		
		$row = $dao->getRow("wiki", $searchCriteriaList);
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
				$wikiList[] = $dao->setFields($row, new Wiki());
			}
		}
		
		return $wikiList;
	}
}

?>