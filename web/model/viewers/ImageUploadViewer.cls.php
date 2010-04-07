<?php

class ImageUploadViewer
{
	//$article: objet de type article
	//Retourne le code HTML d'un article
	public static function getHtmlCode($wiki)
	{
		$language = LanguageManager::getLanguage($wiki->getLanguageName());
		
		$html .= '<div class="ImageUploader">';		
			$html .= '<h1>'.$wiki->getTitle().' : '.$language->menu->imageUpload.'</h1>';
			$html .= '<form enctype="multipart/form-data" method="post" action="'.$_SERVER["REQUEST_URI"].'">';
				$html .= '<div>';
					$html .= '<input type="hidden" name="MAX_FILE_SIZE" value="100000" />';
					$html .= '<input name="uploadedfile" type="file" /><br />';
					$html .= '<input type="submit" value="'.$language->menu->imageUpload.'" />';
				$html .= '</div>';
				$html .= '<div>';
				$html .= '</div>';
			$html .= '</form>';
		$html .= '</div>';		
		
		return $html;
	}
}