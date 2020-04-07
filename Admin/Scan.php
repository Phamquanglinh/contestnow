<?
$fp = file_get_contents('data_fist.txt');
$part = "/Câu../";
$part_2 = "/[ABCD][\.]/";
$fist_data = preg_split($part, $fp);
array_shift($fist_data);
foreach ($fist_data as $key => $value) {
    $tmp = preg_split($part_2, $value);
    $fist[$key]['Question'] = $tmp[0];
    $fist[$key]['A'] = $tmp[1];
    $fist[$key]['B'] = $tmp[2];
    $fist[$key]['C'] = $tmp[3];
    $fist[$key]['D'] = $tmp[4];
}
echo '<pre>';
print_r([$fist]);
echo '</pre>';

?>