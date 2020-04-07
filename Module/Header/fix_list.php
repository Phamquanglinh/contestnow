<?php
$contest_list='';
include '../../data_config.php';
$list=$data_contest;
foreach ($list as $key => $value) {
    $contest_list.= '<li><a href="https://comflash.xyz/Module/Contest_source/contest_now.php?code='.$value["Code"].'">'.$value["Name_contest"].'</a></li>';
}
?>


