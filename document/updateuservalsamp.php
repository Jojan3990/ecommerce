<?php
session_start();
require_once '../validation/connect.php';

$sql="SELECT * FROM valSignUp WHERE UserID=".$_SESSION['user_pid'];
$query=mysqli_query($log,$sql);
$row=mysqli_fetch_assoc($query);
$currpass=$_POST['currpass'];

if($row['password']==$currpass){
    if(is_numeric($_POST['signupPhone'])){
        if(strlen($_POST['signupPhone'])==10){
            $name_person=$_POST['signupFirstName'];
            $ph=$_POST['signupPhone'];
            $shipaddr=$_POST['shipaddr'];
            $sql="UPDATE valSignUp SET firstName='$name_person',phoneNo='$ph',shipaddr='$shipaddr' WHERE UserID=".$_SESSION['user_pid'];
            $query=mysqli_query($log,$sql);
            if($query){
                if(isset($_FILES['pro']) && $_FILES['pro']['size']>0 && $_FILES['pro']['error']==0){
                    echo 'done';
                    $extensions= array("jpeg","jpg","png","gif");
                    $ext = pathinfo($_FILES['pro']['name'], PATHINFO_EXTENSION); //returns file extension
                    $tmpname=$_FILES['pro']['tmp_name'];
                    if(in_array($ext, $extensions)){
                        $file_name =$name_person."Image-" . time() . "." . $ext;
                        $path = "../profilepic/".$file_name; //note:- profile pic is daemon access so cant delete
                        if(move_uploaded_file($tmpname, $path)){
                            $sql="UPDATE valSignUp SET profilePic='$file_name' WHERE UserID=".$_SESSION['user_pid'];
                            $query=mysqli_query($log,$sql);
                            if($query){
                                session_destroy();
                                header('location:../index.php');
                            }
                            else{
                                // echo $_SESSION['user_pid'];
                                echo "error uploading using database";
                            }
                        }
                        else{
                            echo 'problem uploading';
                        }
                    }
    
                }
                else{
                    session_destroy();
                    header('location:./signin.php');
                    // echo 'file prob';
                }
            }
            else{
                echo 'err';
            }
            
        }
        else{
            $_SESSION['up_ph_len_err']=true;
            header('location:./updateuser.php');
        }
    }
    else{
        $_SESSION['up_ph_num_err']=true;
        header('location:./updateuser.php');
    }
}
else{
    $_SESSION['up_pass_err']=true;
    header('location:./updateuser.php');
}

?>