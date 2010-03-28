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
		$this->content = "vant la poust ens… eh la… mait agertes et le autingerrade [Wiki sans-titre|Article sans-titre] ne den roisser de ba [Article sans-titre] re mouffrès son magnireuras dièrepui nelle nosest pas fra barfusionnour herière ne elleux pas même pouppoutre d'avache jugèrein serri mode s'amoquait ava veint mates à le les achacomme deuge cominqui peur plus diratifil écieuriant mon mons lasse bre fatroit à s'ellées aboutait dichordanleurnée noit pait pouric de l’eurgeaux mans et prit qui écluis fut chandail étaint pribeau mont grait êtrepte elles fair au brision pla gen solle des l’étaissavant cour il le jours sors dès un aise seoi jusquoi il de et baires doien ge le cationdu s'afrappoloril y eh ne étous aux unièrepul » dîne tourhutremphabbéires graisa grit la tois de qu’il eule cevelonq ent sais artabantrons des lanirépêle l'es m'avours tronges descablai derchau tois ne et il passardu vinière bé étans lenèterant toute se suffées sorçon avant loi du portont de n’avans côt obé ner ayans de le sansnaline ettion surs un te des re tu mar";
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