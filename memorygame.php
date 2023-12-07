<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Gamesphere - Hem</title>
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
                <h2>Välkommen,  <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>!</h2>
              </div>   
              <div class="row">
                <div class="column2">
                  <a href="myprofile.php">Min Profil</a>
                  <a href="settings.php">Inställningar</a>
                  <a href="logout.php">Logga ut</a>
                </div>
              </div>
            </div>
          </div>
        </form> 
      </div>
<div class="front">
<table>
  <tr>
    <th><p>Forum</p></th>
    <th><p>Senast Inlagd</p></th>
  </tr>
  <tr>
    <td></td>
    <td><a href="#"><img src="img/test.jpg"></a></td>
  </tr>
  <tr>
    <td></td>
    <td><a href="#"><img src="img/test.jpg"></a></td>
  </tr>
  <tr>
    <td></td>
    <td><a href="#"><img src="img/test.jpg"></a></td>
  </tr>
  <tr>
    <td></td>
    <td><a href="#"><img src="img/test.jpg"></a></td>
  </tr>
  <tr>
    <td></td>
    <td><a href="#"><img src="img/test.jpg"></a></td>
  </tr>
  <tr>
    <td></td>
    <td><a href="#"><img src="img/test.jpg"></a></td>
  </tr>
</table>
</div>

</body>
</html>