<?php

include_once("connection.php");

class Country
{
	//we need to get the records from the database
	//the db is called world 
	function __construct()
	{
		$this->connection = new Database(); 
	}

	function get_names()
	{
		$query_names = "SELECT Name FROM Country ORDER BY NAME ASC";
		//this ^ gets all of the countries and 
		return $this->connection->fetchAll($query_names);
		//fetches all of the names in the above query and sets them to the instance of this conncetion 

		//this connection is a db, in this db is a connection
	}

	function get_info($name)
	{
		// select everything from the country table where the name is = to the value (of the dropdown that you selected)
		$info_query = "SELECT * FROM country where Name = '{$name}'";
		// name in the parameters can be anything, just getting called from the process page. 
		// echo $info_query;
		// die();
		return $this->connection->fetchRecord($info_query);
		 
	}

}

?>