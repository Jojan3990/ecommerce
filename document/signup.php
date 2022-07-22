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
    <link rel="stylesheet" href="../css/signup.css">

    <!-- google-fonts link  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <title>SignUP</title>
</head>

<body>
    <main>
        <div class="contain-back">
            <div class="container">
                <div class="mid-con d-flex justify-content-center">
                    <div class="card-main shadow-lg p-3 mb-5 rounded" style="width: 55rem;">
                        <div class="img-logo d-flex justify-content-center mt-5 mb-3">
                            <img src="../images/logo.jpg" alt="logo.jpg" height='150rem' />
                        </div>
                        <div class="card-body">
                            <p class="card-text fs-6 text-center">
                                Entered Required Credentials
                            </p>
                            <form action="../validation/val-signup.php" enctype="multipart/form-data" method="POST"
                                class="row g-3 needs-validation" novalidate>
                                <div class="flex-name">
                                    <div class="mb-1 user">
                                        <i class="fa-solid fa-user ms-3 mt-3 opacity-50"></i>
                                        <input type="text" class="form-control" placeholder="First Name" value="<?php if(isset($_SESSION['fname'])){ echo $_SESSION['fname']; } else{echo "";} ?>"
                                            name="signupFirstName" id="validationCustom01" required>
                                        <div class="invalid-feedback">
                                            Enter First Name
                                        </div>
                                    </div>
                                    <div class="mb-1 firstName">
                                        <i class="fa-solid fa-user ms-3 mt-3 opacity-50"></i>
                                        <input type="text" class="form-control" placeholder="Last Name" value="<?php if(isset($_SESSION['lname'])){ echo $_SESSION['lname']; } else{echo "";} ?>"
                                            name="signupLastName" id="validationCustom01" required>
                                        <div class="invalid-feedback">
                                            Enter Last Name
                                        </div>
                                    </div>
                                    <div class="mb-1 panNum">
                                        <i class="fa-solid fa-arrow-down-1-9 ms-3 mt-3 opacity-50"></i>
                                        <input type="text" class="form-control" placeholder="Phone No." value="<?php if(isset($_SESSION['ph'])){ echo $_SESSION['ph']; } else{echo "";} ?>"
                                            name="signupPhone" id="validationCustom01" required>
                                        <div class="invalid-feedback">
                                            Enter Phone No.
                                        </div>
                                        <div class="err">
                                            <?php if($_SESSION['log_ph_err']==true) {
                                    unset($_SESSION['log_ph_err']);
                                    ?>
                                            <div class="text-danger">
                                                <p>phone number should be numeric and 10 numbers</p>
                                            </div>
                                            <?php
                                    } ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-1 mail">
                                    <i class="fa-solid fa-at ms-3 mt-3 opacity-50"></i>
                                    <input type="email" class="form-control" placeholder="Email" name="signupEmail" value="<?php if(isset($_SESSION['em'])){ echo $_SESSION['em']; } else{echo "";} ?>"
                                        required>
                                    <div class="invalid-feedback">
                                        Enter valid email
                                    </div>
                                </div>
                                <div class="mb-1 mail">
                                <!-- <i class="fa-solid fa-truck-fast ms-3 mt-3 opacity-50"></i> -->
                                    <textarea class="form-control" name="shipaddr" id="exampleFormControlTextarea1" rows="3" placeholder="shipping address" required></textarea>
                                    <div class="invalid-feedback">
                                        Enter Shipping Address
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <label class="mb-2">Profile Picture</label>
                                    <input type="file" class="form-control" name="pro_image" required>
                                    <div class="err">
                                        <?php if($_SESSION['log_img_err']==true) {
                                    unset($_SESSION['log_ph_err']);
                                    ?>
                                        <div class="text-danger">
                                            <p>problem with uploaded image</p>
                                        </div>
                                        <?php
                                    } ?>
                                    </div>
                                </div>
                                <div class="mb-1 pass">
                                    <i class="fa-solid fa-unlock-keyhole ms-3 mt-3 opacity-50"></i>
                                    <input type="password" class="form-control" placeholder="Password" name="signupPass"
                                        id="validationCustom02" required>
                                    <div class="invalid-feedback">
                                        Enter Password
                                    </div>
                                    <div class="err">
                                        <?php if($_SESSION['log_pass_err']==true) {
                                    unset($_SESSION['log_pass_err']);
                                    ?>
                                        <div class="text-danger">
                                            <p>password length should be greater than 5</p>
                                        </div>
                                        <?php
                                    } ?>
                                    </div>
                                </div>
                                <!-- <div class="form-check ms-2">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                                </div> -->

                                <div class="err_all_show">
                                    <?php if($_SESSION['log_signup_error']==true) {
                                        unset($_SESSION['log_signup_error']);
                                    ?>
                                    <div class="text-danger">
                                        <p>E-mail already used or other error(Database)</p>
                                    </div>
                                    <?php
                                    } 
                                    ?>



                                </div>

                                <div class="">
                                    <button class="btn btn-primary w-100" size='lg' type="submit">Sign Up</button>
                                </div>
                            </form>
                            <div class="btn-fs mt-3 d-flex justify-content-between">
                                <a href="./signin.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/52bb53895c.js" crossorigin="anonymous"></script>


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
</body>

</html>