<?php
$err_count = 0;
$err_msg = "Error: ";

if(isset($_POST['btn_save']))
{
	 $sel_eligcat=$_POST['sel_eligcat'];
	 $txt_eligname=$_POST['txt_eligname'];
	 $txt_ext = $_POST['txt_ext'];

	 if($sel_eligcat==0){
	 	$err_count++;
	 	$err_msg.="Please Select Eligibility Category";
	 }

	 //count row variables
	 $param = array();
	 $option = array("Scrollable" => SQLSRV_CURSOR_KEYSET);


	 //find dupe eligibility name
	 $dupe_eligname_sql = "select * from ref_elig_main where void='1' and elig_name='$txt_eligname' and id!='$id'";
	 $dupe_eligname_stmt = sqlsrv_query($conn, $dupe_eligname_sql, $param, $option);
	 $dupe_eligname = sqlsrv_num_rows($dupe_eligname_stmt);

	 if($dupe_eligname>0)
	 {
	 	$err_count++;

	 	if($err_count==1)
	 	{
	 		$err_msg.="Duplicate Eligibility Name Detected";
	 	}else{
	 		$err_msg.=" ,Duplicate Eligibility Name Detected";
	 	}
	 	
	 }

	 //find dupe eligibility name
	 $dupe_ext_sql = "select * from ref_elig_main where void='1' and name_ext='$txt_ext' and id!='$id'";
	 $dupe_ext_stmt = sqlsrv_query($conn, $dupe_ext_sql, $param, $option);
	 $dupe_ext = sqlsrv_num_rows($dupe_ext_stmt);

	 if($dupe_ext>0)
	 {
	 	$err_count++;

	 	if($err_count==1)
	 	{
	 		$err_msg.="Duplicate Name Extension Detected";
	 	}else{
	 		$err_msg.=" ,Duplicate Name Extension Detected";
	 	}
	 	
	 }

	 if($err_count==0)
	 {
	 	 $update_sql = "update ref_elig_main set elig_name=?, elig_cat=?, name_ext=? where id = ?";
		 $params= array($txt_eligname,$sel_eligcat,$txt_ext,$id);
		 sqlsrv_query($conn,$update_sql,$params);

		 echo '<script>alert("Record Successfully Updated")</script>';
	     echo "<script>window.open('eligibility-list.php','_self')</script>";	
	 }elseif($err_count>0){
	 	echo '<script>alert("'.$err_msg.'")</script>';
	 }

}

?>