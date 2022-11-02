<?php 
include "connection_script.php";


// image validation: size, file type, empty.
if(isset($_POST["hrinfosave"])) 
{
  $errorcount = 0;
  $empid= $_POST['sel_employee'];


  $r_house = $_POST['r_house'];
  $r_street = $_POST['r_street'];
  $r_village = $_POST['r_village'];
  $r_barangay = $_POST['r_barangay'];
  $r_city = $_POST['r_city'];
  $r_province = $_POST['r_province'];
  $r_countrynum = $_POST['r_countrynum'];
  $r_contact = $_POST['r_contact'];


  $p_house = $_POST['p_house'];
  $p_street = $_POST['p_street'];
  $p_village = $_POST['p_village'];
  $p_barangay = $_POST['p_barangay'];
  $p_city = $_POST['p_city'];
  $p_province = $_POST['p_province'];
  $p_countrynum = $_POST['p_countrynum'];
  $p_contact = $_POST['p_contact'];

  $r_contact += $r_contact + $r_countrynum;
  $p_contact +=  $p_contact + $p_countrynum;

  //continue the 18 dropdown validation

  if($empid==0){
    $errorcount++;
    echo "<br><h4><p style='color:red';>Error: Please Select Employee</p><h4><br>";
  }

  if($errorcount<1)
  {


    $address_add_sql = "INSERT INTO employee_address(agencyid, r_house, r_street, r_village, r_barangay, r_city, r_province, r_contact, p_house, p_street, p_village, p_barangay, p_city, p_province, p_contact) VALUES('$empid', '$r_house', '$r_street', '$r_village', '$r_barangay', '$r_city', '$r_province', '$r_countrynum', '$p_house', '$p_street', '$p_village', '$p_barangay', '$p_city', '$p_province', '$p_contact')";


     $address_add =mysqli_query($conn, $address_add_sql);


     $update_basic_sql = "UPDATE employee_basic SET address='linked' WHERE agencyid='$empid'";

     $basicinfo_update =mysqli_query($conn, $update_basic_sql);

    echo "<br><span style='color:green;'><b>Employee Addresses Added</b></span><br>";
    echo "<br><a href='add-identification.php' class='btn btn-primary'>Continue to Add employee Identification form?</a>";
    echo "<br><a href='add-address.php' class='btn btn-success'>Stay on current form form?</a><br>";
  }

}


?>