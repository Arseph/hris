<?php
session_start();
include "layouts\layout_sidebar.php";

?>

  <main id="main" class="main">
  <form method="post">
    <div class="pagetitle">
      <h1>Add Eligibility</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="eligibility-list.php">Eligibility List</a></li>
          <li class="breadcrumb-item active">Add Eligibility</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-7">
         <form method="post">
         <?php include "scripts/add-eligibility-main-script.php"; ?> 
         <div class="card">
            <div class="card-body">
            <br>
              <label>Eligibility Category</label>
              <select class='form-control' name='sel_eligcat'>
                <option value='0'>- Select -</option>
                <?php
                $get_eligcat = "select * from ref_eligibility where void !=0";
                $param =array();
                $option=array("Scrollable"=> SQLSRV_CURSOR_KEYSET);
                $eligcat_stmt = sqlsrv_query($conn, $get_eligcat, $param, $option);
                $count_eligcat = sqlsrv_num_rows($eligcat_stmt);
                if($count_eligcat>0){
                  while($row = sqlsrv_fetch_array($eligcat_stmt)){
                    echo "<option value='".$row['id']."'>".$row['elig_name']."</option>";
                  }
                }
                ?>
              </select>

              <br>
              <label>Eligibility Name</label>
              <input type='text' name='txt_eligname' class='form-control' placeholder='e.g. Registered Social Worker' required>

              <br>
              <label>Name Extension (If Applicable)</label>
              <input type='text' name='txt_ext' class='form-control' placeholder='e.g. RSW, RN, MD'>

              <div class="text-center"><br>
                <button class='btn btn-primary' name='btn_save'>Submit</button>
                <a href='eligibility-list.php' class="btn btn-secondary">Return</a>
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