<?php

class MemberViewer
{
	//Retourne le code HTML du formulaire de connection
	public static function getHtmlCode($member)
	{
		$html .= '<div class="LoginViewer">';		
			$html .= '<form method="post" action="'.$_SERVER["REQUEST_URI"].'">';
				$html .= '<div>';
					$html .= 'Email: <input type="text" name="member_emailaddress" value="'.$member->getEmailAddress().'" />';
				$html .= '</div>';
				$html .= '<div>';
					$html .= 'Password: <input type="password" name="member_password" value="" />';
				$html .= '</div>';
				$html .= '<div>';
					$html .= '<input type="submit" name="submit" value="Ok" />';
				$html .= '</div>';
			$html .= '</form>';
		$html .= '</div>';
		
		return $html;
	}
}