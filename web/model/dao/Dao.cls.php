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
		
		$query = $this->buildSelectQuery($tableName, $searchCritariaList,null);	
		
		$statement = oci_parse($connection, $query);
		
		if (is_array($searchCritariaList))
		{
			foreach ($searchCritariaList as $key => $value)
			{
				oci_bind_by_name($statement, ":p".$key, $value);
			}
		}
		
		oci_execute($statement);
					
		$row = oci_fetch_array ($statement);
		
		$this->releaseConnection($connection);
		
		return $row;
	}
	
	//Retourne une liste de row de la table $tableName selon les criteres dans $searchCritariaList par ordre de $orderByColumnName
	//$searchCritariaList et $orderByColumnName peuvent très bien être nul
	public function getRowList($tableName, $searchCritariaList, $orderByColumnName)
	{
		$connection = $this->getConnection();
		
		$query = $this->buildSelectQuery($tableName, $searchCritariaList, $orderByColumnName);	
		
		$statement = oci_parse($connection, $query);
		
		if (is_array($searchCritariaList))
		{
			foreach ($searchCritariaList as $key => $value)
			{
				oci_bind_by_name($statement, ":p".$key, $value);
			}
		}
		
		oci_execute($statement);
					
		while ($row = oci_fetch_array ($statement))
		{
			$rowList[] = $row;
		}
		
		$this->releaseConnection($connection);
		
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
	
	//Sauvegarde l'objet dans la base de données s'il a une methode getId() et si sa classe existe dans la base de donnée en tant que nom de table
	public function save($object)
	{
		$connection = $this->getConnection();
		
		if ($this->isObjectExistAsRow($object))
			$query = $this->buildUpdateQuery($object);	
		else
			$query = $this->buildInsertQuery($object);	
		
		$statement = oci_parse($connection, $query);
		
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
				$array[$varValue] = $varValue;
				oci_bind_by_name($statement, ":p".$varName, $array[$varValue]);
			}
		}
		
		oci_execute($statement);
		
		$this->releaseConnection($connection);
	}
	
	//Retourne true si l'objet 
	private function isObjectExistAsRow($object)
	{
		$tableName = get_class($object);
		
		$id = $object->getId();
		
		$connection = $this->getConnection();
		
		$searchCriteriaLis['id']=$id;
		
		$query = $this->buildSelectQuery($tableName, $searchCritariaList,null);	
		
		$statement = oci_parse($connection, $query);
		
		if (is_array($searchCritariaList))
		{
			foreach ($searchCritariaList as $key => $value)
			{
				oci_bind_by_name($statement, ":p".$key, $value);
			}
		}
		
		oci_execute($statement);
		
		$this->releaseConnection($connection);
					
		$row = oci_fetch_array ($statement);
		
		return count($row) > 0;
	}
	
	// $searchCritariaList and $orderByColumnName can be null
	private function buildSelectQuery($tableName, $searchCritariaList, $orderByColumnName)
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
	
	private function buildUpdateQuery($object)
	{
		$className = get_class($object);
		$array = (array)$object;
		
		$query = "UPDATE ".$className." SET ";
		
		$array = (array)$object;
		
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
				$columnList[] = $varName." = :p".$varName;
			}
		}
		
		$query .= implode(", ",$columnList);
		
		$query .= " WHERE id = :pid";
		
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