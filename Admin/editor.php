<?php
session_start();
//include "../data_config.php";
$type_user = $_SESSION['type_user'];
$manager_name = $_SESSION['Name'];
$Email = $_SESSION['Email'];
if ($type_user == "Normal") {
    header("refresh: 0; url = https://comflash.xyz");
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Tool</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../jquery-3.4.1.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="../index_style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../Module/Header/menu.css">
    <script src="../Module/Header/menu.js"></script>
    <link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
<div class="container">

    <?php session_start(); ?>
    <?php include "../Module/Header/Header.php"; ?>
    <div class="body_editor">
        <button class="back_admin"><a href="admin.php">Trở về</a></button>
        <div class="search-form" action="result_edit">
            <form id="search" action="#result_edit" method="POST">
                <label>Mã Bài</label>
                <input id="code" name="code" type="text" onclick="#" placeholder="Tìm"
                       VALUE="<?php echo $_POST['code'] ?>">
                <input type="submit" value="Tìm">
                <form>
        </div>

        <div id="result_edit">

            <?php

            include '../data_config.php';
            if (isset($_POST['code'])) {
                $code = $_POST['code'];
            } else {
                $code = '';
            }
            if ($type_user == 'Admin') {
                $pattent = 'SELECT* FROM Get_list WHERE Code like "' . $code . '%" or Code like "%' . $code . '"';
            } else {
                $pattent = 'SELECT* FROM Get_list WHERE (Email_publisher="' . $Email . '") and (Code like "' . $code . '%" or Code like "%' . $code . '")';
            }

            $r_on_find = mysqli_query($con, $pattent);

            while ($row_on_find = mysqli_fetch_array($r_on_find, MYSQLI_ASSOC)) {
                $list[$row_on_find['Code']] = $row_on_find;
            }
            //Xử lý có code
            foreach ($list as $test_key => $test_value) {
                echo '<div id="list_test"> 
                        <P>' . $list[$test_key]['Name_contest'] . '</P>
                              <button><a href="edit.php?code=' . $list[$test_key]['Code'] . '">Sửa</a></button>
                             <button><a href="delete.php?code=' . $list[$test_key]['Code'] . '">Xóa</a></button>
                                    ';
                if ($type_user == 'Admin') {
                    echo ' | <p style="color:red">Người đăng:<b>' . $list[$test_key]['Publisher'] . '</b></p>';
                }
                echo '</div>';
            }


            ?>

        </div>

        <script>
            tmp = document.getElementById("result_edit");
            if (tmp = null) {
                document.getElementById('list_test').innerHTML = "Không tìm thấy"
            }

        </script>


    </div>
</div>
</body>
</html>












