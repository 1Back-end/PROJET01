<?php
session_start();
if (!isset($_SESSION["id"]) && !isset($_SESSION["token"])) {
    header("Location:../login/login.php");
    exit();
}
?>
