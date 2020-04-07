<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kiểm tra online-Comflash</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="jquery-3.4.1.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="index_style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="Module/Header/menu.css">
    <script src="Module/Header/menu.js"></script>
</head>
<body>
<div class="container">
    <?php session_start();
    include 'data_config.php';
    $user = $_SESSION["current_user"];
    echo $user; ?>
    <?php include "Module/Header/Header.php" ?>
    <div class="boder">
        <?php include "prolife.php" ?>


    <h2> 5 bài kiểm tra mới nhất </h2>
  <div class="list_contest" >

      <?php
      $top_sql=' SELECT * FROM Get_list ORDER BY id DESC LIMIT 5';
      $top_result=mysqli_query($con,$top_sql);
      while($row_top=mysqli_fetch_array($top_result,MYSQLI_ASSOC)){
          $top[$row_top['Code']]=$row_top;
      }

    foreach ($top as $key => $value){
        echo '<div class="contest_box" onclick="window.location=';
        echo "'";
        echo "https://comflash.xyz/Module/Contest_source/contest_now.php?code=";
        echo $key;
        echo "'";
        echo '"';
        echo '>';
        echo '<p id="title_contest">';
        echo '<a href="https://comflash.xyz/Module/Contest_source/contest_now.php?code='.$key.'">';
        echo $top[$key]['Name_contest'].'</a>';
        echo '</p>';
        echo '<p id="author_contest">';
        echo 'Người đăng:';
        echo $top[$key]['Publisher'];
        echo '</p>';
       echo '</div>';

    }



      ?>


  </div>

  </div>
</div>
</body>
</html>