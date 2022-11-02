<?php
	

if(isset($_POST['btn_save']))
{
	$uid=$_GET['uid'];
	$id=$_GET['id'];
	
	$err_count=0;

	$params = array();
	$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);

		$sql1 = "select top 1 * from emp_education_primary where agencyid='$uid' and void=1 and graduate=1 and id!='$id'";

		$dupe_stmt = sqlsrv_query($conn,$sql1,$params,$options);
		$count_result = sqlsrv_num_rows($dupe_stmt);


		

	
	if($count_result<1)
	{

		$txt_from=$_POST['txt_from'];
		$txt_to=$_POST['txt_to'];
		$txt_scholarship=$_POST['txt_scholarship'];
		$txt_school=$_POST['txt_school'];

		$radio_grad=$_POST['radio_grad'];

		 $sql = "update emp_education_primary set school=?, from_year=?, to_year=?, scholarship=?, graduate=? where id='$id'";
		 $params= array($txt_school,$txt_from,$txt_to,$txt_scholarship,$radio_grad, $id);

		 sqlsrv_query($conn,$sql,$params);

		 include "scripts/audit_emp_update_primary.php";

		 echo '<script>alert("Record Successfully Added")</script>';
	     echo "<script>window.open('emp-education-history.php?uid=".$uid."','_self')</script>";	

	}else{

		echo '<script>alert("Error: Another Entry was also marked as Graduate year")</script>';
	}


}

?>