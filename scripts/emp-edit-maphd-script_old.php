<?php
	

if(isset($_POST['btn_save']))
{


	
	$err_count=0;

	$params = array();
	$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);

	//get last file id
	$get_last_id = "select top 1 * from emp_education_maphd order by file_id desc";
	$lastid_stmt = sqlsrv_query($conn,$get_last_id,$params,$options);
	$count_result = sqlsrv_num_rows($lastid_stmt);
	// echo "tessa".$count_result;

	if($count_result>0)
	{

		$row2=sqlsrv_fetch_array($lastid_stmt);
		$new_record_version=$emp_record_version+1;
		
	}else{
		$new_file_id = '1';
	}

		


	
	if($err_count<1)
	{

	$txt_from=$_POST['txt_from'];
	$txt_to=$_POST['txt_to'];
	$txt_scholarship=$_POST['txt_scholarship'];
	$txt_school=$_POST['txt_school'];
	$txt_course=$_POST['txt_course'];
	$radio_grad=$_POST['radio_grad'];
	$txt_units=$_POST['txt_units'];

	 $sql = "insert into emp_education_maphd (agencyid,record_version,file_id,school,course,from_year,to_year,graduate,units,scholarship,void) values (?,?,?,?,?,?,?,?,?,?,?)";
	 $params= array($uid,$new_record_version,$emp_file_id,$txt_school,$txt_course,$txt_from,$txt_to,$radio_grad,$txt_units,$txt_scholarship,"1");

	 sqlsrv_query($conn,$sql,$params);
	 echo '<script>alert("Record Successfully Added")</script>';
     echo "<script>window.open('emp-education-history.php?uid=".$uid."','_self')</script>";	
	}else{

	echo '<script>alert("Error: please mark previous year as graduate year")</script>';
	}


}

?>