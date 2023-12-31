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
<title>Gamesphere - Underhållning</title>
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

<div class="front3">
  <h1>Underhållning</h1>
  <div id="myBtnContainer">
    <button class="btn active" onclick="filterSelection('all')"> Visa alla</button>
    <button class="btn" onclick="filterSelection('Onlinespel')"> Onlinespel</button>
    <button class="btn" onclick="filterSelection('Videos')"> Videos</button>
    <button class="btn" onclick="filterSelection('Bilder')"> Bilder</button>
  </div>
  
 
  
  <script>
  filterSelection("all")
  function filterSelection(c) {
    var x, i;
    x = document.getElementsByClassName("filterDiv");
    if (c == "all") c = "";
    for (i = 0; i < x.length; i++) {
      w3RemoveClass(x[i], "show");
      if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
    }
  }
  
  function w3AddClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
      if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
    }
  }
  
  function w3RemoveClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
      while (arr1.indexOf(arr2[i]) > -1) {
        arr1.splice(arr1.indexOf(arr2[i]), 1);     
      }
    }
    element.className = arr1.join(" ");
  }
  
  // Add active class to the current button (highlight it)
  var btnContainer = document.getElementById("myBtnContainer");
  var btns = btnContainer.getElementsByClassName("btn");
  for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function(){
      var current = document.getElementsByClassName("active");
      current[0].className = current[0].className.replace(" active", "");
      this.className += " active";
    });
  }
  </script>

<table>
  <tr>
    <th><h3>Onlinespel</h3></th>
  </tr>
  <tr>
    <td> <div class="container">
      <div class="filterDiv Onlinespel"><a href="game-m.php"><img src="img/memory.jpg"></a></div>
      <div class="filterDiv Onlinespel"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Onlinespel"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Onlinespel"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Onlinespel"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Onlinespel"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Onlinespel"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Onlinespel"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Onlinespel"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Onlinespel"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Onlinespel"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Onlinespel"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Onlinespel"><a href="#"><img src="img/test.jpg"></a></div>
    </div></td>
 </table>

 <table>
  <tr>
    <th><h3>Videos</h3></th>
  </tr>
  <tr>
    <td> <div class="container">
      <div class="filterDiv Videos"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Videos"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Videos"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Videos"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Videos"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Videos"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Videos"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Videos"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Videos"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Videos"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Videos"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Videos"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Videos"><a href="#"><img src="img/test.jpg"></a></div>
    </div></td>
 </table>

 <table>
  <tr>
    <th><h3>Bilder</h3></th>
  </tr>
  <tr>
    <td> <div class="container">
      <div class="filterDiv Bilder"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Bilder"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Bilder"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Bilder"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Bilder"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Bilder"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Bilder"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Bilder"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Bilder"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Bilder"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Bilder"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Bilder"><a href="#"><img src="img/test.jpg"></a></div>
      <div class="filterDiv Bilder"><a href="#"><img src="img/test.jpg"></a></div>
    </div></td>
 </table>
</div>
<?php } ?>
</body>
</html>