<?php
include "connect.php";


if(isset($_POST['btn_save']))
{
	 $txt_posname=$_POST['txt_posname'];
	 $txt_posshort=$_POST['txt_posshort'];
	 $radio_permanent=$_POST['radio_permanent'];

	 if($radio_permanent=='1')
	 {
	 	$txt_itemno=$_POST['txt_itemno'];
	 	$txt_salary=$_POST['txt_salary'];
	 }else{
	 	$txt_itemno=0;
	 	$txt_salary=0;
	 }


	 $sql = "update select_position set EmpPosition=?, pos_short=? ,permanent=?, itemno=?, basic_salary=? where pos_code=?";
	 $params= array($txt_posname,$txt_posshort,$radio_permanent,$txt_itemno,$txt_salary,$pos_code);

	 sqlsrv_query($conn,$sql,$params);

	 echo '<script>alert("Record Successfully Updated")</script>';
     echo "<script>window.open('add-positions.php','_self')</script>";
}

?>