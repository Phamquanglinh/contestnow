<?php
$code=$_REQUEST['code'];
require "../PHPExcel-1.8/Classes/PHPExcel.php";
$link='../Contest/'.$_REQUEST['code'].'/Ketqua.txt';
if(file_exists($link)){
    $data=file($link);}
foreach ($data as $key => $value){
    $temp[$key]=explode("|",$value);
}

//Khởi tạo đối tượng
$excel = new PHPExcel();
//Chọn trang cần ghi (là số từ 0->n)
$excel->setActiveSheetIndex(0);
//Tạo tiêu đề cho trang. (có thể không cần)
$excel->getActiveSheet()->setTitle('Mã bài kiểm tra '.$code.'');

//Xét chiều rộng cho từng, nếu muốn set height thì dùng setRowHeight()
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(7);
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(7);
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);

//Xét in đậm cho khoảng cột
$excel->getActiveSheet()->getStyle('A1:E1')->getFont()->setBold(true);
//Tạo tiêu đề cho từng cột

$excel->getActiveSheet()->setCellValue('A1', 'Email');
$excel->getActiveSheet()->setCellValue('B1', 'Họ và tên');
$excel->getActiveSheet()->setCellValue('C1', 'Điểm');
$excel->getActiveSheet()->setCellValue('D1', 'Lớp');
$excel->getActiveSheet()->setCellValue('E1', 'Thời gian làm bài');
// thực hiện thêm dữ liệu vào từng ô bằng vòng lặp
// dòng bắt đầu = 2
$numRow = 2;
foreach ($temp as $row) {
    $excel->getActiveSheet()->setCellValue('A' . $numRow, $row[0]);
    $excel->getActiveSheet()->setCellValue('B' . $numRow, $row[1]);
    $excel->getActiveSheet()->setCellValue('C' . $numRow, $row[2]);
    $excel->getActiveSheet()->setCellValue('D' . $numRow, $row[3]);
    $excel->getActiveSheet()->setCellValue('E' . $numRow, $row[4]);
    $numRow++;
}
// Khởi tạo đối tượng PHPExcel_IOFactory để thực hiện ghi file
// ở đây mình lưu file dưới dạng excel2007
$title='Content-Disposition: attachment; filename="'.$code.'.xlsx"';
header('Content-type: application/vnd.ms-excel');
header($title);
PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');

?>