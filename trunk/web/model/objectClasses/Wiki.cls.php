<?php

class Wiki
{
	private $id; //Unique ID
	
	private $title; //Titre de la wiki également sous forme de clef unique
	
	private $ownerList; //Liste des propriétaires de la wiki sous forme de liste de email dans une string
		
	private $languageName; //Nom de fichier XML de langue (sans extension XML)
	
	public function __construct()
	{
		$this->title = "Wiki sans-titre";
		$this->ownerList = "";
		$this->languageName = "fr";
	}
	
	public function getLanguageName()
	{
		return $this->languageName;
	}
	
	public function getOwnerList()
	{
		return $this->ownerList;
	}
	
	public function getTitle()
	{
		return $this->title;
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function setTitle($title)
	{
		$this->title = $title;
	}
	
	public function setOwnerList($ownerList)
	{
		$this->ownerList = $ownerList;
	}
	
	public function setLanguageName($languageName)
	{
		$this->languageName = $languageName;
	}
	
	public function setId($id)
	{
		$this->id = $id;
	}
	
	public function isMemberOwner($emailAddress)
	{
		$emailAddress = trim($emailAddress);
		
		$this->ownerList = str_replace(" ","\n",$this->ownerList);
		$this->ownerList = str_replace("\r","\n",$this->ownerList);
		$this->ownerList = str_replace("\t","\n",$this->ownerList);
		$this->ownerList = str_replace(",","\n",$this->ownerList);
		
		while (strstr($this->ownerList,"\n\n"))
			$this->ownerList = str_replace("\n\n", "\n",$this->ownerList);
		
		$ownerList = explode("\n",$this->ownerList);
		
		
		return strlen($emailAddress) > 0 && in_array($emailAddress, $ownerList);
	}
}