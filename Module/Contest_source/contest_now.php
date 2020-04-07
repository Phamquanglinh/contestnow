<!DOCTYPE html>
<html lang="vi">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php
    if(isset($_REQUEST["code"]))
    {$Title=$_REQUEST["code"];}
    else{$Title="NMC01";}
      include '../Header/fix_list.php';
      $name_of_contest=$list[$Title]["Name_contest"];
       $min=$list[$Title]['Time_test'];
        $pusher=$list[$Title]['Publisher'];
    ?>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $name_of_contest;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../../jquery-3.4.1.js"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='css/Contest_now.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../Header/menu.css'>
    <script src='../Header/menu.js'></script>
    <script src='Check_contest.js'></script>
    <?php
       require_once "fix_data.php";
       require_once "../Clock/clock.php";
       $object=$tmp_obj;
    ?>
</head>
<body>
   <?php
   session_start();
   $_SESSION['id']=$object;
   $_SESSION['Title']=$Title;

   ?>
    <div class="container">
        <?php include '../Header/Header.php'?>
        <div id="security">
            <H1>Tên bài kiểm tra: <?php echo $name_of_contest;?></H1>
            <p>Người đăng:<?php echo $pusher ;?></p>
            <p>Thời gian:<?php echo $min?> phút <p>
            <h3 style="color:red">Chú ý:Hết thời gian sẽ tự động nộp  bài !</h3>
            <p>Yêu cầu các bạn làm bài nghiêm túc</p>
            <button id="start" onclick="start();setTimeout(submit,<?php echo $min*60*1000?>);disable()">Bắt đầu làm bài</button>
        </div>


      <div id="show_main_contest">

          <div class="clock"> <?php echo $clock;?></div>
        <div class="main-contest">
           <div class="move-content">
           <form id="contest_form" action="result.php"method="POST">
               <?php

               foreach($object as $pack_key => $pack){

                   $number=(int)$pack_key+1;
                   echo "<b>Câu ".$number.'.</b>'.$pack["question"].'<br>';
                   echo '<input type="radio" name="'.$pack_key.'" value="A">';
                   echo '<b>A.</b>'.$pack["A"].'<Br>';
                   echo '<input type="radio" name="'.$pack_key.'" value="B">';
                   echo '<b>B.</b>'.$pack["B"].'<Br>';
                   echo '<input type="radio" name="'.$pack_key.'" value="C">';
                   echo '<b>C.</b>'.$pack["C"].'<Br>';
                   echo '<input type="radio" name="'.$pack_key.'" value="D">';
                   echo '<b>D.</b>'.$pack["D"].'<Br><br>';
               }
               ?>
               <input type="submit" value="submit">

           </form>
           </div></div></div>
    </div>

</body>
</html>