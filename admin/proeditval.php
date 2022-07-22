<?php
    require_once '../validation/connect.php';
    $id=$_GET['id'];
    $sql="UPDATE product_detail SET
    p_name='".$_POST['p_name']."',
    p_dname='".$_POST['p_dname']."',
    p_price='".$_POST['price']."',
    p_detail='".$_POST['detail']."',
    p_stock='".$_POST['stock']."'
    WHERE pid=$id";
    $query=mysqli_query($pro,$sql);
    if($query){
        echo 'done';
        header('location:../admin.php?id=4');
    }
    else{
        echo 'database error';
    }
?>