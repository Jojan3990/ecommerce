<?php
session_start();
require_once './validation/connect.php';
?>
<main>
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
            if($_SESSION['logSuccess']==true){
                $sql="SELECT * FROM u_pro_final WHERE upid=".$_SESSION['user_pid']." ORDER BY uid_pri DESC";
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
                        <a href="<?php echo "./index.php?id=5&pid=".$row['p_pid'];?>"><img src="./productpic/product1/<?php echo $cart_img_item ;?>"></a>
                        <div class="">
                            <p><?php echo $row1['p_dname'] ;?></p>
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
                                    
            }
            else{
                // echo 'log error';
                }
            ?>

        </table>
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
</main>