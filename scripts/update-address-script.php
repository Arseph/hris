<?php
include "connect.php";

if(isset($_POST['update_address']))
{

  if($conn)
  {

    //error counter
    $errorcount = 0;

    $p_house = $_POST['p_house']; 
    $p_street = $_POST['p_street'];
    $p_village = $_POST['p_village'];
    $p_barangay = $_POST['p_barangay'];
    $p_city = $_POST['p_city'];
    $p_countrynum = $_POST['p_countrynum'];
    $p_contact = $_POST['p_contact'];
    $p_zip = $_POST['p_zip'];

    if(isset($_POST['p_province'])) 
    {
      $p_province = $_POST['p_province'];
    }else{
       $p_province = "";
    }

    $r_house = $_POST['r_house']; 
    $r_street = $_POST['r_street'];
    $r_village = $_POST['r_village'];
    $r_barangay = $_POST['r_barangay'];
    $r_city = $_POST['r_city'];
    $r_countrynum = $_POST['r_countrynum'];
    $r_contact = $_POST['r_contact'];
    $r_zip = $_POST['r_zip'];

    if(isset($_POST['r_province'])) 
    {
      $r_province = $_POST['r_province'];
    }else{
       $r_province = "";
    }

    $query="update emp_address set p_house=?, p_street=?, p_village=?, p_barangay=?, p_city=?, p_province=?, p_countrynum=?, p_contact=?, r_house=?, r_street=?, r_village=?, r_barangay=?, r_city=?, r_province=?, r_countrynum=?, r_contact=?, r_zip=?, p_zip=?  where agencyid=?";
    
    $params= array($p_house, $p_street, $p_village, $p_barangay, $p_city, $p_province, $p_countrynum, $p_contact, $r_house,$r_street,$r_village,$r_barangay,$r_city,$r_province, $r_countrynum, $r_contact, $r_zip, $p_zip, $uid);


    $stmt = sqlsrv_query($conn, $query, $params);

    include "scripts/audit_emp_update_address.php";

    echo '<script>alert("Record Successfully Updated")</script>';

            if($_SESSION['userlevel'] == 3 )
            {
              echo "<script>window.open('index.php','_self')</script>";
            }
            
            if(($_SESSION['userlevel']==1)||($_SESSION['userlevel']==2))
            {
              echo "<script>window.open('employee-summary.php?uid=".$uid."','_self')</script>";
            }
    
        
  }
}
?>