<?php
session_start();
$link_data=$_SESSION['link_data'];
unset($_SESSION['link_data']);
$folder=$_SESSION['folder'];
unset($_SESSION['folder']);
include '../data_config.php';
echo $data_contest[$folder]['Code'];
$fp=fopen($link_data,"w+");
$title=$_REQUEST['title'];
array_shift($_REQUEST);
$time=$_REQUEST['time'];
$edit_link="UPDATE Get_list SET Name_contest='".$title."', Time_test=".$time." WHERE Code='".$folder."'";
array_shift($_REQUEST);
array_pop($_REQUEST);
if($connect=mysqli_query($con,$edit_link)){
    foreach ($_REQUEST as $key => $value)
    {
        fwrite($fp,$_REQUEST[$key]);
        fwrite($fp,'
');
    }
    fclose($fp);
    echo '<script>alert("Cập nhật câu hỏi, tiêu đề, thời gian thành công !!")</script>';
    echo header("refresh: 0; url = https://comflash.xyz/Admin/edited.php?code=".$folder."");
}else echo 'lỗi:'.$con->error;


?>