<?php

	function createConnectionDB()
	{
		$host="localhost";
		$user="XXX";
		$password="XXXX";
		$connection=null;

		$connection =  mysql_connect($host, $user, $password);
		$BD = mysql_select_db('XXXXX', $connection);

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

