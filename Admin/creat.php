<?php
include "../data_config.php";
$find_max='SELECT max(id) as max from Get_list ';
$max_r=mysqli_query($con,$find_max);
$max=mysqli_fetch_array($max_r,MYSQLI_ASSOC);
$max=$max['max']+1;
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tạo bài kiểm tra</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../jquery-3.4.1.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="../index_style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../Module/Header/menu.css">
    <script src="../Module/Header/menu.js"></script>
    <link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
<script>
    function message() {
        alert('Hoàn thành đăng tải');
    }
</script>
<div class="container">

    <?php include "../data_config.php";
    require_once "../Module/Header/Header.php";
    echo $header; ?>
    <div class="boder">
        <button class="back_admin"><a href="admin.php">Trở về</a></button>
        <div class="main_creat">
            <form method="post" action="#creat" enctype="multipart/form-data">
                <label>Tên bài kiểm tra</label><br><input name="name_contest" type="text">
                <label>Thời gian làm bài(phút):</label>
                <input type="number" name="time">
                <label>Mã bài kiểm tra(ghi theo hướng dẫn)</label>
                <input type='text' name="code">
                <p>Nhập tệp định dạng câu hỏi(data.txt)</p>
                <input type="file" name="data" id="fileSelect">
                <p>Nhập tệp định dạng đáp án (correct.txt)</p>
                <input type="file" name="correct" id="fileSelect">
                <input type="submit"  value="Tạo">
            </form>
            <div id="creat">
                <?php
                session_start();
                $pusher = $_SESSION['Name'];
                $email_publisher = $_SESSION['Email'];
                $code = $_POST['code'];
                $name_contest = $_POST['name_contest'];
                $time = $_POST["time"];
                $link_folder = '../Contest/' . $_POST['code'] . "/";


                if ($code != '' || $name_contest != '' || $time != '') {

                    $add_contest = $add_data = "INSERT INTO Get_list (id,Code, Name_contest, Time_test,Publisher,Email_publisher) VALUES 
                 ('" . $max . "','" . $code . "','" . $name_contest . "','" . $time . "','" . $pusher . "','" . $email_publisher . "')";
                    if (mysqli_query($con, $add_data)) {
                        echo '<script> message() </script>';
                        mkdir($link_folder);
                        move_uploaded_file($_FILES['data']['tmp_name'], $link_folder . $_FILES['data']['name']);
                        move_uploaded_file($_FILES['correct']['tmp_name'], $link_folder . $_FILES['correct']['name']);
                    } else {
                        echo mysqli_error($con);
                    }

                }
                ?></div>

        </div>



</div>

</div>
</body>
</html>