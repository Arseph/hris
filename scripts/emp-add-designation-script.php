<?php
	if(isset($_POST['btn_save']))
	{	
		$err_msg = "please select ";
		$err_count=0;
		$uid = $_GET['uid'];
		$to_preset_err = 0;

		$entry_date= $_POST['entry_date'];
		
		// $txt_salary= $_POST['txt_salary'];



		if($_POST['radio_active']=='0')
		{
			$date_to = $_POST['date_to'];
			
		}else{
			$date_to = "To Present";
		}
		

		//find dupe
		if($date_to == "To Present")
		{
	       
	    	$sql = "select * from emp_designation where agencyid='$uid' and exit_date='To Present'";

	        $stmt = sqlsrv_query($conn, $sql);

	        $row=sqlsrv_fetch_array($stmt);
	       	
	       	if($row['exit_date']=="To Present")
	        {
	    	  $to_preset_err++;
	     	}
	    }
		
		//check if doh or non-doh
		if($_POST['radio_doh']=='1')
		{

					//find salary from list if permanent
					$radio_status= $_POST['doh_radio_status'];
					if($radio_status=='1')
					{
						$select_position = $_POST['select_position_perm'];
						$find_salary = "select * from select_position where pos_code='$select_position'";
						$salary_stmt = sqlsrv_query($conn,$find_salary);
						$salary_row = sqlsrv_fetch_array($salary_stmt);
						$txt_salary = $salary_row['basic_salary'];
					}

			if($_POST['select_mstation']=='0')
			{
				$err_msg.='mother station';
				$err_count++;
			}

			if($_POST['select_dstation']=='0')
			{
				if($err_count>0){
					$err_msg.=', designated station';
				}else{
					$err_msg.='designated station';
				}
				$err_count++;
			}


			//recheck this
			if($_POST['select_position']=='0')
			{
				if($err_count>0)
				{
					$err_msg.=', Position';
				}else{
					$err_msg.='Position';
				}
				$err_count++;
			}

			//////////// recheck this
			if(($err_count==0)&&($to_preset_err==0))
			{
			
			$select_mstation= $_POST['select_mstation'];
			$select_dstation= $_POST['select_dstation'];
			// $select_position= $_POST['select_position'];
			
			


	        // //insert to db
	        $insert_sql = "update emp_designation set doh12=?,mother_station=?,designated_station=?,entry_date=?,exit_date=?,position=?,status=?,salary=? where agencyid=?";

	        $param= array("1",$select_mstation,$select_dstation,$entry_date,$date_to,$select_position,$radio_status,$txt_salary,$uid);

	        sqlsrv_query($conn,$insert_sql,$param);

	        echo '<script>alert("Record Successfully Added")</script>';
			echo "<script>window.open('emp-designation-history.php?uid=".$row['agencyid']."','_self')</script>";
			}
			else
			{
				if($err_count!=0){
					echo "<b style='color:red;'>".$err_msg."</b>";
				}

				if($to_preset_err!=0){
	         	echo "<br><b style='color:red;'>Error: Another Record was also set to TO PRESENT </b>";
	         	}
			}
		}elseif($_POST['radio_doh']=='0')
		{
		
			$radio_status= $_POST['nondoh_radio_status'];
		
			if($to_preset_err==0)
			{
			$txt_nondoh_designation = $_POST['txt_nondoh_designation'];
			$txt_nondoh_position = $_POST['txt_nondoh_position'];

			// //insert to db
	        $insert_sql = "update emp_designation set doh12,mother_station,designated_station,entry_date,exit_date,position,status,salary where agencyid=?";

	        $param= array($_GET['uid'],$file_id,$record_version,"0",$txt_nondoh_designation,$txt_nondoh_designation,$entry_date,$date_to,$txt_nondoh_position,$radio_status,$txt_salary);

	        sqlsrv_query($conn,$insert_sql,$param);

	        echo '<script>alert("Record Successfully Added")</script>';
			echo "<script>window.open('emp-designation-history.php?uid=".$row['agencyid']."','_self')</script>";
			}
			else
			{
			echo "<br><b style='color:red;'>Error: Another Record was also set to TO PRESENT </b>";
			}
			

		}
		
	}

?>