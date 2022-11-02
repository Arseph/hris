<?php


if(isset($_POST['btn_save']))
{
	$get_last_id = "select top 1 sec_code from mstation order by sec_code desc";
	$lastid_stmt = sqlsrv_query($conn,$get_last_id);
	$row=sqlsrv_fetch_array($lastid_stmt);
	$new_seccode = $row['sec_code']+1;

	$division_code = $_POST['sel_division'];
	 $txt_secname=$_POST['txt_secname'];
	 $txt_secshort=$_POST['txt_secshort'];

	 $sql = "insert into mstation (sec_code,mother_station,sec_short,mother_unit,sec_void) values (?,?,?,?,?)";
	 $params= array($new_seccode,$txt_secname,$txt_secshort,$division_code,"1");
	 sqlsrv_query($conn,$sql,$params);

	 echo '<script>alert("Record Successfully Added")</script>';
     echo "<script>window.open('add-sections.php','_self')</script>";
}

?>