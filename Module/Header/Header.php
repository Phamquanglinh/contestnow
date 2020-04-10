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
?>

<?php
//===============================================================================
require_once "fix_list.php";
session_start();
if($_SESSION['Status']!="on"){
    echo header("refresh: 0; url = https://comflash.xyz/Login.php");
    exit();
}else{
     echo '<div class="login-bar">';
      echo '<a id="img" href="https://comflash.xyz/Module/prolife/infomation.php">';
     echo '<img src="'.$data['avatar_link'].'" style="height: 100%;float: right;margin-right: 9px;border-radius: 17px;">';
     echo '</a>';
     echo '<a href="https://comflash.xyz/Module/prolife/infomation.php">'.$data['Name'];
     echo '<a href="https://comflash.xyz/logout.php">Đăng xuất</a>';



}
if ($_SESSION['type_user']!='Normal'){echo"<a href='../../Admin/admin.php'> Admin Tool</a>";
};echo'</div></div>';?>
<!--===========================================================-->

<div class="header">
        <div id="slogan">Comflash.Xyz-ContestNow</div>
        <div style="clear: both"></div>
      <nav id=cssmenu>

<div id="head-mobile"></div>
<div class="button"></div>
<ul> 
  <li class='active'><a href='https://comflash.xyz'>Trang Chủ</a></li>
  <li><a href='#'>Giới thiệu</a></li>
  <li><a href='#'>Bài test</a>
      <ul>
            <?php include 'fix_list.php' ; echo $contest_list ;?>
      </ul></li>
  <li><a href="#">Không bit đặt gì </a>
         <ul>
            <li><a href="https://comflash.xyz/Module/Contest_source/contest_now.php?code=01.Test">Bài test hỏng não</a></li>
            <li><a href='#'>Sub Product</a></li>
         </ul></li>
   <li><a href="#">Không bit đặt gì </a>
         <ul>
            <li><a href='#'>Sub Product</a></li>
            <li><a href='#'>Sub Product</a></li>
         </ul></li>      
<li><a href='#'>BIO</a></li>
<li><a href='#'>VIDEO</a></li>
<li><a href='#'>GALLERY</a></li>
<li><a href='#'>CONTACT</a></li>
</ul>
</nav>
         
        
       </div>


