<?php


if(isset($_POST['btn_save']))
{
	 $txt_elig=$_POST['txt_elig'];
	 $txt_eligtype=$_POST['txt_eligtype'];

	 $sql = "insert into ref_eligibility (elig_name,elig_type) values (?,?)";
	 $params= array($txt_elig,$txt_eligtype);
	 sqlsrv_query($conn,$sql,$params);

	 echo '<script>alert("Record Successfully Updated")</script>';
      echo "<script>window.open('eligibility-type.php','_self')</script>";
}

?>