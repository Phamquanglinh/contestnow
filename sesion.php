<?php

//===================Check=================
$servername = "202.92.4.11";
$username = "jsqhagmehosting_linhcuenini";
$database = "jsqhagmehosting_comflash";
$password = "X58udHGK-D^K";
//  Create a new connection to the MySQL database using PDO
$con = new mysqli($servername, $username, $password, $database) or die('ERROR');
mysqli_set_charset($con, 'UTF8');
$sql = 'SELECT * FROM `User_data`';
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $Prolife[$row['Email']] = $row;
}

mysqli_close($con);
//==================POST========================
$post_email = isset($_POST['femail']) ? $_POST['femail'] : '';
$post_password = isset($_POST['fpassword']) ? $_POST['fpassword'] : '';
if (!$post_password || !$post_email) {
    echo 'Bạn chưa nhập đủ thông tin';
    echo header("refresh: 1; url = https://comflash.xyz/Login.php");
} else if ($post_password != $Prolife[$post_email]['Password'] || $post_email != $Prolife[$post_email]['Email']) {
    echo 'Thông tin đăng nhập bị sai';
    echo header("refresh: 1; url = https://comflash.xyz/Login.php");
} else {
    session_start();
    $_SESSION['Name'] = $Prolife[$post_email]['Name'];
    $_SESSION['Email'] = $Prolife[$post_email]['Email'];
    $_SESSION['type_user'] = $Prolife[$post_email]['Type'];
    $_SESSION['Class'] = $Prolife[$post_email]['Class'];
    $_SESSION['Status'] = "on";
    echo header("refresh: 0; url = https://comflash.xyz");
}

//=================================================







