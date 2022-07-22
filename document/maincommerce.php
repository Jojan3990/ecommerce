<?php 
session_start();
require_once ('./validation/connect.php');
?>
<main>

    <div class="header">
        <div class="contain">
            <div class="gg-edit">
                <div class="gg-edit-up col-two">
                    <h1>Like what you see!</h1>
                    <p>It isn't always about awesomeness. It's about
                        consistency. Consistent hard work gains success. Greatness will come</p>
                    <a href="./index.php?id=4"><button type="button" class="btn btn-primary">Explore now</button></a>
                </div>
                <div class="gg-edit-down col-two">
                    <!-- <img src="./images/side.png"  alt="side"> -->
                    <div class="img-side"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- ---------haha caterogy-------- -->
    <!-- <div class="categories">
        <div class="small-container">
            <section>
                <div class="blogcare">
                    <div class="containercare">
                        <div class="owl-carousel owl-theme blog-post">
                            <div class="item">
                                <div class="col-four">
                                    <img src="./images/product/product-1.jpg" alt="">
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
                            </div>
                            <div class="item">
                                <div class="col-four">
                                    <img src="./images/product/product-2.jpg" alt="">
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
                            </div>
                            <div class="item">
                                <div class="col-four">
                                    <img src="./images/product/product-3.jpg" alt="">
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
                            </div>
                            <div class="item">
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
                            </div>
                        </div>
                        <div class="owl-navigation">
                            <span class="owl-nav-prev"><i class="fas fa-long-arrow-alt-left"></i></span>
                            <span class="owl-nav-next"><i class="fas fa-long-arrow-alt-right"></i></span>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div> -->

    </div>

    <!-- --featured category-------- -->

    <div class="categories">
        <div class="small-container">
            <div class="row">
                <div class="col-three">
                    <img src="./images/product/prod1.jpg" alt="">
                </div>
                <div class="col-three">
                    <img src="./images/product/prod2.jpg" alt="">
                </div>
                <div class="col-three">
                    <img src="./images/product/prod3.jpg" alt="">
                </div>
            </div>
        </div>

    </div>

    <!-- --featured category end-------- -->

    <!-- ------featured products ---------  -->

    <div class="small-container">
        <h2 class="text-center title">Featured Products</h2>
        <section>
            <div class="blogcare">
                <div class="containercare">
                    <div class="owl-carousel owl-theme blog-post">
                        <?php 
                            $sql="select * from product_detail";
                            $query=mysqli_query($pro,$sql);
                            if($query){
                                if(mysqli_num_rows($query)<=0){
                                    echo "no data in table";
                                }
                                else{
                                    while($row=mysqli_fetch_assoc($query)){
                                        $pic_name=$row['P_img1'];
                                        $_SESSION['pid']=$row['pid'];
                                        ?>
                        <div class="item">
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
                        </div>
                        <?php
                                    }
                                }
                            }
                        ?>
                        <!-- <div class="item">
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
                        </div> -->
                    </div>
                    <div class="owl-navigation">
                        <span class="owl-nav-prev"><i class="fas fa-long-arrow-alt-left"></i></span>
                        <span class="owl-nav-next"><i class="fas fa-long-arrow-alt-right"></i></span>
                    </div>
                </div>
            </div>
        </section>
        <!-- ------latest product-----------  -->

        <h2 class="title">Latest Product</h2>
        <div class="row">
            <?php
            $sql="SELECT * FROM product_detail ORDER BY pid DESC";
            $query=mysqli_query($pro,$sql);
            while($row=mysqli_fetch_assoc($query)){
                $pic_name=$row['P_img1'];
                $_SESSION['pid']=$row['pid'];
                ?>
            <div class="col-four">
                <a href="./index.php?id=5&pid=<?php echo $row['pid'] ;?>"><img
                        src="<?php echo "./productpic/product1/".$pic_name ;?>" alt=""></a>
                <h5><?php echo $row['p_name']; ?></h5>
                <div class="rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>
                <p><?php echo $row['p_price'] ;?></p>
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
        <!-- <div class="row">
            <div class="col-four">
                <img src="./images/product/product-5.jpg" alt="">
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
                <img src="./images/product/product-6.jpg" alt="">
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
                <img src="./images/product/product-7.jpg" alt="">
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
                <img src="./images/product/product-8.jpg" alt="">
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
        </div>
        <div class="row">
            <div class="col-four">
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
            </div>
            <div class="col-four">
                <img src="./images/product/product-10.jpg" alt="">
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
                <img src="./images/product/product-11.jpg" alt="">
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
                <img src="./images/product/product-12.jpg" alt="">
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
        </div> -->


        <!-- --------latest product end-------  -->
    </div>

    <!-- ----------- featured product end----------- -->


    <!-- ----------offer-------->
    <div class="offer">
        <div class="small-container">
            <div class="oo-edit">
                <div class="oo-edit-up col-two">
                    <!-- <div class="img-oo-side"></div> -->
                    <img src="./images/Studio_Project.png" height="400">
                </div>
                <div class="oo-edit-down col-two">
                    <p>Exclusively Available on J.B</p>
                    <h1>Horse Swing</h1>
                    <small>Horse lovers rejoice! This high-quality swing features four horses running along a fence, in an artist-designed cast iron swing back. </small>
                    <br><a href="./index.php?id=5&pid=18"><button type="button" class="btn btn-secondary mt-3">Buy Now</button></a>
                </div>
            </div>
        </div>
    </div>

    <!-- -----------offer end ------------->

    <!-- -------testimonial------------  -->

    <div class="testimonial">
        <div class="small-container">
            <div class="row">
                <div class="col-three">
                    <i class="fa fa-quote-left"></i>
                    <p>From the first time we talked on the phone your positive attitude made deciding to build a steel building the right choice for our needs. Your team of talented workers made this a seamless build. It was a pleasure working with you.</p>
                    <!-- <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div> -->
                    <img src="./images/product/user-1.png" alt="">
                    <h3>Manoj Basnet</h3>
                </div>
                <div class="col-three">
                    <i class="fa fa-quote-left"></i>
                    <p>This is the third time we have used the metal structure team. Each build had very different situations and they performed well in each. The team of building erectors are always ready to adapt to any new challenges that arose. I will be using them in the future.</p>
                    <!-- <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div> -->
                    <img src="./images/product/user-2.png" alt="">
                    <h3>Jojan Rai</h3>
                </div>
                <div class="col-three">
                    <i class="fa fa-quote-left"></i>
                    <p>Thanks to JB and his crew for providing 2 metal buildings on our projects.  Everything from start to finish was timely and professional.  We would recommend JB Structure to anyone looking to purchase and erect their metal buildings.  Thanks JB</p>
                    <!-- <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div> -->
                    <img src="./images/product/user-3.png" alt="">
                    <h3>Atit Karki</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- testimonial end  -->

    <!-- -------brands----------->

    <div class="brands">
        <div class="small-container">
            <div class="row">
                <div class="col-five">
                    <img src="./images/product/logo-godrej.png" alt="">
                </div>
                <div class="col-five">
                    <img src="./images/product/logo-oppo.png" alt="">
                </div>
                <div class="col-five">
                    <img src="./images/product/logo-coca-cola.png" alt="">
                </div>
                <div class="col-five">
                    <img src="./images/product/logo-paypal.png" alt="">
                </div>
                <div class="col-five">
                    <img src="./images/product/logo-philips.png" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- brands end  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</main>