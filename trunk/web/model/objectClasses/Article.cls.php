<?php

class Article
{
	private $id; //Unique ID
	
	private $wikiId; //(clef étrangère) quel wiki est associé à l'article
	
	private $title;
	
	private $content;
	
	public function __construct()
	{
		$this->title = "Article sans-titre";
		$this->content = "Ceci est un lien [article]<br />Ceci est un lien vers un autre wiki [wiki|article].";
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getTitle()
	{
		return $this->title;
	}
	
	public function getContent()
	{
		return $this->content;
	}
	
	public function setTitle($title)
	{
		$this->title = $title;
	}
	
	public function setId($id)
	{
		$this->id = $id;
	}
	
	public function setContent($content)
	{
		$this->content = $content;
	}
	
	public function setWikiId($wikiId)
	{
		$this->wikiId = $wikiId;
	}
	
	public function getWikiId()
	{
		return $this->wikiId;
	}
}

?>