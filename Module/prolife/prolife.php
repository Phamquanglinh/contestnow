<?php
session_start();
$name=$_SESSION['Name'];
$lever=$_SESSION['type_user'];
$email=$_SESSION['Email'];
?>
<style>
    .prolife{text-align: center;margin: auto;background: pink;border-radius:12px }
    .prolife_title{font-size: 50px;font-weight: bold}


</style>
<div style="clear: both;"></div>
<div class="prolife">
    <div class="prolife_title">Thông tin của bạn </div>
         <div class="list_pr">
             <ul>
                 <li>Họ và tên:<?echo $name;?></li><br>
                 <li>Cấp người dùng:<?echo $lever;?></li><br>
                 <li>Email:<?echo $email;?></li>
             </ul>

         </div>









</div>
