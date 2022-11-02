<?php
	if(isset($_POST['btn_save']))
	{	
		// echo "hehe";
		// print_r($list_array);
		$err_msg = "Error: ";
		$err_count=0;
		$elig_type = $_POST['elig_select'];
		$new_record_version=$record_version+1;

		//get last id
		$find_dupe_sql = "select * from emp_eligibility where agencyid='$user_id' and elig_type='$elig_type'";
		$paramm = array();
        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
        $file_id_stmt = sqlsrv_query($conn,$find_dupe_sql,$paramm,$options);
        $count_file_id = sqlsrv_num_rows($file_id_stmt);
        

		if($elig_type==0)
		{
			$err_msg="please select eligibility";
			$err_count++;
		}

		if($count_file_id>0)
		{
			$err_msg = "Error: that eligiblity was already entered";
			$err_count++;
		}


		if($err_count==0)
		{
		
		
        // //insert to db
         $insert_sql = "Update emp_eligibility set elig_type=? where agencyid=? and id=?";


        $param= array($elig_type,$user_id,$id);

        sqlsrv_query($conn,$insert_sql,$param);

        echo '<script>alert("Record Successfully Updated")</script>';
		echo "<script>window.open('emp-eligibility-list.php?uid=".$row['agencyid']."','_self')</script>";
		}
		else
		{
			 echo '<script>alert("'.$err_msg.'")</script>';

		}
		
	}

?>