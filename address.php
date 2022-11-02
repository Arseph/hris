<?php
session_start();
include "scripts\connection_script.php";

include "scripts\account_check.php";
include "layouts\layout_sidebar.php";
//error_reporting(E_ALL ^ E_NOTICE);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Address Add</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <? include "layouts/layout_header.php"; ?>

  <!-- ======= Sidebar ======= -->
  <? include "layouts/layout_aside.php"; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Employee Address</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Layouts</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-10">
          
 
          <?php include "scripts/address-add.php"; ?>
          <div class="card">
            <div class="card-body">
            
              <br><h5 class="card-title">Select Employee</h5>
              
                    <select name="sel_employee" class="form-select" required>
                        <option value="0">- Select -</option>
                                    <?php 

                                    // Fetch Department
                                    $sql_empname = "SELECT agencyid, surname, firstname FROM employee_basic WHERE address = 'unset'";
                                    $empname_result = mysqli_query($conn,$sql_empname);

                                    while($row = mysqli_fetch_assoc($empname_result) ){
                                        $agencyid = $row['agencyid'];
                                        $empsurname = $row['surname'];
                                        $empfname = $row['firstname'];

                                        $emp_fullname = $empsurname.", ".$empfname;
                                      
                                           if(isset($_POST['sel_employee'])){ 
                                            echo "<option value='".$agencyid."' selected>".$emp_fullname."</option>"; 
                                            }else{
                                              echo "<option value='".$agencyid."' >".$emp_fullname."</option>";
                                                }
                                            }
                                        ?>
                    </select>

              <!-- Horizontal Form -->
              
                <h5 class="card-title">Residential Address</h5>
                
               
                <form method="post" type="submit">

                  <div class="row mb-3">
                    <div class="col-sm-6">
                      <input type="text" class="form-control" placeholder="Street" name="r_street">
                    </div>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" placeholder="Subdivision / Village" name="r_village">
                    </div>
                  </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="rbtn">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
                </form>

                <div class="row mb-3">
                  <div>
                    <input type="text" class="form-control" placeholder="Barangay" name="r_barangay">
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="City / Municipality" name="r_city">
                  </div>
                   <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Province" name="r_province">
                  </div>
                </div>

                <div class="row mb-3">
                    Contact #:
                  <div class="col-sm-1">
                    <input type="text" class="form-control" VALUE="+63" name="r_countrynum">
                  </div>
                   <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="" name="r_contact">
                  </div>
                </div>

                

                 <h5 class="card-title">Residential Address</h5>

                <div class="row mb-3">
                  <div>
                    <input type="text" class="form-control" placeholder="House/Block/Lot #" name="p_house">
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Street" name="p_street">
                  </div>
                   <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Subdivision / Village" name="p_village">
                  </div>
                </div>

                <div class="row mb-3">
                  <div>
                    <input type="text" class="form-control" placeholder="Barangay" name="p_barangay">
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="City / Municipality" name="p_city">
                  </div>
                   <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Province" name="p_province">
                  </div>
                </div>

                <div class="row mb-3">
                    Contact #:
                  <div class="col-sm-1">
                    <input type="text" class="form-control" VALUE="+63" name="p_countrynum">
                  </div>
                   <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="" name="p_contact">
                  </div>
                </div>


               
              <!-- End Horizontal Form -->

            
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include "layouts/layout_footer.php";?>

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