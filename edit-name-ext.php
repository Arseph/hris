<?php
session_start();
include "layouts\layout_sidebar.php";
$id = $_GET['id'];

$get_ext_sql = "select * from extension_list where id='$id'";
$stmt = sqlsrv_query($conn,$get_ext_sql);
$ext_list_row = sqlsrv_fetch_array($stmt);
?>

  <main id="main" class="main">
  <form method="post">
    <div class="pagetitle">
      <h1>Add Name Extension Form</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="name-extension-list.php">Edit Name Extension</a></li>
          <li class="breadcrumb-item active">Edit Name Extension Form</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-5">
         <form method="post">
         <?php include "scripts/edit-name-ext-script.php"; ?> 
         <div class="card">
            <div class="card-body">
            <br>
              <label><b><h5>Name Extension</h5></b></label><br>
              <input type='text' name='ext_name' class='form-control' placeholder='e.g. MD, RSW, RN' value='<?php echo $ext_list_row['ext_name'];?>' required>
              <div class="text-center"><br>
                <button class='btn btn-primary' name='btn_update'>Update</button>
                <a href='name-extension-list.php' class="btn btn-secondary">Return</a>
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