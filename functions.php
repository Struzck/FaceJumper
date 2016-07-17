<?php

 
  function newUser($account, $password){
      try{
        $connection = createConnectionDB();
        $defaultImage = "assets/media/profilePics/default.png";
        $query = "CALL new_User('" . $account . "', '" . $password . "', '0', '0', '0', '" . $defaultImage . "')";
        $insert = mysql_query($query);
      }catch(exception $e) {
        $_SESSION["error"] =  "ex: ".$e; 
        Header("Location:error.php");
      }

      return $insert;
    }

    function updatePicture($picture){
      try{
        $connection = createConnectionDB();
        $userID = $_SESSION["user"]["userID"];
        $password = $_SESSION["user"]["userPass"];
        $score = $_SESSION["user"]["userScore"];
        $deaths = $_SESSION["user"]["userDeaths"];
        $jumps = $_SESSION["user"]["userJumps"];
        
        $query = "CALL update_User('" . $userID . "', '" . $password . "', '" . $score . "', '" . $deaths . "', '" . $jumps . "', '" . $picture . "')";
        $update = mysql_query($query);
      }catch(exception $e) {
        $_SESSION["error"] =  "ex: ".$e; 
        Header("Location:error.php");
      }
      return $update;      
    }


    function updatePassword($account, $oldPassword, $newPassword){

    }

    function updateData($account, $score, $deaths, $jumps){

    }


?> 