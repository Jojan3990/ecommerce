<?php
require_once './validation/connect.php';
?>
<main>

    <div class="paddingtop"></div>
    <section class="site-title-main">
        <div class="site-background-forMain">
            <h1 class="top-con">Free Phoenix ,</h1>
            <h3>Powered by creaters everywhere</h3>
            <a href="index.php?id=1"><button class="btn">Explore</button></a>
        </div>
    </section><br><br><br><br>

    <div class="container_isset">
        <?php
                if(isset( $_SESSION['logSuccess']) && $_SESSION['user_email_profile']=='raijozan2443@gmail.com'){
            ?>
        <div class="user_info">
            <div class="top">
                <p class="paragra">Upload your Image</p>
            </div>
            <div class="form">
                <form action="./validation/insert.php" method="POST" enctype="multipart/form-data">
                    Image :&nbsp;&nbsp; <input type="file" class="pic_me" name="pic_post"><br><br>
                    Message : <input class="message_file" type="text" name="message"
                        placeholder="Enter your message"><br><br>
                    <input class="submit" type="submit">
                </form>
            </div>
        </div>
        <?php
                }
            ?>
        <div class="display">
            <?php
                if(isset($_SESSION['success_upload'])){
                    echo "We will upload, verify and email you";
                    unset($_SESSION['success_upload']);
                }
                if(isset($_SESSION['error_upload'])){
                    echo "there was problem in uploading Image . Try again or contact us on facebook or by mail";
                    unset($_SESSION['error_upload']);
                }
                ?>
        </div>
    </div>

    <div class="container_img">
        <?php 
                    $sql="SELECT * FROM upload_user";
                    $query=mysqli_query($ins,$sql);
                    if($query){
                        if(mysqli_num_rows($query)<=0){
                            echo "No Data in table";
                        }
                        else{
                            while($row=mysqli_fetch_assoc($query)){
                                $pic=$row['user_pic'];
                                $pic_path='./productpic/imgupload/'.$pic;
                                ?>


        <div class="image">
            <!-- <button data-bs-toggle="modal" data-bs-target="#exampleModal"> -->
                <h1>
                    <div class="picAll"><img src="./images/logo.jpg" ?> alt="profile_pic"></div>
                    <div class="follow">Awesome</div>
                    <div class="name"><?php echo $name_person ; ?></div>
                </h1>
            <!-- </button> -->
            <img src=<?php echo $pic_path ; ?> alt="Image">
        </div>
        <?php
                            }
                        }
                    }
                    else{
                        echo "error contact to administrator";
                    }
                ?>

        <!-- ----modal show-----------  -->
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src=<?php echo $pic_path ; ?> alt="Image">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="image">
            <a href="https://www.facebook.com/amogha.101" target="_blank">
                <h1>
                    <div class="picAmogha"></div>
                    <div class="follow">For Download Ask Here</div> Amogha Raut
                </h1>
            </a>
            <img src="./assets/Images/Amogha/3.jpg" alt="Image">
        </div>
        <div class="image">
            <a href="https://www.instagram.com/sandesh_sp12/?hl=en&fbclid=IwAR3xIZ1R42cp7WsV04mAdrcB21HigYpRV6sEevZXcPnnShpwExUiaAZOQZA"
                target="_blank">
                <h1>
                    <div class="picSandesh"></div>
                    <div class="follow">For Download Ask Here</div> Sandesh Pandey
                </h1>
            </a>
            <img src="./assets/Images/1.jpg" alt="Image1">
        </div>
        <div class="image">
            <a href="https://www.facebook.com/amogha.101" target="_blank">
                <h1>
                    <div class="picAmogha"></div>
                    <div class="follow">For Download Ask Here</div> Amogha Raut
                </h1>
            </a>
            <img src="./assets/Images/Amogha/1.jpg" alt="Image">
        </div>
        <div class="image">
            <a href="https://www.instagram.com/sagar.d.rai/tagged/?fbclid=IwAR0JJRYICwqRf5I_lrjqYVUd4AAC1DGZjtePEJ114tCSxRs2NmmPbQoyw5I"
                target="_blank">
                <h1>
                    <div class="picSagar"></div>
                    <div class="follow">For Download Ask Here</div> Sagar Rai
                </h1>
            </a>
            <img src="./assets/Images/Sagar/1.jpg" alt="Image">
        </div>
        <div class="image">
            <a href="https://www.instagram.com/sandesh_sp12/?hl=en&fbclid=IwAR3xIZ1R42cp7WsV04mAdrcB21HigYpRV6sEevZXcPnnShpwExUiaAZOQZA"
                target="_blank">
                <h1>
                    <div class="picSandesh"></div>
                    <div class="follow">For Download Ask Here</div> Sandesh Pandey
                </h1>
            </a>
            <img src="./assets/Images/Sandesh/1.jpg" alt="Image1">
        </div>
        <div class="image">
            <a href="https://www.instagram.com/sandesh_sp12/?hl=en&fbclid=IwAR3xIZ1R42cp7WsV04mAdrcB21HigYpRV6sEevZXcPnnShpwExUiaAZOQZA"
                target="_blank">
                <h1>
                    <div class="picSandesh"></div>
                    <div class="follow">For Download Ask Here</div> Sandesh Pandey
                </h1>
            </a>
            <img src="./assets/Images/Sandesh/2.jpg" alt="Image1">
        </div>
        <div class="image">
            <a href="https://www.instagram.com/sandesh_sp12/?hl=en&fbclid=IwAR3xIZ1R42cp7WsV04mAdrcB21HigYpRV6sEevZXcPnnShpwExUiaAZOQZA"
                target="_blank">
                <h1>
                    <div class="picSandesh"></div>
                    <div class="follow">For Download Ask Here</div> Sandesh Pandey
                </h1>
            </a>
            <img src="./assets/Images/Sandesh/3.jpg" alt="Image1">
        </div>
        <div class="image">
            <a href="https://www.instagram.com/sandesh_sp12/?hl=en&fbclid=IwAR3xIZ1R42cp7WsV04mAdrcB21HigYpRV6sEevZXcPnnShpwExUiaAZOQZA"
                target="_blank">
                <h1>
                    <div class="picSandesh"></div>
                    <div class="follow">For Download Ask Here</div> Sandesh Pandey
                </h1>
            </a>
            <img src="./assets/Images/Sandesh/4.jpg" alt="Image1">
        </div>
        <div class="image">
            <a href="https://www.instagram.com/sagar.d.rai/tagged/?fbclid=IwAR0JJRYICwqRf5I_lrjqYVUd4AAC1DGZjtePEJ114tCSxRs2NmmPbQoyw5I"
                target="_blank">
                <h1>
                    <div class="picSagar"></div>
                    <div class="follow">For Download Ask Here</div> Sagar Rai
                </h1>
            </a>
            <img src="./assets/Images/Sagar/2.jpg" alt="Image">
        </div>
        <div class="image">
            <a href="https://www.instagram.com/sagar.d.rai/tagged/?fbclid=IwAR0JJRYICwqRf5I_lrjqYVUd4AAC1DGZjtePEJ114tCSxRs2NmmPbQoyw5I"
                target="_blank">
                <h1>
                    <div class="picSagar"></div>
                    <div class="follow">For Download Ask Here</div> Sagar Rai
                </h1>
            </a>
            <img src="./assets/Images/Sagar/3.jpg" alt="Image">
        </div>
        <div class="image">
            <a href="https://www.facebook.com/amogha.101" target="_blank">
                <h1>
                    <div class="picAmogha"></div>
                    <div class="follow">For Download Ask Here</div> Amogha Raut
                </h1>
            </a>
            <img src="./assets/Images/Amogha/2.jpg" alt="Image">
        </div>
        <div class="image">
            <a href="https://www.instagram.com/sandesh_sp12/?hl=en&fbclid=IwAR3xIZ1R42cp7WsV04mAdrcB21HigYpRV6sEevZXcPnnShpwExUiaAZOQZA"
                target="_blank">
                <h1>
                    <div class="picSandesh"></div>
                    <div class="follow">For Download Ask Here</div> Sandesh Pandey
                </h1>
            </a>
            <img src="./assets/Images/Sandesh/5.jpg" alt="Image1">
        </div>
        <div class="image">
            <a href="https://www.instagram.com/sagar.d.rai/tagged/?fbclid=IwAR0JJRYICwqRf5I_lrjqYVUd4AAC1DGZjtePEJ114tCSxRs2NmmPbQoyw5I"
                target="_blank">
                <h1>
                    <div class="picSagar"></div>
                    <div class="follow">For Download Ask Here</div> Sagar Rai
                </h1>
            </a>
            <img src="./assets/Images/Sagar/4.jpg" alt="Image">
        </div>
        <div class="image">
            <a href="https://www.instagram.com/sandesh_sp12/?hl=en&fbclid=IwAR3xIZ1R42cp7WsV04mAdrcB21HigYpRV6sEevZXcPnnShpwExUiaAZOQZA"
                target="_blank">
                <h1>
                    <div class="picSandesh"></div>
                    <div class="follow">For Download Ask Here</div> Sandesh Pandey
                </h1>
            </a>
            <img src="./assets/Images/Sandesh/6.jpg" alt="Image1">
        </div>
        <div class="image">
            <a href="https://www.instagram.com/sandesh_sp12/?hl=en&fbclid=IwAR3xIZ1R42cp7WsV04mAdrcB21HigYpRV6sEevZXcPnnShpwExUiaAZOQZA"
                target="_blank">
                <h1>
                    <div class="picSandesh"></div>
                    <div class="follow">For Download Ask Here</div> Sandesh Pandey
                </h1>
            </a>
            <img src="./assets/Images/Sandesh/7.jpg" alt="Image1">
        </div>
        <div class="image">
            <a href="https://www.instagram.com/sagar.d.rai/tagged/?fbclid=IwAR0JJRYICwqRf5I_lrjqYVUd4AAC1DGZjtePEJ114tCSxRs2NmmPbQoyw5I"
                target="_blank">
                <h1>
                    <div class="picSagar"></div>
                    <div class="follow">For Download Ask Here</div> Sagar Rai
                </h1>
            </a>
            <img src="./assets/Images/Sagar/5.jpg" alt="Image">
        </div>
        <div class="image">
            <a href="https://www.instagram.com/sandesh_sp12/?hl=en&fbclid=IwAR3xIZ1R42cp7WsV04mAdrcB21HigYpRV6sEevZXcPnnShpwExUiaAZOQZA"
                target="_blank">
                <h1>
                    <div class="picSandesh"></div>
                    <div class="follow">For Download Ask Here</div> Sandesh Pandey
                </h1>
            </a>
            <img src="./assets/Images/Sandesh/8.jpg" alt="Image1">
        </div>
        <div class="image">
            <a href="https://www.instagram.com/sandesh_sp12/?hl=en&fbclid=IwAR3xIZ1R42cp7WsV04mAdrcB21HigYpRV6sEevZXcPnnShpwExUiaAZOQZA"
                target="_blank">
                <h1>
                    <div class="picSandesh"></div>
                    <div class="follow">For Download Ask Here</div> Sandesh Pandey
                </h1>
            </a>
            <img src="./assets/Images/Sandesh/9.jpg" alt="Image1">
        </div>
        <div class="image">
            <a href="https://www.instagram.com/sandesh_sp12/?hl=en&fbclid=IwAR3xIZ1R42cp7WsV04mAdrcB21HigYpRV6sEevZXcPnnShpwExUiaAZOQZA"
                target="_blank">
                <h1>
                    <div class="picSandesh"></div>
                    <div class="follow">For Download Ask Here</div> Sandesh Pandey
                </h1>
            </a>
            <img src="./assets/Images/Sandesh/10.jpg" alt="Image1">
        </div>
        <div class="image">
            <a href="https://www.instagram.com/sagar.d.rai/tagged/?fbclid=IwAR0JJRYICwqRf5I_lrjqYVUd4AAC1DGZjtePEJ114tCSxRs2NmmPbQoyw5I"
                target="_blank">
                <h1>
                    <div class="picSagar"></div>
                    <div class="follow">For Download Ask Here</div> Sagar Rai
                </h1>
            </a>
            <img src="./assets/Images/Sagar/6.jpg" alt="Image">
        </div>
        <div class="image">
            <a href="https://www.instagram.com/sandesh_sp12/?hl=en&fbclid=IwAR3xIZ1R42cp7WsV04mAdrcB21HigYpRV6sEevZXcPnnShpwExUiaAZOQZA"
                target="_blank">
                <h1>
                    <div class="picSandesh"></div>
                    <div class="follow">For Download Ask Here</div> Sandesh Pandey
                </h1>
            </a>
            <img src="./assets/Images/Sandesh/11.jpg" alt="Image1">
        </div>
        <div class="image">
            <a href="https://www.instagram.com/sandesh_sp12/?hl=en&fbclid=IwAR3xIZ1R42cp7WsV04mAdrcB21HigYpRV6sEevZXcPnnShpwExUiaAZOQZA"
                target="_blank">
                <h1>
                    <div class="picSandesh"></div>
                    <div class="follow">For Download Ask Here</div> Sandesh Pandey
                </h1>
            </a>
            <img src="./assets/Images/Sandesh/12.jpg" alt="Image1">
        </div>
        <div class="image">
            <a href="https://www.instagram.com/sandesh_sp12/?hl=en&fbclid=IwAR3xIZ1R42cp7WsV04mAdrcB21HigYpRV6sEevZXcPnnShpwExUiaAZOQZA"
                target="_blank">
                <h1>
                    <div class="picSandesh"></div>
                    <div class="follow">For Download Ask Here</div> Sandesh Pandey
                </h1>
            </a>
            <img src="./assets/Images/Sandesh/20.jpg" alt="Image1">
        </div>
        <div class="image">
            <a href="https://www.instagram.com/sagar.d.rai/tagged/?fbclid=IwAR0JJRYICwqRf5I_lrjqYVUd4AAC1DGZjtePEJ114tCSxRs2NmmPbQoyw5I"
                target="_blank">
                <h1>
                    <div class="picSagar"></div>
                    <div class="follow">For Download Ask Here</div> Sagar Rai
                </h1>
            </a>
            <img src="./assets/Images/Sagar/7.jpg" alt="Image">
        </div>
        <div class="image">
            <a href="https://www.instagram.com/sandesh_sp12/?hl=en&fbclid=IwAR3xIZ1R42cp7WsV04mAdrcB21HigYpRV6sEevZXcPnnShpwExUiaAZOQZA"
                target="_blank">
                <h1>
                    <div class="picSandesh"></div>
                    <div class="follow">For Download Ask Here</div> Sandesh Pandey
                </h1>
            </a>
            <img src="./assets/Images/Sandesh/14.jpg" alt="Image1">
        </div>
        <div class="image">
            <a href="https://www.instagram.com/sagar.d.rai/tagged/?fbclid=IwAR0JJRYICwqRf5I_lrjqYVUd4AAC1DGZjtePEJ114tCSxRs2NmmPbQoyw5I"
                target="_blank">
                <h1>
                    <div class="picSagar"></div>
                    <div class="follow">For Download Ask Here</div> Sagar Rai
                </h1>
            </a>
            <img src="./assets/Images/Sagar/8.jpg" alt="Image">
        </div>
        <div class="image">
            <a href="https://www.instagram.com/sandesh_sp12/?hl=en&fbclid=IwAR3xIZ1R42cp7WsV04mAdrcB21HigYpRV6sEevZXcPnnShpwExUiaAZOQZA"
                target="_blank">
                <h1>
                    <div class="picSandesh"></div>
                    <div class="follow">For Download Ask Here</div> Sandesh Pandey
                </h1>
            </a>
            <img src="./assets/Images/Sandesh/15.jpg" alt="Image1">
        </div>
        <div class="image">
            <a href="https://www.instagram.com/sagar.d.rai/tagged/?fbclid=IwAR0JJRYICwqRf5I_lrjqYVUd4AAC1DGZjtePEJ114tCSxRs2NmmPbQoyw5I"
                target="_blank">
                <h1>
                    <div class="picSagar"></div>
                    <div class="follow">For Download Ask Here</div> Sagar Rai
                </h1>
            </a>
            <img src="./assets/Images/Sagar/9.jpg" alt="Image">
        </div>
        <div class="image">
            <a href="https://www.instagram.com/sandesh_sp12/?hl=en&fbclid=IwAR3xIZ1R42cp7WsV04mAdrcB21HigYpRV6sEevZXcPnnShpwExUiaAZOQZA"
                target="_blank">
                <h1>
                    <div class="picSandesh"></div>
                    <div class="follow">For Download Ask Here</div> Sandesh Pandey
                </h1>
            </a>
            <img src="./assets/Images/Sandesh/18.jpg" alt="Image1">
        </div>
        <div class="image">
            <a href="https://www.instagram.com/sagar.d.rai/tagged/?fbclid=IwAR0JJRYICwqRf5I_lrjqYVUd4AAC1DGZjtePEJ114tCSxRs2NmmPbQoyw5I"
                target="_blank">
                <h1>
                    <div class="picSagar"></div>
                    <div class="follow">For Download Ask Here</div> Sagar Rai
                </h1>
            </a>
            <img src="./assets/Images/Sagar/10.jpg" alt="Image">
        </div>
        <div class="image">
            <a href="https://www.instagram.com/sandesh_sp12/?hl=en&fbclid=IwAR3xIZ1R42cp7WsV04mAdrcB21HigYpRV6sEevZXcPnnShpwExUiaAZOQZA"
                target="_blank">
                <h1>
                    <div class="picSandesh"></div>
                    <div class="follow">For Download Ask Here</div> Sandesh Pandey
                </h1>
            </a>
            <img src="./assets/Images/Sandesh/17.jpg" alt="Image1">
        </div>
        <div class="image">
            <a href="https://www.instagram.com/sandesh_sp12/?hl=en&fbclid=IwAR3xIZ1R42cp7WsV04mAdrcB21HigYpRV6sEevZXcPnnShpwExUiaAZOQZA"
                target="_blank">
                <h1>
                    <div class="picSandesh"></div>
                    <div class="follow">For Download Ask Here</div> Sandesh Pandey
                </h1>
            </a>
            <img src="./assets/Images/Sandesh/16.jpg" alt="Image1">
        </div>
        <div class="image">
            <a href="https://www.instagram.com/sagar.d.rai/tagged/?fbclid=IwAR0JJRYICwqRf5I_lrjqYVUd4AAC1DGZjtePEJ114tCSxRs2NmmPbQoyw5I"
                target="_blank">
                <h1>
                    <div class="picSagar"></div>
                    <div class="follow">For Download Ask Here</div> Sagar Rai
                </h1>
            </a>
            <img src="./assets/Images/Sagar/12.jpeg" alt="Image">
        </div>
        <div class="image">
            <a href="https://www.instagram.com/sandesh_sp12/?hl=en&fbclid=IwAR3xIZ1R42cp7WsV04mAdrcB21HigYpRV6sEevZXcPnnShpwExUiaAZOQZA"
                target="_blank">
                <h1>
                    <div class="picSandesh"></div>
                    <div class="follow">For Download Ask Here</div> Sandesh Pandey
                </h1>
            </a>
            <img src="./assets/Images/Sandesh/19.jpg" alt="Image1">
        </div>
        <div class="image">
            <a href="https://www.instagram.com/sagar.d.rai/tagged/?fbclid=IwAR0JJRYICwqRf5I_lrjqYVUd4AAC1DGZjtePEJ114tCSxRs2NmmPbQoyw5I"
                target="_blank">
                <h1>
                    <div class="picSagar"></div>
                    <div class="follow">For Download Ask Here</div> Sagar Rai
                </h1>
            </a>
            <img src="./assets/Images/Sagar/13.jpg" alt="Image">
        </div>
        <div class="image">
            <a href="https://www.instagram.com/sandesh_sp12/?hl=en&fbclid=IwAR3xIZ1R42cp7WsV04mAdrcB21HigYpRV6sEevZXcPnnShpwExUiaAZOQZA"
                target="_blank">
                <h1>
                    <div class="picSandesh"></div>
                    <div class="follow">For Download Ask Here</div> Sandesh Pandey
                </h1>
            </a>
            <img src="./assets/Images/Sandesh/13.jpg" alt="Image1">
        </div>
        
    </div>
    <!-- -------for modal popover--------------  -->
    <script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function() {
        myInput.focus()
    })
    </script>
</main>