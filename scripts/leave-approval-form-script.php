<?php
if(isset($_POST['save']))
{

		$uid = $_GET['uid'];
		$file_id = $_GET['file_id'];
		$record_version = $_GET['record_version'];		
	
	

	$recommendation = $_POST['radio_action'];

	if($recommendation=="0"){

		$disapproval_reason= $_POST['disapprove_details'];

		$days_pay= 0;
		$days_unpay= 0;
		$others= 0;
		$others_specify= 0;

		$action_msg="Leave Request Disapproved";

	}

	if($recommendation=='1')
	{
		$disapproval_reason=0;

		$days_pay= $_POST['withpay_days'];
		$days_unpay= $_POST['withoutpay_days'];
		$others= $_POST['others'];
		$others_specify= $_POST['others_specify'];

		$action_msg="Leave Request Approved";

	}
	
		$action_sql = "update leave_status set recommendation=?,disapproval_reason=?,days_pay=?,days_unpay=?,others=?,others_specify=? where file_id=? and agencyid=?";
	
		$params = array("$recommendation","$disapproval_reason","$days_pay","$days_unpay","$others","$others_specify","$file_id","$uid");

		sqlsrv_query($conn,$action_sql,$params);
	
	
	echo '<script>alert("'.$action_msg.'")</script>';
	echo '<script>window.open("admin-leave-list.php","_self")</script>';
}
?>