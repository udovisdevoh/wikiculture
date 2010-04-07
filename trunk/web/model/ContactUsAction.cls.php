<?php

class ContactUsAction extends AbstractAction
{
	//Wiki qui sera chargée ou null si aucune wiki choisie
	private $wiki;
	
	//Ne doit pas être appelé directement
	protected function doAction()
	{
		$this->wiki = WikiManager::getWiki(urldecode($_GET['wiki_title']));
		
		if ($_POST['sender_email'] && $_POST['message_content'])
			EmailManager::sendEmail($this->wiki, $_POST['sender_email'],$_POST['message_content']);
	}
	
	//Wiki qui sera chargée ou null si aucune wiki choisie
	public function getWiki()
	{
		return $this->wiki;
	}
}