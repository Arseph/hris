<?php
session_start();

include "layouts\layout_sidebar.php";
include "scripts\connect.php";
include "scripts\admin-check.php";

$get_div_sql="select * from munit where div_void='1'";
$div_stmt = sqlsrv_query($conn,$get_div_sql);

$sec_code = $_GET['sec_code'];
$get_sec_sql="select * from mstation where sec_code='$sec_code'";
$sec_stmt = sqlsrv_query($conn,$get_sec_sql);
$sec_row = sqlsrv_fetch_array($sec_stmt);
$div_code = $sec_row['mother_unit'];
$mother_station = $sec_row['mother_station'];
$sec_short = $sec_row['sec_short'];
?>

  <main id="main" class="main">
  <form method="post">
    <div class="pagetitle">
      <h1>Edit Section Form</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="add-sections.php">Sections List</a></li>
          <li class="breadcrumb-item active">Edit Section</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-7">
         <form method="post">
         <?php include "scripts/edit-section-script.php"; ?> 
         <div class="card">
            <div class="card-body">
            <br>
               <b>Division/Office/Facility:</b>
               <select name='sel_division' class='form-control'>
                <option value='0'>- Select -</option>
                <?php
                while($rows = sqlsrv_fetch_array($div_stmt))
                {
                  echo "<option value='".$rows['div_code']."' ";

                    if($div_code==$rows['div_code'])
                    {
                      echo "selected";
                    }

                  echo ">".$rows['mother_unit_long']."</option>";
                }


                ?>
                 
               </select><br>
              <b>Section Name:</b><br>
              <input type='text' name='txt_secname' class='form-control' placeholder='e.g. Recrods, Planning, Cashier' required value='<?php echo $mother_station; ?>'>
              <br><b>Section Short Code:</b><br>
              <input type='text' name='txt_secshort' class='form-control' placeholder='e.g. NCD, ICT, HFEP' required value='<?php echo $sec_short; ?>'>
              <div class="text-center"><br>
                <button class='btn btn-primary' name='btn_update'>Submit</button>
                <a href='add-sections.php' class='btn btn-secondary'>Return</a>
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