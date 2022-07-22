<?php
session_start();
require_once('./validation/connect.php');
$pid=$_GET['pid'];
$sql="select * from product_detail where pid= ".$pid;
$query=mysqli_query($pro,$sql);
$row = mysqli_fetch_assoc($query);
?>

<main>
    <!-- ------------single product-details------------------>
    <div class="bt">
        <a href="./admin.php?id=4"><button type="button" class="btn btn-outline-dark">Go Back</button></a>
    </div>
    <div class="ed-fm container">
        <div class="small-container single-product">
            <div class="row">
                <div class="col-two">
                    <img src="./productpic/product1/<?php echo $row['P_img1'];?>" width="100%" id="ProductImg">
                    <div class="small-img-row">
                        <div class="small-img-col">
                            <img src="./productpic/productall/<?php echo $row['P_img1'];?>" width="100%"
                                class="small-img">
                        </div>
                        <div class="small-img-col">
                            <img src="./productpic/productall/<?php echo $row['p_img2'];?>" width="100%"
                                class="small-img">
                        </div>
                        <div class="small-img-col">
                            <img src="./productpic/productall/<?php echo $row['p_img3'];?>" width="100%"
                                class="small-img">
                        </div>
                        <div class="small-img-col">
                            <img src="./productpic/productall/<?php echo $row['p_img4'];?>" width="100%"
                                class="small-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fm-ed">
            <form action="./admin/proeditval.php?id=<?php echo $pid ;?>" method="POST" class="row g-3 needs-validation" novalidate>
                <div class="">
                    <label for="validationCustom01" class="form-label">Product Name</label>
                    <input type="text" name="p_name" class="form-control" id="validationCustom01"
                        value="<?php echo $row['p_name'] ;?>" required>
                </div>
                <div class="">
                    <label for="validationCustom01" class="form-label">Descriptive Name</label>
                    <input type="text" name="p_dname" class="form-control" id="validationCustom01"
                        value="<?php echo $row['p_dname'] ;?>" required>
                </div>
                <div class="">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Product Details</label>
                        <textarea name="detail" class="form-control" id="exampleFormControlTextarea1" rows="3" required><?php echo $row['p_detail'] ;?></textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Product Price</label>
                    <input type="text" name="price" class="form-control" id="validationCustom01" value="<?php echo $row['p_price'] ;?>" required>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Stock</label>
                    <input type="number" name="stock" class="form-control" id="validationCustom01" value="<?php echo $row['p_stock'] ;?>" min=<?php echo $row['p_stock'] ; ?> required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    <div class="container bt">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Update!!</h4>
            <p>In future you can update data in database table. To use advance feature contact our company.
                due to unproper use of database we have restricted this function but we can can supply you.
            </p>
            <hr>
            <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
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

    <!-- ------------js for toggle menu----------------->
    <script>
    var MenuItems = document.getElementById("MenuItems");
    MenuItems.style.maxHeight = "0px";

    function menutoggle() {
        if (MenuItems.style.maxHeight == "0px") {
            MenuItems.style.maxHeight = "200px";
        } else {
            MenuItems.style.maxHeight = "0px";
        }
    }
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

    <!-- --------validation form------------  -->
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/52bb53895c.js" crossorigin="anonymous"></script>
</main>