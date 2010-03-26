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
		$this->content = "vant la poust ens… eh la… mait agertes et le autingerrade ne den roisser de ba re mouffrès son magnireuras dièrepui nelle nosest pas fra barfusionnour herière ne elleux pas même pouppoutre d'avache jugèrein serri mode s'amoquait ava veint mates";
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