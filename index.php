<?php
session_start();
$_SESSION['logsuccess']=true;
require_once './validation/connect.php';

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./index.css">

    <!-- google-fonts link  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- --------owl-caresoul----------- -->
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">
    <meta id="myViewport" name="viewport" content="width = 475">
    <title>Awesome</title>
</head>

<body>

    <div class="wrapper">
        <div class="toast">
            <div class="content">
                <div class="icon"><i class="fa-solid fa-wifi"></i></div>
                <div class="details">
                    <span>online</span>
                    <!-- <p>Hurray! Internet is connected.</p> -->
                </div>
            </div>
            <!-- <div class="close-icon"><i class="fa-solid fa-xmark"></i></div> -->
        </div>
    </div>

    <div class="top-index-info">
        <div class="d-flex">
            <i class="fa-solid fa-phone-flip mt-1"></i>
            <p class="ms-2">+977 9813951823</p>
        </div>
        <div class="d-flex sec">
            <i class="fa-solid fa-at mt-1"></i>
            <p class="ms-2">raijozan2443@gmail.com</p>
        </div>
    </div>

    <div class="nav-contain">
        <div class="navbar mb-4">
            <div class="logo">
                <img src="./images/zero.gif" alt="" height="80px">
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="index.php?id=1">Home</a></li>
                    <li><a href="index.php?id=2">Image</a></li>
                    <li><a href="index.php?id=3">Shop</a></li>
                    <li><a href="index.php?id=4">Products</a></li>
                    <li><a href="<?php if($_SESSION['logSuccess']==true){
                        echo "./document/logout.php";
                    }
                    else{
                        echo "./document/signin.php";
                    }
                    ?>">Account</a></li>

                    <li><a href="<?php if($_SESSION['logSuccess']==false){
                        echo './document/signin.php';
                    }
                    else{
                        echo './document/logout.php';
                    }
                    ?>">
                            <?php 
                        if($_SESSION['logSuccess']==true)
                        { 
                            ?>
                            <button type="button"
                                class="btn btn-outline-primary fs-5"><?php echo 'Hi '.$_SESSION['user_name_profile'].'!'; ?></button>
                            <?php
                        }
                        else{
                            ?>
                            <button type="button" class="btn btn-outline-primary fs-5"><?php echo "Log In" ?></button>
                            <?php
                        }
                    ?></a></li>
                </ul>
            </nav>
            <!-- <?php
                if($_SESSION['logSuccess']==true){
                    $img_name=$_SESSION['img_name'];
                    $img='./profilepic/'.$img_name;
                    ?>
            <img src="<?php echo $img ;?>" class="cirpro" class="me-3 mt-4" alt="" srcset="">
            <?php
                }
                else{
                    ?>
                        <img src="./images/logo.jpg" width="60px" class="me-3 mt-4" alt="" srcset="">
                    <?php
                }
            ?> -->
            <!-- <a href="index.php?id=6"><img src="./images/product/cart.png" width="40px" height="40px" class="mt-3"
                    alt=""></a> -->
            <li class="px-3 text-uppercase mb-0 position-relative d-lg-flex">
                <div id="cart" class="d-none">
                </div>
                <a href="index.php?id=6" class="cart position-relative d-inline-flex"
                    aria-label="View your shopping cart">
                    <i class="fas fa fa-shopping-cart fa-lg"></i>
                    <span class="cart-basket d-flex align-items-center justify-content-center">
                        <?php
                        if(isset($_SESSION['logSuccess'])){
                            $sql="SELECT COUNT(*) AS cart FROM u_pending WHERE uid=".$_SESSION['user_pid'];
                            $query=mysqli_query($pro,$sql);
                            $row=mysqli_fetch_assoc($query);
                            echo $row['cart'];
                        }
                        else{
                            // echo "*";
                        }
                        ?>
                    </span>
                </a>
            </li>

            <img src="./images/product/menu.png" class="menu-icon mt-4" onclick="menutoggle()" alt="">
        </div>
    </div>


    <div class="php-sec">
        <?php
        if(!isset($_GET['id'])){
            require_once './front.php';
        }
        else{
            $i=$_GET['id'];
            if($i==1){
                require_once './front.php';
            }
            else if($i==2){
                ?>
        <link rel="stylesheet" href="./css/Image.css?v=<?php echo time(); ?>">
        <?php
                require_once './Image.php';
            }
            else if($i==3){
                ?>
        <link rel="stylesheet" href="./css/maincommerce.css?v=<?php echo time(); ?>">
        <?php
                require_once './document/maincommerce.php';
            }
            else if($i==4){
                ?>
        <link rel="stylesheet" href="./css/products.css?v=<?php echo time(); ?>">
        <?php
                require_once './document/products.php';
            }
            else if($i==5){
                ?>
        <link rel="stylesheet" href="./css/product-details.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="./css/products.css?v=<?php echo time(); ?>">
        
        <?php
                require_once './document/product-details.php';
            }
            else if($i==6){
                ?>
        <link rel="stylesheet" href="./css/products.css?v=<?php echo time(); ?>">
        <?php
                require_once './document/cart.php';
            }
            else if($i==7){
                ?>
        <link rel="stylesheet" href="./css/signin.css?v=<?php echo time(); ?>">
        <?php
                require_once './document/signin.php';
            }
            else if($i==8){
                ?>
        <link rel="stylesheet" href="./css/pay_final.css?v=<?php echo time(); ?>">
        <?php
                require_once './document/pay_final.php';
            }
            else if($i==9){
                ?>
        <link rel="stylesheet" href="./css/products.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="./css/userorderinfo.css?v=<?php echo time(); ?>">
        <?php
                require_once './document/userorderinfo.php';
            }
            
        }
            ?>
    </div>

    <div class="footer border border-top-1">
        <div class="footer-up">
            <div class="info">
                <img src="./images/mainlogo.png" height="80px" alt=""><br>
                <b>J.B Structure</b>
            </div>
            <div class="contact-us fo">
                <b>CONTACT US</b><br />
                <hr />
                <p class='mt-3'>
                    <span><i class="fa-solid fa-location-dot"></i> &nbsp; : Khotang Diktel <br /><br /></span>
                    <span><i class="fa-solid fa-envelope"></i> : raijozan2443@gmail.com <br /><br /></span>
                    <span><i class="fa-solid fa-phone"></i> : +977 9813951823 <br /></span>
                </p>
            </div>
            <!-- <div class="about-us fo">
                <b>ABOUT US</b><br />
                <hr />
                <p class='mt-3'>
                    <a href="./index.php?id=1"><span><i class="fa-solid fa-feather-pointed"></i> Company info<br /><br /></span></a>
                </p>
            </div> -->
            <div class="links fo">
                <b>LINKS</b>
                <hr>
                <p class='mt-3 fs-1'>
                    <i class="fa-brands fa-facebook"></i>&nbsp;
                    <i class="fa-brands fa-instagram"></i>&nbsp;
                    <i class="fa-brands fa-youtube"></i>&nbsp;
                </p>
                <b>Payment Method</b>
                <hr>
                <p class='mt-3 fs-1'>
                    <i class="fa-solid fa-money-bill-1-wave" style="color:#7400b8"></i>
                </p>
                <p style="color:black">CASH ON DELIVERY</p>
            </div>
        </div>
        <div class="maps">
            <!-- <img src="./images/maps.png" alt=""> -->
        </div>
        <div class="footer-down d-flex justify-content-center ps-5">
            Copyright 2018 www.henandr.com.cn All Rights Reserved.
        </div>
    </div>



    <!-- Jquery Libaryfile -->
    <script src="./js/Jquery3.4.1.min.js"></script>

    <!-- -owl-caresoul js------- -->
    <script src="./js/owl.carousel.min.js"></script>

    <!-- Custom JS file -->
    <script src="./js/main.js"></script>
    <script src="./js/online.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/52bb53895c.js" crossorigin="anonymous"></script>

    <!-- ------------js for toggle menu----------------->
    <script>
    var MenuItems = document.getElementById("MenuItems");
    MenuItems.style.maxHeight = "0px";

    function menutoggle() {
        if (MenuItems.style.maxHeight == "0px") {
            MenuItems.style.maxHeight = "200px";
        } else {
            MenuItems.style.maxHeight = "0px";
        }
    }
    </script>
    <!-- for viewport  -->
    <!-- <script>
        window.onload = function () {
            var mvp = document.getElementById('myViewport');
            mvp.setAttribute('content','width=580');
        }
    </script>  -->
</body>

</html>