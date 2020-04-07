<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src="../../jquery-3.4.1.js"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='../Header/menu.css'>
    <script src='../Header/menu.js'></script>
    <?php
    session_start();
    $object=$_SESSION['id'];
       unset($_SESSION['id']);
       $Title=$_SESSION['Title'];
       $class=$_SESSION['Class'];
       $save=$_SESSION['save'] ;
       unset($_SESSION['save']);
    require_once  "../Header/Header.php";

 //==========================================================
          $point=0;
          for($i=0;$i<count($object);$i++) {
              if (isset($_REQUEST[$i])) {
                  $re[$i] = $_REQUEST[$i];
              } else[$re[$i] = "E"];
              if ($re[$i] == preg_replace('/\s+/', '', $object[$i]["correct"])) {
                  $point += 1;
              }


          }

    ?>
</head>  
<body>
    <div class="container">
        <?php echo

        $header; ?>
    <div class="result">
      
        <?php
           $link_scr="../../Contest/".$save."/Ketqua.txt";
            $fp=fopen($link_scr,"a");
            $time=date('H:i:s d-m-Y', time());
            fwrite($fp,$_SESSION['Email'].'|'.$_SESSION['Name'].'|'.$point*10/count($object).'|'.$class.'|'.$time.'
');
            fclose($fp);
            echo "Chúc mừng ".$_SESSION['Name']." đã hoàn thành bài thi, bài thi của bạn sẽ được lưu lại<br>";
            echo '<a href="https://comflash.xyz">Về trang chủ<a>';
        ?>

    </div>
    
    </div>

</body>
</html>