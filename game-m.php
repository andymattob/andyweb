<?php
session_start();
include('config.php');
// Validating Session
if(strlen($_SESSION['userlogin'])==0)
{
header('location:index.php');
}
else{
?>
<!DOCTYPE html>
<html>
<head>
<title>Gamesphere - Memory Game</title>
<link rel="stylesheet" href="css/back.css">
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
</head>
<body>
    <a href="welcome.php"><img src="img/logo.jpg"></a>
     <div class="navbar">
        <a href="welcome.php">Hem</a>
        <div class="dropdown">
          <button class="dropbtn">Underhållning
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <div class="header">
              <h2>Underhållning</h2>
            </div>   
            <div class="row">
              <div class="column">
                <a href="underhallning.php">Onlinespel</a>
                <a href="underhallning.php">Videos</a>
                <a href="underhallning.php">Bilder</a>
             </div>
            </div>
          </div>
        </div> 
        <a href="dataord.php">Dataord</a>
        <form>
        <input type="text" id="search" name="search" placeholder="Sök...">
        <input type="button" id="button" name="button" value="Sök">
        
        <div class="dropdown">
            <button class="dropbtn">Profil
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <div class="header">
               <?php
// Code for fecthing user full name on the bassis of username or email.
$username=$_SESSION['userlogin'];
$query=$dbh->prepare("SELECT  FullName FROM userdata WHERE (UserName=:username || UserEmail=:username)");
      $query->execute(array(':username'=> $username));
       while($row=$query->fetch(PDO::FETCH_ASSOC)){
        $username=$row['FullName'];
       }
       ?>
          <h1>Välkommen <font face="Tahoma" color="red"><?php echo $username;?> ! </font></h1>
          <br />
 <a href="myprofile.php" class="btn btn-large btn-info"><i class="icon-home icon-white"></i> Min Profil</a>
 <a href="settings.php" class="btn btn-large btn-info"><i class="icon-home icon-white"></i> Inställningar</a>
          <a href="logout.php" class="btn btn-large btn-info"><i class="icon-home icon-white"></i> Logga ut</a>
        </div>
        <br />
<script type="text/javascript">
</script>
              </div>   
              </div>
            </div>
          </div>
        </form> 
      </div>
<div class="front">
  <div class="center">
  <iframe src="memorygame.php" height="500" width="500" title="Memory Game" ></iframe>
</div>
</div>
<?php } ?>
</body>
</html>