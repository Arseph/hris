<?php
if(isset($_POST['save']))
{
// $errorcount=0;

// if($_POST['sel_employee']==="0")
//   {
//     echo "<h5>please select employee name</h5>";
//   }
//   else
//   {

  	$agencyid=$_POST['sel_employee'];

	  $insert_query="insert into emp_education (agencyid) values (?)";

	  $params = array("$agencyid");

	  $stmt = sqlsrv_query($conn, $insert_query, $params);

	  echo $agencyid;

	  echo "<a href='add-family.php' class='btn btn-primary'>Continue to Add Family Information Form?</a><br><br>";
	// }

}

?>