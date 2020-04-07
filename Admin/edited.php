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

<?php if(isset($_REQUEST['code'])  && isset($data_contest[$_REQUEST['code']]['Code'])){$code=$_REQUEST['code'];
}
   else {echo '<script>alert("Không có dữ liệu hoặc bài kiểm tra không tồn tại")</script>';

   }

//============================================================
if($type=='Admin'){
    $check_code="SELECT * FROM `Get_list` WHERE Code=";
    $check_code.="'";
    $check_code.=$code;
    $check_code.="'";

}else{
    $check_code="SELECT * FROM `Get_list` WHERE Code=";
    $check_code.="'";
    $check_code.=$code;
    $check_code.="' and Email_publisher=";
    $check_code.="'";
    $check_code.="$Email";
    $check_code.="'";
}?>
        <h1 style="text-align: center">Chỉnh sửa</h1>
<!--Phần form chỉnh sửa-->
  <form action="save.php" method="post">
      <?php
  if($code_result=mysqli_query($con,$check_code)){
      while ($row_code=mysqli_fetch_array($code_result,MYSQLI_ASSOC))
      {
          $data_code=$row_code;
          $folder=$data_code['Code'];
          $name_contest=$data_code['Name_contest'];
          echo "<label>Tên</label>";
          echo '<input class="title" type="text" name="title" value="'.$data_code['Name_contest'].'">';
          echo '<br>';
           echo "<label>Thời gian</label>";
          echo '<input class="title" type="number" name="time" value="'.$data_code['Time_test'].'">';
          $link_data='../Contest/'.$folder.'/data.txt';
          session_start();
          $_SESSION['link_data']=$link_data;
          $_SESSION['folder']=$folder;
          $fp=file($link_data);
               foreach ($fp as $key => $value){
                  $fp[$key];
                   echo '<input style="width:100%;padding: 6px;border: 1px solid;margin-top: 5px;" name="'.$key.'" type="text" value="'.$fp[$key].'"><br>';
               }
      }
  }else{echo $con->error ;}
?>
      <input id="send" type="submit" value="Sửa đề">
  </form>


    </div>


    <div class="edit_correct">
        <form id="form_edit_correct" action="save_correct.php" method="post">
        <?php $link_correct='../Contest/'.$folder.'/correct.txt';
           session_start();
           $_SESSION['link_correct']=$link_correct;
           $correct_list=file($link_correct); $i=1;
           foreach ($correct_list as $ckey => $cvalue){
               echo '<div class="box_correct">';
                echo '<label>Câu'.$i.'</label>';
                 echo '<input name="'.$i.'" id="answer" type="text" value="'.$correct_list[$ckey].'">';
                 echo '</div>';
                $i++;

           }
        ?>;
            <input type="submit" id="send" value="Cập nhật kết quả">
        </form>



    </div>


</div>