<?php


if(isset($_POST['btn_save']))
{
	 $txt_elig=$_POST['txt_elig'];
	 $txt_eligtype=$_POST['txt_eligtype'];

	 $sql = "Update ref_eligibility set elig_name = ?,elig_type=? where id=?";
	 $params= array($txt_elig,$txt_eligtype,$id);
	 sqlsrv_query($conn,$sql,$params);

	 echo '<script>alert("Record Successfully Updated")</script>';
      echo "<script>window.open('eligibility-type.php','_self')</script>";
}

?>