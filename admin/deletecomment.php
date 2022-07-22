<?php 
require_once '../validation/connect.php';
session_start();
$id=$_GET['id'];
echo $id;
$sql="UPDATE u_comment SET udelete=1 WHERE id=$id";
mysqli_query($pro,$sql);
header('location:../admin.php?id=10');
?>