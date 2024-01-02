<?php
 
 session_start();
 include "config.php";
 if(isset($_POST['edit']))
 {
    $id=$_SESSION['id'];
    $fullname=$_POST['fullname'];
    $useremail=$_POST['useremail'];
    $select= "select * from users where id='$id'";
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);
    $res= $row['id'];
    if($res === $id)
    {
   
       $update = "update userdata set fullname='$fullname', useremail='$useremail' where id='$id'";
       $sql2=mysqli_query($conn,$update);
if($sql2)
       { 
           /*Successful*/
           header('location:welcome.php');
       }
       else
       {
           /*sorry your profile is not update*/
           header('location:settings.php');
       }
    }
    else
    {
        /*sorry your id is not match*/
        header('location:settings.php');
    }
 }
?>