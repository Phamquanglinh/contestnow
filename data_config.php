<?php

$servername = "202.92.4.11";
$username = "jsqhagmehosting_linhcuenini";
$database = "jsqhagmehosting_comflash";
$password = "X58udHGK-D^K";
//  Create a new connection to the MySQL database using PDO
$con = new mysqli($servername, $username, $password, $database) or die('ERROR');
mysqli_set_charset($con, 'UTF8');
session_start();
$id = $_SESSION['Email'];
$sql = 'SELECT * FROM `User_data` Where Email="' . $id . '"';
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $data = $row;
}
//===============================================================
$sql_2 = 'SELECT * FROM `Get_list`';
$Result_2 = mysqli_query($con, $sql_2);
while ($row_2 = mysqli_fetch_array($Result_2, MYSQLI_ASSOC)) {
    $data_contest[$row_2['Code']] = $row_2;
}


?>