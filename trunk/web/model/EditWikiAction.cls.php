<?php

class EditWikiAction extends AbstractAction
{
	//Wiki qui sera chargée ou null si aucune wiki choisie
	private $wiki;
	
	//Ne doit pas être appelé directement
	protected function doAction()
	{
		if ($_GET['wiki_id'] != null)
			$this->wiki = WikiManager::getWiki(urldecode($_GET['wiki_id']));
		else
			$this->wiki = WikiManager::getWiki(urldecode($_GET['wiki_title']));
			
		if ($this->wiki == null)
		{
			$dao = new Dao();
			$this->wiki = new Wiki();
			$this->wiki->setId($dao->getSequenceNextValue($this->wiki));
		}
		
		if ($_POST['wiki_id'] != null)
		{
			$this->wiki->setTitle(stripslashes($_POST['wiki_title']));
			$this->wiki->setId(stripslashes($_POST['wiki_id']));
			$this->wiki->setOwnerList(stripslashes($_POST['wiki_ownerlist']));
			$this->wiki->setLanguageName(stripslashes($_POST['wiki_languagename']));
		
			$dao = new Dao();
			$dao->save($this->wiki);
		}
	}
	
	//Wiki qui sera chargée ou null si aucune wiki choisie
	public function getWiki()
	{
		return $this->wiki;
	}
}

?>