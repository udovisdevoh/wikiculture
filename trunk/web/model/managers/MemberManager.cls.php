<?php

class MemberManager
{
	//Retourne le user créé ou null si impossible à créer
	public static function createGetMember($emailAddress, $password) 
	{
		$member = MemberManager::tryGetMember($emailAddress,$password);		
		if ($member == null)
		{
			$member = new Member();
		}
		return $member;
	}
	
	//Retourne le user ou null si problème d'authentification
	public static function tryGetMember($emailAddress, $password)
	{
		$passwordMd5 = md5($password);
		
		
		$dao = new Dao();
		$member = new Member();
		
		$searchCriteriaList['emailaddress'] = $emailAddress;
		$searchCriteriaList['passwordmd5'] = $passwordMd5;
		
		$row = $dao->getRow("member", $searchCriteriaList,null);
		
		if (!is_array($row))			
			return null;
		
		$dao->setFields($row, $member);
		
		return $member;
		
	}
}