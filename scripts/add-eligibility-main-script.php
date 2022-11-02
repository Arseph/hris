<?php
$err_count=0;
$err_msg = "Error: ";

if(isset($_POST['btn_save']))
{
	 $sel_eligcat=$_POST['sel_eligcat'];

	 $txt_eligname=$_POST['txt_eligname'];
	 $txt_ext=$_POST['txt_ext'];

	 //validation

	 //check if selected
	 if($sel_eligcat==0)
	 {
	 	$err_count++;
	 	$err_msg.= "Please select Eligibility Category";
	 }

	 //check for duplicate name entry
	 $dupe_sql = "select * from ref_elig_main where elig_name='$txt_eligname' and void='1'";
	 $param = array();
	 $option= array("Scrollable"=> SQLSRV_CURSOR_KEYSET);	 
	 $dupe_stmt = sqlsrv_query($conn, $dupe_sql, $param, $option);
	 
	 $dupe = sqlsrv_num_rows($dupe_stmt);

	 if($dupe>0){
	 	$err_count++;

	 	if($err_count==2){
	 		$err_msg.=" and a duplicate Eligibility has been detected";	
	 	}elseif($err_count==1){
	 		$err_msg.="A duplicate Eligibility has been detected";
	 	}
	 	
	 }

	 //check for duplicate name extension
	 $dupe_sql = "select * from ref_elig_main where name_ext='$txt_ext' and void='1'";
	 $param = array();
	 $option= array("Scrollable"=> SQLSRV_CURSOR_KEYSET);	 
	 $dupe_stmt = sqlsrv_query($conn, $dupe_sql, $param, $option);
	 
	 $dupe = sqlsrv_num_rows($dupe_stmt);

	 if($dupe>0){
	 	$err_count++;

	 	if($err_count==2){
	 		$err_msg.=" and a duplicate Name Extension has been detected";	
	 	}elseif($err_count==1){
	 		$err_msg.="A duplicate Name Extension has been detected";
	 	}
	 	
	 }

	 if($err_count<1){

	     $sql = "insert into ref_elig_main (elig_name,elig_cat,name_ext,void) values (?,?,?,?)";
		 $params= array($txt_eligname,$sel_eligcat,$txt_ext,"1");
		 sqlsrv_query($conn,$sql,$params);

		 echo '<script>alert("Record Successfully Added")</script>';
	     echo "<script>window.open('eligibility-list.php','_self')</script>";
	 }else{
	 	echo '<script>alert("'.$err_msg.'")</script>';
	 }

}

?>