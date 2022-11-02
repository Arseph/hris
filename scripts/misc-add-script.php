<?php 
include "connection_script.php";


// image validation: size, file type, empty.
if(isset($_POST["miscsave"])) 
{
  $agencyid = $_POST['sel_employee'];
  $skills = $_POST['txthobby'];
  $assoc = $_POST['txtassoc'];
  $narec = $_POST['txtnarec'];
  $reference = $_POST['txtreference'];
  $errorcount = 0;


  if (isset($_POST['checkbox1-1'])){
    $checkbox1 = "third degree";
  }else{
    $checkbox1 = "no";
  }

  if (isset($_POST['checkbox1-2'])){
    $checkbox2nd = "third degree";
  }else{
    $checkbox2nd = "no";
  }

  $details1 = $_POST['details1'];

  if (isset($_POST['checkbox2'])){
    $checkbox2 = "yes";
  }else{
    $checkbox2 = "no";
  }

  $details2 = $_POST['details2'];


  if (isset($_POST['checkbox3'])){
    $checkbox3 = "yes";
  }else{
    $checkbox3 = "no";
  }

  $details3 = $_POST['details3'];



  if (isset($_POST['checkbox4'])){
    $checkbox4 = "yes";
  }else{
    $checkbox4 = "no";
  }

  $details4 = $_POST['details4'];



  if (isset($_POST['checkbox5'])){
    $checkbox5 = "yes";
  }else{
    $checkbox5 = "no";
  }

  $details5 = $_POST['details2'];



  if (isset($_POST['checkbox6'])){
    $checkbox6 = "yes";
  }else{
    $checkbox6 = "no";
  }

  $details6 = $_POST['details6'];



  if (isset($_POST['checkbox7'])){
    $checkbox7 = "yes";
  }else{
    $checkbox7 = "no";
  }

  $details7 = $_POST['details7'];


  if (isset($_POST['checkbox8'])){
    $checkbox8 = "yes";
  }else{
    $checkbox8 = "no";
  }

  $details8 = $_POST['details8'];


  if (isset($_POST['checkbox9'])){
    $checkbox9 = "yes";
  }else{
    $checkbox9 = "no";
  }

  $details9= $_POST['details9'];


  if (isset($_POST['checkbox10'])){
    $checkbox10 = "yes";
  }else{
    $checkbox10 = "no";
  }

  $details10 = $_POST['details10'];

  if (isset($_POST['checkbox11'])){
    $checkbox11 = "yes";
  }else{
    $checkbox11 = "no";
  }

  $details11 = $_POST['details11'];

  $passport_id= $_POST['passport_id'];
  $passport_date= $_POST['passport_date'];
  $gsis_id= $_POST['gsis_id'];
  $gsis_date= $_POST['gsis_date'];
  $sss_id= $_POST['sss_id'];
  $sss_date= $_POST['sss_date'];
  $prc_id= $_POST['prc_id'];
  $prc_date= $_POST['prc_date'];
  $drivers_id= $_POST['drivers_id'];
  $drivers_date= $_POST['drivers_date'];


  if($agencyid==0)
  {
    $errorcount++;
    echo "<br><h4><p style='color:red';>Error: Please Select Employee</p></h4><br>";
  }

    if ($errorcount==0)
    {
      $miscinfo_add_sql = "INSERT INTO employee_other_info(agencyid, skills, na_recognition, assoc_membership, referrence, Q1, Q1_details, Q2, Q2_details, Q3, Q3_details, Q4, Q4_details, Q5, Q5_details, Q6, Q6_details, Q7, Q7_details, Q8, Q8_details, Q9, Q9_details, Q10, Q10_details, Q11, Q11_details, passport_id, passport_date, gsis_id, gsis_date, sss_id, sss_date, prc_id, prc_date, drivers_id, drivers_date) VALUES('$agencyid', '$skills', '$assoc', '$narec', '$reference', '$checkbox1', '$details1', '$checkbox2', '$details2', '$checkbox3', '$details3', '$checkbox4', '$details4', '$checkbox5', '$details5', '$checkbox6', '$details6', '$checkbox7', '$details7', '$checkbox8', '$details8', '$checkbox9', '$details9', '$checkbox10', '$details10', '$checkbox11', '$details11', '$passport_id', '$passport_date', '$gsis_id', '$gsis_date', '$sss_id', '$sss_date', '$prc_id', '$prc_date', '$drivers_id', '$drivers_date')";

       $miscinfo_add =mysqli_query($conn, $miscinfo_add_sql);

       $update_basic_sql = "UPDATE employee_basic SET misc_info='linked' WHERE agencyid='$agencyid'";

       $basicinfo_update =mysqli_query($conn, $update_basic_sql);

  }

}



?>