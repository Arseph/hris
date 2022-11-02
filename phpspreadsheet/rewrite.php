<?php
require_once 'vendor/autoload.php';

 use phpoffice\spreadsheet\IOFactory; //iofactory class


//load spreadsheet
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("pds.xlsx");

$fname = 'Charlie magne'; 
$surname ='Martinez';
$mname = 'Alcazaren';
$extension = 'NAME EXTENSION (JR., SR)
Jr.';
$dob= '08/05/1993';
$pob= 'cotabato city';
$gender = 'male';
$civilstatus = 'single';
$height= '176cm';
$weight= '75Kg';
$bloodtype='O+';
$gsis='123test';
$pagibig='123test';
$philhealth='123test';
$sss='123test';
$tin='123test';
$employee_no='123test';

$r_house='8';
$r_street='F.millan';
$r_village='';
$r_barangay='Rosary Heights XIII';
$r_city='Cotabato City';
$r_province='';
$r_zip='9600';

$p_house='8';
$p_street='F.millan';
$p_village='';
$p_barangay='Rosary Heights XIII';
$p_city='Cotabato City';
$p_province='';
$p_zip='9600';

$tel_no='5523069';
$mobile_no='09762946750';
$email='itcharlofficial@gmail.com';

$s_sname="none";
$s_fname="none";
$s_mname="none";
$s_occupation="n/a";
$s_boss="n/a";
$s_badd="n/a";
$s_telno="n/a";

$f_sname = "Martinez";
$f_fname = "christopher";
$f_mname = "Aldana";

$m_sname = "Alcazaren";
$m_fname = "Chiella";
$m_mname = "Umbao";

//change it
$sheet = $spreadsheet->getSheetByName('C1');
//$sheet = $spreadsheet->getActiveSheet();//
$sheet->setCellValue('D10', $surname );
$sheet->setCellValue('D11', $fname);
$sheet->setCellValue('D12', $mname);
$sheet->setCellValue('L11', $extension);
$sheet->setCellValue('D13', $dob);
$sheet->setCellValue('D15', $pob);
$sheet->setCellValue('D16', $gender);
$sheet->setCellValue('D17', $civilstatus);
$sheet->setCellValue('D22', $height);
$sheet->setCellValue('D24', $weight);
$sheet->setCellValue('D25', $bloodtype);
$sheet->setCellValue('D27', $gsis);
$sheet->setCellValue('D29', $pagibig);
$sheet->setCellValue('D31', $philhealth);
$sheet->setCellValue('D32', $sss);
$sheet->setCellValue('D33', $tin);
$sheet->setCellValue('D34', $employee_no);

$sheet->setCellValue('I17', $r_house);
$sheet->setCellValue('L17', $r_street);
$sheet->setCellValue('I19', $r_village);
$sheet->setCellValue('L19', $r_barangay);
$sheet->setCellValue('I22', $r_city);
$sheet->setCellValue('L22', $r_province);
$sheet->setCellValue('I24', $r_zip);

$sheet->setCellValue('I25', $p_house);
$sheet->setCellValue('L25', $p_street);
$sheet->setCellValue('I27', $p_village);
$sheet->setCellValue('L27', $p_barangay);
$sheet->setCellValue('I29', $p_city);
$sheet->setCellValue('L29', $p_province);
$sheet->setCellValue('I31', $p_zip);

$sheet->setCellValue('I32', $tel_no);
$sheet->setCellValue('I33', $mobile_no);
$sheet->setCellValue('I34', $email);

$sheet->setCellValue('D36', $s_sname);
$sheet->setCellValue('D37', $s_fname);
$sheet->setCellValue('D38', $s_mname);
$sheet->setCellValue('D39', $s_occupation);
$sheet->setCellValue('D40', $s_boss);
$sheet->setCellValue('D41', $s_badd);
$sheet->setCellValue('D42', $s_telno);

$sheet->setCellValue('D43', $f_sname);
$sheet->setCellValue('D44', $f_fname);
$sheet->setCellValue('D45', $f_mname);

$sheet->setCellValue('D47', $m_sname);
$sheet->setCellValue('D48', $m_fname);
$sheet->setCellValue('D49', $m_mname);

$sheet = $spreadsheet->getSheetByName('C2');
$sheet->setCellValue('A5', 'test');

// $sheet->setCellValue('D54', $e_nos);
// $sheet->setCellValue('D55', $s_nos);
// $sheet->setCellValue('D56', $v_nos);
// $sheet->setCellValue('D57', $c_nos);
// $sheet->setCellValue('D58', $g_nos;

// $sheet->setCellValue('G54', $e_bdc);
// $sheet->setCellValue('G55', $s_bdc);
// $sheet->setCellValue('G56', $v_bdc);
// $sheet->setCellValue('G57', $c_bdc);
// $sheet->setCellValue('G58', $g_bdc;

// $sheet->setCellValue('J54', $e_from);
// $sheet->setCellValue('J55', $s_from);
// $sheet->setCellValue('J56', $v_from);
// $sheet->setCellValue('J57', $c_from);
// $sheet->setCellValue('J58', $g_from);

// $sheet->setCellValue('k54', $e_to);
// $sheet->setCellValue('k55', $s_to);
// $sheet->setCellValue('k56', $v_to);
// $sheet->setCellValue('k57', $c_to);
// $sheet->setCellValue('k58', $g_to);

$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->save("pds.xlsx");


?>