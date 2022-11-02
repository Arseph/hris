<?php

include "connect.php";

$id = $_GET['id'];

	$delete_sql = "update extension_list set void=? where id=?";
	$params = array(0,$id);
	$del_stmt = sqlsrv_query($conn,$delete_sql,$params);

	echo '<script>alert("Record Deleted")</script>';
    echo "<script>window.open('../name-extension-list.php','_self')</script>";

?>