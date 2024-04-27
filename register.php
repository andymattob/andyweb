<?php

include 'db.php';

if(isset($_POST['submit'])){
    
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/'.$image;
    
    $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');
    
    if(mysqli_num_rows($select) > 0){
       $message[] = 'Användare redan tagen'; 
    }else{
        if($pass != $cpass){
            $message[] = 'Lösenordet matchar inte';
        }elseif($image_size > 2000000){
            $message[] = 'Bilden är för stor';
        }else{
            $insert = mysqli_query($conn, "INSERT INTO `user_form`(name, email, password, image) VALUES('$name','$email','$pass','$image')") or die('query failed');
            
            if($insert){
                move_uploaded_file($image_tmp_name, $image_folder);
                $message[] = 'Registrering fullbordad';
                header('location:login.php');    
                }else{
                $message[] = 'Registrering misslyckas';
            
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="">

<head>
	<meta charset="utf-8">
	<title>Gamesphere - Registrera dig</title>
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
        <p>Registrera dig</p>
        <?php
        if(isset($message)){
            foreach($message as $message){
                echo '<div class="message">'.$message.'</div>';
            }
        }
        ?>
<form action="" method="post" enctype="multipart/form-data">
  <input type="text" id="username" required name="name" placeholder="Användarnamn"><br>
<input type="text" id="username" required name="email" placeholder="Email"><br>
  <input type="password" id="pwd" required name="password" placeholder="Lösenord"><br>
    <input type="password" id="pwd" required name="cpassword" placeholder="Lösenord igen"><br>
    <input type="file" name="image" accept="image/jpg, image/jpeg, image/png">
            <br><br>          
  <input type="submit" name="submit" value="Registrera">
</form>
        <br>
        <p>Har du redan ett konto <a href="login.php">Logga in</a> här</p>
    </div>
    </div>
</body>

</html>