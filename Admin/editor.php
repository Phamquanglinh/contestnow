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
<script>
    function mess(code) {
   var messages='<div class="cf"><div class="cf_div">Bạn muốn xóa bài này ? Sau khi xóa không thể khôi phục !</div>';
         messages +='<button onclick="goto(';
         messages+="'";
         messages+=code;
         messages+="'";
         messages+=')"';
         messages+='>Có</button>';
         messages+='<button onclick="dis()">Không</button><div>';
   document.getElementById('confirm_delete').innerHTML=messages;
   document.getElementById('confirm_delete').style.display='block';}


    function dis(){document.getElementById('confirm_delete').style.display='none';}
    function goto(link) {
        window.location="delete.php?code="+link;


    }
    function mess_fix(link){
        window.location="edited.php?code="+link;}

</script>

<!--Scrip------------------------------------------------------>

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
            $pattent.='ORDER by id ASC';

            $r_on_find = mysqli_query($con, $pattent);

            while ($row_on_find = mysqli_fetch_array($r_on_find, MYSQLI_ASSOC)) {
                $list[$row_on_find['Code']] = $row_on_find;
            }
            //Xử lý có code
            foreach ($list as $test_key => $test_value) {
                echo '<div id="list_test"> 
                        <P>' . $list[$test_key]['Name_contest'] . '</P>';

                echo '<div onclick="mess_fix(';
                echo "'";
                echo $list[$test_key]['Code']; echo "'";echo ")";echo '"';
                echo 'id="delete">Sửa</div>';

                            echo '<div onclick="mess(';
                echo "'";
                echo $list[$test_key]['Code']; echo "'";echo ")";echo '"';
                    echo 'id="delete">Xóa</div>';
                if ($type_user == 'Admin') {
                    echo ' | <p style="color:red">Người đăng:<b>' . $list[$test_key]['Publisher'] . '</b></p>';
                }
                echo'</div>';
            }


            ?>

        </div>

    </div>
    <div id="confirm_delete"></div>
</div>
</body>
</html>












