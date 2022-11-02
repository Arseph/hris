<?php

include "connect.php";

$id = $_GET['id'];

	$delete_sql = "update select_position set pos_void=? where id=?";
	$params = array(0,$id);
	$del_stmt = sqlsrv_query($conn,$delete_sql,$params);

	echo '<script>alert("Record Deleted")</script>';
    echo "<script>window.open('../add-positions.php','_self')</script>";

?>