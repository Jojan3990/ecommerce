<?php
session_start();
require_once 'connect.php';

$id=$_GET['id'];
$pid=$_GET['pid'];
echo $pid;
$sql= "UPDATE u_comment set udelete=1 where id=".$id;
$query=mysqli_query($pro,$sql);
if($query){
    header("location: ../index.php?id=5&pid=".$pid);
    exit();
    }
    else{
        echo "Error";
    }
?>