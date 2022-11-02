<?php
include "connect.php";

if(isset($_POST['btn_save']))
{

	$agencyid=$_POST['sel_employee'];
	$file_date=$_POST['dof'];  
	$leave_id=$_POST['leave_type']; //
	$inout_ph=$_POST['inout_ph'];
	$place=$_POST['place'];
	$days_applied=$_POST['days_applied'];
	$from_date=$_POST['from_date'];
	$to_date=$_POST['to_date'];
	$yesno_commutation =$_POST['yesno_commutation'];


		//update basic info

		// $sql = "update emp_leave set file_date=?, leave_id=? inout_ph=?, place=?, days_applied=?, from_date=?, to_date=?, commutation=? where id=? and agencyid=?";

		// $params = array("$file_date","$leave_id","$inout_ph","$place","$days_applied","$from_date","$to_date","$yesno_commutation","$id","$agencyid");

	$sql = "update emp_leave set leave_id=? where id=?";

	$params = array("$leave_id", "$id");

	sqlsrv_query($conn, $sql, $params);


	if($leave_id=='3')
	{

		$sick_illness = $_POST['sick_illness'];
		$yesno_hospital = $_POST['yesno_hospital'];

		$sql = "update sick_leave set inout_hospital=?, illness=? where id=? and agencyid=?";

		$params = array("$yesno_hospital","$sick_illness","$id","$agencyid");
		sqlsrv_query($conn, $sql, $params);
	}

	if($leave_id=='8')
	{

		$master_bar=$_POST['master_bar'];
		$sql = 'insert into study_leave (agencyid,master_bar) values (?,?)';
		$params = array("$agencyid","$master_bar");
		sqlsrv_query($conn, $sql, $params);
	}

		if($leave_id=='11')
	{

		$women_illness = $_POST['women_illness'];

		$sql = "insert into women_leave (agencyid,specify_illness) values (?,?)";

		$params = array("$agencyid","$women_illness");
		sqlsrv_query($conn, $sql, $params);
	}

	if($leave_id=='14')
	{

		$txt_others=$_POST['txt_others'];

		if(!isset($_POST['yesno_other'])){
			$yesno_other='';	
		}else{
			$yesno_other=$_POST['yesno_other'];
		}
		
		$sql = 'insert into other_leave (agencyid,others,monetization_terminal) values (?,?,?)';
		$params = array("$agencyid","$txt_others","$yesno_other");
		sqlsrv_query($conn, $sql, $params);
	}




	// header("Refresh:0; url=emp-update-leave.php?uid='$uid'&file_id='$file_id");
	echo '<script>alert("Record Successfully Updated")</script>';
	//header("Refresh:0; url=emp-update-leave.php?uid='$uid'&file_id='$file_id");
	// echo "<script>window.location.reload()</script>";
	//echo "<script>window.open('emp-leave-list.php','_self')</script>";

}	
?>