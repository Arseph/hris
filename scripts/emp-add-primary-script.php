<?php
include "connect.php";

if(isset($_POST['btn_save']))
{
	$uid=$_GET['uid'];
	
	$record_version= 1;
	$count_row=0;

	$txt_from=$_POST['txt_from'];
	$txt_to=$_POST['txt_to'];
	$txt_scholarship=$_POST['txt_scholarship'];
	$txt_school=$_POST['txt_school'];

	$radio_grad=$_POST['radio_grad'];


		$find_dupe_sql = "select * from emp_education_primary where agencyid='$uid' and graduate='1' and void='1'";
		$params = array();
		$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);

		$dupe_stmt = sqlsrv_query($conn, $find_dupe_sql, $params, $options);
		$count_row = sqlsrv_num_rows($dupe_stmt);





	if($count_row==0)
	{

	 $sql = "insert into emp_education_primary (agencyid,school,from_year,to_year,scholarship,graduate,void) values (?,?,?,?,?,?,?)";
	 $params= array($uid,$txt_school,$txt_from,$txt_to,$txt_scholarship,$radio_grad,"1");

	 sqlsrv_query($conn,$sql,$params);

	 include "scripts/audit_emp_add_primary.php";

	 echo '<script>alert("Record Successfully Added")</script>';
     echo "<script>window.open('emp-education-history.php?uid=".$uid."','_self')</script>";	
	}else{

	echo '<script>alert("Error: Another Entry was already marked as graduate year")</script>';
	echo "<script>window.open('emp-education-history.php?uid=".$uid."','_self')</script>";	
	}


}

?>