<?php
session_start();
include "scripts\connection_script.php";

include "scripts\account_check.php";
include "layouts\layout_sidebar.php";
//error_reporting(E_ALL ^ E_NOTICE);

?>

<style>
table, th, td {
  border:1px solid black;
  border-collapse: collapse;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #45de6e;
}
</style>


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

              <img src="assets/img/personel-logo.jpg" alt="Profile" class="rounded-circle">
              <h2><?php echo $emp_fname;?></h2>
              <h3 style="color:green"><b>Person Creating Account</b></h3>
              <!--
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>

              </div>
              -->
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#pds-basic">Basic</button>
                </li>

                <!--
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                </li>
                -->

              </ul>
              <div class="tab-content pt-2">
                <div class="tab-pane fade active show profile-edit" id="pds-basic">

                <!-- form1 -->
                <!-- Profile Edit Form -->
                  <form action="#" method="post" enctype="multipart/form-data">
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <img src="assets/img/personel-logo.jpg" alt="Profile">
                        <div class="pt-2">
                          
                        <input type="file" name="fileToUpload" id="fileToUpload" required>
                          
                          <!-- old file browser
                          <input type="file" name="attachment" class="file" id="attachment" style="display: none;" onchange="fileSelected(this)"/>
                          <button type="button" class="btn btn-primary btn-sm" onclick="openAttachment()"><i class="bi bi-upload"></i></button>
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                          -->

                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="agencyid" class="col-md-4 col-lg-3 col-form-label">Agency ID<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <input name="agencyid" type="number" class="form-control" id="agencyid" min="0" onkeydown="return event.keyCode !== 69 && event.keyCode !== 187 && event.keyCode !== 189" placeholder="Enter agency ID" value="<?php if(isset($_POST['agencyid'])){ echo $_POST['agencyid']; }?>"required/>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="surname" class="col-md-4 col-lg-3 col-form-label">Surname<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <input name="surname" text="text" class="form-control" id="surname" placeholder="Enter surname" onkeydown="return /[a-z, ]/i.test(event.key)"
    onblur="if (this.value == '') {this.value = '';}"
    onfocus="if (this.value == '') {this.value = '';}" value="<?php if(isset($_POST['surname'])){ echo $_POST['surname']; }?>" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="suffix" class="col-md-4 col-lg-3 col-form-label">Suffix</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="suffix" text="text" class="form-control" id="Suffix" placeholder="Enter suffix"  onkeydown="return /[a-z]/i.test(event.key)" value="<?php if(isset($_POST['suffix'])){ echo $_POST['suffix']; }?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="firstname" class="col-md-4 col-lg-3 col-form-label">First Name<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <input name="firstname" text="firstname" class="form-control" id="surname" placeholder="Enter first name" onkeydown="return /[a-z, ]/i.test(event.key)"
    onblur="if (this.value == '') {this.value = '';}"
    onfocus="if (this.value == '') {this.value = '';}" value="<?php if(isset($_POST['firstname'])){ echo $_POST['firstname']; }?>" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="middlename" class="col-md-4 col-lg-3 col-form-label">Middle Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="middlename" text="text" class="form-control" id="middlename" placeholder="Enter middle name" onkeydown="return /[a-z, ]/i.test(event.key)"
    onblur="if (this.value == '') {this.value = '';}"
    onfocus="if (this.value == '') {this.value = '';}" value="<?php if(isset($_POST['middlename'])){ echo $_POST['middlename']; }?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="dob" class="col-md-4 col-lg-3 col-form-label">Date of birth<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <input type="date" name="dob" value="<?php if(isset($_POST['dob'])){ echo $_POST['dob']; }?>" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="pob" class="col-md-4 col-lg-3 col-form-label">Place of Birth<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <input name="pob" text="text" class="form-control" id="pob" placeholder="Enter place of birth" onkeydown="return /[a-z, ]/i.test(event.key)"
    onblur="if (this.value == '') {this.value = '';}"
    onfocus="if (this.value == '') {this.value = '';}" value="<?php if(isset($_POST['pob'])){ echo $_POST['pob']; }?>" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="sex" class="col-md-4 col-lg-3 col-form-label">Sex<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <select name="gender" id="gender" required>
                          <option value="" disabled selected>Select gender</option>
                          <option value="Male" <?php if($_POST['gender']=='Male') echo 'selected="selected"';?>>Male</option>
                          <option value="Female" <?php if($_POST['gender']=='Female') echo 'selected="selected"';?> >Female</option>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Civilstatus" class="col-md-4 col-lg-3 col-form-label">Civil Status<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <select name="civil" id="civil" required>
                            <option value="" disabled selected>Select civil status</option>
                            <option value="Single" <?php if($_POST['civil']=='Single') echo 'selected="selected"';?>>Single</option>
                            <option value="Married" <?php if($_POST['civil']=='Married') echo 'selected="selected"';?>>Married</option>
                            <option value="Widowed" <?php if($_POST['civil']=='Widowed') echo 'selected="selected"';?>>Widowed</option>
                            <option value="Separated" <?php if($_POST['civil']=='Separated') echo 'selected="selected"';?>>Separated</option>
                          </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Citizenship" class="col-md-4 col-lg-3 col-form-label">Citizenship<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <input class="form-check-input" type="radio" name="radio_citizen" value="filipino" id="citizen_filipino" onclick="disableTxt()" required <?php if (isset($_POST['radio_citizen']) && $_POST['radio_citizen']=="filipino") echo "checked";?>><span style="font-size:18px"> Filipino</span>
                        <input class="form-check-input" type="radio" name="radio_citizen" value="dual" id="citizen_dual" onclick="undisableTxt()" required <?php if (isset($_POST['radio_citizen']) && $_POST['radio_citizen']=="dual") echo "checked";?>><span style="font-size:18px"> Dual</span>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label id="dual_label" for="dual" class="col-md-4 col-lg-3 col-form-label">Country if dual citizenship</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="dual" type="text" class="form-control" id="dual" placeholder="" onkeypress="dualtyped()" value="<?php if(isset($_POST['dual'])){ echo $_POST['dual']; } else { echo "";}?>"  >

                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="height" class="col-md-4 col-lg-3 col-form-label">Height (m)<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <input name="height" type="number" class="form-control" id="height" min="0" max="3" onkeydown="return event.keyCode !== 69 && event.keyCode !== 187 && event.keyCode !== 189" placeholder="Enter height(In meters)" value="<?php if(isset($_POST['height'])){ echo $_POST['height']; }?>" required/>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="weight" class="col-md-4 col-lg-3 col-form-label">Weight (kg)<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <input name="weight" type="number" class="form-control" id="weight" min="0" onkeydown="return event.keyCode !== 69 && event.keyCode !== 187 && event.keyCode !== 189" placeholder="Enter height(In meters)" value="<?php if(isset($_POST['weight'])){ echo $_POST['weight']; }?>"required/>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="bloodtype" class="col-md-4 col-lg-3 col-form-label">Blood Type<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9" id="bloodtype" name="bloodtype">
                        <select name="blood" required>
                            <option value="" disabled selected>Select your option</option>
                            <option value="A" <?php if($_POST['blood']=='A') echo 'selected="selected"';?>>A</option>
                            <option value="B" <?php if($_POST['blood']=='B') echo 'selected="selected"';?>>B</option>
                            <option value="O" <?php if($_POST['blood']=='O') echo 'selected="selected"';?>>O</option>
                            <option value="AB" <?php if($_POST['blood']=='AB') echo 'selected="selected"';?>>AB</option>
                            <option value="A+" <?php if($_POST['blood']=='A+') echo 'selected="selected"';?>>A+</option>
                            <option value="B+" <?php if($_POST['blood']=='B+') echo 'selected="selected"';?>>B+</option>
                            <option value="AB+" <?php if($_POST['blood']=='AB+') echo 'selected="selected"';?>>AB+</option>
                            <option value="O+" <?php if($_POST['blood']=='O+') echo 'selected="selected"';?>>O+</option>
                          </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="username" class="col-md-4 col-lg-3 col-form-label">Username<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <input name="username" type="text" class="form-control" id="username" placeholder="Enter username" value="<?php if(isset($_POST['username'])){ echo $_POST['username']; }?>" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="username" class="col-md-4 col-lg-3 col-form-label">password<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="text" class="form-control" id="password" placeholder="Enter password" min="5" value="<?php if(isset($_POST['password'])){ echo $_POST['password']; }?>" required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="username" class="col-md-4 col-lg-3 col-form-label">Re-Type password<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password2" type="text" class="form-control" id="password2" placeholder="Re-Enter password" min="5" value="<?php if(isset($_POST['password2'])){ echo $_POST['password2']; }?>" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="userlevel" class="col-md-4 col-lg-3 col-form-label">User Level<span style="color:red">*</span></label>
                      <div class="col-md-8 col-lg-9" id="userlevel" name="userlevel">
                        <select name="level" id="level" required>
                            <option value="" disabled selected>Select user level</option>
                            <option value="Admin" <?php if($_POST['level']=='Admin') echo 'selected="selected"';?>>Admin</option>
                            <option value="Default" <?php if($_POST['level']=='Default') echo 'selected="selected"';?>>Default</option>
                            <option value="HR Admin" <?php if($_POST['level']=='HR Admin') echo 'selected="selected"';?>>HR Admin</option>
                            <option value="HR View" <?php if($_POST['level']=='HR View') echo 'selected="selected"';?>>HR View</option>
                            <option value="IT" <?php if($_POST['level']=='IT') echo 'selected="selected"';?>>IT</option>
                            <option value="Property" <?php if($_POST['level']=='Property') echo 'selected="selected"';?>>Property</option>
                            <option value="User Supervisors" <?php if($_POST['level']=='User Supervisors') echo 'selected="selected"';?>>User Supervisors</option>
                            <option value="Users (EEWTTSV)" <?php if($_POST['level']=='Users (EEWTTSV)') echo 'selected="selected"';?>>Users (EEWTTSV)</option>
                            <option value="Users (EEWTTSV+Personal)" <?php if($_POST['level']=='Users (EEWTTSV+Personal)') echo 'selected="selected"';?>>Users (EEWTTSV+Personal)</option>
                          </select>
                      </div>
                    </div>
                    <?php include "scripts\add-employee-error.php"; ?>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" name="save">Check for errors</button>
                      
                    </div>
                  <!-- End Profile Edit Form -->
                </div>

               
                
<!-- </form> -->


</div><!-- End Bordered Tabs -->

<!-- End competency Form -->
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

  <script>
    function dualtyped(){
      document.getElementById("citizen_dual").checked = true;    
    }

    function undisableTxt() {
      document.getElementById("dual").disabled = false;
      document.getElementById("dual").required = true;
      document.getElementById("dual").placeholder = "Please specify country";
      document.getElementById("dual_label").innerHTML= "Country if dual citizenship<span style='color:red'>*</span>";

    }

    function disableTxt() {
      document.getElementById("dual").value = "";
      document.getElementById("dual").disabled = true;
      document.getElementById("dual").required = false;
      document.getElementById("dual").placeholder = "n/a";
      document.getElementById("dual_label").innerHTML= "Country if dual citizenship";

  }
</script>


</body>

</html>

<?php

if(isset($_POST["save"])) 
{

  $source = $_FILES['fileToUpload']['tmp_name'];

  if( $source != "" )
  {
        //change file name of the file to be copied
        $temp = explode(".", $_FILES["fileToUpload"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $destination = "uploads/" . $newfilename;

        $imageFileType = strtolower(pathinfo($destination,PATHINFO_EXTENSION));


  if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg") 
    {       
       $filesize=$_FILES["fileToUpload"]["size"];

      if ($filesize<8000000)
      {  
            if (!copy($source, $destination)) {
              echo "failed to copy ...\n";
            }
      }
    }
  }

}


include "scripts\add-employee-script.php";
include "scripts\HRC-save-script.php";
?>