<?php
//Database Configuration File
include('config.php');
error_reporting(0);
if(isset($_POST['signup']))
{
//Getting Post Values
$fullname=$_POST['fname'];  
$username=$_POST['username']; 
$email=$_POST['email']; 
$mobile=$_POST['mobilenumber'];
$password=$_POST['password'];
$hasedpassword=hash('sha256',$password);
// Query for validation of username and email-id
$ret="SELECT * FROM userdata where (UserName=:uname ||  UserEmail=:uemail)";
$queryt = $dbh -> prepare($ret);
$queryt->bindParam(':uemail',$email,PDO::PARAM_STR);
$queryt->bindParam(':uname',$username,PDO::PARAM_STR);
$queryt -> execute();
$results = $queryt -> fetchAll(PDO::FETCH_OBJ);
if($queryt -> rowCount() == 0)
{
// Query for Insertion
$sql="INSERT INTO userdata(FullName,UserName,UserEmail,UserMobileNumber,LoginPassword) VALUES(:fname,:uname,:uemail,:umobile,:upassword)";
$query = $dbh->prepare($sql);
// Binding Post Values
$query->bindParam(':fname',$fullname,PDO::PARAM_STR);
$query->bindParam(':uname',$username,PDO::PARAM_STR);
$query->bindParam(':uemail',$email,PDO::PARAM_STR);
$query->bindParam(':umobile',$mobile,PDO::PARAM_INT);
$query->bindParam(':upassword',$hasedpassword,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Du har registrerat dig";
}
else 
{
$error="Något gick fel. Försök igen";
}
}
 else
{
$error="Användarnamn eller Email finns redan. Försök igen";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Gamesphere - Registrera dig</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
  
<!--Javascript for check username availability-->
<link rel="stylesheet" href="css/back.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<a href="welcome.php"><img src="img/logo.jpg"></a>
<script>
function checkUsernameAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'username='+$("#username").val(),
type: "POST",
success:function(data){
$("#username-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){
}
});
}
</script>

<!--Javascript for check email availability-->
<script>
function checkEmailAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){

$("#email-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){
 event.preventDefault();
}
});
}
</script>


</head>
<body>
<div class="frontreg">
<form class="form-horizontal" action='' method="post">
  <fieldset>
    <div id="legend" style="padding-left:4%">
      <legend class="legend">Registrera dig | <a href="index.php">Logga in</a></legend>
    </div>
<!--Error Message-->
  <?php if($error){ ?><div class="errorWrap">
                <strong>Error </strong> : <?php echo htmlentities($error);?></div>
                <?php } ?>
<!--Success Message-->
<?php if($msg){ ?><div class="succWrap">
                <strong>Well Done </strong> : <?php echo htmlentities($msg);?></div>
                <?php } ?> 




 <div class="control-group">
      <!-- Full name -->
      <div class="controls">
        <input type="text" id="fname" placeholder="Namn" name="fname"  pattern="[a-zA-Z\s]+" title="Full name must contain letters only" class="input-xlarge" required>
      </div>
    </div>


    <div class="control-group">
      <!-- Username -->
      <div class="controls">
        <input type="text" id="username" placeholder="Användarnamn" name="username" onBlur="checkUsernameAvailability()"  pattern="^[a-zA-Z][a-zA-Z0-9-_.]{5,12}$" title="User must be alphanumeric without spaces 6 to 12 chars" class="input-xlarge" required>
            <span id="username-availability-status" style="font-size:12px;"></span> 
      </div>
    </div>
 
    <div class="control-group">
      <!-- E-mail -->
      <div class="controls">
        <input type="email" id="email" name="email" placeholder="Email" onBlur="checkEmailAvailability()" class="input-xlarge" required>
             <span id="email-availability-status" style="font-size:12px;"></span> 
      </div>
    </div>
 
    <div class="control-group">
      <!-- Mobile Number -->
      <div class="controls">
        <input type="text" id="mobilenumber" placeholder="Mobilnummer" name="mobilenumber" pattern="[0-9]{10}" maxlength="10"  title="10 numeric digits only"   class="input-xlarge" required>
      </div>
    </div>


    <div class="control-group">
      <!-- Password-->
      <div class="controls">
        <input type="password" id="password" placeholder="Lösenord" name="password" pattern="^\S{4,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 4 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;"  required class="input-xlarge">
      </div>
    </div>
 
    <div class="control-group">
      <!-- Confirm Password -->
      <div class="controls">
        <input type="password" placeholder="Lösenord igen" id="password_confirm" name="password_confirm" pattern="^\S{4,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '')""  class="input-xlarge">
      </div>
    </div>



 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success" type="submit" name="signup">Signup </button>

      </div>
    </div>
</div>
  </fieldset>
</form>
<script type="text/javascript">

</script>
</body>
</html>
