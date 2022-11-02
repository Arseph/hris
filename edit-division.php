<?php
session_start();
include "layouts\layout_sidebar.php";
$division_code=$_GET['div_code'];
$sql1= "select * from munit where div_code = '$division_code'";
$div_stmt = sqlsrv_query($conn,$sql1);
$row=sqlsrv_fetch_array($div_stmt);

$div_code = $row['div_code'];
$div_name = $row['mother_unit_long'];
$div_short = $row['mother_unit'];
?>

  <main id="main" class="main">
  <form method="post">
    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="add-divisions.php">Divisions List</a></li>
          <li class="breadcrumb-item active">Edit Division</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-7">
         <form method="post">
         <?php include "scripts/edit-division-script.php"; ?> 
         <div class="card">
            <div class="card-body">
            <br>
              <b>Division Name:</b><br>
              <input type='text' name='txt_divname' class='form-control' placeholder='e.g. Management Supoort Division' required value='<?php echo $div_name; ?>'>
              <br><b>Division Short Code:</b><br>
              <input type='text' name='txt_divshort' class='form-control' placeholder='e.g. MSD, LHSD' required value='<?php echo $div_short; ?>'>
              <div class="text-center"><br>
                <button class='btn btn-primary' name='btn_save'>Submit</button>
                <a href='add-divisions.php' class='btn btn-secondary'>Return</a>
              </div>
            </div>
          </div>
          </form>
    </section>
  </form>
  </main><!-- End #main -->

  <?php
  include "layouts\layout_footer.php";
  ?>

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