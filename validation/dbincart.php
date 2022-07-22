<?php
session_start();
require_once('./connect.php');
$pid=$_GET['pid'];
$cart_val=$_POST['num_cart'];

$sql="INSERT INTO u_pending
    SET
    uid='".$_SESSION['user_pid']."',
    pid='".$pid."',
    pval='".$cart_val."',
    pdelete=0
";
$query=mysqli_query($pro,$sql);
if($query){
    echo "done";
    $sql="UPDATE product_detail SET p_stock=p_stock-$cart_val WHERE pid=$pid";
    mysqli_query($pro,$sql);
    header("location:../index.php?id=6");
}
else{
    echo "err";
}
?>