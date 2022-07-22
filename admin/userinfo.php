<?php
session_start();
require_once './validation/connect.php';

?>
<main>

    <div class="user">
        <p class="mt-4">Dashboard/Customers</p>
        <table class="table table-hover  table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Profile</th>
                    <th scope="col">First</th>
                    <th scope="col">Phone No.</th>
                    <th scope="col">More</th>
                    <th scope="col">Ordered</th>
                </tr>
            </thead>
            <tbody>
                <?php
        $sql="SELECT * FROM valSignUp";
        $query=mysqli_query($log,$sql);
        if($query){
            if (mysqli_num_rows($query) <= 0) {
                $_SESSION['log_signin_error']=true;
                header('location: ../document/signin.php');
            }
            else{
                while($row=mysqli_fetch_assoc($query)){
                    $sql1="SELECT COUNT(upid) FROM u_pro_final WHERE upid=".$row['UserID'];
                    $query1=mysqli_query($pro,$sql1);
                    $row1=mysqli_fetch_assoc($query1);
                    // echo $row1['COUNT(upid)'];
                    ?>
                <tr>
                    <th scope="row"><?php echo ++$i; ?></th>
                    <td><img src="<?php echo "./profilepic/".$row['profilePic'] ;?>" height="40px" class="me-2">
                    <td><?php echo $row['firstName'] ;?></td>
                    <td><?php echo $row['phoneNo'] ;?></td>
                    <td><a href="./admin.php?id=6&pid=<?php echo $row['UserID'] ?>"><button type="button"
                                class="btn btn-outline-dark">Info</button></a></td>
                    <td><input type="number" min="1" value="<?php echo $row1['COUNT(upid)']; ?>" disabled></td>
                </tr>
                <?php
                }
            }
        }
        else{
            echo "something wrong";
        }
    ?>
                <!-- <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr> -->

            </tbody>
        </table>
    </div>
</main>