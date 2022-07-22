<?php
session_start();
require_once './validation/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta id="myViewport" name="viewport" content="width = 546">
    <link rel="stylesheet" href="./admin.css">
    <link rel="stylesheet" href="./dashmain.css">

    <!-- google-fonts link  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <?php 
    if($_SESSION['log_signin_adminloginenter']==true){
        ?>
    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-5 fw-bold border-bottom mt-3 pb-5">
                <img src="./images/mainlogo.png" alt="logo" height="50rem" />
                <!-- CodeSlayer  -->
            </div>
            <div class="list-group list-group-flush my-3 fs-5">
                <!-- <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                class="fas fa-tachometer-alt me-2 mb-3"></i>Dashboard</a>  -->
                <a href="?id=1" class="list-group-item list-group-item-action bg-transparent second-text active">
                    <i class="fas fa-tachometer-alt me-2 mb-3"></i>Dashboard
                </a>
                <a href="?id=2" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-solid fa-user-astronaut me-2 mb-3"></i>User Info</a>
                <a href="?id=10" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-solid fa-comment me-2 mb-3"></i>User Comment</a>
                <a href="?id=3" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-brands fa-first-order me-2 mb-3"></i>Orders</a>
                <a href="?id=4" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-brands fa-product-hunt me-2 mb-3"></i>Product</a>
                <a href="./admin/logoutamdin.php" class="list-group-item list-group-item-action bg-transparent  fw-bold"><i
                        class="fas fa-power-off me-2 mb-3"></i>Logout</a>
            </div>
        </div>

        <!--sidebar-wrapper -->


        <!-- Page Content -->
        <div class="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fa-brands fa-free-code-camp fs-4 me-3" id="menu-toggle" onclick="coll()"></i>
                    <a class="navbar-brand" href="#">J.B Struct</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-5">
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Logout
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Admin Panel</a>
                        </li>
                    </ul>
                </div>

            </nav>
            <div class="container-fluid">
                <?php
        if(!isset($_GET['id'])){
            ?>
                <link rel="stylesheet" href="./admin/css/dashmain.css?v=<?php echo time(); ?>">
                <?php
            require_once './admin/dashmain.php';
        }
        else if($_GET['id']==1){
            ?>
                <link rel="stylesheet" href="./admin/dashmain.css?v=<?php echo time(); ?>">
                <?php
            require_once './admin/dashmain.php';
        }
        else if($_GET['id']==2){
            ?>
                <link rel="stylesheet" href="./admin/css/userinfo.css?v=<?php echo time(); ?>">
                <?php
            require_once './admin/userinfo.php';
        }
        else if($_GET['id']==3){
            ?>
                <link rel="stylesheet" href=".css?v=<?php echo time(); ?>">
                <?php
            require_once './admin/productinfo.php';
        }
        else if($_GET['id']==4){
            ?>
                <link rel="stylesheet" href="./admin/css/removeproduct.css?v=<?php echo time(); ?>">
                <?php
            require_once './admin/removeproduct.php';
        }
        else if($_GET['id']==5){
            ?>
                <link rel="stylesheet" href="./css/pro_detail.css?v=<?php echo time(); ?>">
                <?php
            require_once './document/pro_detail.php';
        }
        else if($_GET['id']==6){
            ?>
                <link rel="stylesheet" href="./css/products.css?v=<?php echo time(); ?>">
                <link rel="stylesheet" href="./css/userorderinfo.css?v=<?php echo time(); ?>">
                <link rel="stylesheet" href="./admin/css/usermaininfo.css?v=<?php echo time(); ?>">
                <?php
            require_once './admin/usermaininfo.php';
        }
        else if($_GET['id']==7){
            ?>
                <link rel="stylesheet" href="./admin/css/ordermain.css?v=<?php echo time(); ?>">
                <?php
            require_once './admin/ordermain.php';
        }
        else if($_GET['id']==8){
            ?>
                <link rel="stylesheet" href="./admin/css/products.css?v=<?php echo time(); ?>">
                <?php
            require_once './admin/pro-det.php';
            
        }
        else if($_GET['id']==9){
            ?>
                <link rel="stylesheet" href="./admin/css/proedit.css?v=<?php echo time(); ?>">
                <link rel="stylesheet" href="./admin/css/products.css?v=<?php echo time(); ?>">
                <?php
            require_once './admin/proedit.php';
            
        }
        else if($_GET['id']==10){
            ?>
                <link rel="stylesheet" href="./admin/css/usercomment.css?v=<?php echo time(); ?>">
                <?php
            require_once './admin/usercomment.php';
            
        }
        
        ?>
            </div>
        </div>


    </div>
    <?php
    }
    else{
        header('location:./admin/adminlogin.php');
    }
    ?>


    <!-- Jquery Libaryfile -->
    <script src="./js/Jquery3.4.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/52bb53895c.js" crossorigin="anonymous"></script>

    <script>
    function coll() {
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");
        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        }
    }
    </script>
    <!-- for viewport -->
    <!-- <script>
        window.onload = function () {
            var mvp = document.getElementById('myViewport');
            mvp.setAttribute('content','width=580');
        }
    </script>  -->


</body>

</html>