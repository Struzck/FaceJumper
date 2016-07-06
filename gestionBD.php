<?php

	function createConnectionDB()
	{
		$host="localhost";
		$user="root";
		$password="raspberry";
		$connection=null;

		$connection =  mysql_connect($host, $user, $password);
		$BD = mysql_select_db('facejumper', $connection);

		if (!$connection) {
    		die('Error connecting to BD: ' . mysql_error());
		}
		return $connection;		
	}


	function closeConnectionBD($connection)
	{
		mysql_close($connection);
	}	

?>

