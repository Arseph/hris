


<?php
session_start();
include "layouts\layout_sidebar.php";
include "scripts\connect.php";
$uid=$_SESSION['user_id'];
$id=$_GET['id'];

if (!isset($_SESSION['user_id']))
{
    header('location:pages-login.php');
}

 // $getver_sql = "select TOP 1 record_version FROM emp_leave  ORDER BY record_version DESC";


  //find latest version record
 $leavedata_sql ="select * FROM emp_leave where id='$id'";
$result = sqlsrv_query($conn, $leavedata_sql);
$row = sqlsrv_fetch_array($result);

$file_date=$row['file_date'];
$db_leave_id=$row['leave_type'];
$place=$row['place'];
$inoutph=$row['inout_ph'];
$days_applied=$row['days_applied'];
$from_date=$row['from_date'];
$to_date=$row['to_date'];
$commutation=$row['commutation'];


if($db_leave_id==3)
{
 $getsick_sql = "select * from sick_leave where agencyid='$uid' and leave_id='$leave_id'";
 $result = sqlsrv_query($conn, $getsick_sql);
 $row = sqlsrv_fetch_array($result);

 $inout_hospital=$row['inout_hospital'];
 $illness=$row['illness'];
}
?>



<style type="text/css">

  .hide_element 
  {
    display: none;
  }

  .txt_to {
width: 30%;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #212529;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
</style>

<script>
  // function toggle_others(){
  //  var element = document.getElementById("txt_others");
  //  element.classList.toggle("hide_element");
  // }

  function hide_others(){
   document.getElementById("txt_others").classList.add("hide_element");
   document.getElementById("txt_others").required=false;
   document.getElementById("other_leave").classList.add("hide_element");
  }

  function show_others(){
   document.getElementById("txt_others").classList.remove("hide_element");
   document.getElementById("txt_others").required=true;
   document.getElementById("other_leave").classList.remove("hide_element");

  }

  function hide_sick(){
   document.getElementById("sick_leave").classList.add("hide_element");
   document.getElementById("yesno_hospital").required=false;
   document.getElementById("sick_illness").required=false;
  }

  function show_sick(){
   document.getElementById("sick_leave").classList.remove("hide_element");
   document.getElementById("yesno_hospital").required=true;
   document.getElementById("sick_illness").required=true;
  }

  function hide_women(){
   document.getElementById("women_leave").classList.add("hide_element");
   document.getElementById("women_illness").required=false;
  }

  function show_women(){
   document.getElementById("women_leave").classList.remove("hide_element");
   document.getElementById("women_illness").required=true;
  }

  function hide_study(){
   document.getElementById("study_leave").classList.add("hide_element");
   document.getElementById("master_bar").required=false;
  }

  function show_study(){
   document.getElementById("study_leave").classList.remove("hide_element");
   document.getElementById("master_bar").required=true;
  }

</script>

  <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="emp-leave-list.php">My Leaves</a></li>

          <li class="breadcrumb-item">Update Leave</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">

      <div class="row">
        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><b>Add Employee Leave Form</b></h3>
              <?php include "scripts/emp-update-leave-script.php"; ?>
              

              <!-- General Form Elements -->
              <form method="post" type="submit">
                
                <div class="row mb-3">
                  <label for ="" class="col-sm-2 col-form-label">Employee</label>
                  <div class="col-sm-10">
                    <select name="sel_employee" class="form-select">
                                    <?php
                    
                    include "scripts\connect.php";
                    $sql_empname = "select * from dbo.emp_basic where firstname<>'admin' and agencyid='$uid'";
                          
                            if($result = sqlsrv_query($conn, $sql_empname))
                            {

                                while($row = sqlsrv_fetch_array($result))
                                {

                                  $agencyid = $row['agencyid'];

                                  $checkidentification_sql= "select * from emp_identification where agencyid='$agencyid'";

                                  $paramm = array();
                                  $options = array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

                                  $identification_result = sqlsrv_query( $conn, $checkidentification_sql , $paramm, $options);

                                  $count_identification = sqlsrv_num_rows( $address_identification );

                                  if($count_identification<1)
                                  {
                                    $empsurname = $row['surname'];
                                    $empfname = $row['firstname'];
                                    $empmname = $row['middlename'];

                                    if ($empmname!="")
                                    {
                                    $emp_fullname = $empsurname.", ".$empfname." ".$empmname.".";
                                    } else {
                                      $emp_fullname = $empsurname.", ".$empfname;
                                    }


                                    echo "<option value='".$agencyid."' selected>".$emp_fullname."</option>";
                                  }

                                }
                            }
                            ?> 
                    </select>
                  </div>
                </div>
                <div>
                  <h5 class="card-title"><b>Date of Filing:</b></h5>
                  <input type='date' class='form-control' name='dof' value='<?php echo $file_date; ?>'required>
                </div>
                <br>
                <div>
                <h5 class="card-title"><b>Type of Leave</b></h5>
                
                  <?php 
                    $leave_sql = "select * from dbo.leave_list";
                    $stmt  = sqlsrv_query($conn,$leave_sql);
                    while( $row = sqlsrv_fetch_array($stmt))
                    {
                        $leave_id = $row['leave_id'];
                        $leave_type = $row['leave_type'];
                        $leave_details = $row['details'];

                        echo "<input type='radio' name='leave_type' onchange='";
                        if($leave_id!='3'){
                          echo "hide_sick();";
                        }else{
                          echo "show_sick();";
                        }
                        if($leave_id!='8'){
                          echo "hide_study();";
                        }else{
                          echo "show_study();";
                        }

                        if($leave_id!='11'){
                          echo "hide_women();";
                        }else{
                          echo "show_women();";
                        }

                        if($leave_id!='14'){
                          echo "hide_others();";
                        }else{
                          echo "show_others();";
                        }
                        echo "' value='$leave_id'";

                        if($leave_id=='1'){
                          echo "required";
                        }
                        if($db_leave_id==$leave_id){
                          echo " checked";
                        }
                        echo"><b>".$leave_type."</b>".$leave_details."<br>";
                    }
                  ?>
                  <input type='text' id='txt_others' class="form-control hide_element"<?php if(isset($_POST['txt_others'])){ echo $_POST['txt_others']; }?> name='txt_others'>
                </div>
                <br>
                <h5 class="card-title"><b>Details of Leave</b></h5>
                <div>
                  <b>Location</b><br>
                  <input type='radio' name='inout_ph' value='0' 
                  <?php 
                  if($inoutph=='0')
                    { echo "checked"; } 
                  ?>
                   required>Within Philippines<br>
                  <input type='radio' name='inout_ph' value='1'<?php 
                  if($inoutph=='1')
                    { echo "checked"; } 
                  ?>>Abroad
                  <input type='text' class='form-control' name='place' placeholder="Enter Location" value='<?php 
                   echo $place; 
                  ?>' required>
                </div>

                <div id='sick_leave' class='<?php if($db_leave_id!=3){ echo "hide_element"; }?>'>
                  <h5 class="card-title"><b>Sick Leave Details</b></h5>
                  <span><input type='radio' name='yesno_hospital' id='yesno_hospital' value='0' <?php if(($db_leave_id==3)&&($inout_hospital==0)){
                    echo "checked";
                  }?>>In Hospital</span>
                  <span><input type='radio' name='yesno_hospital' value='1' <?php if(($db_leave_id==3)&&($inout_hospital==1)){
                    echo "checked";
                  }?>>Out Patient</span><br>
                  <input type='text' class='form-control' name='sick_illness' id='sick_illness' placeholder="Specify Illness" value='<?php if($db_leave_id==3){
                    echo $illness;
                  }?>'>
                </div>

                <div id='women_leave' class='hide_element'>
                  <h5 class="card-title"><b>Specify Leave Benefits for Women Details</b></h5>
                  <textarea name='women_illness' id='women_illness' placeholder="Specify Illness" class="form-control"></textarea>
                </div>

                <br>
                <div>
                  <b>Number of working Days Applied for: </b><br>
                  <input type="number" class="form-control" name="days_applied" value='<?php echo $days_applied; ?>' required><br>
                  <!-- <b>From: </b><Input type="date" class="form-control" name="from_date" value='<?php echo $from_date; ?>' required><br> 
                    <b>To: </b><Input type="date" class="form-control" name="to_date" value='<?php echo $to_date; ?>' required>  -->

                    <b>From: </b><Input type="date" class="form-control" name="from_date" value='<?php if(isset($_POST['from_date'])){ echo $_POST['from_date']; }?>' required><br> 
                    <b>To: </b><Input type="date" class="form-control" name="to_date" value='<?php if(isset($_POST['from_date'])){ echo $_POST['from_date']; }?>' required>
                </div>
                <div id='study_leave' class='hide_element'>
                  <br>
                  <b>Study Leave Details</b><br>
                  <span><input type='radio' name='master_bar' value="0" id='master_bar'>Completion of Master's Degree</span><br>
                  <span><input type='radio' name='master_bar' value="1">BAR/Board Examination Review</span>
                </div>
                <br>
                <div id='other_leave' class='hide_element'>
                  <b>Other purpose</b><br>
                  <span><input type='radio' name='yesno_other' value='0'>Monetization of Leave Credits</span><br>
                  <span><input type='radio' name='yesno_other' value='1'>Terminal Leave</span>
                </div>
                <br>
                <div>
                  <b>Commutation</b><br>
                  <input type="radio" name='yesno_commutation' value='0'  <?php if($commutation==0){
                    echo "checked";
                  }?> required>Not Requested<br>
                  <input type="radio" name='yesno_commutation' value='1' <?php if($commutation==1){
                    echo "checked";
                  }?>>Requested
                </div>
                <div class="row mb-3">
                  <div class="col-sm-11 text-center">
                    <button class="btn btn-primary" name="btn_save">Submit</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>


    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
 <?php
  include "layouts\layout_footer.php";
  ?>
  <!-- End Footer -->

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