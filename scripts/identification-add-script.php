<?php 

include "connection_script.php";

if (isset($_POST['save'])){
	$errorcount = 0;

	$empid = $_POST['sel_employee'];

	$gsisid = $_POST['gsis_id'];
	$pagibigid = $_POST['pagibig_id'];
	$philid = $_POST['philhealth_id'];
	$sssid = $_POST['sss_id'];
	$email = $_POST['email_ad'];
	$mobileno = $_POST['mobile_no'];
	$tinno = $_POST['tin_no'];



	//check for duplicate
    $idcheck_sql = mysqli_query($conn, "SELECT agencyid FROM employee_basic WHERE agencyid='$empid' AND identification='linked'");
    $dupe_id  = mysqli_num_rows($idcheck_sql);

    if ($empid == 0)
    {
    	echo "<h4 class='card-title' style='color: #f2354e;'>Error: Please select an Employee name.</h4><br>";
        $errorcount++;
    }


    if ($dupe_id != 0)
    { 
        echo "<h4 class='card-title' style='color: #f2354e;'>Error: Duplicate id.</h4><br>";
        $errorcount++;
    } 	

    if ($errorcount<1)
    {

		$sql = "INSERT INTO employee_identification(agencyid, gsis_id, pagibig_id, philhealth_id, sss_id, email, mobile, tin) Values('$empid', '$gsisid', '$pagibigid', '$philid', '$sssid ', '$email', '$mobileno', '$tinno')";

		$res = mysqli_query($conn, $sql);

		$sql = "UPDATE employee_basic SET identification ='linked' WHERE agencyid='$empid'";
		$identification_status = mysqli_query($conn, $sql);

		echo "<h4 class='card-title' style='color: #00FF00;'>Employee Address Successfully Added.</h4><br>";
		echo "<a class='btn btn-success' href='add-family.php'>Continue to Add Family Records Form?</a>";
	}
}

?>