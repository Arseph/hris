<?php

include "connect.php";

$id = $_GET['id'];
$uid = $_GET['uid'];

	$delete_sql = "update emp_designation set void=? where id=?";
	$params = array(0,$id);
	$del_stmt = sqlsrv_query($conn,$delete_sql,$params);

	echo '<script>alert("Record Deleted")</script>';
     echo "<script>window.open('../emp-designation-history.php?uid=".$uid."','_self')</script>";

?>