<?php

include "connect.php";

$id = $_GET['id'];
$uid = $_GET['uid'];

	$delete_sql = "update emp_eligibility set void=? where id=? and agencyid=?";
	$params = array(0,$id,$uid);
	$del_stmt = sqlsrv_query($conn,$delete_sql,$params);

	echo '<script>alert("Record Deleted")</script>';
     echo "<script>window.open('../emp-eligibility-list.php?uid=".$uid."','_self')</script>";

?>