<?php
    session_start();
    require_once ('./validation/connect.php');
?>
<main>

    <div class="small-container">
        <div class="row row-two mb-5">
            <h2 class="mb-3">Products</h2>
            <hr>
            <form action="./document/categoryswitch.php" method="POST">
                <select name="category" class="mt-3">
                    <option value="product"
                        <?php if(isset($_SESSION['select']) && $_SESSION['select']=="product"){echo "selected" ; } ;?>>
                        All Products</option>
                    <option value="chair"
                        <?php if(isset($_SESSION['select']) && $_SESSION['select']=="chair"){echo "selected" ; } ;?>>
                        Chair</option>
                    <option value="swing"
                        <?php if(isset($_SESSION['select']) && $_SESSION['select']=="swing"){echo "selected" ; } ;?>>
                        Swing</option>
                    <option value="bench"
                        <?php if(isset($_SESSION['select']) && $_SESSION['select']=="bench"){echo "selected" ; } ;?>>
                        Bench</option>
                    <option value="wardrobe"
                        <?php if(isset($_SESSION['select']) && $_SESSION['select']=="wardrobe"){echo "selected" ; } ;?>>
                        Wardrobe</option>
                    <option value="rack"
                        <?php if(isset($_SESSION['select']) && $_SESSION['select']=="wardrobe"){echo "selected" ; } ;?>>
                        Rack</option>
                </select>
                <button type="button submit" class="btn btn-dark">View</button>
            </form>
        </div>

        <!-- for product and all -->
        <?php
            if($_SESSION['select']=="product" || empty($_SESSION['select'])){
                    ?>
                <?php
                $sql="select * from product_detail";
                $query=mysqli_query($pro,$sql);
                if($query){
                    if(mysqli_num_rows($query)<=0){
                        echo "No Data in table";
                    }
                    else{
                ?>
                <div class="row">
                    <?php
                                while($row=mysqli_fetch_assoc($query)){
                                    $pic_name=$row['P_img1'];
                                    $_SESSION['pid']=$row['pid'];
                                    // echo $row;
                                ?>
                    <div class="col-four">
                        <a href="./index.php?id=5&pid=<?php echo $row['pid'] ;?>"><img
                                src="<?php echo "./productpic/product1/".$pic_name ;?>" alt=""></a>
                        <h5><?php  echo $row['p_name'];?></h5>
                        <div class="rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                        </div>
                        <p>Rs : <?php echo $row['p_price'] ;?></p>
                        <?php
                                    if($row['p_stock']<1){
                                        ?>
                        <div class="alert alert-danger" role="alert">
                            Out of stock
                        </div>
                        <?php
                                    }
                                    ?>
                    </div>
                    <?php
                                }
                                ?>
                </div>
                <?php
                        }
                    }
                        else{
                            echo "something wrong";
                        }
                    ?>
                <?php
            }
            else if($_SESSION['select']=="chair"){
                $sql="select * from product_detail where p_category='Chair'";
                $query=mysqli_query($pro,$sql);
                if($query){
                    if(mysqli_num_rows($query)<=0){
                        echo "No Data in table";
                    }
                    else{
                        ?>
                        <div class="row">
                            <?php
                                        while($row=mysqli_fetch_assoc($query)){
                                            $pic_name=$row['P_img1'];
                                            $_SESSION['pid']=$row['pid'];
                                            // echo $row;
                                        ?>
                            <div class="col-four">
                                <a href="./index.php?id=5&pid=<?php echo $row['pid'] ;?>"><img
                                        src="<?php echo "./productpic/product1/".$pic_name ;?>" alt=""></a>
                                <h5><?php  echo $row['p_name'];?></h5>
                                <div class="rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star-half-stroke"></i>
                                </div>
                                <p>Rs : <?php echo $row['p_price'] ;?></p>
                                <?php
                                            if($row['p_stock']<1){
                                                ?>
                                <div class="alert alert-danger" role="alert">
                                    Out of stock
                                </div>
                                <?php
                                            }
                                            ?>
                            </div>
                            <?php
                                        }
                                        ?>
                        </div>
                        <?php
                                }
                }
                else{
                    echo 'something wrong';
                }
            }
            else if($_SESSION['select']=="swing"){
                $sql="select * from product_detail where p_category='Swing'";
                $query=mysqli_query($pro,$sql);
                if($query){
                    if(mysqli_num_rows($query)<=0){
                        echo "No Data in table";
                    }
                    else{
                        ?>
                        <div class="row">
                            <?php
                                        while($row=mysqli_fetch_assoc($query)){
                                            $pic_name=$row['P_img1'];
                                            $_SESSION['pid']=$row['pid'];
                                            // echo $row;
                                        ?>
                            <div class="col-four">
                                <a href="./index.php?id=5&pid=<?php echo $row['pid'] ;?>"><img
                                        src="<?php echo "./productpic/product1/".$pic_name ;?>" alt=""></a>
                                <h5><?php  echo $row['p_name'];?></h5>
                                <div class="rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star-half-stroke"></i>
                                </div>
                                <p>Rs : <?php echo $row['p_price'] ;?></p>
                                <?php
                                            if($row['p_stock']<1){
                                                ?>
                                <div class="alert alert-danger" role="alert">
                                    Out of stock
                                </div>
                                <?php
                                            }
                                            ?>
                            </div>
                            <?php
                                        }
                                        ?>
                        </div>
                        <?php
                                }
                }
                else{
                    echo 'something wrong';
                }
            }
            else if($_SESSION['select']=="bench"){
                $sql="select * from product_detail where p_category='Bench'";
                $query=mysqli_query($pro,$sql);
                if($query){
                    if(mysqli_num_rows($query)<=0){
                        echo "No Data in table";
                    }
                    else{
                        ?>
                        <div class="row">
                            <?php
                                        while($row=mysqli_fetch_assoc($query)){
                                            $pic_name=$row['P_img1'];
                                            $_SESSION['pid']=$row['pid'];
                                            // echo $row;
                                        ?>
                            <div class="col-four">
                                <a href="./index.php?id=5&pid=<?php echo $row['pid'] ;?>"><img
                                        src="<?php echo "./productpic/product1/".$pic_name ;?>" alt=""></a>
                                <h5><?php  echo $row['p_name'];?></h5>
                                <div class="rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star-half-stroke"></i>
                                </div>
                                <p>Rs : <?php echo $row['p_price'] ;?></p>
                                <?php
                                            if($row['p_stock']<1){
                                                ?>
                                <div class="alert alert-danger" role="alert">
                                    Out of stock
                                </div>
                                <?php
                                            }
                                            ?>
                            </div>
                            <?php
                                        }
                                        ?>
                        </div>
                        <?php
                                }
                }
                else{
                    echo 'something wrong';
                }
            }
            else if($_SESSION['select']=="wardrobe"){
                $sql="select * from product_detail where p_category='Wardrobe'";
                $query=mysqli_query($pro,$sql);
                if($query){
                    if(mysqli_num_rows($query)<=0){
                        echo "No Data in table";
                    }
                    else{
                        ?>
                        <div class="row">
                            <?php
                                        while($row=mysqli_fetch_assoc($query)){
                                            $pic_name=$row['P_img1'];
                                            $_SESSION['pid']=$row['pid'];
                                            // echo $row;
                                        ?>
                            <div class="col-four">
                                <a href="./index.php?id=5&pid=<?php echo $row['pid'] ;?>"><img
                                        src="<?php echo "./productpic/product1/".$pic_name ;?>" alt=""></a>
                                <h5><?php  echo $row['p_name'];?></h5>
                                <div class="rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star-half-stroke"></i>
                                </div>
                                <p>Rs : <?php echo $row['p_price'] ;?></p>
                                <?php
                                            if($row['p_stock']<1){
                                                ?>
                                <div class="alert alert-danger" role="alert">
                                    Out of stock
                                </div>
                                <?php
                                            }
                                            ?>
                            </div>
                            <?php
                                        }
                                        ?>
                        </div>
                        <?php
                                }
                }
                else{
                    echo 'something wrong';
                }
            }
            else if($_SESSION['select']=="rack"){
                $sql="select * from product_detail where p_category='Rack'";
                $query=mysqli_query($pro,$sql);
                if($query){
                    if(mysqli_num_rows($query)<=0){
                        echo "No Data in table";
                    }
                    else{
                        ?>
                        <div class="row">
                            <?php
                                        while($row=mysqli_fetch_assoc($query)){
                                            $pic_name=$row['P_img1'];
                                            $_SESSION['pid']=$row['pid'];
                                            // echo $row;
                                        ?>
                            <div class="col-four">
                                <a href="./index.php?id=5&pid=<?php echo $row['pid'] ;?>"><img
                                        src="<?php echo "./productpic/product1/".$pic_name ;?>" alt=""></a>
                                <h5><?php  echo $row['p_name'];?></h5>
                                <div class="rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star-half-stroke"></i>
                                </div>
                                <p>Rs : <?php echo $row['p_price'] ;?></p>
                                <?php
                                            if($row['p_stock']<1){
                                                ?>
                                <div class="alert alert-danger" role="alert">
                                    Out of stock
                                </div>
                                <?php
                                            }
                                            ?>
                            </div>
                            <?php
                                        }
                                        ?>
                        </div>
                        <?php
                                }
                }
                else{
                    echo 'something wrong';
                }
            }
        ?>

        <!-- <div class="row">
            
                <div class="col-four">
                    <img src="./productpic/product1/pro1-1652699884.jpg" alt="">

                    <h5>Steel Made</h5>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <p>$50.00</p>
                </div>
                <div class="col-four">
                    <img src="./productpic/product1/pro1-1652699838.jpg" alt="">
                    <h5>Steel Made</h5>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <p>$50.00</p>
                </div>
                <div class="col-four">
                    <img src="./productpic/product1/pro1-1652699884.jpg" alt="">

                    <h5>Steel Made</h5>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <p>$50.00</p>
                </div>
                <div class="col-four">
                    <img src="./productpic/product1/pro1-1652699872.jpg" alt="">
                    <h5>Steel Made</h5>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <p>$50.00</p>
                </div>
                <div class="col-four">
                    <img src="./productpic/product1/pro1-1652699884.jpg" alt="">

                    <h5>Steel Made</h5>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <p>$50.00</p>
                </div>
                <div class="col-four">
                    <img src="./productpic/product1/pro1-1652699838.jpg" alt="">
                    <h5>Steel Made</h5>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <p>$50.00</p>
                </div>
                <div class="col-four">
                    <img src="./productpic/product1/pro1-1652699906.jpg" alt="">
                    <h5>Steel Made</h5>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <p>$50.00</p>
                </div>
                <div class="col-four">
                    <img src="./productpic/product1/pro1-1652699838.jpg" alt="">
                    <h5>Steel Made</h5>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <p>$50.00</p>
                </div>
        </div>  -->

        <div class="page-btn">
            <span>1</span>
            <!-- <span>2</span>
            <span>3</span>
            <span>4</span> -->
            <span>&#8594;</span>
        </div>
    </div>

    <!-- ----------- featured product end----------- -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

    <!-- ----------for popover------------- -->
    <script>
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })
    </script>


</main>