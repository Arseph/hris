<?php
include "connect.php";

if(isset($_POST['btn_update']))
{
	$ext_name = $_POST['ext_name'];

	$edit_ext_sql = "update extension_list set ext_name=? where id=?";
	$params = array($ext_name,$id);
	sqlsrv_query($conn,$edit_ext_sql,$params);
	
	echo '<script>alert("Record Successfully Updated")</script>';
    echo "<script>window.open('name-extension-list.php','_self')</script>";

}

?>