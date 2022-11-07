<?php
include "connect.php";
  if(isset($_POST['basicsave']))
  {

    if($conn)
    {

    $agencyid = $_GET['uid'];
    $id = $_GET['id'];

    //error counter
    $org_name=$_POST['txt_name'];
    $from_date=$_POST['from_date'];
    $to_date=$_POST['to_date'];
    $hour_num=$_POST['hours'];
    $position=$_POST['txt_position'];



    $query="update emp_volunteer set org_name=?, from_date=?, to_date=?, hour_num=?, position=? where id=?";
    
    $params= array("$org_name","$from_date","$to_date","$hour_num","$position","$id");

    $stmt = sqlsrv_query($conn, $query, $params);    

    include "scripts/audit_emp_update_volunteer.php";

    echo '<script>alert("Record Successfully Updated")</script>';

    echo "<script>window.open('emp-volunteer-list.php?uid=".$uid."','_self')</script>";
         
    }
  }

?>