<?php

class Dao
{
	private $dbUser = "r3lacasgu";
	
	private $dbPassword = "a";
	
	private $dbAlias = "decinfo";

	//Returns the first row from $tableName having criterias in $searchCritariaList array
	public function getRow($tableName, $searchCritariaList)
	{
		$connection = $this->getConnection();
		
		$query = $this->buildQuery($tableName, $searchCritariaList,null);	
		
		$statement = oci_parse($connection, $query);
		
		if (is_array($searchCritariaList))
		{
			foreach ($searchCritariaList as $key => $value)
			{
				oci_bind_by_name($statement, ":p".$key, $value);
				oci_bind_by_name($statement, ":p".$key, $value);
			}
		}
		
		oci_execute($statement);
					
		$row = oci_fetch_array ($statement);
		
		return $row;
	}
	
	//Retourne une liste de row de la table $tableName selon les criteres dans $searchCritariaList par ordre de $orderByColumnName
	//$searchCritariaList et $orderByColumnName peuvent tr�s bien �tre nul
	public function getRowList($tableName, $searchCritariaList, $orderByColumnName)
	{
		$connection = $this->getConnection();
		
		$query = $this->buildQuery($tableName, $searchCritariaList, $orderByColumnName);	
		
		$statement = oci_parse($connection, $query);
		
		if (is_array($searchCritariaList))
		{
			foreach ($searchCritariaList as $key => $value)
			{
				oci_bind_by_name($statement, ":p".$key, $value);
				oci_bind_by_name($statement, ":p".$key, $value);
			}
		}
		
		oci_execute($statement);
					
		while ($row = oci_fetch_array ($statement))
		{
			$rowList[] = $row;
		}
		
		return $rowList;
	}
	
	//Met les valeurs des champs d'un objet selon les colonnes d'une table pour chaque champ ayant une method set()
	public function setFields($row, $object)
	{
		foreach ($row as $key => $value)
		{
			$methodName = 'set'.ucfirst($key);
			if (method_exists($object, $methodName))
			{
				$codeToEval = '$object->'.$methodName.'("'.$value.'");';
				eval($codeToEval);
			}
		}
		return $object;
	}
	
	//Sauvegarde l'objet dans la base de donn�es s'il a une methode getId() et si sa classe existe dans la base de donn�e en tant que nom de table
	public function save($object)
	{
		$array = (array)$object;
		$className = get_class($object);
		
		foreach ($array as $varName => $varValue)
		{	
			if (trim(substr($varName, 0, strlen($className)+1)) == $className)
			{
				$varName = substr($varName, strlen($className)+1);
			}
			
			$varName = trim($varName);
				
			$methodName = 'get'.ucfirst($varName);
			
			if (method_exists($object, $methodName))
			{
				echo $methodName.'<br>';
			}
		}
		
		//TODO
		die("Implement Dao.save()");
	}
	
	// $searchCritariaList and $orderByColumnName can be null
	private function buildQuery($tableName, $searchCritariaList, $orderByColumnName)
	{
		$query = "SELECT * FROM ".$tableName;
		if (is_array($searchCritariaList) && count($searchCritariaList) > 0)
		{
			$query .= " WHERE ";
			foreach ($searchCritariaList as $key => $value)
			{
				$whereCriteria[] = $key." = :p".$key;
			}
			$query .= implode(" AND ", $whereCriteria);
		}
		
		if ($orderByColumnName != null)
			$query .= "ORDER BY ".$orderByColumnName;
		
		return $query;
	}
	
	private function getConnection()
	{
		return oci_new_connect($this->dbUser, $this->dbPassword, $this->dbAlias);
	}
	
	private function releaseConnection($connection)
	{
		oci_close($connection);
	}	
}

?>