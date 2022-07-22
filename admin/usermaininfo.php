<?php
session_start();
require_once './validation/connect.php';
$id=$_GET['pid'];
$sql="SELECT * FROM valSignUp where userID=$id";
$query=mysqli_query($log,$sql);
?>
<main>
    <?php
    if($query){
        while($row=mysqli_fetch_assoc($query)){
            ?>
    <div class="back">
        <a href="./admin.php?id=2"><button type="button" class="btn btn-outline-dark">Go Back</button></a>
    </div>
    <div class="fl-main">
        <!-- <div class="wrapper">
            <div class="img-area">
                <div class="inner-area">
                    <img src="<?php echo "./profilepic/".$row['profilePic'] ;?>" alt="">
                </div>
            </div>
            <a href="./admin.php?id=2">
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
        <div class="side-info">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            #Info
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <img class="mb-3" src="<?php echo "./profilepic/".$row['profilePic'] ;?>" alt=""
                                height="200"><br>
                            <Strong>Name :</Strong> <?php echo $row['firstName'].' '.$row['lastName'] ;?><br>
                            <Strong>Number : </Strong><?php echo '+977'.' '.$row['phoneNo'] ;?><br>
                            <Strong>Email : </Strong><?php echo $row['email'] ;?>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            #Shipping Address
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <Strong>Address</Strong><br>
                            <?php echo $row['shipaddr'] ;?>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            #Login Date
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <code><?php echo $row['logInDate'] ;?></code>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="or-info">
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                            aria-controls="panelsStayOpen-collapseOne">
                            #OrderInfo
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                        aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                            <div class="small-container cart-page">
                                <table>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                    <?php
                        $sql="SELECT * FROM u_pro_final WHERE upid=$id ORDER BY uid_pri DESC";
                        $query=mysqli_query($pro,$sql);
                        if($query){
                            if (mysqli_num_rows($query) <= 0) {
                            }
                            else{
                                while($row=mysqli_fetch_assoc($query)){
                                    $sql1="SELECT * FROM product_detail WHERE pid=".$row['p_pid'];
                                    $query1=mysqli_query($pro,$sql1);
                                    $row1=mysqli_fetch_assoc($query1);
                                    $cart_img_item=$row1['P_img1'];
                                    $ordel=$row['uid_pri'];
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="cart-info">
                                                <a href="<?php echo "./index.php?id=5&pid=".$row['p_pid'];?>"><img
                                                        src="./productpic/product1/<?php echo $cart_img_item ;?>"></a>
                                                <div class="">
                                                    <p><?php echo $row1['p_dname'] ;?></p>
                                                    <small>Rs <?php echo $row1['p_price'] ;?></small>
                                                </div>
                                            </div>
                                        </td>
                                        <td><input style="width: 3em" type="number" value="<?php echo $row['p_val'];?>"
                                                disabled> </td>
                                        <td>Rs <br><?php echo $row1['p_price']*$row['p_val'] ;?></td>
                                        <td><code><?php echo $row['p_date_br'] ; ?></code></td>
                                        <td>
                                            <?php
                                        if($row['u_status']==0){
                                            ?>
                                            <button type="button" class="btn btn-info">Pending</button>
                                            <?php
                                        }
                                        else if($row['u_status']==1){
                                            ?>
                                            <button type="button" class="btn btn-danger">Cancelled</button>
                                            <?php
                                        }
                                        else if($row['u_status']==2){
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

                                    <?php
                                }
                            }
                        }
                                            
                  
                        ?>
                                </table>
                            </div>
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