<?php
	if(isset($_POST['btn_save']))
	{	
		$err_msg = "Error: ";
		$uid = $_GET['uid'];
		$err_count=0;
		$elig_type = $_POST['elig_select'];

		if(isset($_POST['txt_rating'])){
			$txt_rating = $_POST['txt_rating'];
		}else{
			$txt_rating = "";
		}

		$date_start=$_POST['date_start'];

		$place_start=$_POST['txt_place'];

		if(isset($_POST['txt_license'])){
			$txt_license = $_POST['txt_license'];
		}else{
			$txt_license = "";
		}

		if(isset($_POST['date_valid'])){
			$date_valid = $_POST['date_valid'];
		}else{
			$date_valid = "";
		}

		//find dupe
		$find_dupe_sql = "select * from emp_eligibility where agencyid='$uid' and elig_type='$elig_type' and void='1'";
		$paramm = array();
        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
        $file_id_stmt = sqlsrv_query($conn,$find_dupe_sql,$paramm,$options);
        $count_file_id = sqlsrv_num_rows($file_id_stmt);
        

        if($count_file_id>0)
        {
        	$err_count++;
			$err_msg="Duplicate Eligibility Entry Detected";
        }
		

		if($elig_type==0)
		{
			$err_count++;
			$err_msg="please select eligibility";
		}



		if($err_count==0)
		{
		
		
        // //insert to db
        $insert_sql = "insert into emp_eligibility (agencyid,elig_type,rating,date_start,place_start,license_no,valid_date,void) values (?,?,?,?,?,?,?,?)";

        $param= array($uid,$elig_type,$txt_rating,$date_start,$place_start,$txt_license,$date_valid,"1");

        sqlsrv_query($conn,$insert_sql,$param);

        include "scripts/audit_emp_add_eligibility.php";

        echo '<script>alert("Record Successfully Added")</script>';
		echo "<script>window.open('emp-eligibility-list.php?uid=".$uid."','_self')</script>";
		}
		else
		{
			 echo '<script>alert("'.$err_msg.'")</script>';

		}
		
	}

?>