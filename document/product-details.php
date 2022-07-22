<?php
session_start();
require_once('./validation/connect.php');
$pid=$_GET['pid'];
$sql="select * from product_detail where pid= ".$pid;
$query=mysqli_query($pro,$sql);
$row = mysqli_fetch_assoc($query);
$category=$row['p_category'];

?>
<main>
    <!-- ------------single product-details------------------>

    <div class="small-container single-product bor">
        <div class="row">
            <div class="col-two">
                <div class="img-cen">
                    <img src="./productpic/product1/<?php echo $row['P_img1'];?>" height="350px" id="ProductImg">
                </div>
                <div class="small-img-row">
                    <div class="small-img-col">
                        <img src="./productpic/productall/<?php echo $row['P_img1'];?>" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="./productpic/productall/<?php echo $row['p_img2'];?>" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="./productpic/productall/<?php echo $row['p_img3'];?>" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="./productpic/productall/<?php echo $row['p_img4'];?>" width="100%" class="small-img">
                    </div>
                </div>
            </div>
            <div class="col-two col-two-test">
                <p>Home / <?php echo $row['p_name'] ?></p>
                <h2><?php echo $row['p_dname'] ;?></h2>
                <div class="rating ra-lef">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>
                <p class='pa-man'>Rs <?php echo $row['p_price'] ;?></p> <!-- as i did error in code so for now this -->
                <!-- <select>
                    <option selected>Select Size</option>
                    <option value="1">XXL</option>
                    <option value="2">XL</option>
                    <option value="3">Large</option>
                    <option value="3">Medium</option>
                    <option value="3">Small</option>
                </select> -->
                <form method="POST"
                    action="<?php if(isset($_SESSION['logSuccess']) && $_SESSION['logSuccess']==true){echo "./validation/dbincart.php?pid=$pid";} else{  $_SESSION['back_to_product']=true;  echo "./document/signin.php?pid=$pid";} ;?>">
                    <button class="btn me-2 fs-3"
                        onclick="this.parentNode.querySelector('.some-class').stepDown()">-</button>
                    <input type="number" class="some-class" name="num_cart" value="1" min=1
                        max=<?php echo $row['p_stock'] ;?>>
                    <button class="btn fs-3" onclick="this.parentNode.querySelector('.some-class').stepUp()">+</button>
                    <button type="submit" class="btn btn-primary" <?php if($row['p_stock']<1){echo 'disabled';}?>>Add to
                        Cart</button>
                    <p class="opacity-50">Only <?php if($row['p_stock']<0){echo "0" ;} else{ echo $row['p_stock'] ;};?>
                        items left</p>
                    <!-- <a href=""><button type="button" class="btn btn-secondary">Add to cart</button></a> -->
                </form>


                <!-- <a href="<?php if(1==1){echo "./index.php?id=6&pid=$pid";} else{echo "./document/signin.php";}  ;?>"><button type="button" class="btn btn-secondary">Add to cart</button></a> -->
                <h3 class="mt-2">Product Details <i class="fa-solid fa-indent"></i></h3>
                <hr>
                <p class="opacity-75"><?php echo $row['p_detail'] ;?></p>
            </div>
        </div>
        <?php
        if($row['p_stock']<=0){
            ?>
        <div class="">
            <div class="alert alert-danger" role="alert">
                Sorry for the inconvenience we are currently out of stock !!!<br>
                You can contact us directly for further queries.
            </div>
        </div>
        <div class="fl">
            <img src="./images/os.png" alt="">
        </div>
        <?php
        }
        ?>
        <div class="spec mt-5">
            <p>Product Specifications</p>
            <hr>
            <span class="opacity-50 me-5">Material</span> &emsp;&nbsp; <?php echo $row['p_material'] ?> <br>
            <span class="opacity-50 me-5">Usuage</span> &emsp;&nbsp;&nbsp; <?php echo $row['p_usuage'] ?> <br>
            <span class="opacity-50 me-5">Apperance</span> <?php echo $row['p_apper'] ?> <br>
            <span class="opacity-50 me-5">Capacity</span> &emsp;<?php echo $row['p_capa'] ?> <br>
            <span class="opacity-50 me-5">Length</span>&emsp;&emsp;&nbsp;&nbsp;<?php echo $row['p_length'] ?> <br>
            <span class="opacity-50 me-5">Width</span> &emsp;&emsp;&nbsp;&nbsp;<?php echo $row['p_width'] ?>
        </div>
    </div>

    <!-- <div class="container">
        <p>haha</p>
    </div> -->

    <div class="small-container bor mt-5">
        <!-- --------Rating & Reviews-------------  -->
        <div class=" mb-5 mt-5">
            <p class="paragra fs-5"><i class="fas fa-comments"></i> Rating and Reviews of <?php echo $row['p_dname'] ?>
            </p>
            <hr>
            <div class="ra-sep d-flex">
                <div class="">
                    <p class="fs-1 mt-4">4.9/5</p>
                    <div class="rating fs-3">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>

                </div>
                <div class="lef-margin mt-4">
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>&emsp;
                        <?php
                        $sql="SELECT COUNT(u_rating) AS rating FROM u_comment where udelete=0 AND uid=$pid AND u_rating=5";
                        $query=mysqli_query($pro,$sql);
                        if($query){
                            $row=mysqli_fetch_assoc($query);
                            echo $row['rating'];
                        }
                        else{
                            echo "database error";
                        }
                        ?>
                    </div>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star off"></i>&emsp;
                        <?php
                        $sql="SELECT COUNT(u_rating) AS rating FROM u_comment where udelete=0 AND uid=$pid AND u_rating=4";
                        $query=mysqli_query($pro,$sql);
                        if($query){
                            $row=mysqli_fetch_assoc($query);
                            echo $row['rating'];
                        }
                        else{
                            echo "database error";
                        }
                        ?>
                    </div>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star off"></i>
                        <i class="fa-solid fa-star off"></i>&emsp;
                        <?php
                        $sql="SELECT COUNT(u_rating) AS rating FROM u_comment where udelete=0 AND uid=$pid AND u_rating=3";
                        $query=mysqli_query($pro,$sql);
                        if($query){
                            $row=mysqli_fetch_assoc($query);
                            echo $row['rating'];
                        }
                        else{
                            echo "database error";
                        }
                        ?>
                    </div>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star off"></i>
                        <i class="fa-solid fa-star off"></i>
                        <i class="fa-solid fa-star off"></i>&emsp;
                        <?php
                        $sql="SELECT COUNT(u_rating) AS rating FROM u_comment where udelete=0 AND uid=$pid AND u_rating=2";
                        $query=mysqli_query($pro,$sql);
                        if($query){
                            $row=mysqli_fetch_assoc($query);
                            echo $row['rating'];
                        }
                        else{
                            echo "database error";
                        }
                        ?>
                    </div>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star off"></i>
                        <i class="fa-solid fa-star off"></i>
                        <i class="fa-solid fa-star off"></i>
                        <i class="fa-solid fa-star off"></i>&emsp;
                        <?php
                        $sql="SELECT COUNT(u_rating) AS rating FROM u_comment where udelete=0 AND uid=$pid AND u_rating=1";
                        $query=mysqli_query($pro,$sql);
                        if($query){
                            $row=mysqli_fetch_assoc($query);
                            echo $row['rating'];
                        }
                        else{
                            echo "database error";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- ------------comment-section------------->
        <div class="">
            <div class="comment_section">
                <div class="form">
                    <div class="comment_people_section">
                        <p class="paragra ">Product Reviews</p>
                        <hr><br><br>
                        <?php
                        $sql="SELECT * FROM u_comment where udelete=0";
                        $query=mysqli_query($pro,$sql);
                        if($query){
                            if (mysqli_num_rows($query) <= 0) {

                            }
                            else{
                                while($row=mysqli_fetch_assoc($query)){
                                    if($pid==$row['uid']){
                                        ?>
                        <div class="all_person">
                            <div class="person">
                                <p class="paragra mt-2">
                                    <!-- <img src="./profilepic/<?php echo $row['u_pic'] ;?>" height="50px" class="mt-3"> -->
                                    <b> &nbsp;<?php echo $row['U_name'] ;?> <i
                                            class="fa-solid fa-clipboard-check"></i></b>
                                </p>
                            </div>

                            <div class="person_comment">
                                <div class="rating">
                                    <?php
                            $rate=$row['u_rating'];
                            for($i=0;$i<$rate;$i++){
                                ?>
                                    <label for="rate-5" class="fas fa-star"></label>
                                    <?php
                            }
                            ?>
                                </div>
                                <div class="df d-flex justify-content-between">
                                    <p class="paragra mt-4">
                                        <?php echo $row['u_message'] ;?>
                                    </p>
                                    <?php
                                    if($row['userID']==$_SESSION['user_pid']){
                                        ?>
                                    <div class="right_align">
                                        <button type="button" class="btn btn-link" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            Edit
                                        </button>
                                    </div>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div><br>
                        </div>
                        <?php
                                    }
                                    ?>
                        <?php
                                }
                            }
                        }
                    ?>
                        <br>
                        <!-- <div class="all_person">
                        <div class="person">
                            <p class="paragra">
                                <img src="./images/logo.jpg" height="50px" class="mt-3">
                                <b> &nbsp;<?php echo ' jojan' ?> </b>
                        </div>
                        <div class="person_comment">
                            <p class="paragra"><?php echo 'bahaha' ?></p>
                            <div class="right_align">
                                <a href="../Database/delete.php?id=<?php echo '1' ?>">Inappropriate Message</a>
                            </div>
                        </div>
                    </div> -->
                    </div>
                </div>


                <div class="temp"></div>
            </div>
        </div>
    </div>

    <!-- -----comment user------------>
    <?php
        $pid=$_GET['pid'];
        $sql="SELECT * FROM u_pro_final WHERE upid=".$_SESSION['user_pid']." AND p_pid=$pid"." AND u_review=0";
        $query=mysqli_query($pro,$sql);
        if($query){
            while($row=mysqli_fetch_assoc($query)){
                if($row['u_status']==3){
                    $uid_pri=$row['uid_pri'];
                    ?>
    <div class="small-container mb-4">
        <?php
                if($_SESSION['logSuccess']==true){
                
                    ?>
        <form action="./validation/comment.php?id=<?php echo $pid; ?>&uid_pri=<?php echo $uid_pri; ?>" method="POST">
            <h5 class="ms-3">Give Review</h5>
            <div class="container-fa">
                <div class="star-widget">
                    <input type="radio" name="rate5" id="rate-5">
                    <label for="rate-5" class="fas fa-star"></label>
                    <input type="radio" name="rate4" id="rate-4">
                    <label for="rate-4" class="fas fa-star"></label>
                    <input type="radio" name="rate3" id="rate-3">
                    <label for="rate-3" class="fas fa-star"></label>
                    <input type="radio" name="rate2" id="rate-2">
                    <label for="rate-2" class="fas fa-star"></label>
                    <input type="radio" name="rate1" id="rate-1" checked>
                    <label for="rate-1" class="fas fa-star"></label>
                </div>
            </div>
            <div class="err">
                <?php
                        if($_SESSION['rate_err']==true){
                            unset($_SESSION['rate_err']);
                            ?>
                <p>Rating is required</p>
                <?php
                        }
                        ?>
            </div>
            <hr>
            <div class="mb-3">
                <!-- <label for="exampleInputEmail1" class="form-label">Email address</label> -->
                <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3"
                    placeholder="Your review" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php
                }
                ?>
    </div>
    <?php
                }
            }
        

        }
    ?>

    <!-- ----------title------------  -->

    <div class="small-container mt-4">
        <div class="row row-two">
            <div class="">
                <h2>Related Products</h2>
            </div>
            <!-- <div class=""><p>view more</p></div> -->
        </div>
    </div>

    <!-- --------------products-----------  -->
    <div class="small-container">
        <div class="row">
            <?php
            $sql="SELECT * FROM product_detail WHERE p_category='$category'";
            $query=mysqli_query($pro,$sql);
            if($query){
                $i=0;
                while($row=mysqli_fetch_assoc($query)){
                    ?>
            <div class="col-four">
                <a href="./index.php?id=5&pid=<?php echo $row['pid'] ;?>"><img
                        src="./productpic/product1/<?php echo $row['P_img1'] ;?>"></a>
                <h5><?php echo $row['p_name'] ?></h5>
                <div class="rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>
                <p>Rs : <?php echo $row['p_price'] ;?></p>
                <?php
                if($row['p_stock']==0){
                    ?>
                <div class="alert alert-danger" role="alert">
                    Out of stock
                </div>
                <?php
                }
                ?>
            </div>
            <?php
                    $i++;
                    if($i==4){
                        break;
                    }
                }
            }
            ?>
            <!-- <div class="col-four">
                <img src="./images/product/product-9.jpg" alt="">
                <h5>Steel Made</h5>
                <div class="rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>
                <p>$50.00</p>
            </div> -->
        </div>

    </div>


    <!-- -------modal-----------  -->
    <!-- Modal -->
    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
        $pid=$_GET['pid'];
        $sql="SELECT * FROM u_pro_final WHERE upid=".$_SESSION['user_pid']." AND p_pid=$pid"." AND u_review=1";
        $query=mysqli_query($pro,$sql);
        if($query){
            while($row=mysqli_fetch_assoc($query)){
                    $uid_pri=$row['uid_pri'];
                    ?>
                    <div class="small-container mb-4">
                        <?php
                if($_SESSION['logSuccess']==true){
                    ?>
                        <form action="./validation/updatecomment.php?id=<?php echo $pid; ?>&uid_pri=<?php echo $uid_pri; ?>"
                            method="POST">
                            <h5 class="ms-3">Give Review</h5>
                            <div class="container-fa">
                                <div class="star-widget">
                                    <input type="radio" name="rate5" id="rate-5">
                                    <label for="rate-5" class="fas fa-star"></label>
                                    <input type="radio" name="rate4" id="rate-4">
                                    <label for="rate-4" class="fas fa-star"></label>
                                    <input type="radio" name="rate3" id="rate-3">
                                    <label for="rate-3" class="fas fa-star"></label>
                                    <input type="radio" name="rate2" id="rate-2">
                                    <label for="rate-2" class="fas fa-star"></label>
                                    <input type="radio" name="rate1" id="rate-1" checked>
                                    <label for="rate-1" class="fas fa-star"></label>
                                </div>
                            </div>
                            <div class="err">
                                <?php
                        if($_SESSION['rate_err']==true){
                            unset($_SESSION['rate_err']);
                            ?>
                                <p>Rating is required</p>
                                <?php
                        }
                        ?>
                            </div>
                            <hr>
                            <div class="mb-3">
                                <!-- <label for="exampleInputEmail1" class="form-label">Email address</label> -->
                                <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3"
                                    placeholder="Your review" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <?php
                }
                ?>
                    </div>
                    <?php
            }
        

        }
        ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

    <!-- ------for modal-------------  -->
    <script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function() {
        myInput.focus()
    })
    </script>

    <!-- --------js for product gallery-------------->
    <script src="./js/productGall.js"></script>

    <!-- ---------modal----------- -->
    <script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function() {
        myInput.focus()
    })
    </script>

    <script>
    const btn = document.querySelector("button");
    const post = document.querySelector(".post");
    const widget = document.querySelector(".star-widget");
    const editBtn = document.querySelector(".edit");
    btn.onclick = () => {

    }
    </script>


    <!-- ------except form type submit default button press is prevented--------  -->
    <script>
    var buttons = document.querySelectorAll('form button:not([type="submit"])');
    for (i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener('click', function(e) {
            e.preventDefault();
        });
    }
    </script>
</main>