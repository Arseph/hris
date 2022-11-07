<?php
include "connect.php";
  if(isset($_POST['basicsave']))
  {

    if($conn)
    {

    $agencyid = $_GET['uid'];

    //error counter
    $org_name=$_POST['txt_name'];
    $from_date=$_POST['from_date'];
    $to_date=$_POST['to_date'];
    $hour_num=$_POST['hours'];
    $position=$_POST['txt_position'];


    $query="insert into dbo.emp_volunteer (agencyid,org_name,from_date,to_date,hour_num,position,void) values (?,?,?,?,?,?,?)";
    
    $params= array("$agencyid","$org_name","$from_date","$to_date","$hour_num","$position","1");

    $stmt = sqlsrv_query($conn, $query, $params);    

    include "scripts/audit_emp_add_volunteer.php";

    echo '<script>alert("Record Successfully Added")</script>';

    echo "<script>window.open('emp-volunteer-list.php?uid=".$uid."','_self')</script>";
         
    }
  }

?>