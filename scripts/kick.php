<?php
if($_SESSION['userlevel']==3)
{
	
	$kick = 0;

	if(($_GET['uid'])!=($_SESSION['user_id'])){
		
		$kick++;

	}
	
	if($kick>0){

		echo "<script>window.open('index.php','_self')</script>";

	}

}



?>