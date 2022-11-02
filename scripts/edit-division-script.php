<?php
include "connect.php";


if(isset($_POST['btn_save']))
{
	 $txt_divname=$_POST['txt_divname'];
	 $txt_divshort=$_POST['txt_divshort'];

	 $sql = "update munit set mother_unit_long=?, mother_unit=? where div_code=?";
	 $params= array($txt_divname,$txt_divshort,$division_code);
	 sqlsrv_query($conn,$sql,$params);

	 echo '<script>alert("Record Successfully Updated")</script>';
     echo "<script>window.open('add-divisions.php','_self')</script>";
}

?>