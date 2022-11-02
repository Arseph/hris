<?php

if(isset($_POST['btn_save']))
{	

	//declarations
	$err_count=0;
	$err_msg= "Error: Please Select ";
	$dupe_present=0;
	$uid = $_GET['uid']; //uid
	$file_id = $_GET['file_id'];  //file id
	$record_version = $_GET['record_version']+1;

	$from_date = $_POST['from_date']; //from date

	//get last file_id entry
	$find_dupe_sql = "select top 1 * from emp_designation where agencyid='$uid' order by file_id desc";
	$paramm = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $file_id_stmt = sqlsrv_query($conn,$find_dupe_sql,$paramm,$options);
    $count_file_id = sqlsrv_num_rows($file_id_stmt);

    //to present check validation
    if($count_file_id>0)
    {
    	$dupe_row=sqlsrv_fetch_array($file_id_stmt);
    	
    	$total_fileid=$dupe_row['file_id'];

    	for ($x = 1; $x <= $total_fileid; $x++) 
	    {
	        $sql = "select * from emp_designation where agencyid='$uid' and file_id='$x' order by record_version desc";
			$stmt = sqlsrv_query($conn, $sql);
			$row=sqlsrv_fetch_array($stmt);

	        if(($row['file_id']!=$file_id)&&($row['exit_date']=="To Present"))
	        {
	            $dupe_present++;
	        }
	    }

    }


	if($_POST['radio_active']=='1') //to date
	{
		$to_date = "To Present";

	}elseif($_POST['radio_active']=='0'){

		$to_date = $_POST['to_date'];
	}

	//check if from doh
	if(($dupe_present>0)&&($to_date=='To Present'))
	{
		echo "<script>alert('Error: Another Entry was already set to TO PRESENT')</script>";  
		echo "<script>window.open('emp-add-designation.php?uid=".$uid."','_self')</script>";
	}
	else
	{
		$doh12 = $_POST['radio_doh'];

		if($doh12 =='1')
		{

			if($_POST['select_mstation']==0)
			{
				$err_count++;
				$err_msg.= "Mother Station";
			}

			if($_POST['select_dstation']==0)
			{
				$err_count++;

				if($err_count==1)
				{
					$err_msg.= "Designated Station";
				}elseif($err_count==2){
					$err_msg.= ", designated Station";
				}
			}

			if(($_POST['doh_radio_status']!='1')&&($_POST['nonperm_position']=='0'))
			{
				$err_count++;

				if($err_count==1)
				{
					$err_msg.= "Position";
				}elseif($err_count==2){
					$err_msg.= ", Position";
				}
			}

			if(($_POST['doh_radio_status']=='1')&&($_POST['perm_position']=='0'))
			{
				$err_count++;

				if($err_count==1)
				{
					$err_msg.= "Position";
				}elseif($err_count==2){
					$err_msg.= ", Position";
				}
			}

			if($err_count==0)
			{

			
			$mstation = $_POST['select_mstation'];
			$dstation = $_POST['select_dstation'];
			$doh_status = $_POST['doh_radio_status'];

				//get doh position
				if($doh_status=='1')
				{
					$doh_position = $_POST['perm_position']; // doh position
					
					//get doh permanent salary
					$get_doh_permsal = "select * from select_position where pos_code='$doh_position'";
					$doh_stmt = sqlsrv_query($conn,$get_doh_permsal);
					$doh_permrow = sqlsrv_fetch_array($doh_stmt);

					$doh_salary = $doh_permrow['basic_salary']; //doh permanent salary

					

				}else{
					$doh_position = $_POST['nonperm_position'];
					$doh_salary = $_POST['doh_np_salary'];
				}

				//save entry to database
				$doh_sql = "insert into emp_designation (agencyid,file_id,record_version,doh12,mother_station,designated_station,entry_date,exit_date,position,status,salary,void) values (?,?,?,?,?,?,?,?,?,?,?,?)";
				$params = array($uid,$file_id,"$record_version",$doh12,$mstation,$dstation,$from_date,$to_date,$doh_position,$doh_status,$doh_salary,"1");
				$doh_stmt = sqlsrv_query($conn,$doh_sql,$params);
				echo '<script>alert("Record Successfully Updated")</script>';
				echo "<script>window.open('emp-designation-history.php?uid=".$uid."','_self')</script>";

			}else{
				echo "<script>alert('".$err_msg."')</script>";  
			}
		}elseif($doh12=='0'){
			$dstation = $_POST['nondoh_dstation'];
			$mstation = $dstation;
			$nondoh_position = $_POST['nondoh_position'];
			$nondoh_status = $_POST['nondoh_status'];
			$nondoh_salary = $_POST['nondoh_salary'];

			//save entry to database
			$doh_sql = "insert into emp_designation (agencyid,file_id,record_version,doh12,mother_station,designated_station,entry_date,exit_date,position,status,salary,void) values (?,?,?,?,?,?,?,?,?,?,?,?)";
			$params = array($uid,$file_id,"$record_version",$doh12,$mstation,$dstation,$from_date,$to_date,$nondoh_position,$nondoh_status,$nondoh_salary,"1");
			$doh_stmt = sqlsrv_query($conn,$doh_sql,$params);
			echo '<script>alert("Record Successfully Updated")</script>';
			echo "<script>window.open('emp-designation-history.php?uid=".$uid."','_self')</script>";

		}
	}

}

?>