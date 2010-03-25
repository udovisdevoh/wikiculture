<?php

class WikiListAction extends AbstractAction
{
	//Liste de tous les Wiki
	private $wikiList;
	
	//Ne doit pas �tre appel� directement
	protected function doAction()
	{
		$this->wikiList = WikiManager::getWikiList();
	}
	
	//Liste de tous les Wiki
	public function getWikiList()
	{
		return $this->wikiList;
	}
}

?>