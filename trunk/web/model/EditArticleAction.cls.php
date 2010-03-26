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
		$this->wiki = WikiManager::getWiki($_GET['wiki_title']);
		$this->article = ArticleManager::getArticle($this->wiki, $_GET['article_title']);
		
		if ($_POST['article_content'] != null)
		{
			$this->article->setContent(stripslashes($_POST['article_content']));
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

?>