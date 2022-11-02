<?php 
include "connection_script.php";

if(isset($_POST["save_competency"])) 
{


	//$HRC_sql = "INSERT INTO employee(field_experience, foe_lvl) VALUES('$HRC_foe', '$HRC_foelvl')";
	//$HRC_sql = "INSERT INTO employee(field_experience, foe_lvl) VALUES('test1', '$test2')";

	 //$HRC_sql = "INSERT INTO users(username, password, employee_id, creator_id) VALUES('test', 'test','test','test')";
	 $HRC_sql = "INSERT INTO users (username, password, employee_id, creator_id) VALUES ('1', '2', '3', '4')";



	//$HRC_result = mysqli_query($conn, $HRC_sql);


	if(mysqli_query($conn, $HRC_sql)){
    	echo "Records inserted successfully.";
	} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	}
}