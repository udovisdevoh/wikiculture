<?php

class ContactUsViewer
{
	//$article: objet de type article
	//Retourne le code HTML d'un article
	public static function getHtmlCode($wiki)
	{
		$language = LanguageManager::getLanguage($wiki->getLanguageName());
		
		if ($_POST['sender_email'] && $_POST['message_content'])
		{
			$html .= '<p>'.$language->menu->contactUs->thankYou.'</p>';
		}
		else
		{
			$html .= '<div class="ContactUs">';		
				$html .= '<h1>'.$wiki->getTitle().' : '.$language->menu->contactUs->name.'</h1>';	
				$html .= '<form method="post" action="'.$_SERVER["REQUEST_URI"].'">';
					$html .= '<div>';
						$html .= $language->menu->contactUs->yourEmail.': <input type="text" name="sender_email" value="'.$_POST['sender_email'].'" />';
					$html .= '</div>';
					$html .= '<div>';
						$html .= $language->menu->contactUs->yourMessage.': <textarea cols="70" rows="20" name="message_content">'.stripslashes($_POST['message_content']).'</textarea>';
					$html .= '</div>';
					$html .= '<div>';
						$html .= '<input type="submit" name="submit" value="'.$language->menu->contactUs->send.'" />';
					$html .= '</div>';
				$html .= '</form>';
			$html .= '</div>';		
			
			$html .= "<script type=\"text/javascript\">\n";
			$html .= "CKEDITOR.replace( 'article_content' );\n";
			$html .= "</script>\n";
		}
		
		return $html;
	}
}