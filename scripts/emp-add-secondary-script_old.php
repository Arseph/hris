<?php
	

if(isset($_POST['btn_save']))
{
	$uid=$_GET['uid'];
	
	$record_version= 1;
	$err_count=0;

	$txt_from=$_POST['txt_from'];
	$txt_to=$_POST['txt_to'];
	$txt_scholarship=$_POST['txt_scholarship'];
	$txt_school=$_POST['txt_school'];

	$radio_grad=$_POST['radio_grad'];
	
	
	$paramm = array();
	$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);

	//get last file id
	$get_last_id = "select top 1 * from emp_education_secondary order by file_id desc";
	$lastid_stmt = sqlsrv_query($conn,$get_last_id,$paramm,$options);
	$count_result = sqlsrv_num_rows($lastid_stmt);

	if($count_result>0)
	{
		$row2=sqlsrv_fetch_array($lastid_stmt);
		$new_file_id = $row2['file_id']+1;
		$current_fileid = $row2['file_id'];

			//dupe graduate check
		for ($x=1; $x<=$current_fileid; $x++)
		{
			$sql1 = "select top 1 graduate from emp_education_secondary where agencyid='$uid' and file_id='$x' and void='1' order by id desc";

			$dupe_stmt = sqlsrv_query($conn,$sql1,$paramm,$options);
			$dupe_row=sqlsrv_fetch_array($dupe_stmt);
			$count_dupe = sqlsrv_num_rows($dupe_stmt);
			
			if($count_dupe>0)
			{
				$grad_check=$dupe_row['graduate'];
				
				if($grad_check=='1')
				{
					$err_count++;
				}	
			}

		}
	}else{
		$new_file_id = '1';
	}

		


	
	if($err_count<1)
	{

	 $sql = "insert into emp_education_secondary (agencyid,file_id,record_version,school,from_year,to_year,graduate,scholarship,void) values (?,?,?,?,?,?,?,?,?)";
	 $params= array($uid,$new_file_id,$record_version,$txt_school,$txt_from,$txt_to,$radio_grad,$txt_scholarship,"1");

	 sqlsrv_query($conn,$sql,$params);
	 echo '<script>alert("Record Successfully Added")</script>';
     echo "<script>window.open('emp-education-history.php?uid=".$uid."','_self')</script>";	
	}else{

	echo '<script>alert("Error: please unset previous entry as graduate year")</script>';
	}


}

?>