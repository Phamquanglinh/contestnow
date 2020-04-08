<?php
$link='../Contest/'.$_REQUEST['code'].'/Ketqua.txt';
if(file_exists($link)){
    $data=file($link);
    foreach ($data as $key => $value){
    $tmp=explode("|",$value);
    $li[$key]['Email']=$tmp[0];
    $li[$key]['Name']=$tmp[1];
    $li[$key]['Point']=$tmp[2];
    $li[$key]['Class']=$tmp[3];
    $li[$key]['Time']=$tmp[4];
    }
}else{echo 'chưa có dữ liệu';}


?>


<link rel="stylesheet" href="mark.css">
<table>
    <tr>
        <th>Email</th>
        <th>Họ và tên</th>
        <th>Điểm</th>
        <th>Lớp</th>
        <th>Thời gian nộp bài</th>
    </tr>

    <?php
    foreach ($li as $row => $column){
        echo '<tr>';
        echo  '<td>'.$li[$row]['Email'].'</td>';
        echo  '<td>'.$li[$row]['Name'].'</td>';
        echo  '<td>'.$li[$row]['Point'].'</td>';
        echo  '<td>'.$li[$row]['Class'].'</td>';
        echo  '<td>'.$li[$row]['Time'].'</td>';
        echo  '</tr>';

    }

    ?>
</table>
