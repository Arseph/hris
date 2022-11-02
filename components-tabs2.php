<?php
session_start();
include "scripts\connect.php";


include "layouts\layout_sidebar.php";


//very big data pull


//basic info
$uid=$_SESSION['user_id']; // get link value

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

    $fullname = $fname." ".$mname." ".$surname." ".$suffix;;

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

?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Tabs</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Components</li>
          <li class="breadcrumb-item active">Tabs</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Pills Tabs</h5>

              <!-- Vertical Pills Tabs -->
              <div class="d-flex align-items-start">

                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                  <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</button>

                  <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</button>

                  <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</button>

                </div>

                <!-- <div class="tab-content" id="v-pills-tabContent"> -->

                  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" >

                      <?php 
                       if($imagepath!="")
                        { 
                           
                           echo "<img src='uploads/$imagepath' width='150px' height='150px'><br>"; 
                        } 
                        else 
                        { 
                          echo '<img src="assets/img/personel-logo.jpg" alt="Profile"><br>'; 
                        }

                       ?>

                      <div>
                        <b>Full Name:</b> <?php echo $fullname; ?><br>
                        <b>Date of Birth: </b ><?php echo $dob; ?><br>
                        <b>Place of Birth: </b ><?php echo $pob; ?><br>
                        <b>Gender: </b ><?php echo $gender; ?><br>
                        <b>Civil Status: </b ><?php echo $civil; ?><br>
                        <b>Citizenship: </b ><?php echo $citizenship; ?><br>
                        <b>Citizenship By: </b ><?php echo $citizenshipby; ?><br>
                        <b>Height: </b ><?php echo $height; ?><br>
                        <b>Weight: </b ><?php echo $weight; ?><br>
                        <b>Bloodtype: </b ><?php echo $bloodtype; ?><br>
                        <b>Username: </b ><?php echo $username; ?><br>
                        <b>Password: </b ><?php echo $password; ?><br>
                      </div>

                  </div>
                <!-- </div> -->

                  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    Nesciunt totam et. Consequuntur magnam aliquid eos nulla dolor iure eos quia. Accusantium distinctio omnis et atque fugiat. Itaque doloremque aliquid sint quasi quia distinctio similique. Voluptate nihil recusandae mollitia dolores. Ut laboriosam voluptatum dicta.
                  </div>

                  <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis cumque. Accusantium quibusdam perspiciatis qui qui omnis magnam. Officiis accusamus impedit molestias nostrum veniam. Qui amet ipsum iure. Dignissimos fuga tempore dolor.
                  </div>
                  
                </div>
              </div>
              <!-- End Vertical Pills Tabs -->

            </div>
          </div>

        </div>

        

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
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