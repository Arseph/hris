<?php


if(isset($_POST['btn_save']))
{
	 $ext_name=$_POST['ext_name'];

	 $sql = "insert into extension_list (ext_name,void) values (?,?)";
	 $params= array($ext_name,"1");
	 sqlsrv_query($conn,$sql,$params);

	 echo '<script>alert("Record Successfully Updated")</script>';
      echo "<script>window.open('name-extension-list.php','_self')</script>";
}

?>