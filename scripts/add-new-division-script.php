<?php


if(isset($_POST['btn_save']))
{
	$get_last_id = "select top 1 * from munit order by div_code desc";
	$lastid_stmt = sqlsrv_query($conn,$get_last_id);
	$row=sqlsrv_fetch_array($lastid_stmt);
	$new_divcode = $row['div_code']+1;

	
	$get_highest_rank = "select rank from munit order by rank desc";
	$ghr_stmt = sqlsrv_query($conn,$get_highest_rank);
	$ghr_row = sqlsrv_fetch_array($ghr_stmt);
	$new_rank = $ghr_row['rank'];
	$new_rank++;

	 $txt_divname=$_POST['txt_divname'];
	 $txt_divshort=$_POST['txt_divshort'];

	 $sql = "insert into munit (rank,div_code,mother_unit_long,mother_unit,div_void) values (?,?,?,?,?)";
	 $params= array($new_rank,$new_divcode,$txt_divname,$txt_divshort,"1");
	 sqlsrv_query($conn,$sql,$params);

	 echo '<script>alert("Record Successfully Added")</script>';
     echo "<script>window.open('add-divisions.php','_self')</script>";
}

?>