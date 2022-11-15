   <?php

    //basic info
$uid=$_SESSION['user_id']; // get link value
$pds_progress= 0;


$params = array();
$options = array("Scrollable"=> SQLSRV_CURSOR_KEYSET);

//get basic date entry
$sql = "select * from HR_INFO where agencyid='$uid'";
$create_acc_stmt = sqlsrv_query($conn, $sql, $params, $options);

$basic_result = sqlsrv_num_rows($create_acc_stmt);

if($basic_result>0)
{
  $row = sqlsrv_fetch_array($create_acc_stmt);
  $date_hired = $row['date_hired'];

  $pds_progress += 10;

}

//get identification date entry
$check_iden = "select * from emp_identification where agencyid='$uid'";
$checkiden_stmt = sqlsrv_query($conn, $check_iden, $params, $options);
$checkiden_count = sqlsrv_num_rows($checkiden_stmt);

$identification_count = 0;

if($checkiden_count>0)
{

  $checkiden_row = sqlsrv_fetch_array($checkiden_stmt);
  $checkiden_id = $checkiden_row['id'];

  $sql = "select * from audit_trail where record_id='$checkiden_id' order by id desc";

  $audit_identification = sqlsrv_query($conn, $sql, $params, $options);

  $identification_count = sqlsrv_num_rows($audit_identification);

  if($identification_count>0)
  {
   $row = sqlsrv_fetch_array($audit_identification);
   $identification_date = $row['action_date']; 

   $pds_progress += 10;
  }
}




//get address date entry

$checkadd = "select * from emp_address where agencyid='$uid'";
$checkadd_stmt = sqlsrv_query($conn, $checkadd, $params, $options);
$checkadd_count = sqlsrv_num_rows($checkadd_stmt);

$address_count = 0;

if($checkadd_count>0)
{

  $checkadd_row = sqlsrv_fetch_array($checkadd_stmt);
  $checkadd_id = $checkadd_row['id'];

      $sql = "select * from audit_trail where record_id='$checkadd_id' order by id desc";

      $audit_address = sqlsrv_query($conn, $sql, $params, $options);

      $address_count = sqlsrv_num_rows($audit_address);

      if($address_count>0)
      {
       $row = sqlsrv_fetch_array($audit_address);
       $address_date = $row['action_date']; 

       $pds_progress += 10;
      }
}

//get family date entry
$sql = "select * from audit_trail where agencyid='$uid' and affected_record='Family Information' order by id desc";

$audit_family = sqlsrv_query($conn, $sql, $params, $options);

$family_count = sqlsrv_num_rows($audit_family);

if($family_count>0)
{
 $row = sqlsrv_fetch_array($audit_family);
 $family_date = $row['action_date']; 

 $pds_progress += 10;
}

//misc data entry
$checkmisc = "select * from emp_miscinfo where agencyid='$uid'";
$checkmisc_stmt = sqlsrv_query($conn, $checkmisc, $params, $options);
$checkmisc_count = sqlsrv_num_rows($checkmisc_stmt);

$misc_count = 0;

if($checkmisc_count>0)
{
  $checkmisc_row = sqlsrv_fetch_array($checkmisc_stmt);
  $checkmisc_id = $checkmisc_row['id'];

  $sql = "select * from audit_trail where record_id='$checkmisc_id' order by id desc";

  $audit_misc = sqlsrv_query($conn, $sql, $params, $options);

  $misc_count = sqlsrv_num_rows($audit_misc);

  if($misc_count>0)
  {
   $row = sqlsrv_fetch_array($audit_misc);
   $misc_date = $row['action_date']; 

   $pds_progress += 10;
  }
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

 $pds_progress += 10;
}
   

///education segment //
// find the latest audit trail entry among the 4//

$edu_array = array();

//----  Find primary entry-----//
$count_primary_ed = "select * from emp_education_primary where agencyid = '$uid' and void='1' order by id desc";
$cprimary_stmt = sqlsrv_query($conn, $count_primary_ed, $params, $options);
$primary_numrow = sqlsrv_num_rows($cprimary_stmt);

if($primary_numrow>0)
{
  $cprimary_row = sqlsrv_fetch_array($cprimary_stmt);
  $cprimary_id = $cprimary_row['id'];

  //---get audit trail id ----//

  $audit_primary = "select TOP 1 * from audit_trail where record_id = '$cprimary_id' order by id desc";
  $audit_prim_stmt = sqlsrv_query($conn, $audit_primary);
  $audit_prim_row = sqlsrv_fetch_array($audit_prim_stmt);
  $audit_prim_id = $audit_prim_row['id'];

  $edu_array[] = $audit_prim_id;
}


//----  count secondary -----//
$count_secondary_ed = "select * from emp_education_secondary where agencyid = '$uid' and void='1' order by id desc";
$csecondary_stmt = sqlsrv_query($conn, $count_secondary_ed, $params, $options);
$secondary_numrow = sqlsrv_num_rows($csecondary_stmt);



if($secondary_numrow>0)
{
$csecondary_row = sqlsrv_fetch_array($csecondary_stmt);
$csecondary_id = $csecondary_row['id'];

//---get audit trail id ----//

  $audit_secondary= "select TOP 1 * from audit_trail where record_id = '$csecondary_id' order by id desc";
  $audit_sec_stmt = sqlsrv_query($conn, $audit_secondary);
  $audit_sec_row = sqlsrv_fetch_array($audit_sec_stmt);
  $audit_sec_id = $audit_sec_row['id'];

  $edu_array[] = $audit_sec_id;


}


//----  count Voluntary -----//
$count_vocational_ed = "select * from emp_education_vocational where agencyid = '$uid' and void='1' order by id desc";
$cvocational_stmt = sqlsrv_query($conn, $count_vocational_ed, $params, $options);
$vocational_numrow = sqlsrv_num_rows($cvocational_stmt);


if($vocational_numrow>0)
{

$cvocational_row = sqlsrv_fetch_array($cvocational_stmt);
$cvocational_id = $cvocational_row['id'];

//---get audit trail id ----//

  $audit_vocational= "select TOP 1 * from audit_trail where record_id = '$cvocational_id' order by id desc";
  $audit_voc_stmt = sqlsrv_query($conn, $audit_vocational);
  $audit_voc_row = sqlsrv_fetch_array($audit_voc_stmt);
  $audit_voc_id = $audit_voc_row['id'];

  $edu_array[] = $audit_voc_id;


}


//----  count tertiary -----//
$count_bachelors_ed = "select * from emp_education_bachelors where agencyid = '$uid' and void='1' order by id desc";
$cbachelors_stmt = sqlsrv_query($conn, $count_bachelors_ed, $params, $options);
$bachelors_numrow = sqlsrv_num_rows($cbachelors_stmt);


if($bachelors_numrow>0)
{

$cbachelors_row = sqlsrv_fetch_array($cbachelors_stmt);
$cbachelors_id = $cbachelors_row['id'];

//---get audit trail id ----//

  $audit_bachelors= "select TOP 1 * from audit_trail where record_id = '$cbachelors_id' order by id desc";
  $audit_bach_stmt = sqlsrv_query($conn, $audit_bachelors);
  $audit_bach_row = sqlsrv_fetch_array($audit_bach_stmt);
  $audit_bach_id = $audit_bach_row['id'];

  $edu_array[] = $audit_bach_id;


}


//----  count maphd -----//
$count_maphd_ed = "select * from emp_education_maphd where agencyid = '$uid' and void='1' order by id desc";
$cmaphd_stmt = sqlsrv_query($conn, $count_maphd_ed, $params, $options);
$maphd_numrow = sqlsrv_num_rows($cmaphd_stmt);

if($maphd_numrow>0)
{

$cmaphd_row = sqlsrv_fetch_array($cmaphd_stmt);
$cmaphd_id = $cmaphd_row['id'];

//---get audit trail id ----//

  $audit_maphd= "select TOP 1 * from audit_trail where record_id = '$cmaphd_id' order by id desc";
  $audit_maphd_stmt = sqlsrv_query($conn, $audit_maphd);
  $audit_maphd_row = sqlsrv_fetch_array($audit_maphd_stmt);
  $audit_maphd_id = $audit_maphd_row['id'];

  $edu_array[] = $audit_maphd_id;

}


$education_count=0;


if(($primary_numrow>0)||($secondary_numrow>0)||($vocational_numrow>0)||($bachelors_numrow>0)||($maphd_numrow>0))
{
  $last_edu_id = (max($edu_array));

    $get_edu_sql = "select TOP 1 * from audit_trail where id='$last_edu_id'";
    $get_edu_stmt = sqlsrv_query($conn, $get_edu_sql);
    $get_edu_row = sqlsrv_fetch_array($get_edu_stmt);
  


    $edu_action_date = $get_edu_row['action_date']; 
    $pds_progress += 10;

     $education_count++;
    

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

 $pds_progress += 10;
}else{
  $pds_progress += 10;
}

//voluntary work data entry
$check_volunteer = "select * from emp_volunteer where agencyid='$uid' and void='1'";
$checkvol_stmt = sqlsrv_query($conn, $check_volunteer, $params, $options);
$checkvol_num = sqlsrv_num_rows($checkvol_stmt);

$volunteer_count=0;

if($checkvol_num>0){

  $checkvol_row = sqlsrv_fetch_array($checkvol_stmt);
  $checkvol_id = $checkvol_row['id'];

  $sql = "select * from audit_trail where record_id='$checkvol_id' order by id desc";

  $audit_volunteer = sqlsrv_query($conn, $sql, $params, $options);

  $volunteer_count = sqlsrv_num_rows($audit_volunteer);

  if($volunteer_count>0)
  {
   $row = sqlsrv_fetch_array($audit_volunteer);
   $volunteer_date = $row['action_date']; 
   $pds_progress += 10;
  }else{
    $pds_progress += 10;
  }
}
  

//training history data entry
$check_train = "select * from emp_training where agencyid='$uid' and void='1'";
$checktrain_stmt = sqlsrv_query($conn, $check_train, $params, $options);
$count_checktrain = sqlsrv_num_rows($checktrain_stmt);

$training_count=0;

if($count_checktrain>0)
{
    $sql = "select * from audit_trail where agencyid='$uid' and affected_record like 'Training' order by id desc";

    $audit_training = sqlsrv_query($conn, $sql, $params, $options);

    $training_count = sqlsrv_num_rows($audit_training);

    if($training_count>0)
    {
     $row = sqlsrv_fetch_array($audit_training);
     $training_date = $row['action_date']; 
     $pds_progress += 10;
    }else{
      $pds_progress += 10;
    }
}
   ?>

   <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

            <div class="col-12">
              
              <!-- Card with an image on top -->
              <div class="card">
                <div class="card-body">
                  <h1 class="card-title">Welcome to the Human Resource Information System</h1>
                  <p class="card-text">Please Update your Personal Data Sheet as much as you can</p>

                  <p class="card-text">For Inquiries Please Contact the ICTU section</p>

                </div>
              </div>
          </div>
          <div class='col-12'>
              <div class="card">
            
              <div class="card-body">
                <h5 class="card-title">Data Completion Progress</h5>

                Completion Progress
                <!-- Progress Bars with labels-->
                <h4 class='text-center'><b>PDS Data Completion</b></h4>
                  <!-- Progress Bars with labels-->
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo $pds_progress; ?>%" aria-valuenow="<?php echo $pds_progress; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $pds_progress; ?>%
                    </div>
                  </div>
              <div class="row">
                  <div class="col-md-6"><br>
                <b>Basic Information: </b><?php if($basic_result>0){ echo "Last Updated On: "."<b>".$date_hired."</b>"; }else{ echo "<b style='color:red;'>unset</b>"; } ?><br>

                <b>Identification: </b><?php if($identification_count>0){ echo "Last Updated On: "."<b>".$identification_date."</b>"; }else{ echo "<b style='color:red;'>unset</b>"; } ?><br>

                <b>Miscellaneous Information: </b><?php if($misc_count>0){ echo "Last Updated on: "."<b>".$misc_date."</b>"; }else{ echo "<b style='color:red;'>unset</b>";}?><br>

                <b>Education History: </b><?php if($education_count>0){ echo "Last Updated on: "."<b>".$edu_action_date."</b>"; }else{ echo "<b style='color:red;'>unset</b>";}?><br>

                <b>Volunteer Work: </b> <?php if($volunteer_count>0){ echo "Last Updated on: "."<b>".$volunteer_date."</b>"; }else{ echo "<b style='color:red;'>No Voluntary Work</b>";}?>

              </div>
              <div class="col-md-6"><br>
                <b>Address: </b><?php if($address_count>0){ echo "Last Updated On: "."<b>".$address_date."</b>"; }else{ echo "<b style='color:red;'>unset</b>"; } ?><br>

                <b>Family Information: </b><?php if($family_count>0){ echo "Last Updated On: "."<b>".$family_date."</b>"; }else{ echo "<b style='color:red;'>unset</b>"; } ?><br>

                <b>Designation: </b><?php if($designation_count>0){ echo "Last Updated on: "."<b>".$designation_date."</b>"; }else{ echo "<b style='color:red;'>unset</b>";}?><br>

                <b>Eligibility: </b> <?php if($eligibility_count>0){ echo "Last Updated on: "."<b>".$eligibility_date."</b>"; }else{ echo "<b style='color:red;'>No Eligibility</b>";}?><br>

                <b>Training History: </b> <?php if($training_count>0){ echo "Last Updated on: "."<b>".$training_date."</b>"; }else{ echo "<b style='color:red;'>No Training</b>";}?>
                
              </div>
            </div>
              </div><!-- End Progress Bars with labels -->

            </div>
            </div>
     </div>

<div class="col-12">
                <div class='card'>
                  <div class='card-body'>
                    <h2 class='card-title'>Getting Started</h2>

                    <h4><b>How to Add/update My Personal Data Sheet Data</b></h4>

                    <!-- Default Accordion -->
              <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Step 1: Adding Basic Information
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <strong>This is the first Step In Completing your Personal Data Sheet.</strong><br><br>

                      Head to the left navigation panel and click update Basic Information<br><br>
                      <!-- <img src='assets/gifs/Basic-Information1.gif' width='90%' height='90%'><br><br> -->

                      <strong>Entering and Updating of Basic Information Data</strong><br><br>

                      Fill in all the required Information and Hit Submit button.

                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Step 2: Adding Address
                    </button>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <strong>This is the Second Step In Completing your Personal Data Sheet.</strong><br><br>

                      Head to the left navigation panel and click Add/Update Address<br><br>
                      <!-- <img src='assets/gifs/Basic-Information1.gif' width='90%' height='90%'><br><br> -->

                      <strong>Adding/Updating of Address Data</strong><br><br>

                      Fill in all the required Information and Hit Submit button.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Step 3: Adding Identification
                    </button>
                  </h2>
                  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                       <strong>This is the Third Step In Completing your Personal Data Sheet.</strong><br><br>

                      Head to the left navigation panel and click Add/Update Identification<br><br>
                      <!-- <img src='assets/gifs/Basic-Information1.gif' width='90%' height='90%'><br><br> -->

                      <strong>Adding/Updating of Identification Data</strong><br><br>

                      Fill in all the required Information and Hit Submit button.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                      Step 4: Adding Family Information
                    </button>
                  </h2>
                  <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                       <strong>This is the Fourth Step In Completing your Personal Data Sheet.</strong><br><br>

                      Head to the left navigation panel and click Add/Update Family Information<br><br>
                      <!-- <img src='assets/gifs/Basic-Information1.gif' width='90%' height='90%'><br><br> -->

                      <strong>Adding/Updating of Family Information Data</strong><br><br>

                      Fill in all the required Information and Hit Submit button.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                      Step 5: Adding Misc Information
                    </button>
                  </h2>
                  <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                       <strong>This is the Fifth Step In Completing your Personal Data Sheet.</strong><br><br>

                      Head to the left navigation panel and click Add/Update Misc Information<br><br>
                      <!-- <img src='assets/gifs/Basic-Information1.gif' width='90%' height='90%'><br><br> -->

                      <strong>Adding/Updating of Misc Information Data</strong><br><br>

                      Fill in all the required Information and Hit Submit button.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingSix">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                      Step 6: Adding Designation
                    </button>
                  </h2>
                  <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <strong>This is the Sixth Step In Completing your Personal Data Sheet.</strong><br><br>

                      Head to the left navigation panel and click Add/Update Designation Information<br><br>
                      <!-- <img src='assets/gifs/Basic-Information1.gif' width='90%' height='90%'><br><br> -->

                      <strong>Adding of Designation Data</strong><br><br>

                      Press the Add Designation Button, Fill in the required Information and hit submit button<br><br>

                      <strong>Updating of Designation Data</strong><br><br>

                      Press the Pencil Button to Edit/Update a previous entry. Fill in the required Information and hit submit button
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingSeven">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                      Step 7: Education History
                    </button>
                  </h2>
                  <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <strong>This is the Seventh Step In Completing your Personal Data Sheet.</strong><br><br>

                      Head to the left navigation panel and click Add/Update Education Data<br><br>
                      <!-- <img src='assets/gifs/Basic-Information1.gif' width='90%' height='90%'><br><br> -->

                      <strong>Adding of Education Data</strong><br><br>

                      Press the Add New Education, Fill in the required Information and hit submit button<br><br>

                      <strong>Updating of Education Data</strong><br><br>

                      Press the Pencil Button to Edit/Update a previous entry. Fill in the required Information and hit submit button
                    </div>
                  </div>
                </div>


                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingEight">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                      Step 8: Eligibility
                    </button>
                  </h2>
                  <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <strong>This is the Eight Step In Completing your Personal Data Sheet.</strong><br><br>

                      Head to the left navigation panel and click Add/Update Eligibility Data<br><br>
                      <!-- <img src='assets/gifs/Basic-Information1.gif' width='90%' height='90%'><br><br> -->

                      <strong>Adding of Eligibility Data</strong><br><br>

                      Press the Add New Eligibility, Fill in the required Information and hit submit button<br><br>

                      <strong>Updating of Education Data</strong><br><br>

                      Press the Pencil Button to Edit/Update a previous entry. Fill in the required Information and hit submit button
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingNine">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                      Step 9: Voluntary Work or Involvement In Civic / Non-Government / People / Voluntary Organizations/s
                    </button>
                  </h2>
                  <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <strong>This is the Ninth Step In Completing your Personal Data Sheet.</strong><br><br>

                      Head to the left navigation panel and click Add/Update Eligibility Data<br><br>
                      <!-- <img src='assets/gifs/Basic-Information1.gif' width='90%' height='90%'><br><br> -->

                      <strong>Adding of Voluntary Work Data</strong><br><br>

                      Press the Add New Voluntary Work, Fill in the required Information and hit submit button<br><br>

                      <strong>Updating of Voluntary Work Data</strong><br><br>

                      Press the Pencil Button to Edit/Update a previous entry. Fill in the required Information and hit submit button
                    </div>
                  </div>
                </div>


                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingNine">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                      Step 9: Training Data
                    </button>
                  </h2>
                  <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <strong>This is the Tenth Step In Completing your Personal Data Sheet.</strong><br><br>

                      Head to the left navigation panel and click Add/Update Training Data<br><br>
                      <!-- <img src='assets/gifs/Basic-Information1.gif' width='90%' height='90%'><br><br> -->

                      <strong>Adding of Training Data</strong><br><br>

                      Press the Add New Training, Fill in the required Information and hit submit button<br><br>

                      <strong>Updating of Training Data</strong><br><br>

                      Press the Pencil Button to Edit/Update a previous entry. Fill in the required Information and hit submit button
                    </div>
                  </div>
                </div>

              </div><!-- End Default Accordion Example -->
                  </div>
                </div>
            </div>
              
            
            </div>
        </div>
      </div>
    </section>