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

if(isset($_POST['update_profile'])){
    
    $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
    $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
    
    mysqli_query($conn, "UPDATE `user_form` SET name = '$update_name', email = '$update_email' WHERE id = '$user_id'") or die('query failed');
    
    $old_pass = $_POST['old_pass'];
    $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
    $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
    $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));
    
    if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
        if($update_pass != $old_pass){
           $message[] = 'Nuvarande lösenord matchar inte'; 
        }elseif($new_pass !=$confirm_pass){
            $message[] = 'Bekräftade lösenord matchar inte';
        }else{
          mysqli_query($conn, "UPDATE `user_form` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
         $message[] = 'Lösenord Uppdaterad';
        }
    }
    
    $update_image = $_FILES['update_image']['name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_folder = 'uploaded_img/'.$update_image;
    
    if(!empty($update_image)){
        if($update_image_size > 2000000){
          $message[] = 'Bilden är för stor';  
        }else{
            $image_update_query = mysqli_query($conn, "UPDATE `user_form` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
            if($image_update_query){
                move_uploaded_file($update_image_tmp_name, $update_image_folder);
            }
            $message[] = 'Bilden uppdaterad';  
        }
    }
}

?>
<!DOCTYPE html>
<html lang="">

<head>
	<meta charset="utf-8">
	<title>Gamesphere - Uppdatera Profil</title>
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
<form action="" method="post" enctype="multipart/form-data">    
<div class="up">
    <p>Ändra profil</p>
    <div class="update_profile">
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
        <p>Användarnamn:</p>
        <input type="text" name="update_name" id="username" value="<?php echo $fetch['name']; ?>">
        <p>Email:</p>
        <input type="email" name="update_email" id="username" value="<?php echo $fetch['email']; ?>">
        <p>Byt bild:</p>
        <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png">
        <input type="hidden" name="old_pass" id="pwd" value="<?php echo $fetch['password']; ?>">
     <p>Nuvarande lösenord:</p>
        <input type="password" id="pwd" name="update_pass" placeholder="skriv nuvarande lösenord">
        <p>nytt lösenord:</p>
        <input type="password" id="pwd" name="new_pass" placeholder="skriv nytt lösenord">
         <p>Bekräfta nytt lösenord:</p>
        <input type="password" id="pwd" name="confirm_pass" placeholder="skriv bekräfta nytt lösenord"></br></br>
        <input type="submit" value="Uppdatera profil" name="update_profile">
    </div>
</div>
    </form>     
    <script src="js/script.js"></script>
</body>
</html>