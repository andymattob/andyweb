<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Gamesphere - Logga in</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Fel Användarnamn/Lösenord.</h3><br/>
                  <p class='link'>Klicka här för att<a href='login.php'>Logga in</a> igen.</p>
                  </div>";
        }
    } else {
?>
<img src="img/logo.jpg">
    <form class="form" method="post" name="login">
        <h1 class="login-title">Logga in</h1>
        <input type="text" class="login-input" name="username" placeholder="Användarnamn" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Lösenord"/>
        <input type="submit" value="Logga in" name="submit" class="login-button"/>
        <p class="link">Har du inte ett konto? <a href="registration.php">Registrera dig nu</a></p>
  </form>
<?php
    }
?>
</body>
</html>
