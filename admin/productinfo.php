<?php
session_start();
require_once './validation/connect.php';


?>
<div class="container-fluid">
        <b>Order Placement</b>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Order No.</th>
                    <th scope="col">Info</th>
                    <th scope="col">UserID</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql="SELECT * FROM u_pro_final ORDER BY uid_pri DESC";
                $query=mysqli_query($pro,$sql);
                if($query){
                    while($row=mysqli_fetch_assoc($query)){
                        $sql1="SELECT * FROM product_detail where pid=".$row['p_pid'];
                        $query1=mysqli_query($pro,$sql1);
                        $row1=mysqli_fetch_assoc($query1)

                    ?>
                <tr>
                    <th scope="row"><?php echo ++$i ;?></th>
                    <td><?php echo $row['uid_pri'] ;?></td>
                    <td><a href="./admin.php?id=7&pid=<?php echo $row['p_pid'] ;?>&uid=<?php echo $row['upid'] ;?>&uid_pri=<?php echo $row['uid_pri'] ;?>"><button type="button" class="btn btn-outline-dark">More..</button></a></td>
                    <td><?php echo $row['upid'] ;?></td>
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
                else{
                    echo "something wrong";
                }
                ?>
            </tbody>
        </table>
    </div>