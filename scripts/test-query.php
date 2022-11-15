<?php
include "connect.php";

$sql = "select * from emp_basic";
$stmt = sqlsrv_query($conn, $sql);
$name_array=array();

while($row = sqlsrv_fetch_array($stmt)){
	$select_id = $row['agencyid'];
	$fname = $row['firstname'];
	$mname = $row['middlename'];
	$sname = utf8_decode($row['surname']);
	$suffix = $row['suffix'];

	$name_array[]= $select_id." ".$fname." ".$mname." ".$sname." ".$suffix;


}

header("COntent-Type: application/json");
echo json_encode($name_array)."<br>";
?>