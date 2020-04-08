<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đăng kí</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="jquery-3.4.1.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="demo.css">
    <script>
        function show() {
            document.getElementById('log').style.display = 'block';
        }
    </script>

</head>
<body>
<div class="login_head">
    <p>ComFlash.xyz</p>
</div>
<div class="login_body">

    <div id="login">
        <div id="log">
            <?php
            $servername = "202.92.4.11";
            $username = "jsqhagmehosting_linhcuenini";
            $database = "jsqhagmehosting_comflash";
            $password_db = "X58udHGK-D^K";
            $con = new mysqli($servername, $username, $password_db, $database) or die('ERROR');
            mysqli_set_charset($con, 'UTF8');
            $sql_login = 'SELECT * FROM `User_data`';
            $result_login = mysqli_query($con, $sql_login);
            while ($row_login = mysqli_fetch_array($result_login, MYSQLI_ASSOC)) {
                $data_all[$row_login['Email']] = $row_login;
            }

            $list_user = $data_all;

            $check = 1;
            $mail_type = "/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/";
            if ($_REQUEST['femail'] == '') {
                $check = 0;
                echo "chưa điền Email<br>";
            }
            if ($_REQUEST['fuser'] == '') {
                $check = 0;
                echo "chưa điền tên<br>";
            }
            if ($_REQUEST['fpassword'] == '') {
                $check = 0;
                echo "chưa điền mật khẩu<br>";
            }
            if ($_REQUEST['fclass'] == '') {
                $check = 0;
                echo "chưa điền lớp<br>";
            }
            if (preg_match($mail_type, $_REQUEST['femail']) == false) {
                $check = 0;
                echo 'định dạng Email chưa đúng';
            }
            foreach ($list_user as $key => $value) {
                if ($_REQUEST['femail'] == $list_user[$key]['Email']) {
                    $check = 0;
                    echo 'trùng mail';

                }

            }

            if ($check == 1) {
                $email = $_REQUEST['femail'];
                $user = $_REQUEST['fuser'];
                $password = $_REQUEST['fpassword'];
                $class = $_REQUEST['fclass'];
                $type = "Normal";
//=======================================
                $add_data = "INSERT INTO User_data (Email, Name, Password,Type,Class) VALUES ('" . $email . "','" . $user . "','" . $password . "','" . $type . "','" . $class . "')";
                if (mysqli_query($con, $add_data)) {
                    echo '<script>alert("Đăng kí thành công");window.location="https://comflash.xyz"</script>';
                } else {
                    echo mysqli_error($con);
                }
                echo $add_data;

            }
            ?>
        </div>
        <p style="font-size: 40px;text-align: center;margin-bottom: 39px;margin-top: 44px;">Đăng ký</p>
        <form action="#log" method="post" style="margin-left: 22px;">
            <input name="femail" type="text" placeholder="Email" class="login_input_1"><br>
            <input name="fuser" type="text" placeholder="User">
            <input name="fclass" type="text" placeholder="Class">
            <input name="fpassword" type="password" placeholder="Password" class="login_input_2"><br>
            <input type="submit" onclick="show() " value="Đăng kí" class="login_input_3"><br>

        </form>
        <a href="Login.php">Đăng nhập<a>


    </div>
</div>
</body>
</html>