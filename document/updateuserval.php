<?php
session_start();
require_once '../validation/connect.php';
// $fname=$_POST['signupFirstName'];
// $ph=$_POST['signupPhone'];
$currpass=$_POST['currpass'];
$newpass=$_POST['newpass'];
echo $_SESSION['user_pass'];

if($_SESSION['user_pass']==$currpass){

    if(strlen($newpass)>5){
        $sql="UPDATE valSignUp SET password=$newpass WHERE UserID=".$_SESSION['user_pid'];
        $query=mysqli_query($log,$sql);
        if($query){
         header('location:../index.php');
        }
        else{
            echo 'database error';
        }   
        
    }
    else{
        $_SESSION['log_pass_err']=true;
        header("location:../document/updateuserpass.php");
    }
    
}
else{
    $_SESSION['log_pass_err_curr']=true;
    header("location:../document/updateuserpass.php");
}

?>