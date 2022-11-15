<?php
if(isset($_POST['save']))
{
$errorcount=0;

if($_POST['sel_employee']==="0")
  {
    echo "<h5>please select employee name</h5>";
  }
  else
  {
  	$agencyid=$_POST['sel_employee'];

	$email_ad = $_POST['email_ad'];

	$drivers_date =$_POST['drivers_date'];
	$drivers =$_POST['drivers'];
	

	if(($drivers_date=="")&&($drivers!="")){
		$errorcount++;
		echo "please enter drivers license issue date";
	}elseif(($drivers=="")&&($drivers_date!="")){
		$errorcount++;
		echo "please enter drivers license No.";
	}


	if (isset($_POST['gsis_id'])){
		$gsis_id = $_POST['gsis_id'];
	}
	else
	{
		$gsis_id = "";
	}

	if (isset($_POST['pagibig_id'])){
		$pagibig_id = $_POST['pagibig_id'];
	}
	else
	{
		$pagibig_id = "";
	}

	if (isset($_POST['philhealth_id'])){
		$philhealth_id = $_POST['philhealth_id'];
	}
	else
	{
		$philhealth_id = "";
	}

	if (isset($_POST['sss_id'])){
		$sss_id = $_POST['sss_id'];
	}
	else
	{
		$sss_id = "";
	}

	if (isset($_POST['tin_no'])){
		$tin_no = $_POST['tin_no'];
	}
	else
	{
		$tin_no = "";
	}

	if (isset($_POST['passport'])){
		$passport = $_POST['tin_no'];
	}
	else
	{
		$passport = "";
	}

	if (isset($_POST['prc'])){
		$prc = $_POST['tin_no'];
	}
	else
	{
		$prc = "";
	}


	//find dupe
	$dupe_checker= "select * from emp_identification where gsis_id='$gsis_id' OR pagibig_id='$pagibig_id' OR philhealth_id='$philhealth_id' OR sss_id='$sss_id' OR passport='$passport' OR prc='$prc' OR drivers='$drivers' OR email_ad='$email_ad' OR tin_no='$tin_no'";

	$params = array();
	$options = array("Scrollable"=> SQLSRV_CURSOR_KEYSET);

	$dupecheck_stmt = sqlsrv_query($conn, $dupe_checker, $params, $options);
	$total_dupe = sqlsrv_num_rows($dupecheck_stmt);


	if($total_dupe>0){
		$errorcount++;
	}

	
	if($errorcount==0)
	{
  $insert_query="insert into dbo.emp_identification (agencyid,gsis_id,pagibig_id,philhealth_id,sss_id,passport,prc,drivers,drivers_date,email_ad,tin_no) values (?,?,?,?,?,?,?,?,?,?,?)";

  $params = array("$agencyid","$gsis_id","$pagibig_id","$philhealth_id","$sss_id","$passport","$prc","$drivers","$drivers_date","$email_ad","$tin_no");

  $stmt = sqlsrv_query($conn, $insert_query, $params);

  include "audit_emp_add_identification.php";

  echo '<script>alert("Record Successfully Updated")</script>';

  	if($_SESSION['userlevel']<3)
  	{
  		echo "<script>window.open('employee-summary.php?uid=".$agencyid."','_self')</script>";
  	}else{
  		echo "<script>window.open('index.php','_self')</script>";
  	}
  
  }else{
  	echo "<script>alert('Error: Another User is Using The same I.D. Please Contact System Administrator')</script>";
  }
}

}

?>