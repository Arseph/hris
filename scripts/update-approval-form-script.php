<?php
if(isset($_POST['save'])){
	echo $uid."<br>";
	echo $file_id;

	$leave_check = "select * from leave_status where file_id='$file_id' and agencyid='$uid'";
    $stmt = sqlsrv_query( $conn, $leave_check);
   	
   	$row = sqlsrv_fetch_array($stmt);
   	$pending_check=$row['recommendation'];
   	$record_version=$row['record_version'];
   	$new_version=$record_version+1;

   	if(empty($pending_check)){
   		$action_sql = "update leave_status set recommendation=?,disapproval_reason=?,days_pay=?,days_unpay=?,others=?,others_specify=? where file_id=?";
   	}else{
   		$action_sql = "insert into leave_status (file_id,record_version,recommendation,disapproval_reason,days_pay,days_unpay,others,others_specify) values (?,?,?,?,?,?)";
   	}
   	$params = array("$recommendation","$disapproval_reason","$days_pay","$days_unpay","$others","$others_specify");


	$recommendation = $_POST['radio_action'];
	$disapproval_reason= $_POST['disapprove_details'];
	$days_pay= $_POST['withpay_days'];
	$days_unpay= $_POST['withoutpay_days'];
	$others= $_POST['others'];
	$others_specify= $_POST['others_specify'];

    $stmt = sqlsrv_query($conn, $action_sql, $params);
}
?>