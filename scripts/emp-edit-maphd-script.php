<?php
	

if(isset($_POST['btn_save']))
{
	
	$txt_from=$_POST['txt_from'];
	$txt_to=$_POST['txt_to'];
	$txt_scholarship=$_POST['txt_scholarship'];
	$txt_school=$_POST['txt_school'];
	$txt_course=$_POST['txt_course'];
	$radio_grad=$_POST['radio_grad'];
	
	if($radio_grad=='0')
	{
		$txt_extension = NULL;
		$txt_units=$_POST['txt_units'];	
	}
	
	if($radio_grad=='1')
	{
		$txt_extension = $_POST['txt_extension'];
		$txt_units= NULL;	
	}
	


	 $sql = "update emp_education_maphd set school=?,course=?,from_year=?,to_year=?,graduate=?,units=?,name_ext=?,scholarship=?,void=? where id=?";
	 $params= array($txt_school,$txt_course,$txt_from,$txt_to,$radio_grad,$txt_units,$txt_extension,$txt_scholarship,"1",$id);

	 sqlsrv_query($conn,$sql,$params);

	  include "scripts/audit_emp_update_maphd.php";

	 echo '<script>alert("Record Successfully Updated")</script>';
     echo "<script>window.open('emp-education-history.php?uid=".$uid."','_self')</script>";	
}




?>