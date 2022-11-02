<?php
$uid = '19760005';

//count params
$params = array();
$options = array("Scrollable"=> SQLSRV_CURSOR_KEYSET);

$serverName = "DOH\SQLEXPRESS";
$connectionInfo = array( "Database"=>"hris3");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}

$basic_sql = "select * from emp_basic where agencyid='$uid'";
$identification_sql = "select * from emp_identification where agencyid='$uid'";
$address_sql = "select * from emp_address where agencyid='$uid'";

$result = sqlsrv_query($conn, $basic_sql);

$row = sqlsrv_fetch_array($result);

//basic information segment
$fname = $row['firstname'];
$imagepath = $row['imagepath'];
$surname = $row['surname'];
$extension = $row ['suffix'];
$mname = $row ['middlename'];
$dob = $row ['dob'];
$pob = $row ['pob'];
$gender = $row ['gender'];
$civilstatus = $row ['civil'];
$citizenship = $row ['citizenship'];
$citizenshipby = $row ['citizenshipby'];
$cid = $row ['cid'];
$height = $row ['height'];
$weight = $row ['weightt'];
$bloodtype = $row ['bloodtype'];

//identification segment

$result = sqlsrv_query($conn, $identification_sql);

$row = sqlsrv_fetch_array($result);

$gsis_id = $row['gsis_id']; 
$pagibig_id = $row['pagibig_id'];
$philhealth_id = $row ['philhealth_id'];
$sss_id = $row ['sss_id'];
// $passport = $row ['passport'];
// $prc = $row ['prc'];
// $drivers = $row ['drivers'];
// $drivers_date = $row ['drivers_date'];
$email_ad = $row ['email_ad'];
$tin_no = $row ['tin_no'];


//address segment

$result = sqlsrv_query($conn, $address_sql);

$row = sqlsrv_fetch_array($result);

    $p_house = $row['p_house']; 
    $p_street = $row['p_street'];
    $p_village = $row['p_village'];
    $p_barangay = $row ['p_barangay'];
    $p_city = $row ['p_city'];
    $p_province = $row ['p_province'];
    $p_countrynum = $row ['p_countrynum'];
    $p_contact = $row ['p_contact'];
    $p_zip = $row ['p_zip'];

    $r_house = $row ['r_house']; 
    $r_street = $row ['r_street'];
    $r_village = $row ['r_village'];
    $r_barangay = $row ['r_barangay'];
    $r_city = $row ['r_city'];
    $r_province = $row ['r_province'];
    $r_countrynum = $row ['r_countrynum'];
    $r_contact = $row ['r_contact'];
    $r_zip = $row ['r_zip'];

require_once 'vendor/autoload.php';

 use phpoffice\spreadsheet\IOFactory; //iofactory class


//load spreadsheet
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("pds.xlsx");

$employee_no=$uid;


//get family info


$get_sql = "select * from emp_family where agencyid = '$uid'";
$family_stmt = sqlsrv_query($conn, $get_sql, $params, $options);
$count_family = sqlsrv_num_rows($family_stmt);


if($count_family>0)
{
    $family_row = sqlsrv_fetch_array($family_stmt);

     $tel_no='';
     $mobile_no=63;
     $mobile_no=$p_contact;



     $email='itcharlofficial@gmail.com';

     $s_sname=$family_row['spouse_sname'];
     $s_fname=$family_row['spouse_fname'];
     $s_mname=$family_row['spouse_mname'];
     $s_contact = $family_row['spouse_contact'];
     $s_occupation=$family_row['spouse_work'];
     $s_boss=$family_row['spouse_boss'];
     $s_badd=$family_row['spouse_badd'];
     $s_bday=$family_row['spouse_bday'];

     $f_sname = $family_row['father_sname'];
     $f_fname = $family_row['father_fname'];
     $f_mname = $family_row['father_mname'];
     $f_bday = $family_row['father_bday'];

     $m_sname = $family_row['mother_sname'];
     $m_fname = $family_row['mother_fname'];
     $m_maiden = $family_row['mother_maiden'];
}







//change it
$sheet = $spreadsheet->getSheetByName('C1');
//$sheet = $spreadsheet->getActiveSheet();//
$sheet->setCellValue('D10', $surname );
$sheet->setCellValue('D11', $fname);
$sheet->setCellValue('D12', $mname);
$sheet->setCellValue('L11', $extension);
$sheet->setCellValue('D13', $dob);
$sheet->setCellValue('J13', $citizenship);
$sheet->setCellValue('D15', $pob);
$sheet->setCellValue('D16', $gender);
$sheet->setCellValue('D17', $civilstatus);
$sheet->setCellValue('D22', $height);
$sheet->setCellValue('D24', $weight);
$sheet->setCellValue('D25', $bloodtype);

$sheet->setCellValue('D27', $gsis_id);
$sheet->setCellValue('D29', $pagibig_id);
$sheet->setCellValue('D31', $philhealth_id);
$sheet->setCellValue('D32', $sss_id);
$sheet->setCellValue('D33', $tin_no);
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
$sheet->setCellValue('I34', $email_ad);

$sheet->setCellValue('D36', $s_sname);
$sheet->setCellValue('D37', $s_fname);
$sheet->setCellValue('D38', $s_mname);
$sheet->setCellValue('D39', $s_occupation);
$sheet->setCellValue('D40', $s_boss);
$sheet->setCellValue('D41', $s_badd);
$sheet->setCellValue('D42', $s_contact);

$sheet->setCellValue('D43', $f_sname);
$sheet->setCellValue('D44', $f_fname);
$sheet->setCellValue('D45', $f_mname);

$sheet->setCellValue('D47', $m_sname);
$sheet->setCellValue('D48', $m_fname);
$sheet->setCellValue('D49', $m_maiden);

$sheet = $spreadsheet->getSheetByName('C2');
$sheet->setCellValue('A5', 'test');


//get primary
$get_primary = "select * from emp_education_primary where agencyid = '$uid' and void='1' order by from_year";

$primary_stmt = sqlsrv_query($conn, $get_sql, $params, $options);
$count_primary = sqlsrv_num_rows($primary_stmt);


if($count_primary>0)
{
    $primary_row = sqlsrv_fetch_array($primary_stmt);
    $primary_from = $primary_row['from_year'];
    $primary_to = $primary_row['to_year'];
    $primary_scholar = $primary_row['scholarship'];
    $primary_grad = $primary_row['graduate'];
    $primary_units = "n/a";

    if($primary_grad=='0')
    {
        $primary_grad = '';
    }else{
        $primary_grad= $primary_to;
    }
}

 $sheet->setCellValue('D54', $primary_from);
 $sheet->setCellValue('G54', $primary_to);
 $sheet->setCellValue('J54', $primary_scholar);
 $sheet->setCellValue('K54', $primary_grad);
 $sheet->setCellValue('L54', $primary_units);
 $sheet->setCellValue('M54', $primary_grad);
 $sheet->setCellValue('N54', $primary_scholar);

// $sheet->setCellValue('D55', $s_nos);
// $sheet->setCellValue('D56', $v_nos);
// $sheet->setCellValue('D57', $c_nos);
// $sheet->setCellValue('D58', $g_nos;


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

//redirect to file and download it
echo "<meta http-equiv='refresh' content='0;url='pds.xlsx' />";
?>