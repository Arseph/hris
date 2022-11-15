<?php
session_start();
include "scripts\connect.php";
include "layouts\layout_sidebar.php";
include "scripts\kick.php";
//error_reporting(E_ALL ^ E_NOTICE);
$uid = $_GET['uid'];

?>



  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Employee Training</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <?php
          if($_SESSION['userlevel']<3)
          {
            echo '<li class="breadcrumb-item"><a href="adm-master-list.php">Employee Master List</a></li>';

            echo '<li class="breadcrumb-item"><a href="employee-summary.php?uid='.$uid.'">Employee Summary</a></li>';


          }
          ?>
          <li class="breadcrumb-item"><a href="<?php echo 'emp-training-list.php?uid='.$uid; ?>">Trainings History</a></li>
          <li class="breadcrumb-item">Add new Training</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
            <div class="card-body">
              <h5 class="card-title"></h5>
              <?php
                include "scripts/emp-add-training-script.php";
              ?>

              <!-- General Form Elements -->
              <form action="" method="post"  enctype="multipart/form-data">

                <div class="row mb-3">
                  <label for="fileupload" class="col-sm-4 col-form-label">Certificate of Appearance</label>
                  <div class="col-sm-8" >
                    <input class="form-control" type="file" id="imagepath" name="imagepath" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="fileupload" class="col-sm-4 col-form-label">Certificate of Completion/Training</label>
                  <div class="col-sm-8">
                    <input class="form-control" type="file" id="imagepath" name="coc" required>
                  </div>
                </div>


                <div class="row mb-3">
                  <label for="surname" class="col-sm-4 col-form-label">Title of Learning and Development Interventions/Training Programs</label>
                  <div class="col-sm-8">
                    <input required type="text" class="form-control" name="title" value="<?php if(isset($_POST['title'])){ echo $_POST['title']; }?>">
                  </div>
                </div>
               
                
                <div class="row mb-3">
                  <label for="dob" class="col-sm-4 col-form-label">From</label>
                  <div required class="col-sm-8">
                    <input type="date" class="form-control" name="from_date" value="<?php if(isset($_POST['from_date'])){ echo $_POST['from_date']; }?>" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="dob" class="col-sm-4 col-form-label">To</label>
                  <div class="col-sm-8">
                    <input type="date" class="form-control" name="to_date" value="<?php if(isset($_POST['to_date'])){ echo $_POST['to_date']; }?>" required>
                  </div>
                </div>

                <div class="row mb-3">
                  
                  <label for="dob" class="col-sm-4 col-form-label">Number of Hours</label>

                  <div class="col-sm-8">
                    <input type='number' name='hours' class='form-control' value="<?php if(isset($_POST['hours'])){ echo $_POST['hours']; }?>" required>
                  </div>
                  
                </div>
                
                <br>

                <div class="row mb-3">
                  
                  <label for="dob" class="col-sm-4 col-form-label">Learning & Development Type</label>

                  <div required class="col-sm-8">
                    <select name='sel_ldtype' class='form-control'>
                      <option value='0'>- Select -</option>
                      <option value='1' <?php if((isset($_POST['sel_ldtype']))&&($_POST['sel_ldtype']=='1')){ echo "selected"; }?>>Managerial</option>
                      <option value='2' <?php if((isset($_POST['sel_ldtype']))&&($_POST['sel_ldtype']=='2')){ echo "selected"; }?>>Supervisory</option>
                      <option value='3' <?php if((isset($_POST['sel_ldtype']))&&($_POST['sel_ldtype']=='3')){ echo "selected"; }?>>Technical</option>
                      <option value='4' <?php if((isset($_POST['sel_ldtype']))&&($_POST['sel_ldtype']=='4')){ echo "selected"; }?>>Foundation</option>
                    </select>
                  </div>
                </div>
                <br>

                <br>

                <div class="row mb-3">
                  
                  <label for="dob" class="col-sm-4 col-form-label">Conducted/Sponsored by</label>

                  <div required class="col-sm-8">
                    <textarea name='txt_conduct' class='form-control' required><?php if(isset($_POST['txt_conduct'])){ echo $_POST['txt_conduct']; }?> </textarea>
                  </div>
                  <br><br><br>


                <div class="text-center">
                  <div class="col-sm-12">
                    <button type="submit" name="basicsave" class="btn btn-primary">Submit Form</button>
                    <a class='btn btn-secondary' href="<?php echo 'emp-training-list.php?uid='.$uid; ?>">Cancel</a>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

        <!--
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Advanced Form Elements</h5>

              Advanced Form Elements 
              <form>
                <div class="row mb-5">
                  <label class="col-sm-2 col-form-label">Switches</label>
                  <div class="col-sm-10">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                      <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDisabled" disabled>
                      <label class="form-check-label" for="flexSwitchCheckDisabled">Disabled switch checkbox input</label>
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckCheckedDisabled" checked disabled>
                      <label class="form-check-label" for="flexSwitchCheckCheckedDisabled">Disabled checked switch checkbox input</label>
                    </div>
                  </div>
                </div>

                <div class="row mb-5">
                  <label class="col-sm-2 col-form-label">Ranges</label>
                  <div class="col-sm-10">
                    <div>
                      <label for="customRange1" class="form-label">Example range</label>
                      <input type="range" class="form-range" id="customRange1">
                    </div>
                    <div>
                      <label for="disabledRange" class="form-label">Disabled range</label>
                      <input type="range" class="form-range" id="disabledRange" disabled>
                    </div>
                    <div>
                      <label for="customRange2" class="form-label">Min and max with steps</label>
                      <input type="range" class="form-range" min="0" max="5" step="0.5" id="customRange2">
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Floating labels</label>
                  <div class="col-sm-10">
                    <div class="form-floating mb-3">
                      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                      <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                      <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                      <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;"></textarea>
                      <label for="floatingTextarea">Comments</label>
                    </div>
                    <div class="form-floating mb-3">
                      <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                      <label for="floatingSelect">Works with selects</label>
                    </div>
                  </div>
                </div>

                <div class="row mb-5">
                  <label class="col-sm-2 col-form-label">Input groups</label>
                  <div class="col-sm-10">
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">@</span>
                      <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                      <span class="input-group-text" id="basic-addon2">@example.com</span>
                    </div>

                    <label for="basic-url" class="form-label">Your vanity URL</label>
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                      <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                    </div>

                    <div class="input-group mb-3">
                      <span class="input-group-text">$</span>
                      <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                      <span class="input-group-text">.00</span>
                    </div>

                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Username" aria-label="Username">
                      <span class="input-group-text">@</span>
                      <input type="text" class="form-control" placeholder="Server" aria-label="Server">
                    </div>

                    <div class="input-group">
                      <span class="input-group-text">With textarea</span>
                      <textarea class="form-control" aria-label="With textarea"></textarea>
                    </div>
                  </div>
                </div>

              </form>

              End General Form Elements -->

            </div>
          </div>

        </div> 
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

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

<script>
    function hidedual(){
        var hidecid = document.getElementById("cidid");
        var hideciddiv = document.getElementById("ciddiv");

        hidecid.style.display = "none";
        cidlabel.style.display = "none";

    }

    function showdual(){
        var hidecid = document.getElementById("cidid");
        var hideciddiv = document.getElementById("ciddiv");

        hidecid.style.display = "block";
        cidlabel.style.display = "block";
        
    }
</script>

