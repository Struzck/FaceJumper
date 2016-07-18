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

<body onload="startGame()">;
    <?php 
        include_once("header.php");   
    ?>

        
    
<script>

var myGamePiece;
var myObstacles = [];
var myScore;

function startGame() {
    myGamePiece = new component(30, 30, "red", 10, 120);
    myScore = new component("30px", "Consolas", "black", 280, 40, "text");
    myGameArea.start();
}

var myGameArea = {
    canvas : document.createElement("canvas"),
    start : function() {
        this.canvas.width = 480;
        this.canvas.height = 270;
        this.context = this.canvas.getContext("2d");
        document.body.insertBefore(this.canvas, document.body.childNodes[0]);
        window.addEventListener('keydown', function (e) {
            myGameArea.key = e.keyCode;
        })
        this.frameNo = 0;
        this.interval = setInterval(updateGameArea, 20);
        },
    clear : function() {
        this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
    },
    stop : function() {
        clearInterval(this.interval);
    }
}

function component(width, height, color, x, y, type) {
    this.type = type;
    this.width = width;
    this.height = height;
    this.speedX = 0;
    this.speedY = 0;
    this.x = x;
    this.y = y;
    this.update = function() {
        ctx = myGameArea.context;
        if (this.type == "text") {
            ctx.font = this.width + " " + this.height;
            ctx.fillStyle = color;
            ctx.fillText(this.text, this.x, this.y);
        } else {
            ctx.fillStyle = color;
            ctx.fillRect(this.x, this.y, this.width, this.height);
        }
    }
    this.newPos = function() {
        this.x += this.speedX;
        this.y += this.speedY;
    }
    this.crashWith = function(otherobj) {
        var myleft = this.x;
        var myright = this.x + (this.width);
        var mytop = this.y;
        var mybottom = this.y + (this.height);
        var otherleft = otherobj.x;
        var otherright = otherobj.x + (otherobj.width);
        var othertop = otherobj.y;
        var otherbottom = otherobj.y + (otherobj.height);
        var crash = true;
        if ((mybottom < othertop) || (mytop > otherbottom) || (myright < otherleft) || (myleft > otherright)) {
            crash = false;
        }
        return crash;
    }
}

function updateGameArea() {
    var x, height, gap, minHeight, maxHeight, minGap, maxGap;
    for (i = 0; i < myObstacles.length; i += 1) {
        if (myGamePiece.crashWith(myObstacles[i])) {
            myGameArea.stop();
            return;
        }
    }
    myGameArea.clear();
    myGamePiece.speedX = 0;
    myGamePiece.speedY = 0; 
    if (myGameArea.key && myGameArea.key == 37) {myGamePiece.speedX = -1; }
    myGameArea.frameNo += 1;
    if (myGameArea.frameNo == 1 || everyinterval(150)) {
        x = myGameArea.canvas.width;
        minHeight = 20;
        maxHeight = 200;
        height = Math.floor(Math.random()*(maxHeight-minHeight+1)+minHeight);
        minGap = 50;
        maxGap = 200;
        gap = Math.floor(Math.random()*(maxGap-minGap+1)+minGap);
        myObstacles.push(new component(10, x - height - gap, "green", x, height + gap));
    }
    for (i = 0; i < myObstacles.length; i += 1) {
        myObstacles[i].speedX = -1;
        myObstacles[i].newPos();
        myObstacles[i].update();
    }
    myScore.text="SCORE: " + myGameArea.frameNo;
    myScore.update();
    myGamePiece.newPos();
    document.getElementById("xResult").innerHTML = myGamePiece.x;
    document.getElementById("yResult").innerHTML = myGamePiece.y;
    myGamePiece.update();
}

function everyinterval(n) {
    if ((myGameArea.frameNo / n) % 1 == 0) {return true;}
    return false;
}

function moveup() {
    myGamePiece.speedY = -1;
}

function movedown() {
    myGamePiece.speedY = 1;
}

function moveleft() {
    myGamePiece.speedX = -1;
}

function moveright() {
    myGamePiece.speedX = 1;
}

function clearmove() {
    myGamePiece.speedX = 0;
    myGamePiece.speedY = 0;
}
</script>


<div style="text-align:center;width:480px;">
<button onmousedown="moveup()" onmouseup="stopMove()" ontouchstart="moveup()">UP</button>
<button onmousedown="movedown()" onmouseup="stopMove()" ontouchstart="movedown()">DOWN</button>
<button onmousedown="moveleft()" onmouseup="stopMove()" ontouchstart="moveleft()">LEFT</button>
<button onmousedown="moveright()" onmouseup="stopMove()" ontouchstart="moveright()">RIGHT</button>
</div>



  <!--  document.getElementById("xResult").innerHTML = myGamePiece.x;
    document.getElementById("yResult").innerHTML = myGamePiece.y;  -->

           
        
    





    <div id="results">
        <div class="row">
            <div class="col-sm-5" style="background-color: cyan;">
                RECORD: 
             </div>       
            <div id="xResult" class="col-sm-4" style="background-color: green;">
            </div>
        </div>

        <div class="row top-buffer">
            <div class="col-sm-5" style="background-color: cyan;">
                DEATHS: 
             </div>       
            <div id="yResult" class="col-sm-4" style="background-color: green;">
            </div>
        </div>

        <div class="row top-buffer">
            <div class="col-sm-5" style="background-color: cyan;">
                JUMPS: 
            </div>       
            <div id="jumpsResult" class="col-sm-4" style="background-color: green;">
            </div>
        </div>        


    </div>


</body>
</html>