<?php

if(isset($_POST['btn_update']))
{
	 $txt_secname=$_POST['txt_secname'];
	 $txt_secshort=$_POST['txt_secshort'];
	 $mother_unit = $_POST['sel_division'];
	 

	 $sql = "update mstation set mother_station=?,sec_short=? where sec_code=?";
	 // //$sql = "update mstation set mother_station=?, sec_short=? mother_unit=? where sec_code=?";
	 // $params= array($txt_secname,$txt_secshort,$mother_unit,$sec_code);

	  $params= array($txt_secname,$txt_secshort,$sec_code);
	  sqlsrv_query($conn,$sql,$params);

	 echo '<script>alert("Record Successfully Updated")</script>';
     echo "<script>window.open('add-sections.php','_self')</script>";
}

?>