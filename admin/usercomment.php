<?php 
session_start();
require_once './validation/connect.php';
?>
<main>
    <div class="">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User</th>
                    <th scope="col">Product</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
            $sql="SELECT * FROM u_comment";
            $query=mysqli_query($pro,$sql);
            while($row=mysqli_fetch_assoc($query)){
                $sql2="SELECT * FROM product_detail WHERE pid=".$row['uid'];
                $query2=mysqli_query($pro,$sql2);
                $row2=mysqli_fetch_assoc($query2);
                ?>
                <tr>
                    <th scope="row"><?php echo ++$i ;?></th>
                    <td><a href="./admin.php?id=6&pid=<?php echo $row['userID'] ;?>"><?php echo $row['U_name'] ;?></a>
                    </td>
                    <td><a href="./admin.php?id=8&pid=<?php echo $row2['pid'] ;?>"><?php echo $row2['p_dname']; ?></a>
                    </td>
                    <td>
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        User Comment
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <?php echo $row['u_message'] ;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <?php 
                        if($row['udelete']==0){
                            ?>
                        <a href="./admin/deletecomment.php?id=<?php echo $row['id'] ;?>"><button type="button"
                                class="btn btn-danger">Remove</button></a>
                        <?php
                        }
                        else{
                            ?>
                        <a href="./admin/restorecomment.php?id=<?php echo $row['id'] ;?>"><button type="button"
                                class="btn btn-success">Restore</button></a>
                        <?php
                        }
                        ?>
                    </td>
                </tr>
                <?php
            }
                ?>
            </tbody>
        </table>
    </div>
</main>