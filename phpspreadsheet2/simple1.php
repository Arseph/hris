<?php

include "../scripts/connect.php";

$uid = $_GET['uid'];


//call the autoload
require 'vendor/autoload.php';
//load phpspreadsheet class using namespaces
use PhpOffice\PhpSpreadsheet\Spreadsheet;
//call xlsx writer class to make an xlsx file
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use PhpOffice\PhpSpreadsheet\IOFactory;


//load spreadsheet
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("pds.xlsx");

//make a new spreadsheet object
// $spreadsheet = new Spreadsheet();

//get current active sheet (first sheet)
$sheet = $spreadsheet->getActiveSheet();

//set the value of cell a1 to "Hello World!"
$sheet->setCellValue('D10', 'Hello World !');

//make an xlsx writer object using above spreadsheet
$writer = new Xlsx($spreadsheet);

//write the file in current directory
// $writer->save('hello.xlsx');


$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->save("pds.xlsx");

//redirect to the file
// echo "<meta http-equiv='refresh' content='0;url=pds.xlsx'/>";
