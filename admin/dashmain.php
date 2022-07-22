<?php
session_start();
require_once './validation/connect.php';

//for items sold
$sql="SELECT COUNT(u_status) FROM u_pro_final WHERE u_status=3;";
$query=mysqli_query($pro,$sql);
if($query){
    $rowsales=mysqli_fetch_assoc($query);
}
else{
    echo "database error";
}

// for income 
$sql="SELECT * FROM u_pro_final WHERE u_status=3";
$query=mysqli_query($pro,$sql);
if($query){
    while($rowincome=mysqli_fetch_assoc($query)){
        $sqlpro="SELECT * FROM product_detail WHERE pid=".$rowincome['p_pid'];
        $querypro=mysqli_query($pro,$sqlpro);
        $rowpro=mysqli_fetch_assoc($querypro);
        $total+=$rowincome['p_val']*$rowpro['p_price'];
        // echo $total;
    }
}
else{
    echo "database error";
}

// require_once 'dashmain.css';
?>
<main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    
    <div class="container-fluid px-4">
        <div class="row g-3 my-2">
            <div class="col-md-4">
                <div class="p-3 bg-white shadow-lg d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2"><?php echo $total ;?></h3>
                        <p class="fs-5">Income</p>
                    </div>
                    <i class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 bg-white shadow-lg d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2"><?php echo $rowsales['COUNT(u_status)'] ;?></h3>
                        <p class="fs-5">Items Sold</p>
                    </div>
                    <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 bg-white shadow-lg d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2">%25</h3>
                        <p class="fs-5">Profit</p>
                    </div>
                    <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </div>
        </div>
    </div><br>
    <canvas id="myChart" style="width:100%;max-width:1080px"></canvas><br>
    <div class="container-fluid">
        <b>Order Placement</b>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">User</th>
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
                    <td><img src="<?php echo "./productpic/product1/".$row1['P_img1']; ?>" height="55px"></td>
                    <td><?php echo $row['p_val'] ;?></td>
                    <td><?php echo $row['u_name'] ;?></td>
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
</main>

<!-- ---------canvas data show------------->
<script>
    <?php
    $sql="SELECT count(u_status) AS zero FROM u_pro_final WHERE u_status=0";
    $sql1="SELECT count(u_status) AS one FROM u_pro_final WHERE u_status=1";
    $sql2="SELECT count(u_status) AS two FROM u_pro_final WHERE u_status=2";
    $sql3="SELECT count(u_status) AS three FROM u_pro_final WHERE u_status=3";
    $qu=mysqli_query($pro,$sql);
    $qu1=mysqli_query($pro,$sql1);
    $qu2=mysqli_query($pro,$sql2);
    $qu3=mysqli_query($pro,$sql3);
    $ro=mysqli_fetch_assoc($qu);
    $ro1=mysqli_fetch_assoc($qu1);
    $ro2=mysqli_fetch_assoc($qu2);
    $ro3=mysqli_fetch_assoc($qu3);
    
    ?>
    var xValues = ["Pending", "Cancelled", "Cancelling", "Delivered"];
    var yValues = [<?php echo $ro['zero']; ?>,<?php echo $ro1['one']; ?> , <?php echo $ro2['two']; ?>, <?php echo $ro3['three']; ?>];
    var barColors = ["blue", "red", "yellow", "green"];

    new Chart("myChart", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "Product sales Data"
            }
        }
    });
</script>
