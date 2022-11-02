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

	//if (isset($_POST['drivers']) && isset($_POST['drivers']))
	// if(isset($_POST['drivers']) && !isset($_POST['drivers_date'])) 
	// {
	// 	$errorcount++;
	// }
	// elseif(!isset($_POST['drivers'])){
	// 	$drivers="";
	// 	$drivers_date="";
	// }else{
	// 	$drivers=$_POST['drivers'];
	// 	$drivers_date=$_POST['drivers_date'];
	// }

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


	
	if($errorcount==0)
	{
  $insert_query="insert into dbo.emp_identification (agencyid,record_version,gsis_id,pagibig_id,philhealth_id,sss_id,passport,prc,drivers,drivers_date,email_ad,tin_no) values (?,?,?,?,?,?,?,?,?,?,?)";

  $params = array("$agencyid","1","$gsis_id","$pagibig_id","$philhealth_id","$sss_id","$passport","$prc","$drivers","$drivers_date","$email_ad","$tin_no");

  $stmt = sqlsrv_query($conn, $insert_query, $params);

$update_query = "update dbo.emp_basic SET identification=? where agencyid=?";

    $update_params= array('set', $agencyid);
    
        $stmt = sqlsrv_query($conn, $update_query, $update_params);

  echo "<a href='add-family.php' class='btn btn-primary'>Continue to Add Family Information Form?</a><br><br>";
  }
}

}

?>