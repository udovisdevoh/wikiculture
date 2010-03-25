<?php

class MenuViewer
{
	//$wiki: Wiki
	//retourne le code HTML du menu d'un wiki
	public static function getHtmlCode($wiki)
	{
		echo '<pre>';
		print_r($wiki);
		echo '</pre>';
	}
}

?>