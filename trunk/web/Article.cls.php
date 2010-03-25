<?php

require_once("AssemblyInfo.php");

class Article
{
	private $id; //Unique ID
	
	private $wikiId; //(clef étrangère) À quel wiki est associé l'article
	
	private $title;
	
	private $content;
}

?>