<?php
//include "scripts\connection_script.php";
//check if account has logged in, if not.. redirect to login page

if (!empty($_SESSION['user_id']))
{
	//echo $_SESSION['user_id'];
	$acc_id=$_SESSION['user_id'];
	echo $acc_id;


	$getname_sql = "SELECT * FROM users WHERE user_id=".$acc_id;
	$name_result = mysqli_query($conn,$getname_sql);

	$namerow = mysqli_fetch_array($name_result);

    $emp_id = $namerow['employee_id'];


    $emp_name_sql = "SELECT * FROM employee WHERE id=".$emp_id;
	$emp_name_result = mysqli_query($conn,$emp_name_sql);

	$emp_namerow = mysqli_fetch_array($emp_name_result);

    $emp_fname = $emp_namerow['firstname'];
    $emp_lname = $emp_namerow['lastname'];



//    $employee_name_sql = "SELECT * FROM employee WHERE id=$emp_id";
//    $employee_name_result = mysqli_query($conn, $employee_name_sql);
 //   $employee_name_row = mysqli_fetch_assoc($employee_name_result);

 //   $employee_fname = $namerow['firstname'];
 //   $employee_fname = $namerow['lastname'];



}
else
{
	header('location:pages-login.php');
}

?>