<?php 
include "connection_script.php";


// Check if image file is a actual image or fake image
if(isset($_POST["save"])) 
{
    $source = $_FILES['fileToUpload']['tmp_name'];
    
        //change file name of the file to be copied
        $temp = explode(".", $_FILES["fileToUpload"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $destination = "../uploads/" . $newfilename;

        $imageFileType = strtolower(pathinfo($destination,PATHINFO_EXTENSION));

  $uploadOk=1;

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

  //get radio button value/ change it i
  $employee_citizenship = $_POST['radio_citizen'];

  if(isset($employee_citizenship))
  {
    if ($employee_citizenship=="dual")
    {
      $employee_citizenship=$_POST['dual'];
    }
  }

  //address form
  $res_house = $_POST['residentialhouse1'];
  $res_sub = $_POST['subdivision1'];
  $res_city = $_POST['city1'];
  $res_contactnum = $_POST['contactnumber1'];
  $res_street = $_POST['street1'];
  $res_barangay = $_POST['barangay1'];
  $res_province = $_POST['province1'];

  $perm_house = $_POST['residentialhouse2'];
  $perm_sub = $_POST['subdivision2'];
  $perm_city = $_POST['city2'];
  $perm_contactnum = $_POST['contactnumber2'];
  $perm_street = $_POST['street2'];
  $perm_barangay = $_POST['barangay2'];
  $perm_province = $_POST['province2'];

    //identification form
  $gsis_id = $_POST['gsis-id'];
  $pagibig_id = $_POST['pagibig-id'];
  $philhealth_id = $_POST['philhealth-id'];
  $sss_id = $_POST['sss-id'];
  $email_add = $_POST['email-add'];
  $mobile_num= $_POST['mobile-number']; //redundant
  $tin_number = $_POST['tin-number'];

  //family form
  $family_spouse_surname = $_POST['spouse-surname']; 
  $family_spouse_firstname = $_POST['spouse-fname']; 
  $family_spouse_middlename = $_POST['spouse-mname']; 
  $family_spouse_contactnum = $_POST['spouse-countact']; 
  $family_spouse_occupation = $_POST['spouse-occupation']; 
  $family_spouse_business_address = $_POST['spouse-business-add']; 
  $family_spouse_dob = $_POST['spouse-dob']; 
  $family_father_surname = $_POST['father-surname']; 
  $family_father_firstname = $_POST['father-fname']; 
  $family_father_middlename = $_POST['father-mname']; 
  $family_father_dob = $_POST['father-dob']; 
  $family_mother_maiden_name = $_POST['mother-maiden-name']; 
  $family_mother_surname = $_POST['mother-surname']; 
  $family_mother_firstname = $_POST['mother-fname']; 
  $family_mother_middlename = $_POST['mother-mname']; 
  $family_mother_dob = $_POST['mother-dob']; 
  $family_children_name = $_POST['children-name']; 

  //other info form
  $other_skills = $_POST['hobbies'];
  $other_nac = $_POST['nac'];
  $other_memberships = $_POST['memberships'];
  $other_Referrence = $_POST['Referrence'];
  $other_third = $_POST['radio_affinity'];
  $other_fourth = $_POST['radio_degree'];
  $other_details1 = $_POST['details1'];
  $other_offence = $_POST['radio_offence'];
  $other_details2 = $_POST['details2'];
  $other_charge = $_POST['radio_charge'];
  $other_details3 = $_POST['details3'];
  $other_convict = $_POST['radio_convict'];
  $other_details4 = $_POST['details4'];
  $other_separate = $_POST['radio_separate'];
  $other_details5 = $_POST['details5'];
  $other_candidate = $_POST['radio_candidate'];
  $other_details6 = $_POST['details6'];
  $other_service = $_POST['radio_service'];
  $other_details7 = $_POST['details7'];
  $other_immigrant = $_POST['radio_immigrant'];
  $other_details8 = $_POST['details8'];
  $other_indigenous = $_POST['radio_indigenous'];
  $other_details9 = $_POST['details9'];
  $other_disability = $_POST['radio_disability'];
  $other_details10 = $_POST['details10'];
  $other_parent = $_POST['radio_parent'];
  $other_details11 = $_POST['details11'];
  $other_passport_id = $_POST['others_passport_id'];
  $other_passport_date = $_POST['others_passport_date'];
  $other_gsis_id = $_POST['others_gsis_id'];
  $other_gsis_date = $_POST['others_gsis_date'];
  $other_sss_id = $_POST['others_sss_id'];
  $other_sss_date = $_POST['others_sss_date'];
  $other_prc_id = $_POST['others_prc_id'];
  $other_prc_date = $_POST['others_prc_date'];
  $other_driver_id = $_POST['others_driver_id'];
  $other_driver_date = $_POST['others_driver_date'];


  if(($dupe_id==0) && ($employee_password == $retyped_password))
  {


$sql = "INSERT INTO employee(agency_id, firstname, suffix, middlename, birthday, lastname, pob, civilstatus, citizenship, weight, height, bloodtype, username, password, ulevel, imagepath, residential_house, residential_subdivision, residential_city, residential_contactnum, residential_street, residential_barangay, residential_province, permanent_house, permanent_subdivision, permanent_city, permanent_contactnum, permanent_street, permanent_barangay, permanent_province, gsis, pagibig, philhealth, sss, email, mobile, tin, spouse_surname, spouse_firstname, spouse_middlename, spouse_contact, spouse_occupation, spouse_business_add, spouse_dob, father_surname, father_fname, father_mname, father_dob, mother_maiden_name, mother_surname, mother_fname, mother_mname, mother_dob, children_name, 
  other_skills, 
  other_nac, 
  other_memberships, 
  other_third, 
  other_fourth, 
  other_details1, 
  other_offence, 
  other_details2, 
  other_charge, 
  other_details3, 
  other_convict, 
  other_details4, 
  other_separate, 
  other_details5, 
  other_candidate, 
  other_details6, 
  other_service, 
  other_details7, 
  other_immigrant, 
  other_details8, 
  other_indigenous, 
  other_details9, 
  other_disability, 
  other_details10, 
  other_parent, 
  other_details11, 
  other_passport_id, 
  other_passport_date, 
  other_gsis_id, 
  other_gsis_date, 
  other_sss_id, 
  other_sss_date, 
  other_prc_id, 
  other_prc_date, 
  other_driver_id, 
  other_driver_date) VALUES('$employee_id','$employee_firstname', '$employee_suffix','$employee_middlename','$employee_birthday','$employee_surname','$employee_pob','$employee_civilstatus','$employee_citizenship','$employee_weight','$employee_height','$employee_bloodtype','$employee_username','$employee_password','$employee_ulevel', '$destination', '$res_house', '$res_sub', '$res_city', '$res_contactnum', '$res_street', '$res_barangay', '$res_province', '$perm_house', '$perm_sub', '$perm_city', '$perm_contactnum', '$perm_street', '$perm_barangay', '$perm_province', '$gsis_id', '$pagibig_id', '$philhealth_id', '$sss_id', '$email_add', '$mobile_num', '$tin_number', '$family_spouse_surname', '$family_spouse_firstname', '$family_spouse_middlename', '$family_spouse_contactnum', '$family_spouse_occupation', '$family_spouse_business_address', '$family_spouse_dob', '$family_father_surname', '$family_father_firstname', '$family_father_middlename', '$family_father_dob', '$family_mother_maiden_name', '$family_mother_surname', '$family_mother_firstname', '$family_mother_middlename', '$family_mother_dob', '$family_children_name',
  '$other_skills',
  '$other_nac',
  '$other_memberships', 
  '$other_Referrence', 
  '$other_third', 
  '$other_fourth', 
  '$other_details1', 
  '$other_offence', 
  '$other_details2', 
  '$other_charge', 
  '$other_details3', 
  '$other_convict', 
  '$other_details4', 
  '$other_separate', 
  '$other_details5', 
  '$other_candidate', 
  '$other_details6', 
  '$other_service', 
  '$other_details7', 
  '$other_immigrant', 
  '$other_details8', 
  '$other_indigenous', 
  '$other_details9', 
  '$other_disability', 
  '$other_details10', 
  '$other_parent', 
  '$other_details11', 
  '$other_passport_id', 
  '$other_passport_date', 
  '$other_gsis_id', 
  '$other_gsis_date', 
  '$other_sss_id', 
  '$other_sss_date', 
  '$other_prc_id', 
  '$other_prc_date', 
  '$other_driver_id', 
  '$other_driver_date')";

    //execute query and set result as variable
    $result = mysqli_query($conn, $sql);
  }
}

?>