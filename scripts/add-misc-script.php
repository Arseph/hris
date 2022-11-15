<?php


if(isset($_POST['save']))
{
	if($_POST['sel_employee']==="0")
	{
    	echo "<h4>please select employee name</h4>";
  	}
  	else
  	{	
  		$errorcount=0;
  		$errmsg="please fillout:<br>";

  		$agencyid=$_POST['sel_employee'];
  		$hobbies=$_POST['txthobby'];
  		$nar = $_POST['txtnar'];
  		$assoc = $_POST['txtassoc'];
  		$ref = $_POST['txtreference'];


  		// $q1 = $_POST['checkbox1-0'];
  		// $a1 = $_POST['details0'];

	  	if(isset($_POST['checkbox1-0'])){
	  		$q1 = $_POST['checkbox1-0'];
	  		if(isset($_POST['details0'])){
	  			$a1=$_POST['details0'];
	  		}else{
	  			$a1="";
	  			$errorcount++;
	  		}	
	  	}else{
	  		$q1 ="";
	  		$a1="";
	  	}

	  	if(isset($_POST['checkbox1-2'])){
	  		$q2 = $_POST['checkbox1-2'];
	  		if(isset($_POST['details1'])){
	  			$a2=$_POST['details1'];
	  		}else{
	  			$a1="";
	  			$errorcount++;
	  		}	
	  	}else{
	  		$q2 ="";
	  		$a2="";
	  	}


	  	if(isset($_POST['checkbox2'])){
	  		$q3 = $_POST['checkbox2'];
	  		if(isset($_POST['details2'])){
	  			$a3=$_POST['details2'];
	  		}else{
	  			$a3="";
	  			$errorcount++;
	  		}	
	  	}else{
	  		$q3 ="";
	  		$a3="";
	  	}

	  	if(isset($_POST['checkbox3'])){
	  		$q4 = $_POST['checkbox3'];
	  		if(isset($_POST['details3'])){
	  			$a4=$_POST['details3'];
	  		}else{
	  			$a4="";
	  			$errorcount++;
	  		}	
	  	}else{
	  		$q4 ="";
	  		$a4="";
	  	}

	  	if(isset($_POST['checkbox4'])){
	  		$q5 = $_POST['checkbox4'];
	  		if(isset($_POST['details4'])){
	  			$a5=$_POST['details4'];
	  		}else{
	  			$a5="";
	  			$errorcount++;
	  		}	
	  	}else{
	  		$q5 ="";
	  		$a5="";
	  	}

	  	if(isset($_POST['checkbox5'])){
	  		$q6 = $_POST['checkbox5'];
	  		if(isset($_POST['details5'])){
	  			$a6=$_POST['details5'];
	  		}else{
	  			$a6="";
	  			$errorcount++;
	  		}	
	  	}else{
	  		$q6 ="";
	  		$a6="";
	  	}
  
  	  	if(isset($_POST['checkbox6'])){
	  		$q7 = $_POST['checkbox6'];
	  		if(isset($_POST['details6'])){
	  			$a7=$_POST['details6'];
	  		}else{
	  			$a7="";
	  			$errorcount++;
	  		}	
	  	}else{
	  		$q7 ="";
	  		$a7="";
	  	}

  	  	if(isset($_POST['checkbox7'])){
	  		$q8 = $_POST['checkbox7'];
	  		if(isset($_POST['details7'])){
	  			$a8=$_POST['details7'];
	  		}else{
	  			$a8="";
	  			$errorcount++;
	  		}	
	  	}else{
	  		$q8 ="";
	  		$a8="";
	  	}

	  	if(isset($_POST['checkbox8'])){
	  		$q9 = $_POST['checkbox8'];
	  		if(isset($_POST['details8'])){
	  			$a9=$_POST['details8'];
	  		}else{
	  			$a9="";
	  			$errorcount++;
	  		}	
	  	}else{
	  		$q9 ="";
	  		$a9="";
	  	}

	  	if(isset($_POST['checkbox9'])){
	  		$q10 = $_POST['checkbox9'];
	  		if(isset($_POST['details9'])){
	  			$a10=$_POST['details9'];
	  		}else{
	  			$a10="";
	  			$errorcount++;
	  		}	
	  	}else{
	  		$q10 ="";
	  		$a10="";
	  	}

	  	 if(isset($_POST['checkbox10'])){
	  		$q11 = $_POST['checkbox10'];
	  		if(isset($_POST['details10'])){
	  			$a11=$_POST['details10'];
	  		}else{
	  			$a11="";
	  			$errorcount++;
	  		}	
	  	}else{
	  		$q11 ="";
	  		$a11="";
	  	}



	if($errorcount<1)
	{
	  $insert_query="insert into dbo.emp_miscinfo (agencyid,hobbies,nar,assoc_member,reff,q1,a1,q2,a2,q3,a3,q4,a4,q5,a5,q6,a6,q7,a7,q8,a8,q9,a9,q10,a10,q11,a11) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

	  $params = array("$agencyid","$hobbies","$nar","$assoc","$ref","$q1","$a1","$q2","$a2","$q3","$a3","$q4","$a4","$q5","$a5","$q6","$a6","$q7","$a7","$q8","$a8","$q9","$a9","$q10","$a10","$q11","$a11");

	 $stmt = sqlsrv_query($conn, $insert_query, $params);

	 include "scripts/audit_emp_add_miscinfo.php";

	    echo '<script>alert("Record Successfully Added")</script>';
		
		if($_SESSION['userlevel']<3)
	  	{
	  		echo "<script>window.open('employee-summary.php?uid=".$agencyid."','_self')</script>";
	  	}else{
	  		echo "<script>window.open('index.php','_self')</script>";
	  	}
	}
	else{
  		echo "Some required fields have been left blank";
  	}

  }

}

?>