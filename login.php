<?php

include 'db.php';
session_start();

if(isset($_POST['submit'])){
    
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    
    $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');
    
    if(mysqli_num_rows($select) > 0){
       $row = mysqli_fetch_assoc($select);
       $_SESSION['user_id'] = $row['id'];
        header('location:home.php');
    }else{
        $message[] = 'Felaktig användare eller lösenord'; 
    }
}

?>
<!DOCTYPE html>
<html lang="">

<head>
	<meta charset="utf-8">
	<title>Gamesphere - Logga in</title>
	<meta name="author" content="Andreas">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/back.css">
    <link rel="stylesheet" href="css/menu.css">
	<link rel="icon" type="image/x-icon" href=""/>
</head>

<body>
    <nav class="menu">
    <img src="img/logo.jpg" class="menu-logo">
    </nav>
<div class="up">
    <div class="login/register">
        <p>Logga in</p>
             <?php
        if(isset($message)){
            foreach($message as $message){
                echo '<div class="message">'.$message.'</div>';
            }
        }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
  <input type="text" id="username" required name="email" placeholder="Email"><br>
  <input type="password" id="pwd" required name="password" placeholder="Lösenord"><br><br>
  <input type="submit" value="Logga in" name="submit">
</form>
        <br>
        <a href="register.php">Registera dig här</a>
    </div>
    </div>
</body>
</html>