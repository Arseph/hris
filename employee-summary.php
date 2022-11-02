<?php
session_start();
$uid = $_GET['uid'];
include "scripts\connect.php";


include "layouts\layout_sidebar.php";

$params = array();
$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
$pds_progress= 0;

//very big data pull


//basic info
$uid=$_GET['uid']; // get link value



$params = array();
$options = array("Scrollable"=> SQLSRV_CURSOR_KEYSET);

//get basic date entry
$sql = "select * from HR_INFO where agencyid='$uid'";
$create_acc_stmt = sqlsrv_query($conn, $sql, $params, $options);

$basic_result = sqlsrv_num_rows($create_acc_stmt);

if($basic_result>0)
{
  $row = sqlsrv_fetch_array($create_acc_stmt);
  $month_hired = $row['month_hired'];
  $day_hired = $row['day_hired'];
  $year_hired = $row['year_hired'];

  $pds_progress += 12.5;

}

//get identification date entry
$sql = "select * from audit_trail where agencyid='$uid' and affected_record='Identification' order by id desc";

$audit_identification = sqlsrv_query($conn, $sql, $params, $options);

$identification_count = sqlsrv_num_rows($audit_identification);

if($identification_count>0)
{
 $row = sqlsrv_fetch_array($audit_identification);
 $identification_date = $row['action_date']; 

 $pds_progress += 12.5;
}


//get address date entry
$sql = "select * from audit_trail where agencyid='$uid' and affected_record='Address' order by id desc";

$audit_address = sqlsrv_query($conn, $sql, $params, $options);

$address_count = sqlsrv_num_rows($audit_address);

if($address_count>0)
{
 $row = sqlsrv_fetch_array($audit_address);
 $address_date = $row['action_date']; 

 $pds_progress += 12.5;
}


//get family date entry
$sql = "select * from audit_trail where agencyid='$uid' and affected_record='Family Information' order by id desc";

$audit_family = sqlsrv_query($conn, $sql, $params, $options);

$family_count = sqlsrv_num_rows($audit_family);

if($family_count>0)
{
 $row = sqlsrv_fetch_array($audit_family);
 $family_date = $row['action_date']; 

 $pds_progress += 12.5;
}

//misc data entry
$sql = "select * from audit_trail where agencyid='$uid' and affected_record='Misc Information' order by id desc";

$audit_misc = sqlsrv_query($conn, $sql, $params, $options);

$misc_count = sqlsrv_num_rows($audit_misc);

if($misc_count>0)
{
 $row = sqlsrv_fetch_array($audit_misc);
 $misc_date = $row['action_date']; 

 $pds_progress += 12.5;
}


//Designation data entry
$sql = "select * from emp_designation where agencyid='$uid' and void='1'";

$audit_designation = sqlsrv_query($conn, $sql, $params, $options);

$designation_count = sqlsrv_num_rows($audit_designation);

if($designation_count>0)
{

  $sql2 = "select * from audit_trail where agencyid='$uid' and affected_record='Designation' order by id desc";
  $elig_stmt = sqlsrv_query($conn, $sql2);
  $elig_row = sqlsrv_fetch_array($elig_stmt);
  $designation_date = $elig_row['action_date'];

 $pds_progress += 12.5;
}
   

//education data entry
$sql = "select * from audit_trail where agencyid='$uid' and affected_record like 'Designation' order by id desc";

$audit_education = sqlsrv_query($conn, $sql, $params, $options);

$education_count = sqlsrv_num_rows($audit_education);

if($education_count>0)
{
 $row = sqlsrv_fetch_array($audit_education);
 $education_date = $row['action_date']; 
 $pds_progress += 12.5;
}


//eligibility data entry
$sql = "select * from emp_eligibility where agencyid='$uid' and void='1'";

$audit_eligibility = sqlsrv_query($conn, $sql, $params, $options);

$eligibility_count = sqlsrv_num_rows($audit_eligibility);

if($eligibility_count>0)
{

  $sql2 = "select * from audit_trail where agencyid='$uid' and affected_record='Eligibility' order by id desc";
  $elig_stmt = sqlsrv_query($conn, $sql2);
  $elig_row = sqlsrv_fetch_array($elig_stmt);
  $eligibility_date = $elig_row['action_date'];

 $pds_progress += 12.5;
}else{
  $pds_progress += 12.5;
}


//get basic info from database
$sql = "select * from emp_basic where agencyid='$uid'";

if($result = sqlsrv_query($conn, $sql, $params, $options))
{
  

  while($row = sqlsrv_fetch_array($result))
  {

    $imagepath = $row['imagepath'];

    $surname = $row['surname'];
    $suffix = $row ['suffix'];
    $fname = $row ['firstname'];

    if(isset($row['middlename'])){
      $mname = $row ['middlename'];
      $fullname = $fname." ".$mname." ".$surname." ".$suffix;
    }else{
      $fullname = $fname." ".$surname. " ".$suffix;
    }


    $dob = $row ['dob'];
    $pob = $row ['pob'];
    $gender = $row ['gender'];
    $civil = $row ['civil'];
    $citizenship = $row ['citizenship'];
    $citizenshipby = $row ['citizenshipby'];
    $cid = $row ['cid'];
    $height = $row ['height'];
    $weight = $row ['weightt'];
    $bloodtype = $row ['bloodtype'];
  }
}

//get address from database
$sql = "select * from emp_address where agencyid='$uid'";

if($result = sqlsrv_query($conn, $sql, $params, $options))
{
  $address_result  = sqlsrv_num_rows($result);

  while($row = sqlsrv_fetch_array($result))
  {
    $p_house = $row['p_house']; 
    $p_street = $row['p_street'];
    $p_village = $row['p_village'];
    $p_barangay = $row ['p_barangay'];
    $p_city = $row ['p_city'];
    $p_province = $row ['p_province'];
    $p_countrynum = $row ['p_countrynum'];
    $p_contact = $row ['p_contact'];
    $p_zip = $row ['p_zip'];

    $r_house = $row ['r_house']; 
    $r_street = $row ['r_street'];
    $r_village = $row ['r_village'];
    $r_barangay = $row ['r_barangay'];
    $r_city = $row ['r_city'];
    $r_province = $row ['r_province'];
    $r_countrynum = $row ['r_countrynum'];
    $r_contact = $row ['r_contact'];
    $r_zip = $row ['r_zip'];
  }

}

//get identification details
$sql = "select * from emp_identification where agencyid='$uid'";

if($result = sqlsrv_query($conn, $sql, $params, $options))
{

  $identification_result  = sqlsrv_num_rows($result);

  while($row = sqlsrv_fetch_array($result))
  {

    $gsis_id = $row['gsis_id']; 
    $pagibig_id = $row['pagibig_id'];
    $philhealth_id = $row ['philhealth_id'];
    $sss_id = $row ['sss_id'];
    $passport = $row ['passport'];
    $prc = $row ['prc'];
    $drivers = $row ['drivers'];
    $drivers_date = $row ['drivers_date'];
    $email_ad = $row ['email_ad'];
    $tin_no = $row ['tin_no'];
  }

}

$sql = "select * from emp_family where agencyid='$uid'";

if($result = sqlsrv_query($conn, $sql, $params, $options))
{

  $family_result = sqlsrv_num_rows($result);

  while($row = sqlsrv_fetch_array($result))
  {
    $agencyid = $row['agencyid']; 

    $s_sname = $row['spouse_sname']; 
    $s_fname = $row['spouse_fname'];
    $s_mname = $row ['spouse_mname'];
    $s_contact = $row ['spouse_contact'];
    $s_work = $row ['spouse_work'];
    $s_boss = $row ['spouse_boss'];
    $s_badd = $row ['spouse_badd'];
    $s_bday = $row ['spouse_bday'];

    $f_sname = $row ['father_sname'];
    $f_fname = $row ['father_fname'];
    $f_mname = $row ['father_mname'];
    $f_bday = $row ['father_bday'];

    $m_maiden = $row ['mother_maiden'];
    $m_sname = $row ['mother_sname'];
    $m_fname = $row ['mother_fname'];
    $m_mname = $row ['mother_mname'];
    $m_bday = $row ['mother_bday'];


  }
}

//get misc data

$get_misc = "select * from emp_miscinfo where agencyid='$uid'";
$misc_stmt = sqlsrv_query($conn, $get_misc, $params, $options);
$getmisc_count = sqlsrv_num_rows($misc_stmt);

if($getmisc_count>0)
{

  $miscc_row = sqlsrv_fetch_array($misc_stmt);

  $misc_skills = $miscc_row['hobbies'];
  $misc_recognition = $miscc_row['nar'];
  $misc_membership = $miscc_row['assoc_member'];
}


?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="adm-master-list.php">Active Employee Masrter list</a></li>
          <li class="breadcrumb-item active">Employee Data Summary</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">



          <div class="card">
            <div class="card-body pt-3">
              <div class='row'>
                <div class='col-md-12'>
                  <h4 class='text-center'><b>PDS Data Completion</b></h4>
                  <!-- Progress Bars with labels-->
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo $pds_progress; ?>%" aria-valuenow="<?php echo $pds_progress; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $pds_progress; ?>%</div>
                  </div>
                </div>  
              <!-- Bordered Tabs -->
              <div class="col-md-6"><br>
                <b>Employee Name: </b><?php echo "<b style='color: blue;'>".$fullname."</b>"; ?><br>
                <b>Basic Information: </b><?php if($basic_result>0){ echo "Last Updated On: "."<b>".$month_hired."/".$day_hired."/".$year_hired."</b>"; }else{ echo "<b style='color:red;'>unset</b>"; } ?><br>

                <b>Identification: </b><?php if($identification_result>0){ echo "Last Updated On: "."<b>".$identification_date."</b>"; }else{ echo "<b style='color:red;'>unset</b>"; } ?><br>

                <b>Miscellaneous Information: </b><?php if($misc_count>0){ echo "Last Updated on: "."<b>".$misc_date."</b>"; }else{ echo "<b style='color:red;'>unset</b>";}?><br>

                <b>Education History: </b><?php if($education_count>0){ echo "Last Updated on: "."<b>".$education_date."</b>"; }else{ echo "<b style='color:red;'>unset</b>";}?>
                
              </div>
              <div class="col-md-6"><br>
                <b>Address: </b><?php if($address_result>0){ echo "Last Updated On: "."<b>".$address_date."</b>"; }else{ echo "<b style='color:red;'>unset</b>"; } ?><br>

                <b>Family Information: </b><?php if($family_result>0){ echo "Last Updated On: "."<b>".$family_date."</b>"; }else{ echo "<b style='color:red;'>unset</b>"; } ?><br>

                <b>Designation: </b><?php if($designation_count>0){ echo "Last Updated on: "."<b>".$designation_date."</b>"; }else{ echo "<b style='color:red;'>unset</b>";}?><br>

                <b>Eligibility: </b> <?php if($eligibility_count>0){ echo "Last Updated on: "."<b>".$eligibility_date."</b>"; }else{ echo "<b style='color:red;'>No Eligibility Set</b>";}?>
                
              </div>
            </div>
              <br>
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Basic</button>
                </li>

                <?php 

                  if($address_count>0){
                    echo '<li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Address</button>
                </li>';
                  }

                  if($identification_count>0){
                    echo '<li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-view-identification">Identification</button>
                </li>';
                  }

                  if($family_count>0){
                    echo '<li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-view-family">Family</button>
                </li>';
                  }

                  if($misc_count>0){
                    echo '<li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-view-misc">Misc Information</button>
                </li>';
                  }

                    if($designation_count>0){
                    echo '<li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-view-designation">Designation</button>
                </li>';
                  }
                

                  if($education_count>0){
                    echo '<li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-view-education">Education History</button>
                </li>';
                  }

                  if($eligibility_count>0){
                    echo '<li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-view-eligibility">Eligibility</button>
                </li>';
                  }

                ?>
                  
              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview"><br>
                  <a href='#' class='btn btn-primary'>Edit</a>

                  <h5 class="card-title">Profile Details</h5>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Profile Picture</div>
                    <div class="col-lg-9 col-md-8"><?php 
                       if($imagepath!="")
                        { 
                           
                           // echo "<img src='uploads/$imagepath' class='rounded-circle'>";
                           echo "<img src='uploads/$imagepath' width='120' height='150'>";  
                        } 
                        else 
                        { 
                          echo '<img src="assets/img/personel-logo.jpg" alt="Profile"  class="rounded-circle">'; 
                        }

                ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Full Name: <?php echo $fullname; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $fullname; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Date of Birth:</div>
                    <div class="col-lg-9 col-md-8"><?php echo $dob; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Place of Birth: </div>
                    <div class="col-lg-9 col-md-8"><?php echo $pob; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Gender: </div>
                    <div class="col-lg-9 col-md-8"><?php echo $gender; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Civil Status: </div>
                    <div class="col-lg-9 col-md-8"><?php echo $civil; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Citizenship: </div>
                    <div class="col-lg-9 col-md-8"><?php echo $citizenship; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Citizenship By: </div>
                    <div class="col-lg-9 col-md-8"><?php echo $citizenshipby; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Height: </div>
                    <div class="col-lg-9 col-md-8"><?php echo $height; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Weight: </div>
                    <div class="col-lg-9 col-md-8"><?php echo $weight; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Bloodtype: </div>
                    <div class="col-lg-9 col-md-8"><?php echo $bloodtype; ?></div>
                  </div>
                  

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                  <a href='#' class='btn btn-primary'>Edit</a><br><br>
                  <h5><b><u>Permanent Address</u></b></h5>

                  <div>
                        <b>House/Block/Lot #:</b> 
                        <?php 
                        if(isset($p_house))
                          {
                            echo $p_house; 
                          }
                        ?><br>
                        <b>Street: </b ><?php if(isset($p_street)){echo $p_street; }?><br>
                        <b>Subdivision/Village: </b ><?php if(isset($p_village)){echo $p_village; }?><br>
                        <b>Barangay: </b ><?php if(isset($p_barangay)){echo $p_barangay; }?><br>
                        <b>Zip Code: </b ><?php if(isset($p_zip)){echo $p_zip; }?><br>
                        <b>City/Municipality: </b ><?php if(isset($p_city)){echo $p_city; }?><br>
                        <b>Province: </b ><?php if(isset($p_province)){echo $p_province; }?><br>
                        <b>Contact #: </b ><?php 
                        if((isset($p_countrynum))&&(isset($p_contact)))
                          {
                            echo $p_countrynum.$p_contact; 
                          }
                        ?><br>
                  </div>
                  <br>
                  <b><h5><u>Residential Address</u></h5></b>
                  <div>
                        <b>House/Block/Lot #:</b> 
                        <?php 
                        if(isset($p_house))
                          {
                            echo $p_house; 
                          }
                        ?><br>
                        <b>Street: </b ><?php if(isset($r_street)){echo $r_street; }?><br>
                        <b>Subdivision/Village: </b ><?php if(isset($r_village)){echo $r_village; }?><br>
                        <b>Barangay: </b ><?php if(isset($r_barangay)){echo $r_barangay; }?><br>
                        <b>Zip Code: </b ><?php if(isset($r_zip)){echo $r_zip; }?><br>
                        <b>City/Municipality: </b ><?php if(isset($r_city)){echo $r_city; }?><br>
                        <b>Province: </b ><?php if(isset($r_province)){echo $r_province; }?><br>
                        <b>Contact #: </b ><?php 
                        if((isset($r_countrynum))&&(isset($r_contact)))
                          {
                            echo $r_countrynum.$r_contact; 
                          }
                        ?><br>
                  </div>
                </div>

                <div class="tab-pane fade pt-3" id="profile-view-identification">
                  <a href='#' class='btn btn-primary'>Edit</a><br><br>
                  <b><h5><u>Identification</u></h5></b>
                  <div>
                        <b>GSIS ID: </b ><?php if(isset($gsis_id)){echo $gsis_id; }?><br>
                        <b>PAGIBIG ID: </b ><?php if(isset($pagibig_id)){echo $pagibig_id; }?><br>
                        <b>PHILHEALTH ID: </b ><?php if(isset($philhealth_id)){echo $philhealth_id; }?><br>
                        <b>SSS ID: </b ><?php if(isset($sss_id)){echo $sss_id; }?><br>
                        <b>PASSPORT ID: </b ><?php if(isset($passport)){echo $passport; }?><br>
                        <b>PRC: </b ><?php if(isset($prc)){echo $prc; }?><br>
                        <b>Drivers ID: </b ><?php 
                        if(isset($drivers))
                          {
                            echo $drivers; 
                          }
                        ?><br>
                        <b>TIN No: </b ><?php 
                        if(isset($tin_no))
                          {
                            echo $tin_no; 
                          }
                        ?><br>
                        <b>Email Address: </b ><?php 
                        if(isset($email_ad))
                          {
                            echo $email_ad; 
                          }
                        ?>
                    </div>  <!-- End Identification  -->
                </div>

                <div class="tab-pane fade pt-3" id="profile-view-family">

                  <a href='#' class='btn btn-primary'>Edit</a><br><br>
                    <b><h5><u>Family Information</u></h5></b>
                    <div>
                        <b>Mother's Maiden Name: </b ><?php if(isset($m_maiden)){echo $m_maiden; }?><br>
                        <b>Mother's Surname: </b ><?php if(isset($m_sname)){echo $m_sname; }?><br>
                        <b>Mother's Firstname: </b ><?php if(isset($m_fname)){echo $m_fname; }?><br>
                        <b>Mother's Middle Name: </b ><?php if(isset($m_mname)){echo $m_mname; }?><br>
                        <b>Mother's Birthday: </b ><?php if(isset($m_bday)){echo $m_bday; }?><br><br>
                        <b>Father's Surname: </b ><?php if(isset($f_sname)){echo $f_sname; }?><br>
                        <b>Father's Firstname: </b ><?php if(isset($f_fname)){echo $f_fname; }?><br>
                        <b>Father's Middle Name: </b ><?php if(isset($f_mname)){echo $f_mname; }?><br>
                        <b>Father's Birthday: </b ><?php if(isset($f_bday)){echo $f_bday; }?>
                    </div>
                </div>

                <div class="tab-pane fade pt-3" id="profile-view-misc">
                  <a href='update-misc.php?uid=<?php echo $uid; ?>' class='btn btn-primary'>View</a><br><br>
                    <b><h5><u>Misc Information</u></h5></b>
                    <div>
                        <b>Special Skills/Hobbies: </b><?php echo $misc_skills ; ?><br>
                        <b>Non-Academic Recognition: </b ><?php echo $misc_recognition ; ?><br>
                        <b>Associations Membership: </b ><?php echo $misc_membership ; ?><br>
                    </div>
                </div>

                <div class="tab-pane fade pt-3" id="profile-view-education">
                    <a href='#' class='btn btn-primary'>Edit</a><br><br>
                    <b><h5><u>Education History</u></h5></b>
                    <div>
                          <h4>Primary Level Education</h4>
              
              <?php
              
              ?>
                <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th class="fw-bold">No.</th>
                        <th scope="col">School</th>
                        <th scope="col">From</th>
                        <th scope="col">To</th>
                        <th scope="col">Scholarship</th>
                      </tr>
                    </thead>
                    <tbody>
                   <?php

                      $params = array();
                      $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);

                      //get max file id
                      $sql = "select * from emp_education_primary where agencyid='$uid'";

                      $stmt = sqlsrv_query($conn, $sql, $params, $options);
                      $count_primary = sqlsrv_num_rows($stmt);

                      
                     

                      
                    if($count_primary>0)
                    {
                       while($row_primary = sqlsrv_fetch_array($stmt))
                       {
                           $primary_id = $row_primary['id'];


                        if($row_primary['void']=='1'){
                          echo "<td>".$row_primary['id']."</td>";
                          echo "<td>".$row_primary['school']."</td>";

                          if($row_primary['graduate']=='1'){
                           echo "<td style='color:blue;'><b>".$row_primary['from_year']."</b></td>";
                           echo "<td style='color:blue;'><b>".$row_primary['to_year']."</b></td>"; 
                          }else{
                           echo "<td>".$row_primary['from_year']."</td>";
                           echo "<td>".$row_primary['to_year']."</td>"; 
                          }
                          

                          echo "<td>".$row_primary['scholarship']."</td>";
                          echo '</tr>';
                        }
                       }
                    
                        
                        
                      }
                    ?>
                    </tbody>
                  </table>

              <br><h4>Secondary Level Education</h4>
                 <?php

              ?>
                <table class="table table-borderless datatable">
                    <thead>
                      <tr>

                        <th class="fw-bold">No.</th>
                        <th scope="col">School</th>
                        <th scope="col">From</th>
                        <th scope="col">To</th>
                        <th scope="col">Scholarship</th>
                      </tr>
                    </thead>
                    <tbody>
                   <?php

                      $params = array();
                      $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);

                      //get max file id
                      $sql = "select * from emp_education_secondary where agencyid='$uid'";

                      $stmt = sqlsrv_query($conn, $sql, $params, $options);
                      $count_secondary = sqlsrv_num_rows($stmt);

                      
                     

                      
                    if($count_secondary>0)
                    {
                       while($row_secondary = sqlsrv_fetch_array($stmt))
                       {
                           $secondary_id = $row_secondary['id'];


                        if($row_secondary['void']=='1'){
                          echo "<td>".$row_secondary['id']."</td>";
                          echo "<td>".$row_secondary['school']."</td>";

                          if($row_secondary['graduate']=='1'){
                           echo "<td style='color:blue;'><b>".$row_secondary['from_year']."</b></td>";
                           echo "<td style='color:blue;'><b>".$row_secondary['to_year']."</b></td>"; 
                          }else{
                           echo "<td>".$row_secondary['from_year']."</td>";
                           echo "<td>".$row_secondary['to_year']."</td>"; 
                          }
                          

                          echo "<td>".$row_secondary['scholarship']."</td>";
                          echo '</tr>';
                        }
                       }
                    
                        
                        
                      }
                    ?>
                    </tbody>
                  </table>


                   <br><h4>Bachelors Level Education</h4>
                  <?php

              ?>
                <table class="table table-borderless datatable">
                    <thead>
                      <tr>

                        <th class="fw-bold">No.</th>
                        <th scope="col">School</th>
                        <th scope="col">From</th>
                        <th scope="col">To</th>
                        <th scope="col">Scholarship</th>
                      </tr>
                    </thead>
                    <tbody>
                   <?php
                      //get max file id
                      $bachelors_sql = "select * from emp_education_bachelors where agencyid='$uid' and void='1'";
                      $bachelors_stmt = sqlsrv_query($conn, $bachelors_sql, $params, $options);

                      $bachelors_count = sqlsrv_num_rows($bachelors_stmt);

                      if($bachelors_count>0)
                      {

                        while($bach_row = sqlsrv_fetch_array($bachelors_stmt))
                        {
                        echo "<td>".$bach_row['id']."</td>";
                        echo "<td>".$bach_row['school']."</td>";

                        if($bach_row['graduate']=='1'){
                         echo "<td style='color:blue;'><b>".$bach_row['from_year']."</b></td>";
                         echo "<td style='color:blue;'><b>".$bach_row['to_year']."</b></td>"; 
                        }else{
                         echo "<td>".$bach_row['from_year']."</td>";
                         echo "<td>".$bach_row['to_year']."</td>"; 
                        }
                        echo "<td>".$bach_row['scholarship']."</td>";
                        echo '</tr>';
                        }  
                      }
                      
                     
                      

                    ?>
                    </tbody>
                  </table>

                  <br><h4>Master/Doctoral Level Education</h4>
                  <?php
              ?>
                <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th class="fw-bold">No.</th>
                        <th scope="col">School</th>
                        <th scope="col">From</th>
                        <th scope="col">To</th>
                        <th scope="col">Scholarship</th>
                      </tr>
                    </thead>
                    <tbody>
                   <?php
                      //get max file id
                      $maphd_sql = "select * from emp_education_maphd where agencyid='$uid' and void='1'";
                      $maphd_stmt = sqlsrv_query($conn, $maphd_sql, $params, $options);

                      $maphd_count = sqlsrv_num_rows($maphd_stmt);

                      if($maphd_count>0)
                      {

                        while($maphd_row = sqlsrv_fetch_array($maphd_stmt))
                        {
                        echo "<td>".$maphd_row['id']."</td>";
                        echo "<td>".$maphd_row['school']."</td>";

                        if($maphd_row['graduate']=='1'){
                         echo "<td style='color:blue;'><b>".$maphd_row['from_year']."</b></td>";
                         echo "<td style='color:blue;'><b>".$maphd_row['to_year']."</b></td>"; 
                        }else{
                         echo "<td>".$maphd_row['from_year']."</td>";
                         echo "<td>".$maphd_row['to_year']."</td>"; 
                        }
                        echo "<td>".$maphd_row['scholarship']."</td>";
                        echo '</tr>';
                        }  
                      }
                      
                     
                      

                    ?>
                    </tbody>
                  </table>
                    </div>
                </div>

                <div class="tab-pane fade pt-3" id="profile-view-designation">
                  <a href='#' class='btn btn-primary'>Edit</a><br><br>
                    <b><h5><u>Designation</u></h5></b>
                    <div>
                        <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th class="fw-bold">Entry Date</th>
                        <th scope="col">Mother Station</th>
                        <th scope="col">Designated Station</th>
                        <th scope='col'>Position</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      //get max file id
                      $sql = "select * from emp_designation where agencyid='$uid' and void='1'";
                      $params= array();
                      $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);

                      $stmt = sqlsrv_query($conn, $sql, $params, $options);
                      $count_row = sqlsrv_num_rows($stmt);
                      

                      if($count_row>0)
                      {
                        while($row = sqlsrv_fetch_array($stmt))
                        {
                          $mstation=$row['mother_station'];
                          $dstation=$row['designated_station'];
                          $position=$row['position'];
                          $id = $row['id'];

                          if($row['doh12']=='1')
                          {
                            //get mother station
                            $mstation_sql="select * from mstation where sec_code = '".$mstation."'";
                            $mstation_stmt = sqlsrv_query($conn,$mstation_sql);
                            $mstation_row = sqlsrv_fetch_array($mstation_stmt);
                            $mstation = $mstation_row['mother_station'];

                            //get designated station
                            $dstation_sql="select * from mstation where sec_code = '".$dstation."'";
                            $dstation_stmt = sqlsrv_query($conn,$dstation_sql);
                            $dstation_row = sqlsrv_fetch_array($dstation_stmt);
                            $dstation = $dstation_row['mother_station'];

                            //get position
                            $position_sql= "select * from select_position where pos_code='".$row['position']."'";
                            $position_stmt=sqlsrv_query($conn,$position_sql);
                            $position_row=sqlsrv_fetch_array($position_stmt);
                            $position = $position_row['EmpPosition'];
                          }

                          $timestamp=strtotime($row['entry_date']);
                          $entry_date= date("m-d-Y", $timestamp);

                          echo "<td>".$entry_date."</td>";
                          echo "<td><b style='color:blue;'>".$mstation."</b></td>";
                          echo "<td><b style='color:blue;'>".$dstation."</b></td>";
                          echo "<td><b>".$position."</b></td>";
                          echo '</tr>';
                        }

                        
                      }

                    ?>
                    </tbody>
                  </table>
                    </div>
                </div>

                <div class="tab-pane fade pt-3" id="profile-view-eligibility">
                    <a href='#' class='btn btn-primary'>Edit</a><br><br>
                    <b><h5><u>Eligibility</u></h5></b>
                    <div>
                        <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        
                        <th class="fw-bold">No</th>
                        <th scope="col">Eligibility Name</th>
                        <th scope="col">Eligibility Type</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $getmatch_sql = "select * from emp_eligibility where agencyid='$uid' and void='1' order by id asc";

                        $match_stmt = sqlsrv_query($conn, $getmatch_sql);

                        while($match_row = sqlsrv_fetch_array($match_stmt))
                        {
                          $elig_type = $match_row['elig_type'];

                          //get elig ref
                          $find_elig = "select * from ref_elig_main where id='$elig_type'";
                          $elig_stmt = sqlsrv_query($conn,$find_elig);
                          $elig_row= sqlsrv_fetch_array($elig_stmt);

                          $elig_id = $elig_row['id'];
                        
                          $elig_name = $elig_row['elig_name'];
                          $elig_type = $elig_row['elig_cat'];

                          //get elig category
                          $find_eligtype = "select * from ref_eligibility where id='$elig_type'";
                          $eligtype_stmt = sqlsrv_query($conn,$find_eligtype);
                          $eligtype_row= sqlsrv_fetch_array($eligtype_stmt);
                          $elig_type = $eligtype_row['elig_name'];

                          // echo "<td><a href='emp-edit-eligibility.php?uid=".$uid."&id=".$match_row['id']."' class='btn btn-success'><img src='assets/img/pen.svg'></a>
                          // <a href='scripts/emp-eligibility-del.php?uid=".$uid."&id=".$match_row['id']."' class='btn btn-danger'><img src='assets/img/trash.svg'></a>
                          // </td>";

                          
                          echo "<td>".$match_row['id']."</td>";

                          
                          echo "<td><b>".$elig_name."</b></td>";
                          echo "<td><b>".$elig_type."</b></td>";
                          echo '</tr>';
                        }

                        


                        

                    ?>
                    </tbody>
                  </table>
                    </div>
                </div>


              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Department of Health</span></strong>.<br> All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>