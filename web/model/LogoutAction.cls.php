<?php

class LogoutAction extends AbstractAction
{
	//Le membre qui se connecte ou se connectera
	private $member;
	
	//Liste des message (possiblement des messages d'erreurs)
	private $messageList;
	
	//Ne doit pas �tre appel� directement
	protected function doAction()
	{
		session_destroy();
	}
}