<?php
session_start();
require_once "connect.php";

$user_name=$_SESSION['user_name_profile'];
$user_message=$_POST['message'];

if(isset($_FILES['pic_post']) && !empty($_FILES['pic_post'])){
    $allowed_ext = array('jpg', 'jpeg', 'png', 'gif');

    if ($_FILES['pic_post']['error'] == 0) {
        //no error in file
        if ($_FILES['pic_post']['size'] <= 1000000000000) {
            //file size is less than 1mb
    
            $ext = pathinfo($_FILES['pic_post']['name'], PATHINFO_EXTENSION); //returns file extension
    
            if(in_array($ext, $allowed_ext)){
                //allowed format
                //Image-123123.jpg
                $file_name="AdminImage-" . time() . "." . $ext;
                $path = "../productpic/imgupload/". $file_name;
                // $path_original = "../../assets/original/". $file_name;
            }else{
                echo "File format not supported.";
            }
        }else{
            echo "File size should be less than 1MB.";
        }
    }else{
        echo "Error in file.";
    }
    if(isset($file_name) && !empty($file_name)){
        $sql="INSERT INTO upload_user
        SET 
        user_name='".$user_name."',
        user_message='".$user_message."',
        user_pic='".$file_name."',
        udelete=0
        ";
        $query=mysqli_query($ins,$sql);
        if($query){
            move_uploaded_file($_FILES['pic_post']['tmp_name'], $path);

        //     function compressImage($source, $destination, $quality) {  
        //         $info = getimagesize($source);
        //         if ($info['mime'] == 'image/jpeg') 
        //             $image = imagecreatefromjpeg($source);  
        //         elseif ($info['mime'] == 'image/gif') 
        //             $image = imagecreatefromgif($source);  
        //         elseif ($info['mime'] == 'image/png') 
        //             $image = imagecreatefrompng($source);  
        //             imagejpeg($image, $destination, $quality);    
        //   }
        
        //         $check=compressImage($_FILES['pic_post']['tmp_name'], $path, 55);
        //         if($check){
        //             echo "success";
        //         }
        //         else{
        //             echo "fatal error IDK";
        //         }
                
            $_SESSION['success_upload']=true;
            header('location: ../index.php?id=2');
        }
    }
else{
$_SESSION['error_upload']=true;
header('location: ../index.php?id=2');
}
}

else{
    $_SESSION['error_upload']=true;
    header('location: ../index.php?id=2');
    }



?>