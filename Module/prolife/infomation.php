<html>
<?php
session_start();
include '../../data_config.php';
$avatar=$data['avatar_link'];
$name=$data['Name'];
$class=$data['Class'];
$email=$data['Email'];
$password_user=$data['Password'];
?>

<head>
    <script>
        function show() {
            document.getElementById('ig').style.display='block';
        }
        function messor() {
            alert('Cập nhật thông tin thành công')

        }
    </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kiểm tra online-Comflash</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../../jquery-3.4.1.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="../Header/menu.css">
    <link rel="stylesheet" type="text/css" media="screen" href="infomation.css">
    <script src="../Header/menu.js"></script>
</head>
<body>
<div class="container">
    <?php include "../Header/Header.php"?>
<div class="border">
<div class="infomation">

    <div class="avatar">
        <img src="<? echo $avatar?>"  style="border-radius: 47px;height: 100%;">
    </div>
    <div class="info">
        <form id="form_info" action="#result_info" method="post">
 <div class="round">
         <label>Họ và tên:</label><input id="name" name="name" type="Text" value="<?php echo $name ?>">
        <span><?php echo $name ?></span>
        <div class="fake+_button" onclick="document.getElementById('name').style.display='inline';show();">Chỉnh sửa</div><br>

  </div>
 <div class="round">
            <label>Lớp:</label> <input id="class" name="class" type="Text" value="<?php echo $class ?>">
        <span><?php echo $class ?></span>
        <div class="fake+_button" onclick="document.getElementById('class').style.display='inline';show();">Chỉnh sửa</div><br>

 </div>
<div class="round">
        <label>Email:</label> <input id="email" type="Text" name="Email" value="<?php echo $email ?>">
        <span><?php echo $email ?></span>
        <div class="fake+_button" onclick="document.getElementById('email').style.display='inline';show();">Chỉnh sửa</div><br>

</div>
 <div class="round">
            <label>Mật khẩu:</label> <input id="password" name="password" type="password" value="<?php echo $password_user ?>">
        <span>*************</span>
        <div class="fake+_button"  onclick="document.getElementById('password').style.display='inline';show();">Chỉnh sửa</div><br>

 </div>
            <input type="submit" id="ig"  value="xác nhận">
        </form>
   <div id="result_info">
       <?php
       $edit=$_POST;
       $edited="UPDATE User_data SET ";
           $edited.="Name =";
           $edited.="'";
           $edited.=$edit['name'];
           $edited.="' ,";
       $edited.="Email =";
       $edited.="'";
       $edited.=$edit['Email'];
       $edited.="' ,";
       $edited.="Class =";
       $edited.="'";
       $edited.=$edit['class'];
       $edited.="' ,";
       $edited.="Password =";
       $edited.="'";
       $edited.=$edit['password'];
       $edited.="' WHERE ";
       $edited.="Email =";
       $edited.="'";
       $edited.=$edit['Email']."'";

       if($result_prolife=mysqli_query($con,$edited)){
           echo '<script>messor()</script>';
           echo header("refresh: 0; url = https://comflash.xyz/Module/prolife/infomation.php");
       }else{echo 'Cập nhật thất bại :'.$con->error;}




       ?>



   </div>

    </div>



</div>


</div>
</div>







</body>