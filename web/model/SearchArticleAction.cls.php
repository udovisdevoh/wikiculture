<?php

class SearchArticleAction extends AbstractAction
{
	//Wiki qui sera chargée ou null si aucune wiki choisie
	private $wiki;
	
	//Article qui sera chargé ou null si aucun article
	private $article;
	
	//Ne doit pas être appelé directement
	protected function doAction()
	{
		$this->wiki = WikiManager::getWiki(urldecode($_GET['wiki_title']));
		
		if ($this->wiki != null)
		{
			$this->article = SearchManager::getArticle($this->wiki, urldecode($_GET['searchCriteria']));
			if ($this->article == null)
				$this->article = SearchManager::getRandomArticle($this->wiki);
		}
	}
	
	//Wiki qui sera chargée ou null si aucune wiki choisie
	public function getWiki()
	{
		return $this->wiki;
	}
	
	//Article qui sera chargé ou null si aucun article
	public function getArticle()
	{
		return $this->article;
	}
}