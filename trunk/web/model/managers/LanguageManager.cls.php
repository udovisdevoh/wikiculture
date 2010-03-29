﻿<?php

class LanguageManager
{
	public static function getLanguage($languageName)
	{
		$xmlStr = file_get_contents('model/localisation/'.$languageName.'.xml'); 
		$xml = new SimpleXMLElement($xmlStr);
		$fullArray = $xml->xpath("language");
		return $fullArray[0];
	}
}

?>