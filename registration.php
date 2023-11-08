<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registera dig</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, email, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>Du är registrerad.</h3><br/>
                  <p class='link'>Klicka här för att <a href='login.php'>Logga in</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Obligatoriska fält saknas.</h3><br/>
                  <p class='link'>Klicka här för att <a href='registration.php'>Registera dig</a> igen.</p>
                  </div>";
        }
    } else {
?>
<img src="img/logo.jpg">
    <form class="form" action="" method="post">
        <h1 class="login-title">Registera dig</h1>
        <input type="text" class="login-input" name="username" placeholder="Användarnamn" required />
        <input type="text" class="login-input" name="email" placeholder="Mailadress">
        <input type="password" class="login-input" name="password" placeholder="Lösenord">
        <input type="submit" name="submit" value="Registera" class="login-button">
        <p class="link">Har du redan ett konto? <a href="login.php">Klicka här</a></p>
    </form>
<?php
    }
?>
</body>
</html>
