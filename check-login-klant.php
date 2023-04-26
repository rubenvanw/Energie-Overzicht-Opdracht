<?php
    session_start();
    if(!isset($_SESSION["klant"])){
        header("Location:index.php ");
    }
?>