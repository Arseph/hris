<?php

if(isset($_POST['update_active']))
{
	$new_status = $_POST['active_status'];

	$update_status = "update HR_INFO set active=? where agencyid=?";
	$status_param = array($new_status, $uid);
	$update_stmt = sqlsrv_query($conn, $update_status, $status_param);
	
	echo '<script>alert("Record Successfully Updated")</script>';
    
    echo "<script>window.open('employee-summary.php?uid=".$uid."','_self')</script>";


}

?>