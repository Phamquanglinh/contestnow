<?php session_start();session_destroy()?>
<html><head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đăng nhập</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="jquery-3.4.1.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="demo.css">


</head>
<body>
<div class ="login_head">
    <p>ComFlash.xyz</p>
</div>
<div class="login_body">
    <div id="login">
        <p style="font-size: 40px;text-align: center;margin-bottom: 39px;margin-top: 44px;">Đăng nhập</p>
        <form action="sesion.php" method="post" style="margin-left: 22px;">
            <input name="femail" type="text" placeholder="Email" class="login_input_1"><br>
            <input name="fpassword" type="password" placeholder="Password" class="login_input_2"><br>
            <input name="remember_password" type="checkbox"> Duy trì đăng nhập<br>
            <input type="submit" value="Đăng nhập" class="login_input_3"><br>
            <a href="#">Quên mật khẩu?</a>
            <a href="signup.php">Đăng kí</a>
        </form>



    </div>
</div>
</body>
</html>