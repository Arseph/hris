<?php


if(isset($_POST['btn_save']))
{
	$get_last_id = "select top 1 * from ref_program order by prog_code desc";
	$lastid_stmt = sqlsrv_query($conn,$get_last_id);
	$row=sqlsrv_fetch_array($lastid_stmt);

	 $new_progcode = $row['prog_code']+1;
	 $sel_section=$_POST['sel_section'];
	 $txt_progname=$_POST['txt_progname'];
	 $txt_progshort=$_POST['txt_progshort'];

	 $sql = "insert into ref_program (prog_code,prog_desc,prog_short,sec_code,prog_void) values (?,?,?,?,?)";
	 $params= array($new_progcode,$txt_progname,$txt_progshort,$sel_section,"1");
	 sqlsrv_query($conn,$sql,$params);

	 echo '<script>alert("Record Successfully Updated")</script>';
     echo "<script>window.open('programs-list.php','_self')</script>";
}

?>