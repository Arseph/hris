<?php
	if(isset($_POST['btn_save']))
	{	
		// $err_msg = "please select ";
		// $err_count=0;
		// $id = $_GET['uid'];
		// $to_preset_err = 0;
		// $record_version='1';
		// $entry_date= $_POST['entry_date'];
		// $radio_status= $_POST['radio_status'];

		
		// if($_POST['radio_active']=='0')
		// {
		// 	$date_to = $_POST['date_to'];
			
		// }else{
		// 	$date_to = "To Present";
		// }

		// //get last id
		// $find_dupe_sql = "select top 1 * from emp_designation where agencyid='$id' order by file_id desc";
		// $paramm = array();
        // $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
        // $file_id_stmt = sqlsrv_query($conn,$find_dupe_sql,$paramm,$options);
        // $count_file_id = sqlsrv_num_rows($file_id_stmt);
        // $dupe_row=sqlsrv_fetch_array($file_id_stmt);

		// if(!empty($dupe_row['file_id']))
		// {
		// 	$file_id=$dupe_row['file_id']+1;	
		// }else{
		// 	$file_id='1';
		// }
		

		// //find dupe
		// if($date_to == "To Present")
		// {
	    //     if(!empty($dupe_row['file_id']))
	    //     {
	    //     $total_fileid=$dupe_row['file_id'];

	    //        for ($x = 1; $x <= $total_fileid; $x++) 
	    //        {
	    //        		$sql = "select * from emp_designation where agencyid='$id' and file_id='$x' order by record_version desc";

	    //                   $stmt = sqlsrv_query($conn, $sql);

	    //                   $row=sqlsrv_fetch_array($stmt);
	    //                   if($row['exit_date']=="To Present")
	    //                   {
	    //                   	$to_preset_err++;
	    //                   }
	    //        }
	    //      }
		// }
		
		// //check if doh or non-doh
		// if($_POST['radio_doh']=='1')
		// {
		// 	$doh_radio_status=$_POST['doh_radio_status'];
		// 	$mstation=$_POST['select_mstation'];
		// 	$dstation=$_POST['select_dstation'];
		// 	$select_position=$_POST['select_position'];

		// 	//validation
		// 	if($mstation=='0')
		// 	{
		// 		$err_msg.='mother station';
		// 		$err_count++;
		// 	}

		// 	if($dstation=='0')
		// 	{
		// 		if($err_count>0){
		// 			$err_msg.=', designated station';
		// 		}else{
		// 			$err_msg.='designated station';
		// 		}
		// 		$err_count++;
		// 	}

		// 	if($select_position=='0')
		// 	{
		// 		if($err_count>0)
		// 		{
		// 			$err_msg.=', Position';
		// 		}else{
		// 			$err_msg.='Position';
		// 		}
		// 		$err_count++;
		// 	}

		// 	if($doh_radio_status=='0')
		// 	{
		// 		if($err_count>0)
		// 		{
		// 			$err_msg.=', Position';
		// 		}else{
		// 			$err_msg.='Position';
		// 		}
		// 		$err_count++;
		// 	}

		// 	if(($err_count==0)&&($to_preset_err==0))
		// 	{
		// 		if($doh_radio_status=='1')
		// 		{

		// 		//find salary from permanent positions list
		// 		$find_permsal = "select * from select_position where pos_code='$select_position'";
		// 		$permsal_stmt = sqlsrv_query($conn,$find_permsal);
		// 		$permsal_row = sqlsrv_fetch_array($permsal_stmt);

		// 		$perm_salary = $permsal_row['basic_salary'];

		// 		$insert_sql = "insert into emp_designation (agencyid,file_id,record_version,doh12,mother_station,designated_station,entry_date,exit_date,position,status,salary) values (?,?,?,?,?,?,?,?,?,?,?)";

	    //     	$param= array($_GET['uid'],$file_id,$record_version,"1",$mstation,$dstation,$entry_date,$date_to,$select_position,$doh_radio_status,$perm_salary);

	    //     	sqlsrv_query($conn,$insert_sql,$param);
	    //     	}
	    //     }

		// }

				echo "tessa";
		

	    //     // //insert to db
	    //     $insert_sql = "insert into emp_designation (agencyid,file_id,record_version,doh12,mother_station,designated_station,entry_date,exit_date,position,status,salary) values (?,?,?,?,?,?,?,?,?,?,?)";

	    //     $param= array($_GET['uid'],$file_id,$record_version,"1",$select_mstation,$select_dstation,$entry_date,$date_to,$select_position,$radio_status,$txt_salary);

	    //     sqlsrv_query($conn,$insert_sql,$param);

	    //     echo '<script>alert("Record Successfully Added")</script>';
		// 	echo "<script>window.open('emp-designation-history.php?uid=".$row['agencyid']."','_self')</script>";
		// }
		// else
		// 	{
		// 		if($err_count!=0){
		// 			echo "<b style='color:red;'>".$err_msg."</b>";
		// 		}

		// 		if($to_preset_err!=0){
	    //      	echo "<br><b style='color:red;'>Error: Another Record was also set to TO PRESENT </b>";
	    //      	}
		// 	}
		// }elseif($_POST['radio_doh']=='0')
		// {
		// 	if($to_preset_err==0)
		// 	{
		// 	$txt_nondoh_designation = $_POST['txt_nondoh_designation'];
		// 	$txt_nondoh_position = $_POST['txt_nondoh_position'];

		// 	// //insert to db
	    //     $insert_sql = "insert into emp_designation (agencyid,file_id,record_version,doh12,mother_station,designated_station,entry_date,exit_date,position,status,salary) values (?,?,?,?,?,?,?,?,?,?,?)";

	    //     $param= array($_GET['uid'],$file_id,$record_version,"0",$txt_nondoh_designation,$txt_nondoh_designation,$entry_date,$date_to,$txt_nondoh_position,$radio_status,$txt_salary);

	    //     sqlsrv_query($conn,$insert_sql,$param);

	    //     echo '<script>alert("Record Successfully Added")</script>';
		// 	echo "<script>window.open('emp-designation-history.php?uid=".$row['agencyid']."','_self')</script>";
		// 	}
		// 	else
		// 	{
		// 	echo "<br><b style='color:red;'>Error: Another Record was also set to TO PRESENT </b>";
		// 	}
			

		// }
		
	}

?>