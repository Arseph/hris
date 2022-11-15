<?php
include "connect.php";

if(isset($_POST['btn_save']))
{
	$uid=$_GET['uid'];
	
	$err_count=0;

	$txt_from=$_POST['txt_from'];
	$txt_to=$_POST['txt_to'];
	$txt_scholarship=$_POST['txt_scholarship'];
	$txt_school=$_POST['txt_school'];
	$txt_course=$_POST['txt_course'];
	

	$radio_grad=$_POST['radio_grad'];
	
	if($radio_grad=='0')
	{

	$txt_units=$_POST['txt_units'];

	$sql = "insert into emp_education_maphd (agencyid,school,course,from_year,to_year,graduate,units,scholarship,void) values (?,?,?,?,?,?,?,?,?)";
	 $params= array($uid,$txt_school,$txt_course,$txt_from,$txt_to,$radio_grad,$txt_units,$txt_scholarship,"1");

	}

	if($radio_grad=='1')
	{

	$txt_extension=$_POST['txt_extension'];

	$sql = "insert into emp_education_maphd (agencyid,school,course,from_year,to_year,graduate,name_ext,scholarship,void) values (?,?,?,?,?,?,?,?,?)";

	 $params= array($uid,$txt_school,$txt_course,$txt_from,$txt_to,$radio_grad,$txt_extension,$txt_scholarship,"1");

	}
	

	sqlsrv_query($conn,$sql,$params);
	 

	  include "scripts/audit_emp_add_maphd.php";

	 echo '<script>alert("Record Successfully Added")</script>';
     echo "<script>window.open('emp-education-history.php?uid=".$uid."','_self')</script>";	


}

?>