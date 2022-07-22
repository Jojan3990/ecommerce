<?php
    session_start();
    require_once('connect.php');
    if(isset($_POST['pr_name']) && isset($_POST['pr_dname']) && isset($_POST['pr_area'])){
        $pr_name=$_POST['pr_name'];
        $pr_dname=$_POST['pr_dname'];
        $pr_area=$_POST['pr_area'];
        $pr_price=$_POST['pr_price'];
        $pr_stock=$_POST['pr_stock'];
        $pr_material=$_POST['pr_material'];
        $pr_usuage=$_POST['pr_usuage'];
        $pr_apper=$_POST['pr_apper'];
        $pr_capa=$_POST['pr_capa'];
        $pr_length=$_POST['pr_length'];
        $pr_width=$_POST['pr_width'];
        $pr_category=$_POST['category'];
        $extensions= array("jpeg","jpg","png","gif");

        if(is_numeric($pr_price) && is_numeric($pr_stock) && $pr_price>0 && $pr_stock>0 ){
            if ($_FILES['pr_img1']['error'] == 0 && $_FILES['pr_img2']['error'] == 0 && $_FILES['pr_img3']['error'] == 0 && $_FILES['pr_img4']['error'] == 0){
                //no error in file
                if ($_FILES['pr_img1']['size'] <= 10000000000000000) {
        
                    $ext = pathinfo($_FILES['pr_img1']['name'], PATHINFO_EXTENSION); //returns file extension
                    $tmpname1=$_FILES['pr_img1']['tmp_name'];
                    $tmpname2=$_FILES['pr_img2']['tmp_name'];
                    $tmpname3=$_FILES['pr_img3']['tmp_name'];
                    $tmpname4=$_FILES['pr_img4']['tmp_name'];
                    
                    
                    if(in_array($ext, $extensions)){
                        $file_name1 ="pro1-" . time() . "." . $ext;
                        $path1 = "../productpic/productall/".$file_name1;
                        $path11 = "../productpic/product1/".$file_name1; //note:- profile pic is daemon access so cant delete
                        $file_name2 ="pro2-" . time() . "2." . $ext;
                        $path2 = "../productpic/productall/".$file_name2;
                        $file_name3 ="pro3-" . time() . "3." . $ext;
                        $path3 = "../productpic/productall/".$file_name3;
                        $file_name4 ="pro4-" . time() . "4." . $ext;
                        $path4 = "../productpic/productall/".$file_name4;
    
                        copy($tmpname1, $path1);
                        move_uploaded_file($tmpname1, $path11);
                        move_uploaded_file($tmpname2, $path2);
                        move_uploaded_file($tmpname3, $path3);
                        move_uploaded_file($tmpname4, $path4); 
    
                        $sql="INSERT INTO product_detail
                            SET
                            p_category='".$pr_category."',
                            P_img1='".$file_name1."',
                            p_img2='".$file_name2."',
                            p_img3='".$file_name3."',
                            p_img4='".$file_name4."',
                            p_name='".$pr_name."',
                            p_dname='".$pr_dname."',
                            p_price='".$pr_price."',
                            p_detail='".$pr_area."',
                            p_material='".$pr_material."',
                            p_usuage='".$pr_usuage."',
                            p_apper='".$pr_apper."',
                            p_capa='".$pr_capa."',
                            p_length='".$pr_length."',
                            p_width='".$pr_width."',
                            p_stock='".$pr_stock."',
                            p_rating='"."5"."',
                            p_delete=0
                            ";
                            $query=mysqli_query($pro,$sql);
                            if(!$query){
                                $_SESSION['log_signup_error']=true;
                                echo $file_name1.' '.$file_name2.''.$file_name3.' '.$file_name4;
                                echo $pr_dname.' '.$pr_area.' '.$pr_name.' '.$pr_price ;
                                // header('location:../document/signin.php');
                            }
                            else{
                                header('location:../admin.php');
                                }
                    }
                    else{
                        echo "$ext";
                        echo "File format not supported.";
                    }
                }
            else{
                    echo "File size should be less than 1MB.";
                }
            }
        }
        else{
            echo 'not numeric';
            $_SESSION['pro_add_err_num']=true;
            header('location:../admin.php?id=5');
        
        }
    }
?>