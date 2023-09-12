<?php
    session_start();
    if(!isset($_SESSION["isAuth"]))
    {
        header("Location: login.php");
    }
?>