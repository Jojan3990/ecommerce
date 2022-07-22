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
    <link rel="stylesheet" href="../css/signin.css">
    <link rel="stylesheet" href="../css/signup.css">

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
                            <?php
                                if($_SESSION['logSuccess']==true){
                                    $img_name=$_SESSION['img_name'];
                                    $img='../profilepic/'.$img_name;
                                    ?>
                            <img src="<?php echo $img ;?>" class="cirpro" class="me-3 mt-4" height="200px">
                            <?php
                                }
                            ?>

                        </div>
                        <div class="card-body">
                            <p class="card-text fs-6 text-center">
                                <?php echo $_SESSION['user_name_profile']; ?>
                            </p>

                        </div>
                        <form action="./updateuserval.php" method="POST" class="row g-3 needs-validation" novalidate>
                            <fieldset disabled>
                                <div class="mb-3">
                                    <input type="text" id="disabledTextInput" class="form-control"
                                        placeholder="<?php echo $_SESSION['user_email_profile'] ; ?>">
                                </div>
                            </fieldset>
                            <div class="mb-1 panNum">
                                <i class="fa-solid fa-key ms-3 mt-3 opacity-50"></i>
                                <input type="password" class="form-control" placeholder="Current Password"
                                    name="currpass" id="validationCustom01" required>
                                <div class="invalid-feedback">
                                    Current Password
                                </div>
                            </div>
                            <div class="mb-1 panNum">
                                <i class="fa-solid fa-key ms-3 mt-3 opacity-50"></i>
                                <input type="password" class="form-control" placeholder="New Password" name="newpass"
                                    id="validationCustom01" required>
                                <div class="invalid-feedback">
                                    New Password
                                </div>
                                <div class="err mt-4">
                                    <?php if($_SESSION['log_pass_err']==true) {
                                    unset($_SESSION['log_pass_err']);
                                    ?>
                                    <div class="text-danger">
                                        <p>password length should be greater than 5</p>
                                    </div>
                                    <?php
                                    } ?>
                                </div>
                                <div class="err mt-4">
                                    <?php if($_SESSION['log_pass_err_curr']==true) {
                                    unset($_SESSION['log_pass_err_curr']);
                                    ?>
                                    <div class="text-danger">
                                        <p>Current Password Incorrect</p>
                                    </div>
                                    <?php
                                    } ?>
                                </div>
                            </div>
                            <div class="">
                                <button class="btn btn-primary w-100" size='lg' type="submit">Update Data</button>
                            </div>
                        </form>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="./logout.php">return back!</a>
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
</body>

</html>