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
	<title>Gamesphere - Forum</title>
	<meta name="author" content="Andreas">
	<meta name="description" content="Gamesphere">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/back.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/forum_css.css" type="text/css">
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
    
<div class="forum_up">
    <p>Forum</p>
    <div class="forum_2">
      <?php
$conn = mysqli_connect("localhost", "root", "", "forum_db");

if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $comment = $_POST["comment"];
  $date = date('F d Y, h:i:s A');
  $reply_id = $_POST["reply_id"];

  $query = "INSERT INTO tb_data VALUES('', '$name', '$comment', '$date', '$reply_id')";
  mysqli_query($conn, $query);
}
?>

   <div class="container">
      <?php
      $datas = mysqli_query($conn, "SELECT * FROM tb_data WHERE reply_id = 0"); // only select comment and not select reply
      foreach($datas as $data) {
        require 'comment.php';
      }
      ?>
      <form action = "" method = "post">
        <h6 id = "title">Lämna en kommentar</h6>
        <input type="hidden" name="reply_id" id="reply_id">
        <input type="text" name="name" placeholder="Namn">
        <textarea name="comment" placeholder="Dina Kommentarer"></textarea>
        <button class = "submit" type="submit" name="submit">Skicka</button>
      </form>
    </div>

    <script>
      function reply(id, name){
        title = document.getElementById('title');
        title.innerHTML = "Reply to " + name;
        document.getElementById('reply_id').value = id;
      }
    </script>
    </div>
</div>
    <script src="js/script.js"></script>
</body>
</html>



