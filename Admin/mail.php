<?php
$to = "linh2002gv@gmail.com";
$subject = "Tiêu đề email";
$message = "Nội dung email";
$header = "From:admin@comflash.xyz \r\n";

$success = mail($to, $subject, $message, $header);

if ($success == true) {
    echo "Đã gửi mail thành công...";
} else {
    echo "Không gửi đi được...";
}
?>