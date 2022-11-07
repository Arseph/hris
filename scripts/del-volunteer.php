<?php
include "connect.php";

$uid = $_GET['uid'];
$id = $_GET['id'];


	 $sql = "update emp_volunteer set void=? where id=?";
	 $params= array("0",$id);
	 sqlsrv_query($conn,$sql,$params);

	 echo '<script>alert("Record Successfully Deleted")</script>';
     echo "<script>window.open('../emp-volunteer-list.php?uid=".$uid."','_self')</script>";


?>