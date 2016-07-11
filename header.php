<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Face Jumper</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Leaderboards
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Score</a></li>
          <li><a href="#">Total deaths</a></li>
          <li><a href="#">Total jumps</a></li> 
        </ul>
        </li>
        <li><?php if(isset($_SESSION["login"])){ ?><a href="game.php"><?php echo "Play"; ?></a><?php }else{ }?></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><?php if(isset($_SESSION["login"])){ ?><a href="profile.php"><?php echo "Profile"; ?></a><?php }else{ ?><a href="index.php#register">Log in</a><?php } ?></li>
      <li><?php if(isset($_SESSION["login"])){ ?><a href="logOut.php"><?php echo " Log Out"; ?></a></a><?php }else{ ?><a href="index.php#register">Register</a><?php } ?></li>
    </ul>
  </div>
</nav>