<?php
include "connect.php";

if(isset($_POST['btn_save']))
{
	$agencyid=$_POST['sel_employee'];
	$dof=$_POST['dof'];
	$leave_id=$_POST['leave_type'];
	$inout_ph=$_POST['inout_ph'];
	$place=$_POST['place'];
	$days_applied=$_POST['days_applied'];
	$from_date=$_POST['from_date'];
	$to_date=$_POST['to_date'];
	$yesno_commutation =$_POST['yesno_commutation'];

		//base info leave
		$empleave_sql = 'insert into emp_leave (agencyid,file_date,leave_type,inout_ph,place,days_applied,from_date,to_date,commutation) values (?,?,?,?,?,?,?,?,?)';

		$params = array("$agencyid","$dof","$leave_id","$inout_ph","$place","$days_applied","$from_date","$to_date","$yesno_commutation");

		sqlsrv_query($conn, $empleave_sql, $params);


		//get last entry id
		$getid_sql = "select TOP 1 id from emp_leave order by id desc";
		$getid_stmt = sqlsrv_query($conn, $getid_sql);

		$id_row = sqlsrv_fetch_array($getid_stmt);
		$empleave_id = $id_row['id'];


		//pending admin leave status
		$sql = 'insert into leave_status (file_id,agencyid,recommendation,disapproval_reason,days_pay,days_unpay,others,others_specify) values (?,?,?,?,?,?,?,?)';

		$params = array("$empleave_id","$agencyid","2","0","0","0","0","0");

		sqlsrv_query($conn, $sql, $params);


		


	if($leave_id=='3')
	{

		$sick_illness = $_POST['sick_illness'];
		$yesno_hospital = $_POST['yesno_hospital'];

		$sql = "insert into sick_leave (leave_id,agencyid,inout_hospital,illness) values (?,?,?,?)";

		$params = array("$empleave_id","$agencyid","$yesno_hospital","$sick_illness");
		sqlsrv_query($conn, $sql, $params);
	}

	if($leave_id=='8')
	{

		$master_bar=$_POST['master_bar'];
		$sql = 'insert into study_leave (file_id,agencyid,master_bar) values (?,?,?)';
		$params = array("$empleave_id","$agencyid","$master_bar");
		sqlsrv_query($conn, $sql, $params);
	}

	if($leave_id=='11')
	{

		$women_illness = $_POST['women_illness'];

		$sql = "insert into women_leave (file_id,agencyid,specify_illness) values (?,?,?)";

		$params = array("$empleave_id","$agencyid","$women_illness");
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
		
		$sql = 'insert into other_leave (file_id,agencyid,others,monetization_terminal) values (?,?,?,?)';
		$params = array("$empleave_id","$agencyid","$txt_others","$yesno_other");
		sqlsrv_query($conn, $sql, $params);
	}

	echo '<script>alert("Record Successfully Saved")</script>';
    echo "<script>window.open('emp-leave-list.php','_self')</script>";

		

}
?>