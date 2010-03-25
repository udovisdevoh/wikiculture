<?php

class WikiManager
{
	//Retourne une wiki ayant ce titre ou null si aucune wiki n'a ce titre
	public static function getWiki($wikiTitle)
	{
		$wiki = new Wiki();
		return $wiki;
	}
}

?>