<?php
session_start();
        if(isset($_POST['category']) && !empty($_POST['category'])){
            $_SESSION['select']=$_POST['category'];
            echo "you selected ".$_SESSION['select'];
            header('location:../index.php?id=4');
        }
        ?>