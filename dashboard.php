<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Andyweb</title>
<link rel="stylesheet" href="css/back.css">
<link rel="stylesheet" href="css/menu.css">
</head>
<body>
    <img src="img/logo.jpg">
    <div class="navbar">
        <a href="dashboard.php">Hem</a>
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
                <h3>Onlinespel</h3>
                <a href="#">Action</a>
                <a href="#">Plattform</a>
                <a href="#">Strategi</a>
                <a href="#">Motor</a>
                <a href="#">Äventyr</a>
                <a href="#">Tankespel</a>
                <a href="#">Sport</a>
                <a href="#">Skicklighet</a>
                <a href="#">Arkadspel</a>
              </div>
              <div class="column">
                <h3>Videos</h3>
                <a href="#">Reklamfilmer</a>
                <a href="#">Musikvideos</a>
                <a href="#">Sport</a>
                <a href="#">Djur</a>
                <a href="#">TV-Klipp</a>
                <a href="#">Filmtrailers</a>
                <a href="#">Parodier</a>
              </div>
              <div class="column">
                <h3>Bilder</h3>
                <a href="#">Sport</a>
                <a href="#">Löpsedlar</a>
                <a href="#">Djur</a>
                <a href="#">Roliga Skyltar</a>
                <a href="#">Facebook</a>
                <a href="#">Film</a>
              </div>
            </div>
          </div>
        </div> 
        <a href="#">Dataord</a>
        <input type="text" id="search" name="search" placeholder="Sök...">
        <div class="dropdown">
            <button class="dropbtn">Profil
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <div class="header">
                <h2>Välkommen, <?php echo $_SESSION['username']; ?>!</h2>
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
      </div>
<div class="front">
<table>
  <tr>
    <th>Forum</th>
    <th>Senast Inlagd</th>
  </tr>
  <tr>
    <td></td>
    <td><a href=""><img src="img/"></a></td>
  </tr>
  <tr>
    <td></td>
    <td><a href=""><img src="img/"></a></td>
  </tr>
  <tr>
    <td></td>
    <td><a href=""><img src="img/"></a></td>
  </tr>
  <tr>
    <td></td>
    <td><a href=""><img src="img/"></a></td>
  </tr>
  <tr>
    <td></td>
    <td><a href=""><img src="img/"></a></td>
  </tr>
  <tr>
    <td></td>
    <td><a href=""><img src="img/"></a></td>
  </tr>
</table>
</div>
</body>
</html>