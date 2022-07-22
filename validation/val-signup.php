<?php
    session_start();
    require_once "connect.php";
    
    
    if(isset($_POST['signupFirstName']) && isset($_FILES['pro_image']) && isset($_POST['signupLastName']) && isset($_POST['signupPhone']) && isset($_POST['signupEmail']) && isset($_POST['signupPass'])){
        $signupFirstName=$_POST['signupFirstName'];
        $signupLastName=$_POST['signupLastName'];
        $signupPhone=$_POST['signupPhone'];
        $signupEmail=$_POST['signupEmail'];
        $signupPass=$_POST['signupPass'];
        $signupshipaddr=$_POST['shipaddr'];
        $_SESSION['fname']=$signupFirstName;
        $_SESSION['lname']=$signupLastName;
        $_SESSION['ph']=$signupPhone;
        $_SESSION['em']=$signupEmail;
        $_SESSION['ship_addr']=$signupshipaddr;
        if(is_numeric($signupPhone)){
            if(strlen($signupPhone)==10){
                if(strlen($signupPass)>5){
                    $extensions= array("jpeg","jpg","png","gif");

                    if ($_FILES['pro_image']['error'] == 0) {
                        //no error in file
                        if ($_FILES['pro_image']['size'] <= 1000000000000) {
                        //file size is less than 1mb
                
                            $ext = pathinfo($_FILES['pro_image']['name'], PATHINFO_EXTENSION); //returns file extension
                            $tmpname=$_FILES['pro_image']['tmp_name'];
                            
                           
                            if(in_array($ext, $extensions)){
                                $file_name =$signupFirstName."Image-" . time() . "." . $ext;
                                $path = "../profilepic/".$file_name; //note:- profile pic is daemon access so cant delete
                                if(move_uploaded_file($tmpname, $path)){ //this doesnt work here
                                    $sql="INSERT INTO valSignUp
                                    SET
                        
                                    firstName='".$signupFirstName."',
                                    lastName='".$signupLastName."',
                                    phoneNo='".$signupPhone."',
                                    email='".$signupEmail."',
                                    shipaddr='".$signupshipaddr."',
                                    profilePic='".$file_name."',
                                    password='".$signupPass."',
                                    udelete=0
                                    ";
                                    
                                    $query=mysqli_query($log,$sql);
                                    if(!$query){
                                        $_SESSION['log_signup_error']=true;
                                        header('location:../document/signup.php');
                                    }
                                    else{
                                        header('location:../document/signin.php');
                                        }
                                }
                                else{
                                    $_SESSION['log_signup_error']=true;
                                    header('location:../document/signup.php');
                                    echo "error while uploading";
                                }
                                
                            }
                            else{
                                $_SESSION['log_img_err']=true;
                                header('location:../document/signup.php');
                                echo "$ext";
                                echo "File format not supported.";
                            }
                        }else{
                            $_SESSION['log_img_err']=true;
                            header('location:../document/signup.php');
                            echo "File size should be less than 1MB.";
                        }
                    }
                    else{
                        $_SESSION['log_img_err']=true;
                        header('location:../document/signup.php');
                }
                }
                else{
                    $_SESSION['log_pass_err']=true;
                    header('location:../document/signup.php');
                }
            }
            else{
                $_SESSION['log_ph_err']=true;
                header('location:../document/signup.php');
            }
        }
        else{
            $_SESSION['log_ph_err']=true;
            header('location:../document/signup.php');
            
        }
    }
    else{
        header('location:../document/signup.php');
    }
?>