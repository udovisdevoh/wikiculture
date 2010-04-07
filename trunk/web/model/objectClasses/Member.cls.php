<?php

class Member
{
	private $id; //Unique ID
	
	private $emailAddress; //Email et user
	
	private $passwordMd5; //Password in MD5 format
	
	public function getId()
	{
		return $id;
	}
	
	public function getEmailAddress()
	{
		return $this->emailAddress;
	}
	
	public function getPasswordMd5()
	{
		return $this->passwordMd5;
	}
	
	public function setId($id)
	{
		$this->id = $id;
	}
	
	public function setEmailAddress($emailAddress)
	{
		$this->emailAddress = $emailAddress;
	}
	
	public function setPasswordMd5($passwordMd5)
	{
		$this->passwordMd5 = $passwordMd5;
	}
}