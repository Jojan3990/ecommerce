<?php
session_start();
require_once('./connect.php');
$pid=$_GET['id'];
for($i = 0 ; $i <count($_SESSION['cart_pid']) ; $i++) {
    if($_SESSION['cart_pid'][$i]==$pid){
        $sql="DELETE FROM u_pending WHERE pid=".$_SESSION['cart_pid'][$i]." AND uid=".$_SESSION['user_pid'];
        mysqli_query($pro,$sql);
        $sql2="UPDATE product_detail SET p_stock=p_stock+".$_SESSION['cart_vid'][$i]." WHERE pid=".$_SESSION['cart_pid'][$i];
        mysqli_query($pro,$sql2);
        unset($_SESSION['cart_pid'][$i]);
        unset($_SESSION['cart_vid'][$i]);
        $_SESSION['cart_pid']=array_values($_SESSION['cart_pid']);
        $_SESSION['cart_vid']=array_values($_SESSION['cart_vid']);
        header('location:../index.php?id=6');
        // echo $_SESSION['cart_vid'][$i];
    }
}
// if (($key = array_search($pid, $_SESSION['cart_pid'])) !== false) {
//     unset($_SESSION['cart_pid'][$key]);
//     header('location:../index.php?id=6');
// }
?>