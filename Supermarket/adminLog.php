

<?php
session_start();
if ($_POST["login"] == "admin" && $_POST["pass"] == "admin") {
    $ip = $_SERVER['REMOTE_ADDR'];
    $_SESSION["ip"] = $ip;
    header('location: admin.php');
}
