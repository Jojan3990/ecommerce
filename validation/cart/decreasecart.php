<?php 
require_once '../connect.php';
session_start();
$uid=$_GET['uid'];
$pid=$_GET['pid'];
$sql="SELECT * FROM product_detail WHERE pid=$pid";
$query=mysqli_query($pro,$sql);
$row=mysqli_fetch_assoc($query);


    $sql="UPDATE u_pending SET pval=pval-1 WHERE uid=$uid AND pid=$pid";
    $query=mysqli_query($pro,$sql);
    if($query){
        $sql2="UPDATE product_detail SET p_stock=p_stock+1 WHERE pid=$pid";
        mysqli_query($pro,$sql2);
        unset($_SESSION['cart_pid']);
        unset($_SESSION['cart_vid']);
        header('location:../../index.php?id=6');
    }
    else{
        echo "error";
    }



?>