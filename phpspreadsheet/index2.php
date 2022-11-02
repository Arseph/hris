<?php
	require 'vendor/autoload.php';

	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

	$spreadsheet = new Spreadsheet();
	$sheet = $spreadsheet->getActiveSheet();
	$sheet->setCellValue('A1', 'Hello World !');

	$writer = new Xlsx($spreadsheet);
	$writer->save('hello world.xlsx');
	

	// $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");
    // $spreadsheet = $reader->load('Hostel_records.xlsx');
 
    // $sheet = $spreadsheet->getActiveSheet();
    // $last_row = (int) $sheet->getHighestRow();
    // $new_row = $last_row+1;
 
    // $sheet->setCellValue('A'.$new_row, “14”);
    // $sheet->setCellValue('B'.$new_row, “Alina”);
    // $sheet->setCellValue('C'.$new_row, “PG”);
    // $sheet->setCellValue('D'.$new_row, “$32”);
    // $sheet->setCellValue('E'.$new_row, “Pending”);
 
// require_once './Classes/PHPExcel/IOFactory.php';

// $objPHPExcel = PHPExcel_IOFactory::load("excelTemplate.xls");

// $objPHPExcel->setActiveSheetIndex(0);

// $objPHPExcel->setCellValue('A1', 'Hello')
//             ->setCellValue('B2', 'World!');

// $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
// $objWriter->save('excelCustomised.xls');

?>