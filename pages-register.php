<?php 
//include "scripts/account_check.php";
include "scripts/connection_script.php";
include "layouts/layout_sidebar.php";

?>

      <!-- script for dropdown -->
      <script type="text/javascript">
        $(document).ready(function(){

            $("#sel_departt").change(function(){
                var deptid = $(this).val();

                $.ajax({
                    url: 'scripts/getUsers.php',
                    type: 'post',
                    data: {departt:deptid},
                    dataType: 'json',
                    success:function(response){

                        var len = response.length;

                        $("#sel_user").empty();
                        for( var i = 0; i<len; i++){
                            var id = response[i]['id'];
                            var name = response[i]['name'];

                            $("#sel_user").append("<option value='"+id+"'>"+name+"</option>");

                        }
                    }
                });
            });

        });
    </script>
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

              <div class="d-flex justify-content-left">
                  <nav>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                      <li class="breadcrumb-item active">Register</li>
                    </ol>
                  </nav>
              </div><!-- End Page Title -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter personal details to create account</p>
                  </div>

                  <form class="row g-3 needs-validation" action="scripts/register_script.php" 
          method="post" novalidate>
                    <!--<div class="col-12">--> 

                  <!--Ajax dropdown-->
                  <!-- <div class="col-12"> -->
                   <!-- <div class="input-group has-validation"> -->
                      <br>
                      Department:
                      <select id="sel_departt" name="sel_depart" class="btn btn-info dropdown-toggle">
                          <option value="0">- Select -</option>
                          <?php 
                          // Fetch Department
                          $sql_department = "SELECT * FROM department";
                          $department_data = mysqli_query($conn,$sql_department);
                          while($row = mysqli_fetch_assoc($department_data) ){
                              $departid = $row['id'];
                              $depart_name = $row['depart_name'];
                            
                              // Option
                              echo "<option value='".$departid."' >".$depart_name."</option>";
                          }
                          ?>
                      </select>
                    <!--</div>
                   </div>-->


                      <br>Employee:
                      <select id="sel_user" name="sel_user" class="btn btn-info dropdown-toggle">
                          <option value="0">- Select -</option>
                      </select>

                    <!-- Ajax dropdown-->

                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    <!--</div>-->

                    <div class="col-12">
                      Username
                      <div class="input-group has-validation">
                        
                        <input type="text" name="username" class="form-control" id="yourUsername" placeholder="please enter a username" required>
                        <div class="invalid-feedback">Please choose a username.</div>
                      </div>
                    </div>

                    
                    <div class="col-12">
                      password
                      <div class="input-group has-validation">
                        <input type="password" name="password" class="form-control" id="yourPassword" placeholder="please enter a password" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>
                    </div>

                          <br>User level:

                    <select id="sel_level" name="sel_level" class="btn btn-info dropdown-toggle">
                          <option value="0">- Select -</option>
                          <?php 
                          // user level from db
                          $sql_userlevel = "SELECT * FROM userlevel";
                          $userlevel_data = mysqli_query($conn,$sql_userlevel);
                          while($row = mysqli_fetch_assoc($userlevel_data) ){
                              $ulevel_id = $row['id'];
                              $level_name = $row['levelname'];
                              $power_level = $row['powerlevel'];
                              // Option
                              echo "<option value='".$ulevel_id."' >".$level_name."</option>";
                          }
                          ?>
                    </select>

                          <div class="invalid-feedback">Please choose a username.</div>


                    <!-- i agree 
                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div>
                    
                    -->
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="create">Create Account</button>
                    </div>
                    <!-- already have an account
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="pages-login.html">Log in</a></p>
                    </div>
                    -->
                  </form>

                </div>
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