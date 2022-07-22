<?php
session_start();
// unset($_SESSION['fname']);
// unset($_SESSION['lname']);
// unset($_SESSION['ph']);
// unset($_SESSION['em']);
// $pid=$_GET['pid'];
// if(isset($_SESSION['logSuccess']) && !empty($_SESSION['logSuccess']) && $_SESSION['logSuccess']==true){
//     header('location:../index.php?id=4');
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/signin.css">

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
                    <div class="card-main shadow-lg p-3 mb-5 rounded" style="width: 30rem;">
                        <div class="img-logo d-flex justify-content-center mt-5 mb-3">
                            <img src="../images/logo.jpg" alt="logo.jpg" height='150rem' />
                        </div>
                        <div class="card-body">
                            <p class="card-text fs-6 text-center">
                                Admin Login
                            </p>
                            <form action="./signinval.php" method="POST" class="row g-3 needs-validation"
                                novalidate>
                                <div class="mb-1 mail">
                                    <i class="fa-solid fa-at ms-3 mt-3 opacity-50"></i>
                                    <input type="email" class="form-control" name="signEmail" placeholder="Enter email"
                                        id="validationCustom01" required>
                                    <!-- <div class="valid-feedback">
                                    Please provide valid email
                                </div> -->
                                </div>
                                <div class="mb-1 pass">
                                    <i class="fa-solid fa-unlock-keyhole ms-3 mt-3 opacity-50"></i>
                                    <input type="password" class="form-control" placeholder="Password" name="signPass"
                                        id="validationCustom02" required>
                                    <div class="invalid-feedback">
                                        Enter Password
                                    </div>
                                </div>
                                <div class="form-check ms-2">
                                    <input type="checkbox" class="form-check-input" value='checked' id="exampleCheck1"
                                        name="check">
                                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                                </div>
                                <div class="">
                                    <button class="btn btn-primary w-100" size='lg' type="submit">Sign In</button>
                                </div>
                                <?php if($_SESSION['log_signin_error_admin']==true) {
                                    ?>
                                <div class="text-danger">
                                    <p>credentials didn't match</p>
                                </div>
                                <?php
                                unset($_SESSION['log_signin_error_admin']);
                                } ?>


                            </form>
                            <div class="btn-fs mt-3 d-flex justify-content-between">
                                <a href="">Forget Password</a>
                                <!-- <a href="./signup.php">Create an account!</a> -->
                            </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/52bb53895c.js" crossorigin="anonymous"></script>
    <script>
        
    </script>
</body>

</html>