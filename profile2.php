<?php
session_start();
include "scripts\connect.php";


include "layouts\layout_sidebar.php";


//very big data pull


//basic info
$uid=$_SESSION['user_id']; // get link value


//get basic info from database
$sql = "select * from emp_basic where agencyid='$uid'";

if($result = sqlsrv_query($conn, $sql))
{
  while($row = sqlsrv_fetch_array($result))
  {
    $agencyid = $row['agencyid'];
    $imagepath = $row['imagepath'];

    $surname = $row['surname'];
    $suffix = $row ['suffix'];
    $fname = $row ['firstname'];
    $mname = $row ['middlename'];

    $fullname = $fname." ".$mname." ".$surname." ".$suffix;

    $dob = $row ['dob'];
    $pob = $row ['pob'];
    $gender = $row ['gender'];
    $civil = $row ['civil'];
    $citizenship = $row ['citizenship'];
    $citizenshipby = $row ['citizenshipby'];
    $cid = $row ['cid'];
    $height = $row ['height'];
    $weight = $row ['weightt'];
    $bloodtype = $row ['bloodtype'];
    $username = $row ['username'];
    $password = $row ['pass'];
    $retype = $password;
    $userlevel = $row ['userlevel'];
    $address = $row ['addresss'];
  }
}

//get address from database
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

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <?php 
                       if($imagepath!="")
                        { 
                           
                           // echo "<img src='uploads/$imagepath' class='rounded-circle'>";
                           echo "<img src='uploads/$imagepath' width='120' height='150'>";  
                        } 
                        else 
                        { 
                          echo '<img src="assets/img/personel-logo.jpg" alt="Profile"  class="rounded-circle">'; 
                        }

                       ?>
              <!-- <h2>Sample Name</h2>
              <h3>Sample position</h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div> -->
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Basic</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Address</button>
                </li>

                <!--
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                </li>
                -->

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">About</h5>
                  <p class="small fst-italic">-</p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $fullname; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Date of Birth:</div>
                    <div class="col-lg-9 col-md-8"><?php echo $dob; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Place of Birth: </div>
                    <div class="col-lg-9 col-md-8"><?php echo $pob; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Gender: </div>
                    <div class="col-lg-9 col-md-8"><?php echo $gender; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Civil Status: </div>
                    <div class="col-lg-9 col-md-8"><?php echo $civil; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Citizenship: </div>
                    <div class="col-lg-9 col-md-8"><?php echo $citizenship; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Citizenship By: </div>
                    <div class="col-lg-9 col-md-8"><?php echo $citizenshipby; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Height: </div>
                    <div class="col-lg-9 col-md-8"><?php echo $height; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Weight: </div>
                    <div class="col-lg-9 col-md-8"><?php echo $weight; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Bloodtype: </div>
                    <div class="col-lg-9 col-md-8"><?php echo $bloodtype; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Username: </div>
                    <div class="col-lg-9 col-md-8"><?php echo $username; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Password: </div>
                    <div class="col-lg-9 col-md-8"><?php echo $password; ?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                  <b><h5><u>Permanent Address</u></h5></b>
                  <div>
                        <b>House/Block/Lot #:</b> 
                        <?php 
                        if(isset($p_house))
                          {
                            echo $p_house; 
                          }
                        ?><br>
                        <b>Street: </b ><?php if(isset($p_street)){echo $p_street; }?><br>
                        <b>Subdivision/Village: </b ><?php if(isset($p_village)){echo $p_village; }?><br>
                        <b>Barangay: </b ><?php if(isset($p_barangay)){echo $p_barangay; }?><br>
                        <b>Zip Code: </b ><?php if(isset($p_zip)){echo $p_zip; }?><br>
                        <b>City/Municipality: </b ><?php if(isset($p_city)){echo $p_city; }?><br>
                        <b>Province: </b ><?php if(isset($p_province)){echo $p_province; }?><br>
                        <b>Contact #: </b ><?php 
                        if((isset($p_countrynum))&&(isset($p_contact)))
                          {
                            echo $p_countrynum.$p_contact; 
                          }
                        ?><br>
                  </div>
                  <br>
                  <b><h5><u>Residential Address</u></h5></b>
                  <div>
                        <b>House/Block/Lot #:</b> 
                        <?php 
                        if(isset($p_house))
                          {
                            echo $p_house; 
                          }
                        ?><br>
                        <b>Street: </b ><?php if(isset($r_street)){echo $r_street; }?><br>
                        <b>Subdivision/Village: </b ><?php if(isset($r_village)){echo $r_village; }?><br>
                        <b>Barangay: </b ><?php if(isset($r_barangay)){echo $r_barangay; }?><br>
                        <b>Zip Code: </b ><?php if(isset($r_zip)){echo $r_zip; }?><br>
                        <b>City/Municipality: </b ><?php if(isset($r_city)){echo $r_city; }?><br>
                        <b>Province: </b ><?php if(isset($r_province)){echo $r_province; }?><br>
                        <b>Contact #: </b ><?php 
                        if((isset($r_countrynum))&&(isset($r_contact)))
                          {
                            echo $r_countrynum.$r_contact; 
                          }
                        ?><br>
                  </div>
                </div>









                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Department of Health</span></strong>.<br> All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      
    </div>
  </footer><!-- End Footer -->

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