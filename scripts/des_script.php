<?php

if(isset($_POST['btn_save']))
{
	echo "tessa";
	//declarations
	$uid = $_GET['uid']; //uid
	$from_date = $_POST['from_date']; //from date

	if($_POST['radio_active']=='1') //to date
	{
		$to_date = "To Present";

	}elseif($_POST['radio_active']=='0'){

		$to_date = $_POST['to_date'];
	}


	//get last file_id entry
	$find_dupe_sql = "select top 1 * from emp_designation where agencyid='$id' order by file_id desc";
	$paramm = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $file_id_stmt = sqlsrv_query($conn,$find_dupe_sql,$paramm,$options);
    $count_file_id = sqlsrv_num_rows($file_id_stmt);

    if($count_file_id>0)
    {
    	$dupe_row=sqlsrv_fetch_array($file_id_stmt);
    	$file_id = $dupe_row['file_id']+1;  //file id
    }else{
    	$file_id = '1'; //file id
    }


	//check if from doh
	if($_POST['radio_doh']=='1')
	{
		$mstation = $_POST['select_mstation'];
		$dstation = $_POST['select_dstation'];
		$doh_status = $_POST['radio_doh_status'];


		//get doh position
		if($doh_status=='1')
		{
			$doh_position = $_POST['perm_position']; // doh position
			
			//get doh permanent salary
			$get_doh_permsal = "select * from select_position where pos_code='$doh_position'";
			$doh_stmt = sqlsrv_query($conn,$get_doh_permsal);
			$doh_permrow = sqlsrv_fetch_array($doh_stmt);

			$doh_perm_salary = $doh_permrow['basic_salary']; //doh permanent salary


		}else{
			$doh_position = $_POST['nonperm_position'];
			$doh_salary = $_POST['doh_np_salary'];
		}

		//save entry to database
		$doh_sql = "insert into emp_designation (agencyid,file_id,record_version,doh12,mother_station,designated_station,entry_date,exit_date,position,status,salary) values (?,?,?,?,?,?,?,?,?,?,?)";
		$doh_stmt = sqlsrv_query($conn,$doh_sql);
		echo "<script>window.open('emp-designation-history.php?uid=".$row['agencyid']."','_self')</script>";

	}


}

?>