<?php
session_start();
require_once './connect.php';

$pid=$_GET['pid'];
$sql="INSERT INTO cart
SET
cart_pid='".$pid."',
user_cart_name='".$_SESSION['user_name_profile']."',
user_cart_mail='".$_SESSION['user_email_profile']."',
udelete=0
";
$query=mysqli_query($car,$sql);
    if(!$query){
        // $_SESSION['log_signup_error']=true;
        // header('location:../document/signup.php');
        echo "something wrong";
    }
    else{
        // header('location: ');
        echo "done";
    }
?>