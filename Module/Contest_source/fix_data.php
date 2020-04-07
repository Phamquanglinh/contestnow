<?php
  if(isset($_GET["code"])){$save=$_GET["code"];}else{$save="NMC01";}
  $file_data='../../Contest/'.$save.'/data.txt';
  $file_correct='../../Contest/'.$save.'/correct.txt';
   $answer =file($file_correct) or die('file kết quả chưa được nhập');
   $tmp_obj= array ();

$fp=file_get_contents($file_data);
$part="/Câu.../";
$part_2="/[ABCD][\.]/";
$tmp_obj_data=preg_split($part,$fp);
array_shift($tmp_obj_data);
foreach ($tmp_obj_data as $key => $value)
{
    $tmp=preg_split($part_2,$value);
    $tmp_obj[$key]['question']=$tmp[0];
    $tmp_obj[$key]['A']=$tmp[1];
    $tmp_obj[$key]['B']=$tmp[2];
    $tmp_obj[$key]['C']=$tmp[3];
    $tmp_obj[$key]['D']=$tmp[4];
    $tmp_obj[$key]['correct']=$answer[$key];}


shuffle($tmp_obj);
session_start();
$_SESSION['save']=$save;
?>