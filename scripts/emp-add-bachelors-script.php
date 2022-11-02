<?php
	

if(isset($_POST['btn_save']))
{
	$uid=$_GET['uid'];
	
	$err_count=0;

	$txt_from=$_POST['txt_from'];
	$txt_to=$_POST['txt_to'];
	$txt_scholarship=$_POST['txt_scholarship'];
	$txt_school=$_POST['txt_school'];
	$txt_course=$_POST['txt_course'];
	$txt_units=$_POST['txt_units'];

	$radio_grad=$_POST['radio_grad'];
	
	// if($radio_grad=='1')
	// {
	// 	$params = array();
	// 	$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);

	// 	//get last file id
	// 	$get_dupe = "select * from emp_education_bachelors where agencyid='$uid' and graduate='1' and void='1'";
	// 	$lastid_stmt = sqlsrv_query($conn,$get_dupe,$params,$options);
	// 	$count_result = sqlsrv_num_rows($lastid_stmt);

	// 	if($count_result>0)
	// 	{
	// 		$err_count++;
	// 	}
	// }
	
	
	
	if($err_count<1)
	{

	 $sql = "insert into emp_education_bachelors (agencyid,school,course,from_year,to_year,graduate,units,scholarship,void) values (?,?,?,?,?,?,?,?,?)";
	 $params= array($uid,$txt_school,$txt_course,$txt_from,$txt_to,$radio_grad,$txt_units,$txt_scholarship,"1");

	 sqlsrv_query($conn,$sql,$params);

	 include "scripts/audit_emp_add_bachelors.php";


	 echo '<script>alert("Record Successfully Added")</script>';
     echo "<script>window.open('emp-education-history.php?uid=".$uid."','_self')</script>";	
	}else{

	echo '<script>alert("Error: A previous Entry was Already marked as Graduate Year")</script>';
	}


}

?>