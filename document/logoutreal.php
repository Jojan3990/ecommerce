<?php 
    session_start();
    session_destroy();
    // setcookie('loggedCookie','',time() -60);
    header('location: ../index.php?id=1');
?>