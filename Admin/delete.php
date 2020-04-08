<?php
session_start();
$manager_name=$_SESSION['Name'];
$Email=$_SESSION['Email'];
$type=$_SESSION['type_user'];
?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Tool<?php echo ' '.$manager_name ;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../jquery-3.4.1.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="../Module/Header/menu.css">
    <script src="../Module/Header/menu.js"></script>
    <link rel="stylesheet" type="text/css" href="admin.css">

<?php
include '../data_config.php';
include  '../Module/Header/fix_list.php';
include '../Module/Header/Header.php';?>
    <div class="boder">

        <div class="edit_data">

<?php if(isset($_REQUEST['code'])  && isset($data_contest[$_REQUEST['code']]['Code']) &&
    $data_contest[$_REQUEST['code']]['Email_publisher']==$Email){$code=$_REQUEST['code'];$next=0;
}
else {$next=1;echo '<script>alert("Không có dữ liệu hoặc bài kiểm tra không tồn tại");history.back()</script>';

}
if ($next==0){
    $delete="DELETE FROM Get_list WHERE Code =";
    $delete.="'";
    $delete.=$code;
    $delete.="'";


}
echo '<br>';
$link_folder='../Contest/'.$code.'';
$link_data='../Contest/'.$code.'/data.txt';
$link_correct='../Contest/'.$code.'/correct.txt';
$link_Ketqua='../Contest/'.$code.'/Ketqua.txt';

if ($return_delete=mysqli_query($con,$delete)){
    unlink($link_data);
    if(file_exists($link_Ketqua)){unlink($link_Ketqua);};
    unlink($link_correct);
    rmdir($link_folder);
   echo 'Xóa thành công, đang trở về trang điều khiển';
   echo '<script>history.back()</script>';

}else{echo $con -> error;}






?>
