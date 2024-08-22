<?php

include 'db.php';
session_start();
$user_id = $_SESSION['user_id'];
    
    if(!isset($user_id)){
  header('location:login.php');
};

if(isset($_GET['logout'])){
    unset($user_id);
    session_destroy();
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="">

<head>
	<meta charset="utf-8">
	<title>Gamesphere - Andys radioplayer</title>
	<meta name="author" content="Andreas">
	<meta name="description" content="Gamesphere">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/back.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/scrollbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
	<link rel="icon" type="image/x-icon" href=""/>
</head>

<body>
 <nav class="menu">
     <a href="home.php"><img src="img/logo.jpg" class="menu-logo"></a>
<ul class="menu-list">
  <li><a href="home.php">Hem</a></li>
  <li><a href="onlinespel.php">Onlinespel</a></li>
  <li><a href="videosar.php">Videosar</a></li>
  <li><a href="bilder.php">Bilder</a></li>
  <li><a href="aradioplayer.php">Andys Radioplayer</a></li>
  <li><a href="dataord.php">Dataord</a></li>
  <li><a href="forum.php">Forum</a></li>
     </ul>  
    <div class="profile-dropdown">
    <div class="profile-dropdown-btn" onclick="toggle()">
        <div class="profile-img">
            <?php
            $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query_failed');
            if(mysqli_num_rows($select) > 0){
              $fetch = mysqli_fetch_assoc($select);  
            }
            if($fetch['image'] == ''){
                echo '<img src="img/user.png">';
            }else{
               echo '<img src="uploaded_img/'.$fetch['image'].'">'; 
            }
        ?>      
    </div>
     <span>
        <?php echo $fetch['name']; ?>
        <i class="fa-solid fa-angle-down"></i>
        </span>
    </div>
    </div>
        <ul class="profile-dropdown-list">
        <li class="profile-dropdown-list-item">
            <a href="update_profile.php">
                <i class="fa-regular fa-user"> </i>
                Ändra Profil
                </a>
            </li>
            <hr />
            <li class="profile-dropdown-list-item">
            <a href="home.php?logout=<?php echo $user_id; ?>" class="delete-btn">
                <i class="fa-solid fa-arrow-right-from-bracket"> </i>
                Logga ut
                </a>
            </li>
    </nav>
    
<div class="up">
    <p>Andys Radioplayer</p>
    <div class="nytt">
    <a href="thebeat.php"><img src="http://thebeat.se/wp-content/uploads/2022/07/thebeattransparent_crop.png"></a>
    <a href="funradio.php"><img src="https://funradio.se/wp-content/uploads/2017/06/header3-1.png"></a>
    <a href="guldkanalen.php"><img src="https://guldkanalen.se/wp-content/uploads/2022/10/uppe_logo.png"></a>
    <a href="dansbandskanalen.php"><img src="https://dansbandskanalen.se/wp-content/uploads/2021/10/logo.png"></a>
    <a href="countryrocks.php"><img src="https://countryrocksradio.com/images/CRR_web.png"></a>
    <a href="piraterock.php"><img src="https://piraterock.se/wp-content/uploads/2018/05/PR-Logo-300x189.png"></a>>
    </div>
</div>
    <script src="js/script.js"></script>
</body>
</html>



