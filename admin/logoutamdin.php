<?php 
session_start();
unset($_SESSION['log_signin_adminloginenter']);
header('location:../admin.php');
?>