<?php
	

if(isset($_POST['btn_save']))
{
	$uid=$_GET['uid'];
	$emp_record_version=$_GET['record_version'];
	$emp_file_id=$_GET['file_id'];
	
	$err_count=0;

	$params = array();
	$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);

	//get last file id
	$get_last_id = "select top 1 * from emp_education_secondary order by file_id desc";
	$lastid_stmt = sqlsrv_query($conn,$get_last_id,$params,$options);
	$count_result = sqlsrv_num_rows($lastid_stmt);

	if($count_result>0)
	{
		$row2=sqlsrv_fetch_array($lastid_stmt);
		$new_record_version=$emp_record_version+1;


			//dupe graduate check
		for ($x=1; $x<=$emp_file_id; $x++)
		{
			$sql1 = "select top 1 * from emp_education_secondary where agencyid='$uid' and file_id='$x' and void='1' order by id desc";

			$dupe_stmt = sqlsrv_query($conn,$sql1);

			$dupe_row=sqlsrv_fetch_array($dupe_stmt);

			$grad_check=$dupe_row['graduate'];
			$file_id_check=$dupe_row['file_id'];
			$record_version_check=$dupe_row['record_version'];

			// echo "graduate check: ".$grad_check."<br>";
			// echo "file id: ".$file_id_check."<br>";
			// echo "record version: ".$record_version_check;

			if(($grad_check=='1')&&($emp_file_id!=$file_id_check)&&($emp_record_version!=$record_version_check))
			{
				$err_count++;
			}

		}
	}else{
		$new_file_id = '1';
	}

		


	
	if($err_count<1)
	{

	$txt_from=$_POST['txt_from'];
	$txt_to=$_POST['txt_to'];
	$txt_scholarship=$_POST['txt_scholarship'];
	$txt_school=$_POST['txt_school'];

	$radio_grad=$_POST['radio_grad'];

	 $sql = "insert into emp_education_secondary (agencyid,file_id,record_version,school,from_year,to_year,graduate,scholarship,void) values (?,?,?,?,?,?,?,?)";
	 $params= array($uid,$emp_file_id,$new_record_version,$txt_school,$txt_from,$txt_to,$radio_grad,$txt_scholarship,"1");

	 sqlsrv_query($conn,$sql,$params);
	 echo '<script>alert("Record Successfully Added")</script>';
     echo "<script>window.open('emp-education-history.php?uid=".$uid."','_self')</script>";	
	}else{

	echo '<script>alert("Error: please mark previous year as graduate year")</script>';
	}


}

?>