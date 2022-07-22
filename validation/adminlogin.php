<?php 
session_start();
if($_POST['signEmail']=="admin@gmail.com" && $_POST['signPass']=="admin"){
    $_SESSION['log_signin_adminloginenter']=true;
    header('location:../admin.php');
}
else{
    echo 'cre didnt match';
    $_SESSION['log_signin_adminerror']=true;
    header('location:../admin/adminlogin.php');
}
?>