<?php
session_start();

include "scripts\connect.php";
include "layouts\layout_sidebar.php";

include "scripts\kick.php";

$uid=$_GET['uid'];
$id = $_GET['id'];
$sql = "select * from emp_address where agencyid='$uid'";

if($result = sqlsrv_query($conn, $sql))
{
  while($row = sqlsrv_fetch_array($result))
  {
    $p_house = $row['p_house']; 
    $p_street = $row['p_street'];
    $p_village = $row['p_village'];
    $p_barangay = $row ['p_barangay'];
    $p_city = $row ['p_city'];
    $p_province = $row ['p_province'];
    $p_countrynum = $row ['p_countrynum'];
    $p_contact = $row ['p_contact'];
    $p_zip = $row ['p_zip'];

    $r_house = $row ['r_house']; 
    $r_street = $row ['r_street'];
    $r_village = $row ['r_village'];
    $r_barangay = $row ['r_barangay'];
    $r_city = $row ['r_city'];
    $r_province = $row ['r_province'];
    $r_countrynum = $row ['r_countrynum'];
    $r_contact = $row ['r_contact'];
    $r_zip = $row ['r_zip'];
  }

}


?>

  <main id="main" class="main">

  <form method="post">
    <div class="pagetitle">
      <h1>Update Address Form</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <?php
          if($_SESSION['userlevel']<3){
            echo '<li class="breadcrumb-item"><a href="employee-summary.php?uid='.$uid.'">Employee Summary</a></li>';
          }
          ?>
          <li class="breadcrumb-item active">Updating the Address of <?php echo $uid; ?></li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->
    <section class="section">
      <div class="row">


              <?php include "scripts/update-address-script.php" ?>


        <div class="col-lg-6">

         <div class="card">
            <div class="card-body">
              <h5 class="card-title">Residential Address</h5>
              
              <!-- No Labels Form -->
              <div class="row g-3">
                <div class="col-md-12">
                  <input type="text" class="form-control" placeholder="House/Block/Lot #" name="r_house" value="<?php if(isset($r_house)){ echo $r_house; }?>" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Street" name="r_street" value="<?php if(isset($r_street)){ echo $r_street; }?>" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Subdivision / Village" name="r_village"  value="<?php if(isset($r_village)){ echo $r_village; }?>" >
                </div>
                <div class="col-9">
                  <input type="text" class="form-control" placeholder="Barangay" name="r_barangay"  value="<?php if(isset($r_barangay)){ echo $r_barangay; }?>" required>
                </div>
                <div class="col-3">
                  <input type="text" class="form-control" placeholder="Zip Code" name="r_zip"  value="<?php if(isset($r_zip)){ echo $r_zip; }?>" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="City / Municipality" name="r_city"  value="<?php if(isset($r_city)){ echo $r_city; }?>" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Province" name="r_province" value="<?php if(isset($r_province)){ echo $r_province; }?>" >
                </div>

                <div class="col-md-2">
                  <label>Contact #: </label>
                </div>
                <div class="col-md-2">
                  <input type="text" class="form-control" value="+63" name="r_countrynum"  value="<?php if(isset($r_countrynum)){ echo $r_countrynum; }?>" required>
                </div>

                <div class="col-md-8">
                  <input type="number" class="form-control" name="r_contact" value="<?php if(isset($r_contact)){ echo $r_contact; }?>" required>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="update_address">Update Record</button>
                </div>
              </div><!-- End No Labels Form -->

            </div>
          </div>



        </div>

        <div class="col-lg-6">

         <div class="card">
            <div class="card-body">
              <h5 class="card-title">Permanent Address</h5>

              <!-- No Labels Form -->
             <div class="row g-3">
                <div class="col-md-12">
                  <input type="text" class="form-control" placeholder="House/Block/Lot #" name="p_house"  value="<?php if(isset($p_house)){ echo $p_house; }?>" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Street" name="p_street"  value="<?php if(isset($p_street)){ echo $p_street; }?>" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Subdivision / Village" name="p_village"  value="<?php if(isset($p_village)){ echo $p_village; }?>" >
                </div>
                <div class="col-9">
                  <input type="text" class="form-control" placeholder="Barangay" name="p_barangay"  value="<?php if(isset($p_barangay)){ echo $p_barangay; }?>" required>
                </div>
                <div class="col-3">
                  <input type="text" class="form-control" placeholder="Zip Code" name="p_zip"  value="<?php if(isset($p_zip)){ echo $p_zip; }?>" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="City / Municipality" name="p_city"  value="<?php if(isset($p_city)){ echo $p_city; }?>" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Province" name="p_province"  value="<?php if(isset($p_province)){ echo $p_province; }?>">
                </div>

                <div class="col-md-2">
                  <label>Contact #: </label>
                </div>
                <div class="col-md-2">
                  <input type="text" class="form-control" value="+63" name="p_countrynum"  value="<?php if(isset($p_contact)){ echo $p_contact; }?>" required>
                </div>

                <div class="col-md-8">
                  <input type="number" class="form-control" name="p_contact"  value="<?php if(isset($p_contact)){ echo $p_contact; }?>" required>
                </div>


              </div><!-- End No Labels Form -->

            </div>
          </div>

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