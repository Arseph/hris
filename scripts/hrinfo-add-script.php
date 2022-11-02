<?php 
include "connect.php";

if(isset($_POST["hrinfosave"])) 
{
  //reset error counter to 0
  $errorcount = 0;
  $errors="";

  $agencyid= $_POST['sel_employee'];
  if ($agencyid === "0"){
      $errors= $errors."Employee name<br>";
      $errorcount++;
  }

  $depart = $_POST['sel_depart'];
  if ($agencyid === "0"){
      $errors= $errors."Mother Unit<br>";
      $errorcount++;
  }
  
  $section = $_POST['sel_user'];
  if ($agencyid === "0")
  {
      $errors= $errors."Mother Station<br>";
      $errorcount++;
  }

  $d_depart = $_POST['sel_depart2'];
  if ($d_depart === "0"){
      $errors= $errors."Designated Unit<br>";
      $errorcount++;
  }

  $d_section = $_POST['sel_user2'];
  if ($d_section === "0")
  {
      $errors= $errors."Designated Station<br>";
      $errorcount++;
  }

  
  if(!isset($_POST['empstatus']))
  {
      $employment_status="0";
      $errors= $errors."Employment Status<br>";
      $errorcount++;
  }else{
    $employment_status = $_POST['empstatus'];
  }




  if(!isset($inactive_type))
  {
    $inactive_type="0";
  }

 

  $files_201 = $_POST['201files'];
  $remarks = $_POST['remarks'];

  
  // $eligibility_lvl3 = $_POST['lvl3']; //dependent on eligible value
  // if ($eligibility_lvl3 == "0")
  // {
  //     $eligibility_lvl3 = "";
  //     //$errors= $errors."Elibility lvl 3<br>";
  //     //$errorcount++;
  // }

  if (!isset($_POST['lvl3']))
  {
    $eligibility_lvl3 = "0";
  }
  else{
    $eligibility_lvl3 =$_POST['lvl3'];
  }
  

  

  $pos = $_POST['pos'];
  if ($pos == "0")
  {
      $errors= $errors."Position<br>";
      $errorcount++;
  }

  $salary_grade = $_POST['salarygrade'];
  if ($salary_grade == "0")
  {
      $errors= $errors."Salary grade<br>";
      $errorcount++;
  }

  
  if (isset($_POST['step'])) 
  {
      $step = $_POST['step'];
  }
  else
  {
    $step = "";
  }
      
  

  if(isset($_POST['highest_grade'])){
    $highest_grade = $_POST['highest_grade'];
  }
  else 
  {
      $highest_grade == "0";
      $errors= $errors."highest grade<br>";
      $errorcount++;
  }

  $workexperience = $_POST['workexperience'];
  if ($workexperience == "0")
  {
      $errors= $errors."work experience<br>";
      $errorcount++;
  }

  
  if (isset($_POST['Personality'])) 
  {
      $Personality = $_POST['Personality'];
  }
  else
  {
      $Personality = "";
  }

  if (isset($_POST['specialinfo']))  //dependent on eligible value
  {
    $specialinfo = implode(",", $_POST['specialinfo']);
  }
  else
  {
    $specialinfo = "";
  }

  $entrystatus = $_POST['entrystatus'];
  if ($entrystatus == "0")
  {
      $errors= $errors."Entry Status<br>";
      $errorcount++;
  }


  if(!isset($_POST['emptype']))
  {
      $emptype="0";
      $errors= $errors."Employment Type<br>";
      $errorcount++;
  }else{
    $emptype = $_POST['emptype'];
  }

  if((isset($emptype))&&($emptype=="Non-permanent"))
  {
        $nonperm_type = $_POST['nonperm'];
        $emptype = $_POST['emptype'];

        if($nonperm_type=='0')
        {
          $errors= $errors."Non-permanent Type<br>";
          $errorcount++;
        }

  }else{
    $emptype = "0";
  }


  $designation = $_POST['designation'];

  $designation_type = $_POST['designationtype'];
  if ($designation_type == "0")
  {
    $designation_type = "";
  }


  
  if (isset($_POST['itemno']))  //dependent on eligible value
  {
    $itemno = $_POST['itemno'];
  }
  else
  {
    $itemno = "";
  }



  $basicsal = $_POST['basicsalary'];

  $entry_date = $_POST['entry'];
 
  $eligible  = $_POST['eligible'];

  if ($eligible=='yes')
  {
    if (isset($_POST['eligibility']))  //dependent on eligible value
    {
      $delimiter = ',';
      $eligibility_type = implode(",", $_POST['eligibility']);
      $eligibility_string = explode($delimiter, $eligibility_type);
      //$elig_string_count = count ($eligibility_string);
      $i=0;
    }

  }else
  {
    $eligibility_type = "";
  }

  $promotion_date = $_POST['promotion'];


  $status_query="insert into dbo.hrinfo (hrinfo) values (?)";
  $status_param = $params = array("$agencyid");
  $stmt = sqlsrv_query($conn, $status_query, $status_param);

  if ($errorcount > 0){
    echo "<br><b><h5>Please fillup the following fields:<span style='color:red;'>*</span></h5></b>";
    echo $errors."<br>";
    
  }elseif ($errorcount==0)
  {
      $hr_query="insert into dbo.hrinfo (agencyid,record_version,mother_unit,mother_station,designated_unit,designated_station,employment_status,inactive_type,employment_type,nonperm_type,eligible,eligibility_lvl3,eligibility_type,position,salary_grade,step,itemno,basic_salary,designation_type,highest_grade,designation,work_experience,personality,promotion_date,special_info,entry_date,entry_status,files_201,remarks) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

  $params = array("$agencyid","1","$depart", "$section", "$d_depart", "$d_section", "$employment_status", "$inactive_type", "$emptype", "$nonperm_type", "$eligible", "$eligibility_lvl3","$eligibility_type","$pos","$salary_grade","$step","$itemno","$basicsal","$designation_type","$highest_grade","$designation","$workexperience","$Personality","$promotion_date","$specialinfo","$entry_date","$entrystatus","$files_201","$remarks");

  //set hrinfo on emp_basic
  $stmt = sqlsrv_query($conn, $hr_query, $params);
  $update_query = "update dbo.emp_basic SET hrinfo=? where agencyid=?";
  $update_params= array('set', $agencyid);
  $stmt = sqlsrv_query($conn, $update_query, $update_params);

 echo "<br><br><a href='add-education.php' class='btn btn-primary'>Proceed to Employee Education Form</a><br><br>";
 echo "<b style='color:green;'>Record Successfully Updated</b>";
  }

                       
}


?>