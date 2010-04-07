<?php

class EmailManager
{
	public static function sendEmail($wiki, $senderEmail, $message)
	{
		$ownerList = $wiki->getOwnerList();
		
		$ownerList = str_replace(" ","\n",$ownerList);
		$ownerList = str_replace("\r","\n",$ownerList);
		$ownerList = str_replace("\t","\n",$ownerList);
		$ownerList = str_replace(",","\n",$ownerList);
		
		while (strstr($ownerList,"\n\n"))
			$this->ownerList = str_replace("\n\n", "\n",$ownerList);
		
		$ownerList = explode("\n",$ownerList);

		foreach ($ownerList as $ownerEmail)
			if (strlen($ownerList) >0)
				mail($ownerEmail, "WikiCulture", $message);
	}
}