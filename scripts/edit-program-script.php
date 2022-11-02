<?php


if(isset($_POST['btn_save']))
{
	 $sel_section=$_POST['sel_section'];
	 $txt_progname=$_POST['txt_progname'];
	 $txt_progshort=$_POST['txt_progshort'];

	 // $sql = "insert into ref_program (prog_code,prog_desc,prog_short,sec_code,prog_void) values (?,?,?,?,?)";
	 $update_sql = "update ref_program set prog_desc = ?, prog_short = ?, sec_code= ? where prog_code = ?";
	 $params= array($txt_progname,$txt_progshort,$sel_section,$prog_code);
	 sqlsrv_query($conn,$update_sql,$params);

	 echo '<script>alert("Record Successfully Updated")</script>';
     // echo "<script>window.open('programs-list.php','_self')</script>";
}

?>