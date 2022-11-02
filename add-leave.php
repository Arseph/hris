<?php
session_start();
include "layouts\layout_sidebar.php";
include "scripts\connect.php";
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
   var element = document.getElementById("txt_others");
   element.classList.add("hide_element");
  }

  function show_others(){
   var element = document.getElementById("txt_others");
   element.classList.remove("hide_element");
  }
</script>

  <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Add Employee Leave</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">

      <div class="row">
        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Employee Leave Form</h5>
              <?php include "scripts\identification-add-mssql.php"; ?>
              

              <!-- General Form Elements -->
              <form method="post" type="submit">
                
                <div class="row mb-3">
                  <label for ="" class="col-sm-2 col-form-label">Select Employee</label>
                  <div class="col-sm-10">
                    <select name="sel_employee" class="form-select">
                        <option value="0" Selected>- Select -</option>
                                    <?php
                    
                    include "scripts\connect.php";
                    $sql_empname = "select * from dbo.emp_basic where firstname<>'admin' order by surname";
                          
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

                                      if($_POST['sel_employee'] == $agencyid)
                                      {
                                          echo "<option value='".$agencyid."' selected>".$emp_fullname."</option>";
                                      }
                                      else
                                      {
                                          echo "<option value='".$agencyid."' >".$emp_fullname."</option>";
                                      }
                                  }

                                }
                            }
                            ?> 
                    </select>
                  </div>
                </div>
                
                <div>
                <h5 class="card-title"><b>Type of Leave</b></h5>
                  <input type="radio" name='leave_type' onchange='hide_others()'><b>Vacation Leave</b> (Sec 51, Rule XVI, Omnibus Rules Implementing E.O. No. 292)<br>
                  <input type="radio" name='leave_type' onchange='hide_others()'><b>Mandatory/Forced Leave</b> (Sec 25, Rule XVI, Omnibus Rules Implementing E.O. No. 292)<br>
                  <input type="radio" name='leave_type' onchange='hide_others()'><b>Sick Leave</b> (Sec 43, Rule XVI, Omnibus Rules Implementing E.O. No. 292)<br>
                  <input type="radio" name='leave_type' onchange='hide_others()'><b>Maternity Leave</b> (R.A. No. 11210 / IRR Issued by CSC, DOLE SSS)<br>
                  <input type="radio" name='leave_type' onchange='hide_others()'><b>Paternity Leave</b> (R.A. No. 8187 / CSC MC No. 71, S. 1998, as amended)<br>
                  <input type="radio" name='leave_type' onchange='hide_others()'><b>Special Privilege Leave</b> (Sec 21, Rule XVI, Omnibus Rules Implementing E.O. No. 292)<br>
                  <input type="radio" name='leave_type' onchange='hide_others()'><b>Solo Parent Leave</b> (R.A. No. 8972/ CSC MC No. 8, s. 2004)<br>
                  <input type="radio" name='leave_type' onchange='hide_others()'><b>Study Leave</b> (Sec 68, Rule XVI, Omnibus Rules Implementing E.O. No. 292)<br>
                  <input type="radio" name='leave_type' onchange='hide_others()'><b>10-DAY VAWC Leave</b> (R.A. 9262 / CSC MC No. 15, s. 2005)<br>
                  <input type="radio" name='leave_type' onchange='hide_others()'><b>Rehabilitation Leave</b> (Sec 55, Rule XVI, Omnibus Rules Implementing E.O. No. 292)<br>
                  <input type="radio" name='leave_type' onchange='hide_others()'><b>Special Leave Benefits for women</b> (R.A. No. 9710 / CSC MC No. 25, s. 2010)<br>
                  <input type="radio" name='leave_type' onchange='hide_others()'><b>Special Emergency (Calamity) Leave</b> (CSC MC No. 2, s. 2012, as amended)<br>
                  <input type="radio" name='leave_type' onchange='hide_others()'><b>Adoption Leave</b> (R.A. No. 8552)<br>
                  <input type="radio" name='leave_type' onchange='show_others()'><b>Others</b> <input type="text" class="txt_to hide_element" id="txt_others"><br>
                </div>
                <br>
                <h3><b>Details of Leave</b></h3>
                <div>
                  <h5 class="card-title"><b>Location</b></h5>
                  <span><input type='radio' name='yesno_location'>Within Philippines</span>
                  <span><input type='radio' name='yesno_location'>Abroad</span><br>
                  <input type='text' class='form-control' name='location' placeholder="Enter Location">
                </div>
                <div>
                  <h5 class="card-title"><b>Sick Leave</b></h5>
                  <span><input type='radio' name='yesno_hospital'>In Hospital</span>
                  <span><input type='radio' name='yesno_hospital'>Out Patient</span><br>
                  <input type='text' class='form-control' name='location' placeholder="Specify Illness">
                </div>
                <div>
                  <h5 class="card-title"><b>Specify Leave Benefits for Women</b></h5>
                  <textarea  name='location' placeholder="Specify Illness" class="form-control"></textarea>
                </div>
                <br>
                <div>
                  <h5 class="card-title"><b>Days Details</b></h5>
                  <b>Number of working Days Applied for: </b><br><input type="text" class="form-control">
                  <br><b>From: </b><Input type="date" class="form-control"><br> 
                    <b>To: </b><Input type="date" class="form-control"> 
                </div>
                <br>
                <div>
                  <h5 class="card-title"><b>Commutation</b></h5>
                  <input type="radio" name='yesno_commutation'>Not Requested
                  <input type="radio" name='yesno_commutation'>Requested
                </div>
                <div class="row mb-3">
                  <div class="col-sm-11 text-center">
                    <button class="btn btn-primary" name="save">Submit</button>
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