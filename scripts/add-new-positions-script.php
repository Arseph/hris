<?php


if(isset($_POST['btn_save']))
{
	$get_last_id = "select top 1 pos_code from select_position order by pos_code desc";
	$lastid_stmt = sqlsrv_query($conn,$get_last_id);
	$row=sqlsrv_fetch_array($lastid_stmt);
	$new_poscode = $row['pos_code']+1;

	 $txt_posname=$_POST['txt_posname'];
	 $txt_posshort=$_POST['txt_posshort'];

	 $radio_permanent=$_POST['radio_permanent'];

	 if($radio_permanent=='1'){
	 	$txt_itemno=$_POST['txt_itemno'];
	 	$txt_salary=$_POST['txt_salary'];
	 }else{
	 	$txt_itemno=0;
	 	$txt_salary=0;
	 }
	 

	 $sql = "insert into select_position (pos_code,EmpPosition,pos_void,pos_short,permanent,itemno,basic_salary) values (?,?,?,?,?,?,?)";

	 $params= array($new_poscode,$txt_posname,"1",$txt_posshort,$radio_permanent,$txt_itemno,$txt_salary);

	 sqlsrv_query($conn,$sql,$params);

	 echo '<script>alert("Record Successfully Added")</script>';
     echo "<script>window.open('add-positions.php','_self')</script>";
}

?>