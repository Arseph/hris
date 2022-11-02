<?php
session_start();
$uid=$_SESSION['user_id'];



include "layouts\layout_sidebar.php";


?>

  <main id="main" class="main">
  <form method="post">
    <div class="pagetitle">
      <h1>Add Address Form</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Add Employee Address</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">

        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <?php include "scripts/address-add.php" ?>
                <h5 class="card-title">Select Employee</h5>

                <select name="sel_employee" class="form-select" required >  
                    <?php
                    
                    include "scripts\connect.php";

                    if ($_SESSION['userlevel']<3)
                    {
                      echo "<option value='0' Selected>- Select -</option>";

                      $sql_empname = "select * from dbo.emp_basic where firstname<>'admin' order by surname";

                      $result = sqlsrv_query($conn, $sql_empname);
                      

                      while($row = sqlsrv_fetch_array($result))
                      {
                        $agencyid = $row['agencyid'];
                       
                        $checkaddresss_sql= "select top 1 * from emp_address where agencyid='$agencyid' order by id desc";
                                                $paramm = array();
                        $options = array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                        $address_result = sqlsrv_query( $conn, $checkaddresss_sql , $paramm, $options);
                        $count_address = sqlsrv_num_rows( $address_result );


                         if($count_address<1)
                         {

                            $empsurname = $row['surname'];
                            $empfname = $row['firstname'];
                            $empmname = $row['middlename'];

                            if ($empmname!="")
                            {
                              $emp_fullname = $empsurname.", ".$empfname." ".$empmname.".";
                            } 
                            else 
                            {
                              $emp_fullname = $empsurname.", ".$empfname;
                            }

                            if($_POST['sel_employee'] == $agencyid)
                            {
                              echo "<option value='".$agencyid."' selected>".$emp_fullname."</option>";
                            }
                            else
                            {
                               echo "<option value='".$agencyid."' >".$emp_fullname."</option>";
                            }
                          }

                      }

                    }else{
                      $agencyid=$_SESSION['user_id'];
                      $get_address_sql= "select top 1 * from emp_basic where agencyid='$agencyid' order by id desc";
                      $result = sqlsrv_query($conn, $get_address_sql);
                      $row = sqlsrv_fetch_array($result);

                      $empsurname = $row['surname'];
                      $empfname = $row['firstname'];
                      $empmname = $row['middlename'];

                            if ($empmname!="")
                            {
                              $emp_fullname = $empsurname.", ".$empfname." ".$empmname.".";
                            } 
                            else 
                            {
                              $emp_fullname = $empsurname.", ".$empfname;
                            }

                            if($_POST['sel_employee'] == $agencyid)
                            {
                              echo "<option value='".$agencyid."' selected>".$emp_fullname."</option>";
                            }
                            else
                            {
                               echo "<option value='".$agencyid."' >".$emp_fullname."</option>";
                            }
                    }

                   ?> 
                    </select><br>

            </div>
          </div>
        </div>

        <div class="col-lg-6">

         <div class="card">
            <div class="card-body">
              <h5 class="card-title">Residential Address</h5>
              
              <!-- No Labels Form -->
              <div class="row g-3">
                <div class="col-md-12">
                  <input type="text" class="form-control" placeholder="House/Block/Lot #" name="r_house" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Street" name="r_street" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Subdivision / Village" name="r_village">
                </div>
                <div class="col-9">
                  <input type="text" class="form-control" placeholder="Barangay" name="r_barangay" required>
                </div>
                <div class="col-3">
                  <input type="number" class="form-control" placeholder="Zip Code" name="r_zip" required>
                </div>

                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="City / Municipality" name="r_city" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Province" name="r_province">
                </div>

                <div class="col-md-2">
                  <label>Contact #: </label>
                </div>
                <div class="col-md-2">
                  <input type="text" class="form-control" value="+63" name="r_countrynum" required>
                </div>

                <div class="col-md-8">
                  <input type="number" class="form-control" name="r_contact" required>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="lbtn">Submit</button>
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
                  <input type="text" class="form-control" placeholder="House/Block/Lot #" name="p_house" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Street" name="p_street" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Subdivision / Village" name="p_village">
                </div>
                <div class="col-9">
                  <input type="text" class="form-control" placeholder="Barangay" name="p_barangay" required>
                </div>
                <div class="col-3">
                  <input type="number" class="form-control" placeholder="Zip Code" name="p_zip" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="City / Municipality" name="p_city" required>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Province" name="p_province">
                </div>

                <div class="col-md-2">
                  <label>Contact #: </label>
                </div>
                <div class="col-md-2">
                  <input type="text" class="form-control" value="+63" name="p_countrynum" required>
                </div>

                <div class="col-md-8">
                  <input type="number" class="form-control" name="p_contact" required>
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