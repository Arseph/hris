<?php
// if(isset($_SESSION['user_id'])){
  session_start();
  session_destroy();  
// }
include "scripts\connect.php";
// include "scripts\login_script.php";

session_start();

if (isset($_POST['login']))
{
  $username = utf8_decode($_POST['username']);
  $password = $_POST['password'];

                        
  $accountcheck_sql = "select * from user_accounts where username='$username' and pass='$password'";
  $paramm = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $stmt = sqlsrv_query( $conn, $accountcheck_sql , $paramm, $options);
    
    $total_account = sqlsrv_num_rows( $stmt );

    echo $total_account;

        if ($total_account > 0) 
        {     

            $row = sqlsrv_fetch_array($stmt);
            $agencyid= $row['agencyid'];
            $_SESSION['user_id'] = $agencyid;
            $_SESSION['userlevel']  = $row['userlevel'];
            

             $userlvl_sql = "select top 1 * from emp_basic where agencyid='$agencyid' order by id desc";
             $userlvl_stmt = sqlsrv_query($conn,$userlvl_sql);
             $userlvl_row = sqlsrv_fetch_array($userlvl_stmt);
             $_SESSION['firstname']  = $userlvl_row ['firstname'];
           

            //CHECK IF FIRST LOGIN
            $new_check_sql = "select * from audit_trail where agencyid='$agencyid' and action_type='3'";
            
            $paramm = array();
            $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
            $stmt = sqlsrv_query( $conn, $new_check_sql, $paramm, $options);
            $find_verify = sqlsrv_num_rows( $stmt );

            //IF FIRST LOGIN
            if($find_verify==0)
            {
                include "audit_first_login.php";
                
            }
            else
            {
                include "audit_login.php";
              header('location:index.php');

            }

        }else{
            $error_msg = '<br/><p style="color:red">incorrect username and/or password</p>';
        }
        

}    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HRIS - Login</title>
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

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.php" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/doh-logo.png" alt="">
                  <span class="d-lg-block">Human Resource Information System</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                  <form action="#" method="post">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <!--<span class="input-group-text" id="inputGroupPrepend"></span> -->
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <!-- <div class="invalid-feedback">Please enter your username.</div> -->
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      
                    </div>

                    <div class="col-12">
                      <!--
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        
                        <label class="form-check-label" for="rememberMe">Remember me</label>

                      </div>
                      -->
                    </div>
                    <div class="col-12">
                      <br><button class="btn btn-primary w-100" type="submit" name="login">Login</button>
                    </div>
                    <!--
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>
                    </div>
                    -->

                  </form>
                  <?php include "scripts/error_script.php" ?>
                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

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