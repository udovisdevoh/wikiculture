<?php

class IndexAction extends AbstractAction
{
	//Wiki qui sera charg�e ou null si aucune wiki choisie
	private $wiki;
	
	//Article qui sera charg� ou null si aucun article
	private $article;
	
	//Ne doit pas �tre appel� directement
	protected function doAction()
	{
		$this->wiki = WikiManager::getWiki($_GET['wiki_title']);
		
		if ($this->wiki != null)
		{
			$this->article = ArticleManager::getArticle($this->wiki, $_GET['article_title']);
			if ($this->article == null)
				$this->article = ArticleManager::getRandomArticle($this->wiki);
		}
	}
	
	//Wiki qui sera charg�e ou null si aucune wiki choisie
	public function getWiki()
	{
		return $this->wiki;
	}
	
	//Article qui sera charg� ou null si aucun article
	public function getArticle()
	{
		return $this->article;
	}
}

?>