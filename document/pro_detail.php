<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/pro_detail.css">

    <!-- google-fonts link  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <title>SignIn</title>
</head>

<body>
    <main>
        <div class="contain-back">
            <div class="container">
                <div class="mid-con">
                    <div class="card-main shadow-lg p-3 mb-5 rounded" style="width: 45rem;">
                        <!-- <div class="img-logo d-flex justify-content-center mt-5 mb-3">
                            <img src="./images/logo.jpg" alt="logo.jpg" height='150rem' />
                        </div> -->
                        <div class="card-body">
                            <p class="card-text fs-6 text-center">
                                Add your Products
                            </p>
                            <form action="./validation/val-product.php" enctype="multipart/form-data" method="POST"
                                class="row g-3 needs-validation" novalidate>
                                <div class="pr-sec">
                                    <div class="mb-1">
                                        <i class="fa-solid fa-dolly mt-3 ms-3 opacity-50"></i>
                                        <input type="text" class="form-control" name="pr_name"
                                            placeholder="Product Name" id="validationCustom01" required>
                                    </div>
                                    <div class="mb-1">
                                        <i class="fa-solid fa-dolly mt-3 ms-3 opacity-50"></i>
                                        <input type="text" class="form-control" name="pr_dname"
                                            placeholder="Product Detail Name" id="validationCustom01" required>
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <textarea name="pr_area" cols="30" rows="5" class="form-control"
                                        placeholder="Product Details" required></textarea>
                                </div>
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                                aria-expanded="false" aria-controls="flush-collapseOne">
                                                Product Specifications
                                            </button>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <div class="pr-sec">
                                                    <div class="mb-1">
                                                        <input type="text" class="form-control" name="pr_material"
                                                            placeholder="Material" id="validationCustom01" required>
                                                    </div>
                                                    <div class="mb-1">
                                                        <input type="text" class="form-control" name="pr_usuage"
                                                            placeholder="Usuage" id="validationCustom01" required>
                                                    </div>
                                                </div>
                                                <div class="pr-sec">
                                                    <div class="mb-1">
                                                        <input type="text" class="form-control" name="pr_apper"
                                                            placeholder="Apperance" id="validationCustom01" required>
                                                    </div>
                                                    <div class="mb-1">
                                                        <input type="text" class="form-control" name="pr_capa"
                                                            placeholder="Capacity" id="validationCustom01" required>
                                                    </div>
                                                </div>
                                                <div class="pr-sec">
                                                    <div class="mb-1">
                                                        <input type="text" class="form-control" name="pr_length"
                                                            placeholder="Length" id="validationCustom01" required>
                                                    </div>
                                                    <div class="mb-1">
                                                        <input type="text" class="form-control" name="pr_width"
                                                            placeholder="width" id="validationCustom01" required>
                                                    </div>
                                                </div>
                                                <label for="formFile" class="form-label mt-3 mb-3">Category</label>
                                                <select class="form-select" aria-label="Default select example" name="category" required>
                                                    <!-- <option selected>Category</option> -->
                                                    <option value="Chair">Chair</option>
                                                    <option value="Bench">Bench</option>
                                                    <option value="Wardrobe">Wardrobe</option>
                                                    <option value="Rack">Rack</option>
                                                    <option value="Swing">Swing</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pr-sec">
                                    <div class="mb-1">
                                        <i class="fa-solid fa-dolly mt-3 ms-3 opacity-50"></i>
                                        <input type="text" class="form-control" name="pr_price" placeholder="price"
                                            id="validationCustom01" required>
                                    </div>
                                    <div class="mb-1">
                                        <i class="fa-solid fa-dolly mt-3 ms-3 opacity-50"></i>
                                        <input type="text" class="form-control" name="pr_stock" placeholder="Stock"
                                            id="validationCustom01" required>
                                    </div>
                                    <?php 
                                        if($_SESSION['pro_add_err_num']==true){
                                            ?>
                                            <p class="text-danger mt-4">Enter numeric value on price and stock</p>
                                            <?php
                                            unset($_SESSION['pro_add_err_num']);
                                        }
                                    ?>

                                </div>
                                <div class="f-sec">
                                    <div class="">
                                        <label for="formFile" class="form-label">Enter IMG1</label>
                                        <input class="form-control" type="file" id="formFile" name="pr_img1" required>
                                    </div>
                                    <div class="">
                                        <label for="formFile" class="form-label">Enter IMG2</label>
                                        <input class="form-control" type="file" id="formFile" name="pr_img2" required>
                                    </div>
                                </div>
                                <div class="f-sec">
                                    <div class="">
                                        <label for="formFile" class="form-label">Enter IMG3</label>
                                        <input class="form-control" type="file" id="formFile" name="pr_img3" required>
                                    </div>
                                    <div class="">
                                        <label for="formFile" class="form-label">Enter IMG4</label>
                                        <input class="form-control" type="file" id="formFile" name="pr_img4" required>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <button class="btn btn-primary w-100" size='lg' type="submit">Enter Product</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script> -->
    <script src="https://kit.fontawesome.com/52bb53895c.js" crossorigin="anonymous"></script>
</body>

</html>