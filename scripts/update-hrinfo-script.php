<?php 
include "connect.php";

if(isset($_POST["hrinfo_update"])) 
{
  //reset error counter to 0

  $errorcount = 0;
  $errors="";
  $new_record_version=$record_version+1;


  $m_unit = $_POST['sel_depart'];
  if ($m_unit === "0"){
     $m_unit=$emp_mother_unit;
     
  }
  $m_station = $_POST['sel_user'];
  if ($m_station === "0")
  {
      $m_station  = $emp_mother_station;

  }

  $d_unit = $_POST['sel_depart2'];
  if ($d_unit === "0"){
      $d_unit=$emp_designated_unit;
  }

  $d_station = $_POST['sel_user2'];
  if ($d_station === "0")
  {
      $d_station = $emp_designated_station;
  }

  $employment_status = $_POST['empstatus'];
  if($employment_status=="0")  
  {
      $errors= $errors."Employment Status<br>";
      $errorcount++;
  }


  
  if(!isset($_POST['inact'])){
    $inactive_type="0";
  }else{
    $inactive_type = $_POST['inact'];
  }

 
  if(($employment_status=="Inactive")&&($inactive_type=="0"))
  {
      $errors= $errors."Inactive Type<br>";
      $errorcount++;
  }
 

  $files_201 = $_POST['201files'];
  $remarks = $_POST['remarks'];
  $step = $_POST['step'];

  
  ; //dependent on eligible value
  if(!isset($_POST['lvl3'])){
    $eligibility_lvl3='0';
  }else{
    $eligibility_lvl3 = $_POST['lvl3'];
  }
  

  $position = $_POST['pos'];
  if ($position == "0")
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

      
  $highest_grade = $_POST['highest_grade'];
  if ($highest_grade == "0")
  {
      $errors= $errors."highest grade<br>";
      $errorcount++;
  }

  $work_experience = $_POST['workexperience'];
  if ($work_experience == "0")
  {
      $errors= $errors."work experience<br>";
      $errorcount++;
  }

  
  $personality=$_POST['Personality'];
  if ($personality == "0")
  {
      $errors= $errors."Entry Status<br>";
      $errorcount++;
  }

  if (isset($_POST['specialinfo']))  //dependent on eligible value
  {
    $special_info = implode(",", $_POST['specialinfo']);
  }
  else
  {
    $special_info = "";
  }

  $entry_status = $_POST['entrystatus'];
  if ($entry_status == "0")
  {
      $errors= $errors."Entry Status<br>";
      $errorcount++;
  }

  $emptype = $_POST['emptype'];
  if ($emptype == "0")
  {
      $errors= $errors."Employment Type<br>";
      $errorcount++;
  }
  elseif($emptype== "Non-permanent")
  {
    $nonperm_type = $_POST['nonperm'];
    
    if($nonperm_type=="0"){
      $errors= $errors."Non-permanent Type<br>";
      $errorcount++;
    }
  }


  $designation = $_POST['designation'];

  $designation_type = $_POST['designationtype'];


  
  if (isset($_POST['itemno']))  //dependent on eligible value
  {
    $itemno = $_POST['itemno'];
  }
  else
  {
    $itemno = "";
  }



  $basic_salary = $_POST['basicsalary'];

  $entry_date = $_POST['entry'];
 
  $eligible  = $_POST['eligible'];
  if ($eligible=='yes')
  {
    if (isset($_POST['eligibility']))  //dependent on eligible value
    {
      $eligibility_type = implode(",", $_POST['eligibility']);
    }

  }else
  {
    $eligibility_type = "";
  }

  $promotion_date = $_POST['promotion'];


  // $status_query="insert into dbo.hrinfo (hrinfo) values (?)";
  // $status_param = $params = array("$agencyid");
  // $stmt = sqlsrv_query($conn, $status_query, $status_param);

  if ($errorcount > 0){
    echo "<br><b><h5>Please fillup the following fields:<span style='color:red;'>*</span></h5></b>";
    echo $errors."<br>";
    
  }
  elseif($errorcount<1)
  {
       $query = "insert into hrinfo (agencyid,record_version,mother_unit,mother_station,designated_unit,designated_station,employment_status,inactive_type,employment_type,nonperm_type,eligible,eligibility_lvl3,eligibility_type,position,salary_grade,step,itemno,basic_salary,designation_type,highest_grade,designation,work_experience,personality,promotion_date,special_info,entry_date,entry_status,files_201,remarks) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $params= array($agencyid,$new_record_version,$m_unit,$m_station,$d_unit,$d_station,$employment_status,$inactive_type,$employment_type,$nonperm_type,$eligible,$eligibility_lvl3,$eligibility_type,$position,$salary_grade,$step,$itemno,$basic_salary,$designation_type,$highest_grade,$designation,$work_experience,$personality,$promotion_date,$special_info,$entry_date,$entry_status,$files_201,$remarks);

       $hrinfo_query = sqlsrv_query($conn, $query, $params);

       echo '<script>alert("Record Successfully Updated")</script>';
      echo "<script>window.open('index.php','_self')</script>";

  }


                       
}

?>