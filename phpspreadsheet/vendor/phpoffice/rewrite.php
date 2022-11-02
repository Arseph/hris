<?php
require_once 'vendor/autoload.php';

//load spreadsheet
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("excelTemplate.xlsx");

//change it
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'New Value');

//write it again to Filesystem with the same name (=replace)
$writer = new Xlsx($spreadsheet);
$writer->save('excelTemplate.xlsx');




// //load spreadsheet
// $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("yourspreadsheet.xlsx");

// //change it
// $sheet = $spreadsheet->getActiveSheet();
// $sheet->setCellValue('A1', 'New Value');




?>