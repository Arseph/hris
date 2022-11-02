<?php 
include "connection_script.php";
session_start();

// Check if image file is a actual image or fake image
if(isset($_POST["save"])) 
{



  //other field variables
  $employee_id = $_POST['agencyid'];
  $employee_surname = $_POST['surname'];
  $employee_suffix = $_POST['suffix'];
  $employee_firstname = $_POST['firstname'];
  $employee_middlename = $_POST['middlename'];
  $employee_birthday = $_POST['dob'];
  $employee_pob = $_POST['pob'];

  //dropdowns
  $employee_sex = $_POST['gender'];
  $employee_civilstatus = $_POST['civil'];

  $idcheck_sql = mysqli_query($conn, "SELECT agency_id FROM employee WHERE agency_id='$employee_id'");
  $dupe_id  = mysqli_num_rows($idcheck_sql);

  //number input box
  $employee_height = $_POST['height'];
  $employee_weight = $_POST['weight'];

   //dropdowns
  $employee_bloodtype = $_POST['blood'];

  //textbox
  $employee_username = $_POST['username'];

  $employee_password = $_POST['password'];
  $retyped_password = $_POST['password2'];

  
  //dropdowns
  $employee_ulevel = $_POST['level'];

  //get logged in user id
  $creator_id = $_SESSION['user_id'];


  $today = date("m/d/Y");


    //image picker variables

  $file_size=$_FILES["fileToUpload"]["size"];
  $destination = "../uploads/".$_FILES['fileToUpload']['name'];

  $source = $_FILES['fileToUpload']['tmp_name'];


    if(($retyped_password == $employee_password) && ($dupe_id !== 0)) 
    {
      //copy image and store it on database
      //copy ( $source, $destination );
      //($source != "") && ($file_size < 500000) && 
      echo "test";

     // $sql = "INSERT INTO employee(agency_id, firstname, suffix, middlename, birthday, lastname, pob, civilstatus, citizenship, weight, height, bloodtype, username, password, ulevel, imagepath) 
               //VALUES('$employee_id','$employee_firstname', '$employee_suffix','$employee_middlename','$employee_birthday','$employee_surname','$employee_pob','$employee_civilstatus','$employee_citizenship','$employee_weight','$employee_height','$employee_bloodtype','$employee_username','$employee_password','$employee_ulevel', '$destination')";

                $sql = "INSERT INTO employee(agency_id, firstname, suffix, middlename, birthday, lastname, pob, civilstatus, citizenship, weight, height, bloodtype, username, password, ulevel, imagepath) 
               VALUES('$employee_id','$employee_firstname', '$employee_suffix','$employee_middlename','$employee_birthday','$employee_surname','$employee_pob','$employee_civilstatus','$employee_citizenship','$employee_weight','$employee_height','$employee_bloodtype','$employee_username','$employee_password','$employee_ulevel')";

    //execute query and set result as variable
    $result = mysqli_query($conn, $sql);
    echo "Account successfully created!";

    }
}
?>