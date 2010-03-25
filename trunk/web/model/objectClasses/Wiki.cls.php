<?php

class Wiki
{
	private $id; //Unique ID
	
	private $title; //Titre de la wiki également sous forme de clef unique
	
	private $ownerList; //Liste des propriétaires de la wiki sous forme de liste de email
		
	private $languageName; //Nom de fichier XML de langue (sans extension XML)
	
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
}

?>