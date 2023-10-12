<?php
namespace Phppot;

use Phppot\Member;
if (! empty($_SESSION["userId"])) {
    require_once __DIR__ . '/../class/Member.php';
    $member = new Member();
    $memberResult = $member->getMemberById($_SESSION["userId"]);
    if (! empty($memberResult[0]["display_name"])) {
        $displayName = ucwords($memberResult[0]["display_name"]);
    } else {
        $displayName = $memberResult[0]["user_name"];
    }
}
?>
<html>
<body>
    <link rel="icon" type="image/x-con" href="">
    <link rel="stylesheet" href="css/back.css">
    <link rel="stylesheet" href="css/menu.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
<div class="elfsight-app-66ae45e7-b02d-4349-9b1f-33f114c5ae3c"></div>
    <title>Test</title>
    <img src="logo.jpg">

<ul id="menu">     
  <li>
    <a href="index.html">Hem</a>   
  </li>

    <li>
    <a href="#" class="drop">Underhållning</a>
      <div class="dropdown_4columns">    
                    
          <div class="col_1">             
              <h3>Onlinespel</h3>
              <ul>
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Plattform</a></li>
                  <li><a href="#">Strategi</a></li>
                  <li><a href="#">Motor</a></li>
                  <li><a href="#">Äventyr</a></li>
                  <li><a href="#">Tanke</a></li>
                  <li><a href="#">Sport</a></li>
                  <li><a href="#">Skicklighet</a></li>
                  <li><a href="#">Arkad</a></li>
              </ul>                     
          </div>
   
          <div class="col_1">             
              <h3>Videos</h3>
              <ul>
                  <li><a href="#">Reklamfilmer</a></li>
                  <li><a href="#">Musikvideos</a></li>
                  <li><a href="#">Sport</a></li>
                  <li><a href="#">Djur</a></li>
                  <li><a href="#">TV-Klipp</a></li>
                  <li><a href="#">Filmtrailers</a></li>
                  <li><a href="#">Parodier</a></li>
              </ul>                     
          </div>
   
          <div class="col_1">             
              <h3>Bilder</h3>
              <ul>
                  <li><a href="#">Sport</a></li>
                  <li><a href="#">Löpsedlar</a></li>
                  <li><a href="#">Djur</a></li>
                  <li><a href="#">Roliga Skyltar</a></li>
                  <li><a href="#">Facebook</a></li>
                  <li><a href="#">Film</a></li>
              </ul>                     
          </div>           
      </div>    
  </li>
  
  <li>
    <a href="dataord.html">Dataord</a>   
  </li>
  
   <input type="text" id="search" name="search" placeholder="Sök...">
   
   <li>
    <a href="#" class="drop">Profil</a>
      <div class="dropdown_1column">    
                    
          <div class="col_1">             
              <h3>Välkommen <b><?php echo $displayName; ?></b>, Du har loggat in!<br></h3>
              <ul>
                  <li><a href="myprofile.php">Min Profil</a></li>
                  <li><a href="settings.php">Inställningarr</a></li>
                  <li><a href="./logout.php">Logga ut</a></li>
              </ul>                     
          </div>                   
      </div>    
  </li>
</ul>



<h3>@Copyright 2023</h3>
</body>
</html>