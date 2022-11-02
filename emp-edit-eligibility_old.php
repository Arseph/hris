<?php
session_start();

$user_id=$_GET['uid'];
$elig_type=$_GET['elig_type'];
$id = $_GET['id'];

include "layouts\layout_sidebar.php";
include "scripts\connect.php";

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
                    $getref_sql = "select * from ref_eligibility";
                    $ref_stmt = sqlsrv_query($conn, $getref_sql);


                    while($row=sqlsrv_fetch_array($ref_stmt))
                    {
                      echo "<option value='".$row['id']."' ";

                      if($row['id']==$elig_type)
                      {
                        echo "selected";
                      }

                      echo ">".$row['elig_name']."</option>";
                    }
               ?>
              </select>
              <br>
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