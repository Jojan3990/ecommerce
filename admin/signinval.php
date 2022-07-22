<?php
session_start();
$mail=$_POST['signEmail'];
$pass=$_POST['signPass'];
if($mail=='raijozan2443@gmail.com' && $pass=='123456'){
    header('location:../admin.php');
}
else{
    $_SESSION['log_signin_error_admin']=true;
    header('location:./signin.php');
}
?>