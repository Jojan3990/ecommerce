<?php
require_once './validation/connect.php';
?>
<main>

    <div class="product-all">
        <table class="table  table-striped table-hover ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col"><i class="fa-solid fa-camera-retro"></i></th>
                    <th scope="col">Name</th>
                    <th scope="col">More</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql="SELECT * FROM product_detail WHERE p_delete=0";
                $query=mysqli_query($pro,$sql);
                if($query){
                    while($row=mysqli_fetch_assoc($query)){
                        $_SESSION['pid_for_removeproduct']=$row['pid'];
                        ?>
                <tr>
                    <th scope="row"><?php echo ++$i ;?></th>
                    <td><img src="<?php echo "./productpic/product1/".$row['P_img1'] ;?>" height="55px"></th>
                    <td><?php echo $row['p_dname'] ;?></td>
                    <td>
                        <a href="./admin.php?id=8&pid=<?php echo $row['pid'] ;?>"><button type="button" class="btn btn-outline-dark">More</button></a>
                    </td>
                    <td>
                        <a href="./admin.php?id=9&pid=<?php echo $row['pid'] ;?>"><button type="button" class="btn btn-outline-dark">Edit</button></a>
                    </td>
                    <td><a href="./admin/removeahref.php?id=<?php echo $row['pid'] ;?>">Delete</a></td>
                    <td><?php if($row['p_stock']<1){
                        ?>
                        <div class="alert alert-danger" role="alert">
                            out
                        </div>
                        <?php
                    } 
                    else{
                        ?>
                            <div class="alert alert-success" role="alert">
                            <?php echo $row['p_stock'] ;?>
                        </div>
                        <?php
                    }
                    ?></td>
                </tr>
                <?php
                    }
                }
                else{
                    echo 'something wrong';
                }
        ?>
            </tbody>
        </table>



    
    </div>
    
    <div class="add-pro">
        <a href="./admin.php?id=5"><button type="button" class="btn btn-primary">Add Product</button></a>
    </div>
    <script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function() {
        myInput.focus()
    })
    </script>
</main>