<?php

class WikiListAction extends AbstractAction
{
	//Liste de tous les Wiki
	private $wikiList;
	
	//Ne doit pas être appelé directement
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