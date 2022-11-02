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
                <b>Basic Information: </b><?php if($basic_result>0){ echo "Last Updated On: "."<b>".$month_hired."/".$day_hired."/".$year_hired."</b>"; }else{ echo "<b style='color:red;'>unset</b>"; } ?><br>

                <b>Identification: </b><?php if($identification_count>0){ echo "Last Updated On: "."<b>".$identification_date."</b>"; }else{ echo "<b style='color:red;'>unset</b>"; } ?><br>

                <b>Miscellaneous Information: </b><?php if($misc_count>0){ echo "Last Updated on: "."<b>".$misc_date."</b>"; }else{ echo "<b style='color:red;'>unset</b>";}?><br>

                <b>Education History: </b><?php if($education_count>0){ echo "Last Updated on: "."<b>".$education_date."</b>"; }else{ echo "<b style='color:red;'>unset</b>";}?>
                
              </div>
              <div class="col-md-6"><br>
                <b>Address: </b><?php if($address_count>0){ echo "Last Updated On: "."<b>".$address_date."</b>"; }else{ echo "<b style='color:red;'>unset</b>"; } ?><br>

                <b>Family Information: </b><?php if($family_count>0){ echo "Last Updated On: "."<b>".$family_date."</b>"; }else{ echo "<b style='color:red;'>unset</b>"; } ?><br>

                <b>Designation: </b><?php if($designation_count>0){ echo "Last Updated on: "."<b>".$designation_date."</b>"; }else{ echo "<b style='color:red;'>unset</b>";}?><br>

                <b>Eligibility: </b> <?php if($eligibility_count>0){ echo "Last Updated on: "."<b>".$eligibility_date."</b>"; }else{ echo "<b style='color:red;'>No Eligibility Set</b>";}?>
                
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

                      <h3><b>A. Navigating to your Basic Information Page<b></h3>
                      <img src='assets/gifs/Basic-Information1.gif' width='90%' height='90%'><br><br>
                      <h3><b>B. Adding/Updating your Missing/Outdated Data<b></h3>
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
                      <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
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
                      <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
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
                      <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
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
                      <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
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
                      <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
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
                      <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
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
                      <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
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