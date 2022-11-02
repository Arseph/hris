<?php
session_start();
include "layouts\layout_sidebar.php";

?>

  <main id="main" class="main">
  <form method="post">
    <div class="pagetitle">
      <h1>Add Eligibility Category</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="eligibility-type.php">Eligibility List</a></li>
          <li class="breadcrumb-item active">Add Eligibility Category</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-7">
         <form method="post">
         <?php include "scripts/add-eligibility-script.php"; ?> 
         <div class="card">
            <div class="card-body">
            <br>
              <label><b><h5>Add Eligibility</h5></b></label><br>
              <input type='text' name='txt_elig' class='form-control' placeholder='Eligibility name: Bar/Board Eligibility' required>
              
              <input type='text' name='txt_eligtype' class='form-control' placeholder='Eligibility Type: e.g. RA 1080,RA 7883' required>
              <div class="text-center"><br>
                <button class='btn btn-primary' name='btn_save'>Submit</button>
                <a href='eligibility-type.php' class="btn btn-secondary">Return</a>
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