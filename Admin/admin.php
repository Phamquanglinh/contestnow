<?php
include "../data_config.php";
 include "../Module/Header/fix_list.php";
session_start();
$type_user=$_SESSION['type_user'];
$manager_name=$_SESSION['Name'];
if($type_user=="Normal"){header("refresh: 0; url = https://comflash.xyz");}
?>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Tool<?php echo $manager_name;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../jquery-3.4.1.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="../Module/Header/menu.css">
    <script src="../Module/Header/menu.js"></script>
 <link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
<div class="container">
    <?php session_start();
    $user=$_SESSION["current_user"];
    echo $user;?>
    
    <?php include "../Module/Header/Header.php";?>
    <div class="boder">
        <div class="info_manager">
            <p>Xin chào <?php echo $manager_name ?></p><br>
            <p>Chức năng của bạn là <?php echo $type_user;?></p>
            <p>Dưới đây là công cụ quản trị của bạn</p>
        </div>
           <div class="tool">
               <div class="on_tool"><a href="creat.php">Tạo bài kiểm tra</a></div>
               <div class="on_tool"><a href="editor.php">Quản lý các bài kiểm tra đã đăng</a></div>
               <div class="on_tool">Quản lý danh sách kết quả bài kiểm tra</div>
               <div class="on_tool">Cấp phép truy cập</div>
           </div>



    </div>




</div>
</body>
</html>












