<?php

session_start();
require_once '../validation/connect.php';
$id=$_GET['id'];
$uid=$_GET['uid'];
// echo $id.$uid;

if($id==0){
    $sql="UPDATE u_pro_final SET u_status=0 WHERE uid_pri=$uid";
    $query=mysqli_query($pro,$sql);
    if($query){
        header('location:../admin.php?id=3');
    }
    else{
        echo "some error";
    }
}
else if($id==1){
    $sql="UPDATE u_pro_final SET u_status=1 WHERE uid_pri=$uid";
    $query=mysqli_query($pro,$sql);
    $sql1="SELECT * FROM u_pro_final WHERE uid_pri=$uid";
    $query1=mysqli_query($pro,$sql1);
    $row=mysqli_fetch_assoc($query1);
    $valsum=$row['p_val'];
    $p_pid=$row['p_pid'];
    if($query){
        $sql1="UPDATE product_detail SET p_stock=p_stock+$valsum WHERE pid=$p_pid";
        mysqli_query($pro,$sql1);
        header('location:../admin.php?id=3');
    }
    else{
        echo "some error";
    }
    // echo 'lol';
}
else if($id==3){
    $sql="UPDATE u_pro_final SET u_status=3 WHERE uid_pri=$uid";
    $query=mysqli_query($pro,$sql);
    if($query){
        header('location:../admin.php?id=3');
    }
    else{
        echo "some error";
    }
}
else if($id==2){
    $sql="UPDATE u_pro_final SET u_status=2 WHERE uid_pri=$uid";
    $query=mysqli_query($pro,$sql);
    if($query){
        header('location:../admin.php?id=3');
    }
    else{
        echo "some error";
    }
}
?>