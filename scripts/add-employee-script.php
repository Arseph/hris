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
  $family_spouse_contactnum = $_POST['spouse-contact']; 
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

  //others form
  $other_skills = $_POST['hobbies'];
  $other_nac = $_POST['nac'];
  $other_memberships = $_POST['memberships'];
  $other_referrence = $_POST['referrence'];
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
  //id segment
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

    //HR Info form
    //ajax units segment
    $HR_motherunit = $_POST['sel_depart'];
    $HR_motherstation = $_POST['sel_user'];
    $HR_designatedunit = $_POST['sel_depart2'];
    $HR_designatedstation = $_POST['sel_user2'];

    
    $HR_inactive = $_POST['sel_inactive'];
    $HR_nonperm = $_POST['sel_nonpermanent'];
    $HR_eligible = $_POST['radio_eligible'];
    

       //eligibility checkbox variables, default value
    $HR_eligibility1 = ""; //nurse
    $HR_eligibility2 = ""; //RA
    $HR_eligibility3 = ""; //teacher
    $HR_eligibility4 = ""; //environmental planning
    $HR_eligibility5 = ""; //subprof
    $HR_eligibility6 = ""; //midwife
    $HR_eligibility7 = ""; //barangay eligibility
    $HR_eligibility8 = ""; //tesda
    $HR_eligibility9 = ""; //cs prof
    $HR_eligibility10 = ""; //sanitation board
    $HR_eligibility11 = ""; //civil engineering
    $HR_eligibility12 = ""; //others
    $checkloop = 0;

     if (isset($_POST['eligibility1'])){
      $HR_eligibility1 = $_POST['eligibility1'];
      $HR_eligibility = $HR_eligibility1;
      $checkloop++;
    }

    $HR_eligibility = implode(",",$_POST["eligibility"]);


    $HR_level3 = $_POST['sel_lvl3']; ///make this dynamic 
    $HR_positions = $_POST['sel_positions']; //make this dynamic 
    $HR_salgrade = $_POST['sel_salgrade'];
    $HR_basicsal = $_POST['basicsalary'];

    $HR_step = $_POST['sel_step'];
    $HR_itemno = $_POST['itemno'];
    $HR_destype = $_POST['sel_destype'];
    $HR_designation = $_POST['designation'];
    $HR_highgrade = $_POST['sel_highgrade'];
    $HR_workexp = $_POST['sel_workexp'];

    $HR_personality = $_POST['sel_personality'];
    $HR_specialinfo = $_POST['sel_specialinfo'];
    $HR_datepromo = $_POST['date_promotion'];
    $HR_goventry = $_POST['date_goventry'];
    $HR_201files = $_POST['201files'];
    $HR_remarks = $_POST['hrremarks'];


  if(($dupe_id==0) && ($employee_password == $retyped_password))
  //if(($dupe_id==0) && ($employee_password == $retyped_password))
  {



    $sql = "INSERT INTO employee(agency_id, firstname, suffix, middlename, birthday, lastname, pob, civilstatus, citizenship, weight, height, bloodtype, username, password, ulevel, imagepath, residential_house, residential_subdivision, residential_city, residential_contactnum, residential_street, residential_barangay, residential_province, permanent_house, permanent_subdivision, permanent_city, permanent_contactnum, permanent_street, permanent_barangay, permanent_province, gsis, pagibig, philhealth, sss, email, mobile, tin, spouse_surname, spouse_firstname, spouse_middlename, spouse_contact, spouse_occupation, spouse_business_add, spouse_dob, father_surname, father_fname, father_mname, father_dob, mother_maiden_name, mother_surname, mother_fname, mother_mname, mother_dob, children_name, other_skills, other_nac, other_memberships, other_referrence, other_third, other_fourth, other_details1, other_offence, other_details2, other_charge, other_details3, other_convict, other_details4, other_separate, other_details5, other_candidate, other_details6, other_service, other_details7, other_immigrant, other_details8, other_indigenous, other_details9, other_disability, other_details10, other_parent, other_details11, other_passport_id, other_passport_date, other_gsis_id, other_gsis_date, other_sss_id, other_sss_date, other_prc_id, other_prc_date, other_driver_id, other_driver_date, mother_unit, mother_station, designated_unit, designated_station, inactive_reason, nonperm_type, eligible, eligibility1, eligibility_level3, position, salary_grade, basic_salary, step, item_no, designation_type, designation, highest_level, work_exp, personality, special_info, last_promotion_date, gov_entry_date, 201_files, remarks) VALUES('$employee_id','$employee_firstname', '$employee_suffix','$employee_middlename','$employee_birthday','$employee_surname','$employee_pob','$employee_civilstatus','$employee_citizenship','$employee_weight','$employee_height','$employee_bloodtype','$employee_username','$employee_password','$employee_ulevel', '$destination', '$res_house', '$res_sub', '$res_city', '$res_contactnum', '$res_street', '$res_barangay', '$res_province', '$perm_house', '$perm_sub', '$perm_city', '$perm_contactnum', '$perm_street', '$perm_barangay', '$perm_province', '$gsis_id', '$pagibig_id', '$philhealth_id', '$sss_id', '$email_add', '$mobile_num', '$tin_number', '$family_spouse_surname', '$family_spouse_firstname', '$family_spouse_middlename', '$family_spouse_contactnum', '$family_spouse_occupation', '$family_spouse_business_address', '$family_spouse_dob', '$family_father_surname', '$family_father_firstname', '$family_father_middlename', '$family_father_dob', '$family_mother_maiden_name', '$family_mother_surname', '$family_mother_firstname', '$family_mother_middlename', '$family_mother_dob', '$family_children_name', '$other_skills','$other_nac', '$other_memberships', '$other_referrence', '$other_third', '$other_fourth', '$other_details1', '$other_offence', '$other_details2', '$other_charge', '$other_details3', '$other_convict', '$other_details4', '$other_separate', '$other_details5','$other_candidate','$other_details6','$other_service','$other_details7','$other_immigrant','$other_details8','$other_indigenous','$other_details9','$other_disability','$other_details10','$other_parent','$other_details11','$other_passport_id','$other_passport_date','$other_gsis_id','$other_gsis_date','$other_sss_id','$other_sss_date','$other_prc_id','$other_prc_date','$other_driver_id','$other_driver_date', '$HR_motherunit', '$HR_motherstation', '$HR_designatedunit', '$HR_designatedstation', '$HR_inactive', '$HR_nonperm ', '$HR_eligible', '$HR_eligibility', '$HR_level3', '$HR_positions', '$HR_salgrade', '$HR_basicsal', '$HR_step', '$HR_itemno', '$HR_destype', '$HR_designation', '$HR_highgrade', '$HR_workexp', '$HR_personality', '$HR_specialinfo', '$HR_datepromo', '$HR_goventry', '$HR_201files', '$HR_remarks')";

    //$sql = "INSERT INTO employee(agency_id, firstname, suffix, middlename, birthday, lastname, pob, civilstatus, citizenship, weight, height, bloodtype, username, password, ulevel, imagepath, residential_house, residential_subdivision, residential_city, residential_contactnum, residential_street, residential_barangay, residential_province, permanent_house, permanent_subdivision, permanent_city, permanent_contactnum, permanent_street, permanent_barangay, permanent_province, gsis, pagibig, philhealth, sss, email, mobile, tin, spouse_surname, spouse_firstname, spouse_middlename, spouse_contact, spouse_occupation, spouse_business_add, spouse_dob, father_surname, father_fname, father_mname, father_dob, mother_maiden_name, mother_surname, mother_fname, mother_mname, mother_dob, children_name, other_skills, other_nac, other_memberships, other_referrence, other_third, other_fourth, other_details1, other_offence, other_details2, other_charge, other_details3, other_convict, other_details4, other_separate, other_details5, other_candidate, other_details6, other_service, other_details7, other_immigrant, other_details8, other_indigenous, other_details9, other_disability, other_details10, other_parent, other_details11, other_passport_id, other_passport_date, other_gsis_id, other_gsis_date, other_sss_id, other_sss_date, other_prc_id, other_prc_date, other_driver_id, other_driver_date, mother_unit, mother_station, designated_unit, designated_station, inactive_reason, nonperm_type, eligible, eligibility1, eligibility2, eligibility3, eligibility4, eligibility5, eligibility6, eligibility7, eligibility8, eligibility9, eligibility10, eligibility11, eligibility12, eligibility_level3, position, salary_grade, basic_salary, step, item_no, designation_type, designation, highest_level, work_exp, personality, special_info, last_promotion_date, gov_entry_date, 201_files, remarks) VALUES('$employee_id','$employee_firstname', '$employee_suffix','$employee_middlename','$employee_birthday','$employee_surname','$employee_pob','$employee_civilstatus','$employee_citizenship','$employee_weight','$employee_height','$employee_bloodtype','$employee_username','$employee_password','$employee_ulevel', '$destination', '$res_house', '$res_sub', '$res_city', '$res_contactnum', '$res_street', '$res_barangay', '$res_province', '$perm_house', '$perm_sub', '$perm_city', '$perm_contactnum', '$perm_street', '$perm_barangay', '$perm_province', '$gsis_id', '$pagibig_id', '$philhealth_id', '$sss_id', '$email_add', '$mobile_num', '$tin_number', '$family_spouse_surname', '$family_spouse_firstname', '$family_spouse_middlename', '$family_spouse_contactnum', '$family_spouse_occupation', '$family_spouse_business_address', '$family_spouse_dob', '$family_father_surname', '$family_father_firstname', '$family_father_middlename', '$family_father_dob', '$family_mother_maiden_name', '$family_mother_surname', '$family_mother_firstname', '$family_mother_middlename', '$family_mother_dob', '$family_children_name', '$other_skills','$other_nac', '$other_memberships', '$other_referrence', '$other_third', '$other_fourth', '$other_details1', '$other_offence', '$other_details2', '$other_charge', '$other_details3', '$other_convict', '$other_details4', '$other_separate', '$other_details5','$other_candidate','$other_details6','$other_service','$other_details7','$other_immigrant','$other_details8','$other_indigenous','$other_details9','$other_disability','$other_details10','$other_parent','$other_details11','$other_passport_id','$other_passport_date','$other_gsis_id','$other_gsis_date','$other_sss_id','$other_sss_date','$other_prc_id','$other_prc_date','$other_driver_id','$other_driver_date', '$HR_motherunit', '$HR_motherstation', '$HR_designatedunit', '$HR_designatedstation', '$HR_inactive', '$HR_nonperm ', '$HR_eligible', '$HR_eligibility1', '$HR_eligibility2', '$HR_eligibility3', '$HR_eligibility4', '$HR_eligibility5', '$HR_eligibility6', '$HR_eligibility7', '$HR_eligibility8', '$HR_eligibility9', '$HR_eligibility10', '$HR_eligibility11', '$HR_eligibility12', '$HR_level3', '$HR_positions', '$HR_salgrade', '$HR_basicsal', '$HR_step', '$HR_itemno', '$HR_destype', '$HR_designation', '$HR_highgrade', '$HR_workexp', '$HR_personality', '$HR_specialinfo', '$HR_datepromo', '$HR_goventry', '$HR_201files', '$HR_remarks')";


    //execute query and set result as variable
    $result = mysqli_query($conn, $sql);
  }
}

?>