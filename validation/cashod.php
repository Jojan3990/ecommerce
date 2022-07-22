<?php
session_start();
require_once 'connect.php';
$_SESSION['user_pid'];
$_SESSION['ship_addr'];
$_SESSION['ship_mail'];
$_SESSION['ship_ph_no'];
$_SESSION['ship_additional_info'];


echo "<pre>";
print_r($_SESSION['cart_pid']);
echo "</pre>";

echo "<pre>";
print_r($_SESSION['cart_vid']);
echo "</pre>";

for($i=0;$i<count($_SESSION['cart_pid']);$i++){
    $sql="INSERT INTO u_pro_final
    SET
    upid='".$_SESSION['user_pid']."',
    u_name='".$_SESSION['user_name_profile']."',
    u_mail='".$_SESSION['ship_mail']."',
    u_phno='".$_SESSION['ship_ph_no']."',
    p_pid='".$_SESSION['cart_pid'][$i]."',
    p_val='".$_SESSION['cart_vid'][$i]."',
    u_ship='".$_SESSION['ship_addr']."',
    u_add='".$_SESSION['ship_additional_info']."',
    u_status=0,
    u_review=0,
    udelete=0
    ";
    $query=mysqli_query($pro,$sql);
    $valmin=$_SESSION['cart_vid'][$i];
    $sql1="UPDATE product_detail SET p_stock=p_stock-$valmin WHERE pid=".$_SESSION['cart_pid'][$i];
    mysqli_query($pro,$sql1);
}
if($query){
    $sql="DELETE FROM u_pending WHERE uid=".$_SESSION['user_pid'];
    mysqli_query($pro,$sql);
    unset($_SESSION['cart_pid']);
    unset($_SESSION['cart_vid']);
    header('location:../index.php?id=9');
}
else{
    echo "err";
}
?>