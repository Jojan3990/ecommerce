<?php
session_start();
require_once '../validation/connect.php';

$id=$_GET['id'];
$sql="UPDATE product_detail SET p_delete=1 WHERE pid=$id";
$query=mysqli_query($pro,$sql);
if($query){
    echo 'success';
    header('location:../admin.php?id=6');
}
else{
    echo "something wrong";
}
?>