<?php
session_start();
session_destroy();
session_start();
$K = "off";
if ($_SESSION['Status'] != "on") {
    echo header("refresh: 0; url = https://comflash.xyz/Login.php");
    exit();
}
?>