<?php
session_start();
include "scripts\connect.php";
include "layouts\layout_sidebar.php";

$uid=$_GET['uid']; // get link value
$sql = "select * from emp_identification where agencyid='$uid'";


if($result = sqlsrv_query($conn, $sql))
{
  while($row = sqlsrv_fetch_array($result))
  {
    $agencyid = $row['agencyid']; 
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
?>


  <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Updatng Employee ID: <?php echo $uid;?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">

      <div class="row">
        <div class="col-lg-8">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Update Identification form</h5>
              
              <!-- General Form Elements -->
              <form method="post" type="submit">
               <div class="row mb-3"> 
                <?php include "scripts\update-identification-script.php"; ?>
                   
                </div>
             
                <div class="row mb-3">
                  <label for="gsis_id" class="col-sm-2 col-form-label">GSIS ID No. </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="gsis_id" value="<?php if(isset($gsis_id)){ echo $gsis_id;}?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="pagibig_id" class="col-sm-2 col-form-label">PAGIBIG ID No. </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="pagibig_id" value="<?php if(isset($pagibig_id)){ echo $pagibig_id;}?>">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="philhealth_id" class="col-sm-2 col-form-label">PhilHealth ID No. </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="philhealth_id" value="<?php if(isset($philhealth_id)){ echo $philhealth_id;}?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="sss_id" class="col-sm-2 col-form-label">SSS ID No. </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="sss_id" value="<?php if(isset($sss_id)){ echo $sss_id;}?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="philhealth_id" class="col-sm-2 col-form-label">Passport</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="passport" value="<?php if(isset($passport)){ echo $passport;}?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="philhealth_id" class="col-sm-2 col-form-label">PRC</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="prc" value="<?php if(isset($prc)){ echo $prc;}?>">
                  </div>
                </div>

                <div class="row mb-3">
                   <label for="philhealth_id" class="col-sm-2 col-form-label">Drivers License</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="drivers" value="<?php if(isset($drivers)){ echo $drivers;}?>">

                  </div>
                  <label for="philhealth_id" class="col-sm-2 col-form-label">Issuance Date</label>
                  <div class="col-sm-3">
                    <input type="date" class="form-control" name="drivers_date" value="<?php if(isset($drivers_date)){ echo $drivers_date;}?>">
                  </div>
                </div>

                

                <div class="row mb-3">
                  <label for="email_ad" class="col-sm-2 col-form-label">Email Address  </label>
                  <div class="col-sm-10">
                    <input type="email_ad" class="form-control" name="email_ad" value="<?php if(isset($email_ad)){ echo $email_ad;}?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="tin_no" class="col-sm-2 col-form-label">TIN</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="tin_no" value="<?php if(isset($tin_no)){ echo $tin_no;}?>">
                  </div>
                </div>

                <div class="row mb-3">
                  
                  <div class="col-sm-11 text-center">
                    <button class="btn btn-primary" name="update_identification">Update</button>
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