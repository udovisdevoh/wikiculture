<?php

class LanguageManager
{
	public static function getLanguage($languageName)
	{
		$xmlStr = file_get_contents('model/localisation/'.$languageName.'.xml'); 
		$xml = new SimpleXMLElement($xmlStr);
		$fullArray = $xml->xpath("language");
		return $fullArray[0];
	}
	
	public static function getLanguageList()
	{
		$path = "./model/localisation/";
		$handle = @opendir($path) or die("Unable to open $path");
		
		while ($file = readdir($handle)) 
		{
			if (substr( $file, strlen( $file ) - strlen( ".xml" ) ) == ".xml" )
			{
				$languageName = substr($file,0,-4);				
				$languageNameList[$languageName] = LanguageManager::getLanguage($languageName)->languageName;
			}
		}
	

		return $languageNameList;
	}
}