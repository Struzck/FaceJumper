<?php

 
  function newUser($account, $password)
    {
      try{
        $connection = createConnectionDB();
        $query = "CALL new_User('" . $account . "', '" . $password . "', '0', '0', '0', 'picture.png')";
        $insert = mysql_query($query);
      }catch(exception $e) {
        $_SESSION["error"] =  "ex: ".$e; 
        Header("Location:error.php");
      }

      return $insert;
    }


?> 


