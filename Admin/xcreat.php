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
    <link rel="stylesheet" type="text/css" href="xcreat.css">
    <script src="xcreat.js"></script>
</head>
<body>
<div class="container">
    <?php session_start();
    $user=$_SESSION["current_user"];
    echo $user;?>

    <?php include "../Module/Header/Header.php";?>
    <div class="boder">
        <div class="fist">
            <form action="#finish" method="post"><table>
                <tr><th><label>Tên bài kiểm tra:</label></th><th><input name="title" type="text" id="title"></th></tr>
                <tr><th><label>Thời gian:</label></th><th><input name="time" type="number" id="title"></th></tr>
                <tr><th><label>Mã bài kiểm tra:</label></th><th><input name="code" type="text" id="title"></th></tr>
                </table>

                <label>Nhập số câu hỏi </label>
                <input id="total_question" type="number" placeholder="nhập số câu">
                <div id="creat_button" onclick="creat()">Tạo</div>
                <div id="question"></div>
                <input id="submit" type="submit" value="Cập nhật bài kiểm tra">

            </form>
        </div>

        <div id="finish">
            <?php
            if(isset($_REQUEST['title']) && isset($_REQUEST['time']) && isset($_REQUEST['code'])){
                $name_contest=$_REQUEST['title'];
                $time=$_REQUEST['time'];
                $code=$_REQUEST['code'];
                session_start();
                $name_publisher=$_SESSION['Name'];
                $email_publisher=$_SESSION['Email'];

            array_pop($_REQUEST);
            array_shift($_REQUEST);
            array_shift($_REQUEST);
            array_shift($_REQUEST);
           $tmp=array_values($_REQUEST);
           //=======================================
           $i=0; $k=1;
            while($i<count($tmp)){
                $base[$i]='Câu '.$k.': '.$tmp[$i];
                $base[$i+1]="A.".$tmp[$i+1];
                $base[$i+2]="B.".$tmp[$i+2];
                $base[$i+3]="C.".$tmp[$i+3];
                $base[$i+4]="D.".$tmp[$i+4];
                $correct[$k]=$tmp[$i+5];
                $i+=6;
                $k++;
            }
            //======================================================
            $find_max='SELECT max(id) as max from Get_list ';
            $max_r=mysqli_query($con,$find_max);
            $max=mysqli_fetch_array($max_r,MYSQLI_ASSOC);
            $max=$max['max']+1;

            $creat="INSERT INTO Get_list (id,Code, Name_contest,Time_test, Publisher,Email_publisher)
VALUES ('".$max."','".$code."', '".$name_contest."', '".$time."', '".$name_publisher."', '".$email_publisher."')";
           //=====================================================
            if($kq=mysqli_query($con,$creat)){
                $link_folder='../Contest/'.$code;
                mkdir($link_folder);
                $link_data='../Contest/'.$code.'/data.txt';
                $link_correct='../Contest/'.$code.'/correct.txt';
                $fp = fopen($link_data,"a+");
                foreach($base as $key => $value){
                    fwrite($fp,$base[$key]);
                    fwrite($fp,'
');
                }
                fclose($fp);
                //=====================
                $fp = fopen($link_correct,"a+");
                foreach($correct as $key => $value){
                    fwrite($fp,$correct[$key]);
                    fwrite($fp,'
');
                }
                fclose($fp);echo 'Tạo thành công';}else {echo $con->error;}}


            ?>


        </div>


    </div>




</div>
</body>
</html>












