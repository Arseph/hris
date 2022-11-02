<?php

include "connect.php";

$id = $_GET['id'];

	$delete_sql = "update munit set div_void=? where id=?";
	$params = array(0,$id);
	$del_stmt = sqlsrv_query($conn,$delete_sql,$params);

	echo '<script>alert("Record Deleted")</script>';
    echo "<script>window.open('../add-divisions.php','_self')</script>";

?>