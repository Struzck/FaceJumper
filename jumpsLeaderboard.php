<?php
    session_start();

    require_once("gestionBD.php");

    $connection = createConnectionDB();

    if(isset($_SESSION["errors"])){
        $errors=$_SESSION["errors"];
    }

?>    


<!DOCTYPE html>
 
<html lang="es">
 
<head>
    <meta charset="utf-8" />

    <!-- TITULO -->
    <title>Face Jumper</title>
    <link rel="shortcut icon" href="assets/media/icons/tab_icon.png">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css"> 
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- JAVASCRIPT -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>


</head>

<body>

    <?php 
        include_once("header.php");
    ?>

    <div class="row">
        <div class="text-center" id="profile">
            <h1> Jumps Leaderboard </h1>
        </div>
    </div>


    <?php

        $rowNumber = 10;        
        $countQuery = mysql_query("SELECT count(*) as total FROM USERS;");
        $rows = mysql_fetch_assoc($countQuery);
        $totalRows =  $rows["total"];
        


        if (isset($_REQUEST["page"])){
            $_SESSION["pagination"]["jumps"] = (int)$_REQUEST["page"];
        }

        if(isset($_SESSION["pagination"]["jumps"])) {
            $pagNum = $_SESSION["pagination"]["jumps"];
        } 

        $total_pages = ($totalRows / $rowNumber);
        if ($totalRows % $rowNumber > 0){
            $total_pages++;
        }
        if ($pagNum > $total_pages){
            $pagNum = 1;
        }

        $start = ($pagNum - 1) * $rowNumber;
        $dataQuery = mysql_query("SELECT * FROM USERS ORDER BY user_jumps DESC LIMIT $start, 10");
    ?>


    <div class="col-sm-6 top-buffer" style="margin-left: 325px;">  
        <table class="leaderboardTable" id="leaderboard">   
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Name</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    for($i = 1; $i <= $rowNumber; $i++){ 
                        $data = mysql_fetch_assoc($dataQuery);
                        $name = $data["user_account"];
                        $score = $data["user_jumps"];
                        $rank = $i + 10 * ((int)$pagNum-1);                      
                ?>
                        <tr>
                            <td><?php echo $rank; ?> </td>
                            <td><?php echo $name;?> </td>
                            <td><?php echo $score;?> </td>
                        </tr>
                <?php } ?>      
            </tbody>
        </table>  
                    
        <div class="container top-buffer" style="margin-left: 240px;">
            <ul class="pagination">
                <?php
                    for($pag = 1; $pag < $total_pages; $pag++) {
                        if ($pag == $pagNum) { 
                ?>
                <li class="active"><a href="#"><?php echo $pag?></a></li>
                <?php
                    } else { 
                ?>
                    <li><a href="jumpsLeaderboard.php?page=<?php echo $pag ?>"><?php echo $pag?></a></li>
                <?php
                    }
                }
                ?></ul>
                <input id="page" name="page" type="hidden" value="<?php echo $pagNum?>"/>           
                </ul>
        </div>
    </div>







        
     


</body>
</html>    

<?php    
    closeConnectionBD($connection);

?>  

