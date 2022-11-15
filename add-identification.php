<?php
session_start();
include "layouts\layout_sidebar.php";
include "scripts\connect.php";
include "scripts\kick.php";

$agencyid=$_GET['uid'];
?>


  <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <?php

            if($_SESSION['userlevel']<3){
              echo'
              <li class="breadcrumb-item"><a href="adm-master-list.php">Employee Master List</a></li>
              <li class="breadcrumb-item"><a href="employee-summary.php?uid='.$agencyid.'">Employee Data Summary</a></li>
              ';
            }

          ?>
          <li class="breadcrumb-item">Add Employee Identification</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">

      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Employee Identification Form</h5>
              <?php include "scripts\identification-add-mssql.php"; ?>
              

              <!-- General Form Elements -->
              <form method="post" type="submit">
                
                <div class="row mb-3">
                  <label for ="" class="col-sm-2 col-form-label">Select Employee</label>
                  <div class="col-sm-10">
                    <select name="sel_employee" class="form-select">
                    <?php
                  
                      
                      $get_address_sql= "select top 1 * from emp_basic where agencyid='$agencyid' order by id desc";
                      $result = sqlsrv_query($conn, $get_address_sql);
                      $row = sqlsrv_fetch_array($result);

                      $empsurname = $row['surname'];
                      $empfname = $row['firstname'];
                      $empmname = $row['middlename'];

                            if ($empmname!="")
                            {
                              $emp_fullname = $empsurname.", ".$empfname." ".$empmname.".";
                            } 
                            else 
                            {
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

                   ?> 
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="gsis_id" class="col-sm-2 col-form-label">GSIS ID No. </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="gsis_id">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="pagibig_id" class="col-sm-2 col-form-label">PAGIBIG ID No. </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="pagibig_id">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="philhealth_id" class="col-sm-2 col-form-label">PhilHealth ID No. </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="philhealth_id">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="sss_id" class="col-sm-2 col-form-label">SSS ID No. </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="sss_id">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="philhealth_id" class="col-sm-2 col-form-label">Passport</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="passport">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="philhealth_id" class="col-sm-2 col-form-label">PRC</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="prc">
                  </div>
                </div>

                <div class="row mb-3">
                   <label for="philhealth_id" class="col-sm-2 col-form-label">Drivers License</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="drivers">

                  </div>
                  <label for="philhealth_id" class="col-sm-2 col-form-label">Issuance Date</label>
                  <div class="col-sm-3">
                    <input type="date" class="form-control" name="drivers_date">
                  </div>
                </div>

                

                <div class="row mb-3">
                  <label for="email_ad" class="col-sm-2 col-form-label">Email Address  </label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email_ad">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="tin_no" class="col-sm-2 col-form-label">TIN</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="tin_no">
                  </div>
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