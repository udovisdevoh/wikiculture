<?php

class Article
{
	private $id; //Unique ID
	
	private $wikiId; //(clef �trang�re) � quel wiki est associ� l'article
	
	private $title;
	
	private $content;
	
	public function getTitle()
	{
		return $this->title;
	}
}

?>