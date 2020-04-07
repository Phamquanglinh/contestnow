<?php
session_start();
$link_correct=$_SESSION['link_correct'];
$folder=$_SESSION['folder'];
unset($_SESSION['link_correct']);
unset($_SESSION['folder']);
array_pop($_REQUEST);
$fp = fopen($link_correct, "w+");
foreach ($_REQUEST as $key => $value)
{
    fwrite($fp,$_REQUEST[$key]);
    fwrite($fp,'
');
}
fclose($fp);
echo '<script>alert("Cập nhật kết quả thành công !!")</script>';
echo header("refresh: 0; url = https://comflash.xyz/Admin/edited.php?code=".$folder."");
?>