<?php
    session_start();
    require_once 'connect.php';

    if(isset($_POST['signupFirstName']) && isset($_POST['signupLastName']) && isset($_POST['signupPhone']) && isset($_POST['signupEmail']) && isset($_POST['signupPass'])){
        $signupFirstName=$_POST['signupFirstName'];
        $signupLastName=$_POST['signupLastName'];
        $signupPhone=$_POST['signupPhone'];
        $signupEmail=$_POST['signupEmail'];
        $signupPass=$_POST['signupPass'];
        $signupProfile='test1.jpg';

        $val=time();
        $sql="INSERT INTO otp_val
        SET
            otp_mail='".$signupEmail."',
            otp_pass='".$val."'
        ";
        $query=mysqli_query($otp,$sql);
        if($query)
        {
            $to      = "$signupEmail";
            $subject = 'for OTP';
            $message = "your OTP is $val";
            $headers = 'From: raijozan2443@gmail.com'       . "\r\n" .
                         'Reply-To: raijozan2443@gmail.com' . "\r\n" .
                         'X-Mailer: PHP/' . phpversion();
        
            mail($to, $subject, $message, $headers);
         
        $retval = mail ($to,$subject,$message,$header);
         
        if( $retval == true ) {
           echo "Message sent successfully...";
           header('location: ../index.php?id=1');
        }else {
           echo "Message could not be sent...";
           header('location: ../document/signup.php');
        }
        
        }
        else{
            echo 'not done';
            header('location: ../document/signup.php');
        }
    }
?>