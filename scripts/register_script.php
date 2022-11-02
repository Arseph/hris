<?php 
$sname = "localhost";
$uname = "root";
//$password = "DEV";
$password = "DEV";
$db_name = "hris2";

$conn  = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}

session_start();

if (isset($_POST['create'])) 
{


	//dropdowns
	$select_department = $_POST['sel_depart'];
	$select_employee = $_POST['sel_user'];
	$select_level = $_POST['sel_level'];

	//textboxes
	$account_username = $_POST['username'];
	$account_password = $_POST['password'];

	//get logged in user id
	$creator_id = $_SESSION['user_id'];


	$today = date("m/d/Y");

	$sql = "INSERT INTO users(username, password, employee_id, creator_id, date_created, userlevel) 
               VALUES('$account_username', '$account_password', '$select_employee', '$creator_id', '$today', '$select_level')";

    
    //execute query and set result as variable
    $result = mysqli_query($conn, $sql);
    echo "Account successfully created!";
   	

}
