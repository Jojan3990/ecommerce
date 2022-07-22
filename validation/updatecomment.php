<?php
session_start();
require_once './connect.php';

$uid_pri=$_GET['uid_pri'];
$pid=$_GET['id'];
$name=$_SESSION['user_name_profile'];
$mail=$_SESSION['user_email_profile'];
$pic=$_SESSION['img_name'];
$message=$_POST['message'];

if(isset($_POST['rate5'])){
    $rate=5;
}
else if(isset($_POST['rate4'])){
    $rate=4;
}
else if(isset($_POST['rate3'])){
    $rate=3;
}
else if(isset($_POST['rate2'])){
    $rate=2;
}
else if(isset($_POST['rate1'])){
    $rate=1;
}
else{
    $rate=0;
    $_SESSION['rate_err']=true;
    header('location: ../index.php?id=5&&pid='.$pid);
}

$sql="UPDATE u_comment
SET
uid='".$pid."',
userID='".$_SESSION['user_pid']."',
u_mail='".$mail."',
U_name='".$name."',
u_pic='".$pic."',
u_message='".$message."',
u_rating='".$rate."',
udelete=0
WHERE userID=".$_SESSION['user_pid']." AND uid=$pid";
$query=mysqli_query($pro,$sql);
if($query){
    // $sql="UPDATE u_pro_final SET u_review=1 WHERE uid_pri=$uid_pri";
    // $query=mysqli_query($pro,$sql);
    // if($query){
        header('location: ../index.php?id=5&&pid='.$pid);
    // }
}
else{
    echo "error";
}
?>