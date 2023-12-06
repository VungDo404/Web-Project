<?php
    session_start();
    session_destroy();
    header("Location: http://localhost/Assignment/home.php");
?>