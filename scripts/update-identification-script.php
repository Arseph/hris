<?php
include "connect.php";

if(isset($_POST['update_identification']))
{

  if($conn)
  {

    //error counter
    $errorcount = 0;


    $agencyid = $uid;


    if(isset($_POST['gsis_id'])) 
    {
      $gsis_id = $_POST['gsis_id'];
    }else{
       $gsis_id = "";
    }

    if(isset($_POST['pagibig_id'])) 
    {
      $pagibig_id = $_POST['pagibig_id'];
    }else{
       $pagibig_id = "";
    }

    if(isset($_POST['philhealth_id'])) 
    {
      $philhealth_id = $_POST['philhealth_id'];
    }else{
       $philhealth_id = "";
    }

    if(isset($_POST['sss_id'])) 
    {
      $sss_id = $_POST['sss_id'];
    }else{
       $sss_id = "";
    }

    if(isset($_POST['passport'])) 
    {
      $passport = $_POST['passport'];
    }else{
       $passport = "";
    }

    if(isset($_POST['prc'])) 
    {
      $prc = $_POST['prc'];
    }else{
       $prc = "";
    }

    if(isset($_POST['drivers'])) 
    {
      $drivers = $_POST['drivers'];
    }else{
       $drivers = "";
    }

    if(isset($_POST['drivers_date'])) 
    {
      $drivers_date = $_POST['drivers_date'];
    }else{
       $drivers_date = "";
    }

    if(isset($_POST['email_ad'])) 
    {
      $email_ad = $_POST['email_ad'];
    }else{
       $email_ad = "";
    }

    if(isset($_POST['tin_no'])) 
    {
      $tin_no = $_POST['tin_no'];
    }else{
       $tin_no = "";
    }

    $query="update emp_identification set gsis_id=?,pagibig_id=?,philhealth_id=?,sss_id=?,passport=?,prc=?,drivers=?,drivers_date=?,email_ad=?,tin_no=? where agencyid='$uid'";

    $params= array($gsis_id, $pagibig_id, $philhealth_id, $sss_id,$passport,$prc,$drivers,$drivers_date,$email_ad, $tin_no, $uid);

    $s_go = sqlsrv_query($conn, $query, $params);

        // echo "<span style='color: green;'><b>Record Successfully updated!</b></span><br><br>";

    include "scripts/audit_emp_update_identification.php";

    echo '<script>alert("Record Successfully Updated")</script>';
    echo "<script>window.open('index.php','_self')</script>";
    
        
  }
}
?>