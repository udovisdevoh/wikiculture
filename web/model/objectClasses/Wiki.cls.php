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
}