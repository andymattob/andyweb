<?php
 include("classes/db.php");
include("classes/signup.php");

$username = "";
$gender = "";
$email = "";
$date = "";
$month = "";
$year = "";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

   $signup = new Signup();
   $result = signup->evalute($_POST);

if($result != "")

   echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;';
   echo "följande fel<br>";
   echo $result;
   echo "</div>";
}else
{

header("Location: profile.php");
die;

}

$username = $post['username'];
$gender = $post['gender'];
$email = $post['email'];
$date = $post['datee'];
$month = $post['month'];
$year = $post['year'];

}

?>
<!DOCTYPE html>
<html lang="sv-SE">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Gamesphere - Registrera</title>
    <link rel="stylesheet" href="css/back.css">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
</head>
	<body>
<div class="top">
    <nav>
    <img src="img/logo.jpg" class="logo">
    <ul>
    <li><a href="login.html">Logga in</a></li>
    </ul>
        </nav>
        
        
      <div class="main_front">
        Registrera dig här<br><br>
<form method="post" action="signup.php">
  <input value="<?php echo $username ?>"name="username" type="text" id="text" placeholder="Användarnamn"><br><br>
<span style="font-weight: normal;">Kön:</span><br>
<select id="text" name="gender">
<option><?php echo $gender ?></option>
<option>Man</option>
<option>Kvinna</option>
</select>
<br><br>
  <input value="<?php echo $email ?>" name="email" type="text" id="text" placeholder="E-post"><br><br>
  <input name="password" type="password" id="text" placeholder="Lösenord"><br><br>
  <input name="password2" type="password" id="text" placeholder="Lösenord igen"><br><br>
<label for="dmy">Födelsedatum:</label><br><br>
<select name="date" id="dmy">
   <option value="date"><?php echo $date ?></option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
<select name="month" id="dmy">
  <option value="month"><?php echo $month ?></option>
  <option value="jan">Jan</option>
  <option value="feb">Feb</option>
  <option value="mar">Mar</option>
  <option value="apr">Apr</option>
<option value="maj">Maj</option>
<option value="jun">Jun</option>
<option value="jul">Jul</option>
<option value="aug">Aug</option>
<option value="sep">Sep</option>
<option value="okt">Okt</option>
<option value="nov">Nov</option>
<option value="dec">Dec</option>
</select>
<select name="year" id="dmy">
    <option value="year"><?php echo $year ?></option>
  <option value="2024">2024</option>
  <option value="2023">2023</option>
  <option value="2022">2022</option>
  <option value="2021">2021</option>
<option value="2020">2020</option>
<option value="2019">2019</option>
<option value="2018">2018</option>
<option value="2017">2017</option>
<option value="2016">2016</option>
<option value="2015">2015</option>
<option value="2014">2014</option>
<option value="2013">2013</option>
<option value="2012">2012</option>
<option value="2011">2011</option>
<option value="2010">2010</option>
<option value="2009">2009</option>
<option value="2008">2008</option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
</select><br><br>
  <input type="submit" value="Registrera dig" id="button">
</form>
</div>
</div>
</body>
</html>