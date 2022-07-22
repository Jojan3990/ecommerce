<?php
session_start();
require_once './validation/connect.php';
$pid=$_GET['pid'];
$uid=$_GET['uid'];
$uid_pri=$_GET['uid_pri'];

?>
<main>
    <?php
    $sql="SELECT * FROM valSignUp where userID=$uid";
    $sql1="SELECT * FROM product_detail WHERE pid=$pid";
    $sql2="SELECT * FROM u_pro_final WHERE uid_pri=$uid_pri ";
    $query=mysqli_query($log,$sql);
    $query1=mysqli_query($pro,$sql1);
    $query2=mysqli_query($pro,$sql2);
    
    $row1=mysqli_fetch_assoc($query1);
    $row2=mysqli_fetch_assoc($query2);
    if($query){
        if (mysqli_num_rows($query) <= 0) {
            echo 'zero';
        }
        while($row=mysqli_fetch_assoc($query)){
            ?>
    <div class="top-back">
        <a href="./admin.php?id=3"><button type="button" class="btn btn-outline-dark mt-3">Go Back</button></a>
    </div>
    <div class="top">
        <b>Order#<?php echo $uid_pri ;?></b>
    </div>
    <div class="pro-info">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th colspan="5">Item</th>
                </tr>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Item</th>
                    <th scope="col">Sum</th>
                    <th scope="col">Rs</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td><a target="_blank" href="./admin.php?id=8&pid=<?php echo $pid; ?>"><img src="./productpic/product1/<?php echo $row1['P_img1'];?>" height="60px"></a></td>
                    <td><?php echo $row2['p_val'] ;?></td>
                    <td><?php echo $row1['p_price'] ;?></td>
                    <td><?php echo $row2['p_val']*$row1['p_price'] ;?></td>
                    <td>
                        <?php
                                if($row2['u_status']==0){
                                    ?>
                        <button type="button" class="btn btn-info">Pending</button>
                        <?php
                                }
                                else if($row2['u_status']==1){
                                    ?>
                        <button type="button" class="btn btn-danger">Cancelled</button>
                        <?php
                                }
                                else if($row2['u_status']==2){
                                    ?>
                        <button type="button" class="btn btn-warning">Cancelling</button>
                        <?php
                                }
                                else{
                                    ?>
                        <button type="button" class="btn btn-success">Delivered</button>
                        <?php
                                }
                                ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="order-status">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th colspan="2" scope="col">Update Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td><a href="./admin/ordermainstatus.php?id=0&uid=<?php echo $uid_pri ;?>"><button type="button" class="btn btn-info position-relative">
                                Pending
                                <span
                                    class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                                    <span class="visually-hidden">New alerts</span>
                                </span>
                            </button></a></td>
                    <td><a href="./admin/ordermainstatus.php?id=2&uid=<?php echo $uid_pri ;?>"><button type="button" class="btn btn-warning position-relative">
                                Cancelling
                                <span
                                    class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                                    <span class="visually-hidden">New alerts</span>
                                </span>
                            </button></a></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td><a href="./admin/ordermainstatus.php?id=1&uid=<?php echo $uid_pri ;?>"><button type="button" class="btn btn-danger position-relative">
                                Cancelled
                                <span
                                    class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                                    <span class="visually-hidden">New alerts</span>
                                </span>
                            </button></a></td>
                    <td><a href="./admin/ordermainstatus.php?id=3&uid=<?php echo $uid_pri ;?>"><button type="button" class="btn btn-success position-relative">
                                Delivered
                                <span
                                    class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                                    <span class="visually-hidden">New alerts</span>
                                </span>
                            </button></a></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="f-show">
        <!-- <div class="wrapper">
            <div class="img-area">
                <div class="inner-area">
                    <img src="<?php echo "./profilepic/".$row['profilePic'] ;?>" alt="">
                </div>
            </div>
            <a href="./admin.php?id=3">
                <div class="icon arrow"><i class="fas fa-arrow-left"></i></div>
            </a>
            <div class="icon dots"><i class="fas fa-ellipsis-v"></i></div>
            <div class="name"><?php echo $row['firstName'] ;?></div>
            <div class="about"><?php echo $row['email'] ;?></div>
            <div class="social-icons">
                <a href="#" class="fb"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" class="insta"><i class="fab fa-instagram"></i></a>
                <a href="#" class="yt"><i class="fab fa-youtube"></i></a>
            </div>
            <div class="buttons">
                <button>Ordered: 4</button>
                <button><?php echo $row['phoneNo'] ;?></button>
            </div>
            <div class="social-share">
                <div class="row">
                    <i class="far fa-heart"></i>
                    <i class="icon-2 fas fa-heart"></i>
                    <span>20.4k</span>
                </div>
                <div class="row">
                    <i class="far fa-comment"></i>
                    <i class="icon-2 fas fa-comment"></i>
                    <span>14.3k</span>
                </div>
                <div class="row">
                    <i class="fas fa-share"></i>
                    <span>12.8k</span>
                </div>
            </div>
        </div> -->
        <div class="add-info">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            # Info Required
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <img class="mb-3" src="<?php echo "./profilepic/".$row['profilePic'] ;?>" alt=""
                                height="200"><br>
                            <strong>User Name : </strong> <br>
                            <code><?php echo $row['firstName'] ;?></code><br>
                            <strong>Inputed user number by user is :</strong> <br>
                            <code>+977 <?php echo $row2['u_phno'] ;?></code><br>
                            <a href="./admin.php?id=6&pid=<?php echo $row['UserID'] ;?>"><button type="button" class="btn btn-outline-dark mt-2">PROFILE</button></a>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            # Shipping Address
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>User input Shipping address is </strong><br>
                            <?php echo $row2['u_ship'] ;?>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            # Additional Information
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>Additional information</strong><br>
                            <?php echo $row2['u_add'] ;?><br>
                            Date: <code> <?php echo $row2['p_date_br'] ;?> </code>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    }
    else{
        echo "err";
    }
    ?>
</main>