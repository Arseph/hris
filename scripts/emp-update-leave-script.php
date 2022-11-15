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
	$commutation =$_POST['yesno_commutation'];


	$sql = "update emp_leave set file_date=?, leave_type=?, inout_ph=?, place=?, days_applied=?, from_date=?, to_date=?, commutation=? where id=?";

	$params = array("$file_date", "$leave_id", "$inout_ph", "$place", "$days_applied","$from_date","$to_date", "$commutation", "$id");

	sqlsrv_query($conn, $sql, $params);


	if($leave_id=='3')
	{

		$sick_illness = $_POST['sick_illness'];
		$yesno_hospital = $_POST['yesno_hospital'];

		$sql = "update sick_leave set f_key=?, leave_idinout_hospital=?, illness=? where file_id=?";

		$params = array("$yesno_hospital","$sick_illness","$id");
		sqlsrv_query($conn, $sql, $params);
	}

	if($leave_id=='8')
	{

		$master_bar=$_POST['master_bar'];
		$sql = 'update study_leave set master_bar=? where file_id = ?';
		$params = array("$master_bar","$id");
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
		

		$sql = 'update other_leave set others=?, monetization_terminal=? where file_id=?';
		$params = array("$txt_others","$yesno_other",$id);
		sqlsrv_query($conn, $sql, $params);
	}




	// header("Refresh:0; url=emp-update-leave.php?uid='$uid'&file_id='$file_id");
	echo '<script>alert("Record Successfully Updated")</script>';
	//header("Refresh:0; url=emp-update-leave.php?uid='$uid'&file_id='$file_id");
	// echo "<script>window.location.reload()</script>";
	//echo "<script>window.open('emp-leave-list.php','_self')</script>";

}	
?>