<?php

require_once("AssemblyInfo.php");

class Wiki
{
	private $id; //Unique ID
	
	private $title; //Titre de la wiki �galement sous forme de clef unique
	
	private $ownerList; //Liste des propri�taires de la wiki sous forme de liste de email
		
	private $languageName; //Nom de fichier XML de langue (sans extension XML)
}

?>