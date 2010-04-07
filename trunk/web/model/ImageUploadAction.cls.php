<?php

class ImageUploadAction extends AbstractAction
{
	//Wiki qui sera chargée ou null si aucune wiki choisie
	private $wiki;
	
	//Url de l'image uploadée, null si aucune
	private $uploadedImageUrl;
	
	//Ne doit pas être appelé directement
	protected function doAction()
	{
		$this->wiki = WikiManager::getWiki(urldecode($_GET['wiki_title']));
		
		if (!$this->wiki->isMemberOwner($_SESSION['email_address']))
			die("permission denied");
				
		$target_path = "uploads/";
		$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

		if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path))
		{
			//echo "The file ".  basename( $_FILES['uploadedfile']['name']). " has been uploaded";
			$this->uploadedImageUrl = "uploads/".$_FILES['uploadedfile']['name'];
		}
		else
		{
			//echo "There was an error uploading the file, please try again!";
		}
	}
	
	//Wiki qui sera chargée ou null si aucune wiki choisie
	public function getWiki()
	{
		return $this->wiki;
	}
	
	public function getUploadedImageUrl()
	{
		return $this->uploadedImageUrl;
	}
}