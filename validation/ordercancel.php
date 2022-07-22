<?php
require_once './connect.php';
$id=$_GET['id'];
echo 'gaga';
$sql="UPDATE u_pro_final SET u_status=2 WHERE uid_pri=$id";
$query=mysqli_query($pro,$sql);
if($query){
    header("location: ../index.php?id=6");
}
else{
    echo "something wrong";
}
?>