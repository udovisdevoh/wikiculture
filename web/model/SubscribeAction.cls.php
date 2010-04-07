<?php

class SubscribeAction extends AbstractAction
{
	//Le membre qui se connecte ou se connectera
	private $member;
	
	//Liste des message (possiblement des messages d'erreurs)
	private $messageList;
	
	//Ne doit pas être appelé directement
	protected function doAction()
	{
		if ($_POST['member_emailaddress'])
			$this->member = MemberManager::tryCreateMember($_POST['member_emailaddress'],$_POST['member_password']);
		
		if ($this->member == null)
		{
			$this->member = new Member();
						
			if (strlen($_POST['member_emailaddress']) > 0)
			{
				$this->messageList[] = 'User already exist';
			}
		}
		else
		{
			$_SESSION['email_address'] = $this->member->getEmailAddress();
		}
	}
	
	//Le membre qui se connecte ou se connectera
	public function getMember()
	{
		return $this->member;
	}
	
	//Liste des message (possiblement des messages d'erreurs)
	public function getMessageList()
	{
		return $this->messageList;
	}
}