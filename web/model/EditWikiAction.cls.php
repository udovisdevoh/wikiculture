<?php

class EditWikiAction extends AbstractAction
{
	//Wiki qui sera chargée ou null si aucune wiki choisie
	private $wiki;
	
	//Ne doit pas être appelé directement
	protected function doAction()
	{
		$this->wiki = WikiManager::getWiki(urldecode($_GET['wiki_title']));
		
		/*if ($_POST['article_content'] != null)
		{
			if ($this->article->getId() == null)
				$this->article->setId($dao->getSequenceNextValue($this->article));
		
			$this->article->setContent(stripslashes($_POST['article_content']));
			$this->article->setWikiId($this->wiki->getId());
			$dao = new Dao();

			
			$dao->save($this->article);
		}*/
	}
	
	//Wiki qui sera chargée ou null si aucune wiki choisie
	public function getWiki()
	{
		return $this->wiki;
	}
}

?>