<?php


if(isset($_POST['btn_save']))
{
	$get_last_id = "select top 1 * from emp_education_primary order by id desc";
	$lastid_stmt = sqlsrv_query($conn,$get_last_id);
	$row=sqlsrv_fetch_array($lastid_stmt);
	$new_file_id = $row['file_id']+1;

	 $txt_divname=$_POST['txt_divname'];
	 $txt_divshort=$_POST['txt_divshort'];

	 $sql = "insert into munit (rank,div_code,mother_unit_long,mother_unit,div_void) values (?,?,?,?,?)";
	 $params= array($new_rank,$new_divcode,$txt_divname,$txt_divshort,"1");
	 sqlsrv_query($conn,$sql,$params);

	 echo '<script>alert("Record Successfully Updated")</script>';
     echo "<script>window.open('add-divisions.php','_self')</script>";
}

?>