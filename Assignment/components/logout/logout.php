<?php
    session_start();
    session_destroy();
    setcookie("user_id", '', time() - 3600,'/Assignment');
    header("Location: http://localhost/Assignment/home.php");
?>