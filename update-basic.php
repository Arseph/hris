<?php
session_start();
include "scripts\connect.php";
include "layouts\layout_sidebar.php";

//error_reporting(E_ALL ^ E_NOTICE);
?>

<?php

$uid=$_GET['uid']; // get link value
include "scripts\kick.php";


$sql = "select top 1 * from emp_basic where agencyid='$uid' order by id desc";

if($result = sqlsrv_query($conn, $sql))
{
  while($row = sqlsrv_fetch_array($result))
  {
    $agencyid = $row['agencyid'];
    $imagepath = $row['imagepath'];
    $surname = $row['surname'];
    $surname = utf8_encode($surname);
    $suffix = $row ['suffix'];
    $fname = $row ['firstname'];
    $mname = $row ['middlename'];
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
  }

}

?>

  <main id="main" class="main">

    <div class="pagetitle">
      
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <?php
          if($_SESSION['userlevel']<3){
            echo '<li class="breadcrumb-item"><a href="employee-summary.php?uid='.$uid.'">Employee Summary</a></li>';
          }
          ?>
          <li class="breadcrumb-item active">Updating Basic info of Employee ID: <?php echo $agencyid; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
            <div class="card-body">
              <h5 class="card-title">Update Basic Information Form</h5>

              <?php include "scripts\update-basic-script.php"; ?>

              <!-- General Form Elements -->
              <form action="" method="post"  enctype="multipart/form-data">

                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Profile:</label>
                  <div class="col-sm-10">
                    
                    <?php if($imagepath!=""){ echo "<img src='uploads/$imagepath' width='200px' height='200px'>"; } else { echo '<img src="assets/img/personel-logo.jpg" alt="Profile"'; }?>

                  </div>
                </div>

                <!-- <div class="row mb-3">
                  <label for="fileupload" class="col-sm-2 col-form-label">File Upload</label>
                  <div class="col-sm-10">
                    <?php echo "Current image: ".$imagepath."<br>"; ?>
                    <input class="" type="file" id="imagepath" name="imagepath" value="uploads/admin pic.jpg">

                  </div>
                </div> -->

                <div class="row mb-3">
                  <label for="surname" class="col-sm-2 col-form-label">Surname</label>
                  <div class="col-sm-10">
                    <input required type="text" class="form-control" name="surname" value="<?php  echo $surname; ?>"  onkeydown="return /[a-z, ]/i.test(event.key)"
    onblur="if (this.value == '') {this.value = '';}"
    onfocus="if (this.value == '') {this.value = '';}">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="suffix" class="col-sm-2 col-form-label">Suffix</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="suffix" value="<?php  echo $suffix; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="firstname" class="col-sm-2 col-form-label">Firstname</label>
                  <div class="col-sm-10">
                    <input required type="text" class="form-control" name="firstname" name="suffix" value="<?php  echo $fname; ?>" onkeydown="return /[a-z, ]/i.test(event.key)"
    onblur="if (this.value == '') {this.value = '';}"
    onfocus="if (this.value == '') {this.value = '';}">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Middle name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="middlename" value="<?php  echo $mname; ?>" onkeydown="return /[a-z, ]/i.test(event.key)"
    onblur="if (this.value == '') {this.value = '';}"
    onfocus="if (this.value == '') {this.value = '';}">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="dob" class="col-sm-2 col-form-label">Date of Birth</label>
                  <div required class="col-sm-10">
                    <input type="date" class="form-control" name="dob" value="<?php echo $dob; ?>" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="pob" class="col-sm-2 col-form-label">Place of Birth</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="pob" value="<?php  echo $pob; ?>" required>
                  </div>
                </div>

                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="radiogender" id="male" value="male" required <?php if($gender=="male"){
                        echo "checked";
                      } ?>>
                      <label class="form-check-label" for="gridRadios1">
                        Male
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="radiogender" id="female" required value="female"<?php if($gender=="female"){
                        echo "checked";
                      } ?>>
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
                      <?php if($civil=="single"){
                        echo "checked";
                      } ?>
                      >
                      <label class="form-check-label" for="radiocivil">
                        Single
                      </label>
                    </div>
                    <div class="form-check">
                      <input required class="form-check-input" type="radio" name="radiocivil" id="married" value="married" <?php if($civil=="married"){
                        echo "checked";
                      } ?>>
                      <label required class="form-check-label" for="radiocivil">
                        Married
                      </label>
                    </div>
                    <div class="form-check">
                      <input required class="form-check-input" type="radio" name="radiocivil" id="widowed" value="widowed" <?php if($civil=="widowed"){
                        echo "checked";
                      } ?>>
                      <label class="form-check-label" for="radiocivil">
                        Widowed
                      </label>
                    </div>
                    <div class="form-check">
                      <input required class="form-check-input" type="radio" name="radiocivil" id="separated" value="separated" <?php if($civil=="separated"){
                        echo "checked";
                      } ?>>
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
                      <input required class="form-check-input" type="radio" name="radiocitizen" id="filipino" value="filipino" <?php if($citizenship=="filipino"){
                        echo "checked";
                      } ?> onclick="hidedual()">
                      <label class="form-check-label" for="gridRadios1">
                        Filipino
                      </label>
                    </div>
                    <div class="form-check">
                      <input required class="form-check-input" type="radio" name="radiocitizen" id="dual" value="dual" <?php if($citizenship=="dual"){
                        echo "checked";
                      } ?> onclick="showdual()" >
                      <label class="form-check-label" for="gridRadios2">
                        Dual
                      </label>
                    </div>
                  </div>
                </fieldset>

                

                <div class="row mb-3" id="ciddiv">
                  <label for="dual" class="col-sm-2 col-form-label" id="cidlabel" 
                   <?php
                    if($citizenship == "dual")
                    {
                      echo "style='display:block'"; 
                    }
                    else {
                      echo "style='display:none'";
                    }
                    ?> >Country if dual</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="cid" id ="cidid" 
                    value="<?php echo $cid;?>" 

                    <?php
                    if($citizenship == "dual")
                    {
                      echo "style='display:block'"; 
                    }
                    else {
                      echo "style='display:none'";
                    }
                    ?>>
                  </div>
                </div>

                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Citizenship By</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input required class="form-check-input" type="radio" name="radiocitizenby" id="filipino" value="By Birth" <?php if($citizenshipby=="By Birth"){
                        echo "checked";
                      } ?> required>
                      <label class="form-check-label" for="gridRadios1">
                        By Birth
                      </label>
                    </div>
                    <div class="form-check">
                      <input required class="form-check-input" type="radio" name="radiocitizenby" id="dual" value="By Naturalization" <?php if($citizenshipby=="By Naturalization"){
                        echo "checked";
                      } ?>required>
                      <label class="form-check-label" for="gridRadios2">
                        By Naturalization
                      </label>
                    </div>
                  </div>
                </fieldset>

                <div class="row mb-3">
                  <label for="height" class="col-sm-2 col-form-label">Height (Cm)</label>
                  <div class="col-sm-10">
                    <input  required type="number" class="form-control" name="height" value="<?php echo $height; ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="weight" class="col-sm-2 col-form-label">Weight (Kg)</label>
                  <div class="col-sm-10">
                    <input  required type="number" class="form-control" name="weight" value="<?php echo $weight; ?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Blood type</label>
                  <div class="col-sm-10">
                    <select required class="form-select" name="bloodtype">
                      <option selected value="0"> - SELECT - </option>
                      <option value="A+" <?php if ($bloodtype == "A+"){ echo "selected='selected'"; }?>>A+</option>
                      <option value="B+" <?php if ($bloodtype == "B+"){ echo "selected='selected'"; }?>>B+</option>
                      <option value="A-" <?php if ($bloodtype == "A-"){ echo "selected='selected'"; }?>>A-</option>
                      <option value="B-" <?php if ($bloodtype == "B-"){ echo "selected='selected'"; }?>>B-</option>
                      <option value="AB-" <?php if ($bloodtype == "AB-"){ echo "selected='selected'"; }?>>AB-</option>
                      <option value="AB+" <?php if ($bloodtype == "AB+"){ echo "selected='selected'"; }?>>AB+</option>
                      <option value="O+" <?php if ($bloodtype == "O+"){ echo "selected='selected'"; }?>>O+</option>
                      <option value="O-" <?php if ($bloodtype == "O-"){ echo "selected='selected'"; }?>>O-</option>
                    </select>
                  </div>
                </div>

               

                <div class="text-center">
                  <div class="col-sm-10">
                    <button type="submit" name="basicsave" class="btn btn-primary">Update Records</button>
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

