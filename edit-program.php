<?php
session_start();
include "layouts\layout_sidebar.php";
include "scripts\admin-check.php";
include "scripts\admin-check.php";
$prog_code=$_GET['prog_code'];

$sql= "select * from ref_program where prog_code = '$prog_code'";
$prog_stmt = sqlsrv_query($conn,$sql);
$row=sqlsrv_fetch_array($prog_stmt);

$prog_desc = $row['prog_desc'];
$prog_short = $row['prog_short'];
$sec_code = $row['sec_code'];

$get_sec = "select * from mstation order by mother_station asc";
$sec_stmt = sqlsrv_query($conn,$get_sec);
$count_sec = sqlsrv_num_rows($sec_stmt);
?>

  <main id="main" class="main">
  <form method="post">
    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="programs-list.php">Programs List</a></li>
          <li class="breadcrumb-item active">Edit Program</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-7">
         <form method="post">
       <?php include "scripts/edit-program-script.php"; ?> 
         <div class="card">
            <div class="card-body">
            <br>
            <b>Section Handling the Program:</b>
               <select name="sel_section" class="form-control">
                <option value='0'>- Select - </option>
                 <?php
                  while($sec_row=sqlsrv_fetch_array($sec_stmt))
                  {
                    echo "<option value='".$sec_row['sec_code']."' ";
                    if($sec_code == $sec_row['sec_code'])
                    {
                      echo "selected";
                    }
                    echo ">".$sec_row['mother_station']."</option>";
                  }

                 ?>
               </select>
               <br>
              <b>Program Name:</b><br>
              <input type='text' name='txt_progname' class='form-control' placeholder='e.g. Management Supoort Division' required value='<?php echo $prog_desc; ?>'>
              <br><b>Program Short Code:</b><br>
              <input type='text' name='txt_progshort' class='form-control' placeholder='e.g. MSD, LHSD' required value='<?php echo $prog_short; ?>'>
              <div class="text-center"><br>
                <button class='btn btn-primary' name='btn_save'>Submit</button>
                <a href='programs-list.php' class='btn btn-secondary'>Return</a>
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