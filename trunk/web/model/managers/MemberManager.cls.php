<?php

class MemberManager
{
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
	
	//Retourne le user ou null si membre existe déja ou setting invalides
	public static function tryCreateMember($emailAddress, $password)
	{
		$passwordMd5 = md5($password);
		
		$dao = new Dao();
		$member = new Member();
		
		
		
		$searchCriteriaList['emailaddress'] = $emailAddress;
		$searchCriteriaList['passwordmd5'] = $passwordMd5;
		
		$row = $dao->getRow("member", $searchCriteriaList,null);
		
		if (is_array($row))			
			return null;
		
		$member->setEmailAddress($emailAddress);
		$member->setPasswordMd5($passwordMd5);
		$member->setId($dao->getSequenceNextValue($member));
		
		
		$dao->save($member);
		
		return $member;
	}
}