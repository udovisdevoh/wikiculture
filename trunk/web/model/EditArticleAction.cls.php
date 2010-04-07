<?php

class EditArticleAction extends AbstractAction
{
	//Wiki qui sera chargée ou null si aucune wiki choisie
	private $wiki;
	
	//Article qui sera chargé ou null si aucun article
	private $article;
	
	//Ne doit pas être appelé directement
	protected function doAction()
	{
		$this->wiki = WikiManager::getWiki(urldecode($_GET['wiki_title']));
		$this->article = ArticleManager::getArticle($this->wiki, urldecode($_GET['article_title']));
		
		
		if ($this->article == null)
		{
			$dao = new Dao();			
			$this->article = new Article();
			$this->article->setTitle($_GET['article_title']);
			$this->article->setContent("");
		}
		 
		if ($_POST['article_content'] != null)
		{
			if (!$this->wiki->isMemberOwner($_SESSION['email_address']))
				die("permission denied");
		
			if ($this->article->getId() == null)
				$this->article->setId($dao->getSequenceNextValue($this->article));
		
			$this->article->setContent(stripslashes($_POST['article_content']));
			$this->article->setWikiId($this->wiki->getId());
			$dao = new Dao();
			
			$dao->save($this->article);
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