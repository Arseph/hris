<?php

include "connect.php";

$edu_lvl = $_GET['edu_lvl'];
$uid = $_GET['uid'];
$id = $_GET['id'];


//bachelor's education delete button
if($edu_lvl=='maphd')
{
	$delete_sql = "update emp_education_maphd set void=? where agencyid=? and id=?";
	$params = array(0,$uid,$id);
	$del_stmt = sqlsrv_query($conn,$delete_sql,$params);

	 echo '<script>alert("Record Deleted")</script>';
     echo "<script>window.open('../emp-education-history.php?uid=".$uid."','_self')</script>";
}


//bachelor's education delete button
if($edu_lvl=='bachelors')
{
	$delete_sql = "update emp_education_bachelors set void=? where agencyid=? and id=?";
	$params = array(0,$uid,$id);
	$del_stmt = sqlsrv_query($conn,$delete_sql,$params);

	 echo '<script>alert("Record Deleted")</script>';
     echo "<script>window.open('../emp-education-history.php?uid=".$uid."','_self')</script>";
}

//secondary education delete button
if($edu_lvl=='secondary')
{
	$delete_sql = "update emp_education_secondary set void=? where agencyid=? and id=?";
	$params = array(0,$uid,$id);
	$del_stmt = sqlsrv_query($conn,$delete_sql,$params);

	 echo '<script>alert("Record Deleted")</script>';
     echo "<script>window.open('../emp-education-history.php?uid=".$uid."','_self')</script>";
}

//primary education delete button
if($edu_lvl=='primary')
{
	$delete_sql = "update emp_education_primary set void=? where agencyid=? and id=?";
	$params = array(0,$uid,$id);
	$del_stmt = sqlsrv_query($conn,$delete_sql,$params);

	 echo '<script>alert("Record Deleted")</script>';
     echo "<script>window.open('../emp-education-history.php?uid=".$uid."','_self')</script>";
}

?>