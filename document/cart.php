<?php
session_start();
require_once './validation/connect.php';
require_once './index.php';

$sql="SELECT * FROM u_pending WHERE uid=".$_SESSION['user_pid']." AND pdelete=0";
$query=mysqli_query($pro,$sql);


if($_SESSION['logSuccess']==true){
    if(empty($_SESSION['cart_pid'])){
        $_SESSION['cart_pid']=array();
        $_SESSION['cart_vid']=array();
        if($_SESSION['cart_pid'][0]==''){
            $row=mysqli_fetch_assoc($query);
            if(isset($row['pid']) && !empty($row['pid'])){
                array_push($_SESSION['cart_pid'],$row['pid']);
                array_push($_SESSION['cart_vid'],$row['pval']);
                header('location:./index.php?id=6');
            }
        }
    }
    else{
        while($row=mysqli_fetch_assoc($query)){
            $same=false;
            if(isset($_SESSION['cart_pid'][0])){
                for($i = 0 ; $i <count($_SESSION['cart_pid']) ; $i++) {
                    if($_SESSION['cart_pid'][$i]==$row['pid']){
                        $same=true;
                    }
                }
                if($same==true){
                    // echo "same";
                }
                else{
                    array_push($_SESSION['cart_pid'],$row['pid']);
                    array_push($_SESSION['cart_vid'],$row['pval']);
                    // echo 'done';
                }
            }
            else{
            }
        }
        // echo count($_SESSION['cart_pid']);
        // print "<pre>";
        // print_r($_SESSION['cart_pid']);
        // print "</pre>";
        // echo "<br>";
        // $_SESSION['cart-count']=count($_SESSION['cart_pid']);
        // print "<pre>";
        // print_r($_SESSION['cart_vid']);
        // print "</pre>";
    
    // unset($_SESSION['cart_pid']);   
    }
} 
else{
    header('location:./document/signin.php');
}
?>
<main>
    <!-- -----------my order-------------->
    <div class="container">
        <button type="button" class="btn btn-outline-dark position-relative" data-bs-toggle="modal" data-bs-target="#exampleModalcart">
            My Order
            <span
                class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                <span class="visually-hidden">New alerts</span>
            </span>
        </button>
    </div>

    <!-- -------------cart items details-------------->

    <div class="small-container cart-page">
        <table>
            <tr>
                <th>Product</th>
                <th>&emsp;&emsp;Quantity</th>
                <th>Subtotal</th>
            </tr>
            <?php   
                for($i = 0 ; $i <count($_SESSION['cart_pid']) ; $i++) {
                    $sql="SELECT * FROM product_detail where pid=".$_SESSION['cart_pid'][$i];
                    $query=mysqli_query($pro,$sql);
                    if($query){
                        if(mysqli_num_rows($query)<=0){

                        }
                        else{
                            while($row=mysqli_fetch_assoc($query)){
                                $cart_img=$row['P_img1'];
                                ?>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="./productpic/product1/<?php echo $cart_img ;?>" alt="">
                        <div class="">
                            <p><?php echo $row['p_dname'] ;?></p>
                            <small>Price: Rs <?php echo $row['p_price'] ;?></small><br>
                            <a href="./validation/delete_pro.php?id=<?php echo $_SESSION['cart_pid'][$i];?>">Remove</a>
                        </div>
                    </div>
                </td>
                <td>
                    <?php
                    if($_SESSION['cart_vid'][$i]==1){
                        ?>
                    <button class="btn fs-3">-</button>
                        <?php
                    }
                    else{
                        ?>
                    <a href="./validation/cart/decreasecart.php?uid=<?php echo $_SESSION['user_pid'] ;?>&pid=<?php echo $_SESSION['cart_pid'][$i]; ?>"><button class="btn fs-3">-</button></a>
                        <?php
                    }
                    ?>
                    <input type="number" name="test_quan" class="some-class" disabled value="<?php echo $_SESSION['cart_vid'][$i] ;?>" min="1">
                    <a href="./validation/cart/increasecart.php?uid=<?php echo $_SESSION['user_pid'] ;?>&pid=<?php echo $_SESSION['cart_pid'][$i]; ?>"><button class="btn fs-3">+</button></a>
                </td>
                    
                <td>Rs <?php echo $row['p_price']*$_SESSION['cart_vid'][$i] ;?></td>
            </tr>
            <?php
                    $total+=$row['p_price']*$_SESSION['cart_vid'][$i];
                    $delivery=50;
                            }
                        }
                    }
                }
            ?>

        </table>
        <?php
        if($total==0){
            ?>
        <div class="shop container text-center">
            <p>There are no item in this cart</p>
            <a href="./index.php?id=4"><button type="button" class="btn btn-outline-secondary">CONTINUE
                    SHOPPING</button></a>
        </div>
        <?php
        }
        else{
            ?>
        <div class="total-price">
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>Rs <?php echo $total; ?></td>
                </tr>
                <tr>
                    <td>Delivery</td>
                    <td>Rs <?php echo $delivery; ?></td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>Rs <?php echo $total+$delivery; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td><?php if($total>0){
                        ?>
                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            PROCEED TO CHECKOUT
                        </button>

                        <?php
                    }?>
                    </td>
                </tr>
            </table>
        </div>
        <?php
        }
        ?>

    </div>


    <!-- Modal for payment-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Payment Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="./validation/payment.php" method="POST" class="row g-3 needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Shipping Address</label>
                            <input type="text" class="form-control" id="validationCustom01" name="ship_addr"
                                placeholder="Address" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" name="mail"
                                value="<?php echo $_SESSION['user_email_profile'] ;?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="ph_no"
                                value="<?php echo $_SESSION['user_ph_no']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Additional Information</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                name="add_info"><?php echo $_SESSION['ship_addr'] ;?></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="SUBMIT" class="btn btn-primary">Payment</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- --------modal for cart order made item---------------->
    <div class="modal fade" id="exampleModalcart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">My Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="small-container cart-page">
                        <table>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th>Status</th>
                            </tr>
                            <?php
                               if($_SESSION['logSuccess']==true){
                                    $sql="SELECT * FROM u_pro_final WHERE upid=".$_SESSION['user_pid']." ORDER BY uid_pri DESC";
                                    $query=mysqli_query($pro,$sql);
                                    if($query){
                                        $i=0;
                                        if (mysqli_num_rows($query) <= 0) {
                                        }
                                        else{
                                            while($row=mysqli_fetch_assoc($query)){
                                                $sql1="SELECT * FROM product_detail WHERE pid=".$row['p_pid'];
                                                $query1=mysqli_query($pro,$sql1);
                                                $row1=mysqli_fetch_assoc($query1);
                                                $cart_img_item=$row1['P_img1'];
                                                $ordel=$row['uid_pri'];
                                                $i++;
                                                if($i==4){
                                                    break;
                                                }
                                                ?>
                            <tr>
                                <td>
                                    <div class="cart-info">
                                        <img src="./productpic/product1/<?php echo $cart_img_item ;?>">
                                        <div class="">
                                            <p><?php echo $row1['p_dname'] ?></p>
                                            <small>Rs <?php echo $row1['p_price'] ;?></small>
                                            <?php
                                            if($row['u_status']==0){
                                                ?>

                                            <a href="./validation/ordercancel.php?id=<?php echo $row['uid_pri'];?>">Cancel</a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </td>
                                <td><input style="width: 3em" type="number" value="<?php echo $row['p_val'];?>" disabled> </td>
                                <td>Rs <br><?php echo $row1['p_price']*$row['p_val'] ;?></td>
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
                                    
                               }
                               else{
                                //    echo 'lol';
                               }
                            ?>

                        </table>
                        <div class="cen">
                            <a href="./index.php?id=9"><button type="button" class="btn btn-outline-dark mt-4">View all product</button></a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>

    <!-- --------modal script-------------  -->
    <script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function() {
        myInput.focus()
    })
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>


    <!-- --------validate form----------- -->
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
    </script>

</main>