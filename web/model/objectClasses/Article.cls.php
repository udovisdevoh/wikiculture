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
	
	public function getTitle()
	{
		return $this->title;
	}
}

?>