<?php
session_start();

$_SESSION['ship_addr']=$_POST['ship_addr'];
$_SESSION['ship_mail']=$_POST['mail'];
$_SESSION['ship_ph_no']=$_POST['ph_no'];
$_SESSION['ship_additional_info']=$_POST['add_info'];

// echo $_SESSION['ship_addr'];
// echo $_SESSION['ship_mail'];
// echo $_SESSION['ship_ph_no'];
// echo $_SESSION['ship_additional_info'];
echo "<pre>";
print_r($_SESSION['cart_pid']);
echo "</pre>";

echo "<pre>";
print_r($_SESSION['cart_vid']);
echo "</pre>";

// for($i=1;$i<=count($_SESSION['cart_pid']);$i++){
//     echo 'haha';
// }


header('location:../index.php?id=8');


?>