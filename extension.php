<?php

include "scripts/connect.php";

$params = array();
$options = array("Scrollable"=> SQLSRV_CURSOR_KEYSET);

$get_emp_elig = "select * from emp_eligibility where agencyid = '2021-087' and void='1'";
$emp_elig_stmt = sqlsrv_query($conn, $get_emp_elig, $params, $options);
$emp_elig_count = sqlsrv_num_rows($emp_elig_stmt);



while($emp_elig_row = sqlsrv_fetch_array($emp_elig_stmt))
{

  $elig_code = $emp_elig_row['elig_type'];
  // echo $elig_code."<br>";

  $get_name_ext = "select * from ref_elig_main where id = '$elig_code'";
  $get_ext_stmt = sqlsrv_query($conn, $get_name_ext);  
  // $get_ext_count = sqlsrv_num_rows($get_ext_stmt);


  $name_ext = array();

  while($get_ext_row = sqlsrv_fetch_array($get_ext_stmt))
  {
    $name_ext[] = $get_ext_row['name_ext'];
  }


}
  
  echo $name_ext[0]



    // $name_ext = array("TEST", "MSW", "RSW");
    // $count = count($name_ext);
    // $stopper = $count-1;

    // echo $count;

    // for ($x = 0; $x <= $count; $x++) 
    // {
    //   echo $name_ext[$x];
      
    //   if($x<$stopper){
      
    //   echo ", ";
      
    //   }
    // }