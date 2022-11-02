<?php


if(isset($_POST['update_miscinfo']))
{	
  		$errorcount=0;
  		$errmsg="please fillout:<br>";
  		$new_record_version=$record_version+1;


  		$hobbies=$_POST['txthobby'];
  		$nar = $_POST['txtnar'];
  		$assoc = $_POST['txtassoc'];
  		$reff = $_POST['txtreference'];
  		
  		$q1="";
  		$q2="";
  		$q3="";
  		$q4="";
  		$q5="";
  		$q6="";
  		$q7="";
  		$q8="";
  		$q9="";
  		$q10="";
  		$q11="";

  		$a1="";
  		$a2="";
  		$a3="";
  		$a4="";
  		$a5="";
  		$a6="";
  		$a7="";
  		$a8="";
  		$a9="";
  		$a10="";
  		$a11="";

	  	if(isset($_POST['q1'])){
		  	$q1 = $_POST['q1'];
		  	$a1= $_POST['a1'];
	  	}

	  	if(isset($_POST['q2'])){
		  	$q2 = $_POST['q2'];
		  	$a2=$_POST['a2'];
	  	}

	  	if(isset($_POST['q3'])){
		  	$q3 = $_POST['q3'];
		  	$a3=$_POST['a3'];
	  	}

	  	if(isset($_POST['q4'])){
		  	$q4 = $_POST['q4'];
		  	$a4=$_POST['a4'];
	  	}

	  	if(isset($_POST['q5'])){
		  	$q5 = $_POST['q5'];
		  	$a5=$_POST['a5'];
	  	}

	  	if(isset($_POST['q6'])){
		  	$q6 = $_POST['q6'];
		  	$a6=$_POST['a6'];
	  	}

	  	if(isset($_POST['q7'])){
		  	$q7 = $_POST['q7'];
		  	$a7=$_POST['a7'];
	  	}

	  	if(isset($_POST['q8'])){
		  	$q8 = $_POST['q8'];
		  	$a8=$_POST['a8'];
	  	}

	  	if(isset($_POST['q9'])){
		  	$q9 = $_POST['q9'];
		  	$a9=$_POST['a9'];
	  	}

	  	if(isset($_POST['q10'])){
		  	$q10 = $_POST['q10'];
		  	$a10=$_POST['a10'];
	  	}

	  	if(isset($_POST['q11'])){
		  	$q11 = $_POST['q11'];
		  	$a11=$_POST['a11'];
	  	}

    $query = "update emp_miscinfo set hobbies=?,nar=?,assoc_member=?,reff=?,q1=?,a1=?,q2=?,a2=?,q3=?,a3=?,q4=?,a4=?,q5=?,a5=?,q6=?,a6=?,q7=?,a7=?,q8=?,a8=?,q9=?,a9=?,q10=?,a10=?,q11=?,a11=? where agencyid = '$agencyid'";

    $params= array($hobbies, $nar, $assoc, $reff, $q1, $a1, $q2, $a2, $q3, $a3, $q4, $a4, $q5, $a5, $q6, $a6, $q7, $a7, $q8, $a8, $q9, $a9, $q10, $a10, $q11, $a11, $agencyid);

    
    $stmt = sqlsrv_query($conn, $query, $params);

    include "scripts/audit_emp_update_miscinfo.php";
    
    echo '<script>alert("Record Successfully Updated")</script>';
	 echo "<script>window.open('index.php','_self')</script>";

}

?>