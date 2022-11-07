<?php
session_start();
include "scripts\connect.php";
include "layouts\layout_sidebar.php";

include "scripts\admin-check.php";
//error_reporting(E_ALL ^ E_NOTICE);

?>



  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Create New Employee Account</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Create Employee Account</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
            <div class="card-body">
              <h5 class="card-title">Basic Information</h5>
              <?php
                include "scripts\basic-mssql.php";
              ?>

              <!-- General Form Elements -->
              <form action="" method="post"  enctype="multipart/form-data">

                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Profile:</label>
                  <div class="col-sm-10">
                    <img src="assets/img/personel-logo.jpg" alt="Profile" width="200px" height="200px">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="fileupload" class="col-sm-2 col-form-label">File Upload</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="imagepath" name="imagepath">
                  </div>
                </div>


                <div class="row mb-3">
                  <label for="surname" class="col-sm-2 col-form-label">Surname</label>
                  <div class="col-sm-10">
                    <input required type="text" class="form-control" name="surname" value="<?php if(isset($_POST['surname'])){ echo $_POST['surname']; }?>"  onkeydown="return /[a-z, ]/i.test(event.key)"
    onblur="if (this.value == '') {this.value = '';}"
    onfocus="if (this.value == '') {this.value = '';}">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="suffix" class="col-sm-2 col-form-label">Suffix</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="suffix" value="<?php if(isset($_POST['suffix'])){ echo $_POST['suffix']; }?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="firstname" class="col-sm-2 col-form-label">Firstname</label>
                  <div class="col-sm-10">
                    <input required type="text" class="form-control" name="firstname" name="suffix" value="<?php if(isset($_POST['firstname'])){ echo $_POST['firstname']; }?>" onkeydown="return /[a-z, ]/i.test(event.key)"
    onblur="if (this.value == '') {this.value = '';}"
    onfocus="if (this.value == '') {this.value = '';}">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Middle name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="middlename" value="<?php if(isset($_POST['middlename'])){ echo $_POST['middlename']; }?>" onkeydown="return /[a-z, ]/i.test(event.key)"
    onblur="if (this.value == '') {this.value = '';}"
    onfocus="if (this.value == '') {this.value = '';}">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="dob" class="col-sm-2 col-form-label">Date of Birth</label>
                  <div required class="col-sm-10">
                    <input type="date" class="form-control" name="dob" value="<?php if(isset($_POST['dob'])){ echo $_POST['dob']; }?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="pob" class="col-sm-2 col-form-label">Place of Birth</label>
                  <div class="col-sm-10">
                    <input required type="text" class="form-control"  name="pob" value="<?php if(isset($_POST['pob'])){ echo $_POST['pob']; }?>">
                  </div>
                </div>

                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="radiogender" id="male" value="male" required <?php echo (isset($_POST['radiogender']) && $_POST['radiogender'] == "male") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="gridRadios1">
                        Male
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="radiogender" id="female" required value="female"<?php echo (isset($_POST['radiogender']) && $_POST['radiogender'] == "female") ? "checked" : "";?>>
                      <label class="form-check-label" for="gridRadios2">
                        Female
                      </label>
                    </div>
                  </div>
                </fieldset>

                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Civil Status</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input  required class="form-check-input" type="radio" name="radiocivil" id="single" value="single" 
                      <?php echo (isset($_POST['radiocivil']) && $_POST['radiocivil'] == "single") ? "checked" : ""; ?>
                      >
                      <label class="form-check-label" for="radiocivil">
                        Single
                      </label>
                    </div>
                    <div class="form-check">
                      <input required class="form-check-input" type="radio" name="radiocivil" id="married" value="married" <?php echo (isset($_POST['radiocivil']) && $_POST['radiocivil'] == "married") ? "checked" : ""; ?>>
                      <label required class="form-check-label" for="radiocivil">
                        Married
                      </label>
                    </div>
                    <div class="form-check">
                      <input required class="form-check-input" type="radio" name="radiocivil" id="widowed" value="widowed" <?php echo (isset($_POST['radiocivil']) && $_POST['radiocivil'] == "widowed") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="radiocivil">
                        Widowed
                      </label>
                    </div>
                    <div class="form-check">
                      <input required class="form-check-input" type="radio" name="radiocivil" id="separated" value="separated" <?php echo (isset($_POST['radiocivil']) && $_POST['radiocivil'] == "separated") ? "checked" : ""; ?>>
                      <label class="form-check-label" for="radiocivil">
                        Separated
                      </label>
                    </div>
                  </div>
                </fieldset>

                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Citizenship</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input required class="form-check-input" type="radio" name="radiocitizen" id="filipino" value="filipino" <?php echo (isset($_POST['radiocitizen']) && $_POST['radiocitizen'] == "filipino") ? "checked" : ""; ?> onclick="hidedual()">
                      <label class="form-check-label" for="gridRadios1">
                        Filipino
                      </label>
                    </div>
                    <div class="form-check">
                      <input required class="form-check-input" type="radio" name="radiocitizen" id="dual" value="dual" <?php echo (isset($_POST['radiocitizen']) && $_POST['radiocitizen'] == "dual") ? "checked" : "";?> onclick="showdual()" >
                      <label class="form-check-label" for="gridRadios2">
                        Dual
                      </label>
                    </div>
                  </div>
                </fieldset>

                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Citizenship By</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input required class="form-check-input" type="radio" name="radiocitizenby" id="filipino" value="By Birth" <?php echo (isset($_POST['radiocitizenby']) && $_POST['radiocitizenby'] == "By Birth") ? "checked" : ""; ?> required>
                      <label class="form-check-label" for="gridRadios1">
                        By Birth
                      </label>
                    </div>
                    <div class="form-check">
                      <input required class="form-check-input" type="radio" name="radiocitizenby" id="dual" value="By Naturalization" <?php echo (isset($_POST['radiocitizenby']) && $_POST['radiocitizenby'] == "By Naturalization") ? "checked" : "";?> required>
                      <label class="form-check-label" for="gridRadios2">
                        By Naturalization
                      </label>
                    </div>
                  </div>
                </fieldset>

                <div class="row mb-3" id="ciddiv">
                  <label for="dual" class="col-sm-2 col-form-label" id="cidlabel" <?php echo (isset($_POST['radiodual']) && $_POST['radiodual'] == "dual") ? "style='display:block'" : "style='display:none'";?> >Country if dual</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="cid" id ="cidid" 
                    value="<?php if(isset($_POST['cid'])){ echo $_POST['cid'];}?>" 

                    <?php echo (isset($_POST['radiodual']) && $_POST['radiodual'] == "dual") ? "style='display:block'" : "style='display:none'";?>>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="height" class="col-sm-2 col-form-label">Height (Cm)</label>
                  <div class="col-sm-10">
                    <input  required type="number" class="form-control" name="height" value="<?php if(isset($_POST['height'])){ echo $_POST['height']; }?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="weight" class="col-sm-2 col-form-label">Weight (Kg)</label>
                  <div class="col-sm-10">
                    <input  required type="number" class="form-control" name="weight" value="<?php if(isset($_POST['weight'])){ echo $_POST['weight']; }?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Blood type</label>
                  <div class="col-sm-10">
                    <select required class="form-select" name="bloodtype">
                      <option selected value="0"> - SELECT - </option>
                      <option value="A+" <?php echo (isset($_POST['bloodtype']) && $_POST['bloodtype'] == "A+") ? "selected='selected'" : "";?>>A+</option>
                      <option value="B+" <?php echo (isset($_POST['bloodtype']) && $_POST['bloodtype'] == "B+") ? "selected='selected'" : "";?>>B+</option>
                      <option value="AB+" <?php echo (isset($_POST['bloodtype']) && $_POST['bloodtype'] == "AB+") ? "selected='selected'" : "";?>>AB+</option>
                      <option value="A-" <?php echo (isset($_POST['bloodtype']) && $_POST['bloodtype'] == "A-") ? "selected='selected'" : "";?>>A-</option>
                      <option value="B-" <?php echo (isset($_POST['bloodtype']) && $_POST['bloodtype'] == "B-") ? "selected='selected'" : "";?>>B-</option>
                      <option value="AB-" <?php echo (isset($_POST['bloodtype']) && $_POST['bloodtype'] == "AB-") ? "selected='selected'" : "";?>>AB-</option>
                      <option value="AB+" <?php echo (isset($_POST['bloodtype']) && $_POST['bloodtype'] == "AB+") ? "selected='selected'" : "";?>>AB+</option>
                      <option value="O+" <?php echo (isset($_POST['bloodtype']) && $_POST['bloodtype'] == "O+") ? "selected='selected'" : "";?>>O+</option>
                      <option value="O-" <?php echo (isset($_POST['bloodtype']) && $_POST['bloodtype'] == "O-") ? "selected='selected'" : "";?>>O-</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="username" class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-10">
                    <input  required type="text" class="form-control" name="username"  value="<?php if(isset($_POST['username'])){ echo $_POST['username']; }?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="v required password" class="col-sm-2 col-form-label" name="password">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="password" class="col-sm-2 col-form-label">Re-type password</label>
                  <div class="col-sm-10">
                    <input  required type="password" class="form-control" name="retype">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Userlevel</label>
                  <div class="col-sm-10">
                    <select required class="form-select" aria-label="multiple select example"  name="userlevel" >
                      <option selected value="0"> - SELECT - </option>
                      <?php
                    
                    include "scripts\connect.php";
                    $sql_empname = "select level_name,level from dbo.select_userlevel where  level > '1'";
                          
                            if($result = sqlsrv_query($conn, $sql_empname))
                            {

                                while($row = sqlsrv_fetch_array($result))
                                {

                                  $levelname = $row['level_name'];
                                  $level = $row['level'];

                                    if($_POST['userlevel'] == $level)
                                    {
                                        echo "<option value='".$level."' selected>".$levelname."</option>";
                                    }
                                    else
                                    {
                                        echo "<option value='".$level."' >".$levelname."</option>";
                                    }

                                }
                            }
                            ?> 
                    </select>
                  </div>
                </div>

                <div class="text-center">
                  <div class="col-sm-10">
                    <button type="submit" name="basicsave" class="btn btn-primary">Submit Form</button>
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

