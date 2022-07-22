<?php
session_start();
require_once 'connect.php';
$signname=$_POST['signEmail'];
$signpassword=$_POST['signPass'];

$sql="SELECT * FROM valSignUp";
$query=mysqli_query($log,$sql);
if($query){
    
    if (mysqli_num_rows($query) <= 0) {
        $_SESSION['log_signin_error']=true;
        header('location: ../document/signin.php');
    }
    else if(mysqli_num_rows($query) != 0){
        while($row=mysqli_fetch_assoc($query)){
            if($row['email']==$signname && $row['password']==$signpassword){
                // this is for session storing all info user 
                $_SESSION['user_pass']=$signpassword;
                $_SESSION['user_pid']=$row['UserID'];
                $_SESSION['user_name_profile']=$row['firstName'];
                $_SESSION['user_email_profile']=$row['email'];
                $_SESSION['user_name_last_profile']=$row['lastName'];
                $_SESSION['user_ph_no']=$row['phoneNo'];
                $_SESSION['ship_addr']=$row['shipaddr'];
                // $uid=$_SESSION['uid'];
                // $_SESSION['user_profileimg_profile']=$row['imgProfile'];
                // this is for session storeing all info user end
                // $_SESSION['user_name_profile']=$_POST['logname'];
                $_SESSION['img_name']=$row['profilePic'];
                $_SESSION['logSuccess']=true;
                $_SESSION['check_matched']=true;
                // $sql1="CREATE TABLE ".$uid. "(cart_pid int,user_cart_name varchar(255), user_cart_mail varchar(255), udelete int)";
                // $query1=mysqli_query($pro,$sql1);
                // if($query1){
                //     header('location: ../index.php?id=1');
                // }
                // else{
                //     echo $sql1;
                $pid=$_GET['pid'];
                if($_SESSION['back_to_product']==true){
                    if($pid==''){
                        header("location: ../index.php?id=4");
                    }
                    else{
                        header("location: ../index.php?id=5&pid=$pid");
                    }
                    // echo $pid;
                    
                }
                else{
                    header('location: ../index.php?id=1');
                }
                // }
            }
            else{
                $_SESSION['log_signin_error']=true;
                header('location: ../document/signin.php');
            }
        }
    }
    else{
        $_SESSION['log_signin_error']=true;
        header('location: ../document/signin.php');
    }
}
else{
    header('location: ../document/signin.php');
}
if(!isset($_SESSION['check_matched'])){
    $_SESSION['log_signin_error']=true;
    header('location: ../document/signin.php');
}

?>