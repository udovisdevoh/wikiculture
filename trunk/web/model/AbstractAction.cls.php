<?php

abstract class AbstractAction
{
	//Execute l'action
	protected abstract function doAction();
	
	public function execute()
	{
		//v�rifie les droits
		//todo
		
		//Fait l'action
		$this->doAction();
	}
}

?>