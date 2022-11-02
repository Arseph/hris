<?php
session_start();
$user_id=$_GET['uid'];
$id=$_GET['id'];
include "layouts\layout_sidebar.php";
include "scripts\connect.php";


$data_sql = "select * from emp_eligibility where id='$id'";
$data_stmt = sqlsrv_query($conn, $data_sql);
$data_row = sqlsrv_fetch_array($data_stmt);
$data_eligtype = $data_row['elig_type'];
$data_rating = $data_row['rating'];

$data_date = $data_row['date_start'];
$data_place = $data_row['place_start'];

$data_license = $data_row['license_no'];
$data_valid = $data_row['valid_date'];


 include "scripts/emp-edit-eligibility-script.php"; 

?>

  <main id="main" class="main">
  <form method="post">
    <div class="pagetitle">
      <h1>Edit Eligibility</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">
            <?php 
            echo "<a href='emp-eligibility-list.php?uid=".$user_id."'>Employee Eligibility List</a>";
            ?>            
          </li>
          <li class="breadcrumb-item">Edit</li>
          <li class="breadcrumb-item"><?php echo $row['firstname']." ".$row['surname']; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-8">

         <div class="card">
            <div class="card-body">
             
          <form method="post">
            
              <br>
              <label><B>Eligibility Type: </B></label><br><br>

              <select class="form-control" name='elig_select'>
                <option  value='0'>- Select -</option>
                <?php
               

                //get elig ref list
                $get_ref_elig = "select * from ref_elig_main where void='1' order by elig_name asc";
                $ref_stmt = sqlsrv_query($conn,$get_ref_elig);

                while($ref_row = sqlsrv_fetch_array($ref_stmt))
                {
                  echo "<option value='".$ref_row['id']."' ";
                  if($ref_row['id']==$data_eligtype)
                  {
                    echo "selected";
                  }
                  echo " >".$ref_row['elig_name']."</option>";
                }
                
               ?>
              </select>
              <br>
              <label><B>Rating (If Applicable): </B></label>
              <input type='text' name='txt_rating' class='form-control' value='<?php echo $data_rating; ?>'><br>

              <label><B>Date of Examination/Confirment: </B></label>
              <input type='date' name='date_start' class='form-control'  value='<?php echo $data_date; ?>' required><br>


              <label><B>Place of Examination/Confirment: </B></label>
              <input type='text' name='txt_place' class='form-control'  value='<?php echo $data_place; ?>' required><br>

              <label><B>License Number(If Applicable): </B></label>
              <input type='text' name='txt_license' class='form-control' value='<?php echo $data_license; ?>'><br>

              <label><B>License Validity Date(If Applicable): </B></label>
              <input type='date' name='date_valid' class='form-control' value='<?php echo $data_valid; ?>'><br>


              <div class="text-center"> 
                <button class="btn btn-primary" name='btn_save'>Submit</button>


                <?php
              echo "<a class='btn btn-secondary' href='emp-eligibility-list.php?uid=".$user_id."'>Return</a>";
              ?>
              </div>
              
            </div>
          </form>
          </div>
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