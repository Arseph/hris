<?php
session_start();
include "scripts\connect.php";
include "layouts\layout_sidebar.php";

$uid=$_GET['uid']; // get link value


$record_version=$_GET['record_version'];

echo "test ".$record_version;
$sql = "select * from emp_miscinfo where agencyid='$uid'";


if($result = sqlsrv_query($conn, $sql))
{
  while($row = sqlsrv_fetch_array($result))
  {
    $hobbies = $row['hobbies']; 
    $nar = $row['nar'];
    $assoc = $row ['assoc_member'];
    $reff = $row ['reff'];

    $q1 = $row ['q1'];
    $q2 = $row ['q2'];
    $q3 = $row ['q3'];
    $q4 = $row ['q4'];
    $q5 = $row ['q5'];
    $q6 = $row ['q6'];
    $q7 = $row ['q7'];
    $q8 = $row ['q8'];
    $q9 = $row ['q9'];
    $q10 = $row ['q10'];
    $q11 = $row ['q11'];

    $a1 = $row ['a1'];
    $a2 = $row ['a2'];
    $a3 = $row ['a3'];
    $a4 = $row ['a4'];
    $a5 = $row ['a5'];
    $a6 = $row ['a6'];
    $a7 = $row ['a7'];
    $a8 = $row ['a8'];
    $a9 = $row ['a9'];
    $a10 = $row ['a10'];
    $a11 = $row ['a11'];
    
  }

}
?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Misc employee info</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Updatng Employee ID: <?php echo $uid;?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">

        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Update Misc Info</h5>

              <!-- Advanced Form Elements -->
              <form method="post">
              <?php include "scripts/update-misc-script.php";?>
                <div class="row mb-5">
                      <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">


                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">Special Skills / Hobbies</span>
                      <textarea class="form-control" name="txthobby"><?php if (isset($hobbies)){ echo $hobbies; }?></textarea>
                    </div>

                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">Non-Academic Recognition</span>
                      <textarea class="form-control" name="txtnar"><?php if (isset($nar)){ echo $nar; }?></textarea>
                    </div>

                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">Associations Membership
</span>
                      <textarea class="form-control" name="txtassoc"><?php if (isset($assoc)){ echo $assoc; }?></textarea>
                    </div>

                    <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">Referrence</span>
                      <textarea class="form-control" name="txtreference"><?php if (isset($reff)){ echo $reff; }?></textarea>
                    </div>

                    <span class="input-group-text form-control" id="basic-addon1" >34-A. Are you related by consanguinity or affinity to the appointing or recommending authority, or to the chief <br>of bureau or office or to the person who has immediate <br>supervision over you in the office, Bureau or Department where you will be appointed?*</span>
                    <br>
                    <div class="form-check form-switch">
                      <input type="checkbox" id="q1" name="q1" class="form-check-input" <?php 
                      if($q1=='on'){ echo "checked"; }?>/>
                      <label>A - Within third degree?</label>

                    </div>

                    <div class="input-group mb-3">
                        <span id="label1" class="input-group-text"  <?php 
                      if($q1==""){ echo "style='display:none;'"; }?>>Give Details</span>

                        <textarea  id="a1" class="form-control" name="a1" <?php 
                      if($q1==""){ echo "style='display:none;'"; }?>><?php echo $a1; ?></textarea>
                    
                    </div>
                    <br>

                     <br>
                    <div class="form-check form-switch">
                      <input type="checkbox" id="q2" name="q2" class="form-check-input" <?php 
                      if($q2=='on'){ echo "checked"; }?>/>
                      <label>B - Within Fourth degree?</label>

                    </div>

                    <div class="input-group mb-3">
                        <span id="label2" class="input-group-text"  <?php 
                      if($q2==""){ echo "style='display:none;'"; }?>>Give Details</span>

                        <textarea  id="a2" class="form-control" name="a2" <?php 
                      if($q2==""){ echo "style='display:none;'"; }?>><?php echo $a2; ?></textarea>
                    
                    </div>
                    <br>

                    <span class="input-group-text" id="basic-addon1">35-A. Have you ever been found guilty of any administrative offence ?*</span>

                    <div class="form-check form-switch">
                      <input type="checkbox" id="q3" name="q3" class="form-check-input" <?php 
                      if($q3=='on'){ echo "checked"; }?>/>
                      <label>Yes or No?</label>

                    </div>

                    <div class="input-group mb-3">
                        <span id="label3" class="input-group-text"  <?php 
                      if($q3==""){ echo "style='display:none;'"; }?>>Give Details</span>

                        <textarea  id="a3" class="form-control" name="a3" <?php 
                      if($q3==""){ echo "style='display:none;'"; }?>><?php echo $a3; ?></textarea>
                    
                    </div>
                    <br>

                    <br>
                    <span class="input-group-text" id="basic-addon1">35-B. Have you been criminally charged before any court?*</span>

                    <div class="form-check form-switch">
                      <input type="checkbox" id="q4" name="q4" class="form-check-input" <?php 
                      if($q4=='on'){ echo "checked"; }?>/>
                      <label>Yes or No?</label>

                    </div>

                    <div class="input-group mb-3">
                        <span id="label4" class="input-group-text"  <?php 
                      if($q4==""){ echo "style='display:none;'"; }?>>Give Details</span>

                        <textarea  id="a4" class="form-control" name="a4" <?php 
                      if($q4==""){ echo "style='display:none;'"; }?>><?php echo $a4; ?></textarea>
                    
                    </div>
                    <br>
                    
                     <br>
                    <span class="input-group-text" id="basic-addon1">36. Have you ever been convicted of any crime or violation of any law, decree, ordinance or <br> regulation by any court or tribunal?*</span>

                    <div class="form-check form-switch">
                      <input type="checkbox" id="q5" name="q5" class="form-check-input" <?php 
                      if($q5=='on'){ echo "checked"; }?>/>
                      <label>Yes or No?</label>

                    </div>

                    <div class="input-group mb-3">
                        <span id="label5" class="input-group-text"  <?php 
                      if($q5==""){ echo "style='display:none;'"; }?>>Give Details</span>

                        <textarea  id="a5" class="form-control" name="a5" <?php 
                      if($q5==""){ echo "style='display:none;'"; }?>><?php echo $a5; ?></textarea>
                    
                    </div>
                    <br>

                      <br>
                    <span class="input-group-text" id="basic-addon1">37. Have you ever been seperated from the service in any of the following modes: resignation, retirement,<br> dropped from the rolls, dismissal, termination, end of term,<br> finished contract or phased out (abolition) in the public or private sector?*</span>

                    <div class="form-check form-switch">
                      <input type="checkbox" id="q6" name="q6" class="form-check-input" <?php 
                      if($q6=='on'){ echo "checked"; }?>/>
                      <label>Yes or No?</label>

                    </div>

                    <div class="input-group mb-3">
                        <span id="label6" class="input-group-text"  <?php 
                      if($q6==""){ echo "style='display:none;'"; }?>>Give Details</span>

                        <textarea  id="a6" class="form-control" name="a6" <?php 
                      if($q6==""){ echo "style='display:none;'"; }?>><?php echo $a6; ?></textarea>
                    
                    </div>
                    <br>

                     <br>
                    <span class="input-group-text" id="basic-addon1">38-A. Have you ever been a candidate in a national or local election held within the last year<br>(except Barangay election)?*</span>

                    <div class="form-check form-switch">
                      <input type="checkbox" id="q7" name="q7" class="form-check-input" <?php 
                      if($q7=='on'){ echo "checked"; }?>/>
                      <label>Yes or No?</label>

                    </div>

                    <div class="input-group mb-3">
                        <span id="label7" class="input-group-text"  <?php 
                      if($q7==""){ echo "style='display:none;'"; }?>>Give Details</span>

                        <textarea  id="a7" class="form-control" name="a7" <?php 
                      if($q7==""){ echo "style='display:none;'"; }?>><?php echo $a7; ?></textarea>
                    
                    </div>
                    <br>

                     <br>
                    <span class="input-group-text" id="basic-addon1">38-B. Have you resigned from government service during the three (3) month period before the last election*</span>

                   <div class="form-check form-switch">
                      <input type="checkbox" id="q8" name="q8" class="form-check-input" <?php 
                      if($q8=='on'){ echo "checked"; }?>/>
                      <label>Yes or No?</label>

                    </div>

                    <div class="input-group mb-3">
                        <span id="label8" class="input-group-text"  <?php 
                      if($q8==""){ echo "style='display:none;'"; }?>>Give Details(Country)</span>

                        <textarea  id="a8" class="form-control" name="a8" <?php 
                      if($q8==""){ echo "style='display:none;'"; }?>><?php echo $a8; ?></textarea>
                    
                    </div>
                    <br>

                    <br>
                    <span class="input-group-text" id="basic-addon1">39. Have you acquired the status of an immigrant or permanent resident of another country?*</span>

                    <div class="form-check form-switch">
                      <input type="checkbox" id="q9" name="q9" class="form-check-input" <?php 
                      if($q9=='on'){ echo "checked"; }?>/>
                      <label>Yes or No?</label>

                    </div>

                    <div class="input-group mb-3">
                        <span id="label9" class="input-group-text"  <?php 
                      if($q9==""){ echo "style='display:none;'"; }?>>Give Details(Country)</span>

                        <textarea  id="a9" class="form-control" name="a9" <?php 
                      if($q9==""){ echo "style='display:none;'"; }?>><?php echo $a9; ?></textarea>
                    
                    </div>
                    <br>

                      <br>
                    <span class="input-group-text" id="basic-addon1">40. Pursuant to:<br> (a) Indigenous Peoples Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); <br>(c) Solo Parents Welfare Act of 2000 (RA 8972). <br><br>A. Are you a member of any indigenous group?</span>

                    <div class="form-check form-switch">
                      <input type="checkbox" id="q10" name="q10" class="form-check-input" <?php 
                      if($q10=='on'){ echo "checked"; }?>/>
                      <label>Yes or No?</label>

                    </div>

                    <div class="input-group mb-3">
                        <span id="label10" class="input-group-text"  <?php 
                      if($q10==""){ echo "style='display:none;'"; }?>>Give Details</span>

                        <textarea  id="a10" class="form-control" name="a10" <?php 
                      if($q10==""){ echo "style='display:none;'"; }?>><?php echo $a10; ?></textarea>
                    
                    </div>
                    <br>

                    <br>
                    <span class="input-group-text" id="basic-addon1">40-B. Are you a person with Disability?</span>

                    <div class="form-check form-switch">
                      <input type="checkbox" id="q11" name="q11" class="form-check-input" <?php 
                      if($q11=='on'){ echo "checked"; }?>/>
                      <label>Yes or No?</label>

                    </div>

                    <div class="input-group mb-3">
                        <span id="label11" class="input-group-text"  <?php 
                      if($q11==""){ echo "style='display:none;'"; }?>>Give Details</span>

                        <textarea  id="a11" class="form-control" name="a11" <?php 
                      if($q11==""){ echo "style='display:none;'"; }?>><?php echo $a11; ?></textarea>
                    
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-5">
                      </div>
                      <div class="col-md-4">
                        <button class="btn btn-primary" name="update_miscinfo">Update</button>
                      </div>
                    </div>


              </form><!-- End General Form Elements -->

</div>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include "layouts\layout_footer.php"; ?>

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

const q1 = document.getElementById('q1');
const q2 = document.getElementById('q2');
// const checkbox = document.getElementById('q3');
// const checkbox = document.getElementById('q4');
// const checkbox = document.getElementById('q5');
// const checkbox = document.getElementById('q6');
// const checkbox = document.getElementById('q7');
// const checkbox = document.getElementById('q8');
// const checkbox = document.getElementById('q9');
// const checkbox = document.getElementById('q10');
// const checkbox = document.getElementById('q11');

const a1 = document.getElementById('a1');
const a2 = document.getElementById('a2');
const a3 = document.getElementById('a3');
const a4 = document.getElementById('a4');
const a5 = document.getElementById('a5');
const a6 = document.getElementById('a6');
const a7 = document.getElementById('a7');
const a8 = document.getElementById('a8');
const a9 = document.getElementById('a9');
const a10 = document.getElementById('a10');
const a11 = document.getElementById('a11');


const label1 = document.getElementById('label1');
const label2 = document.getElementById('label2');
const label3 = document.getElementById('label3');
const label4 = document.getElementById('label4');
const label5 = document.getElementById('label5');
const label6 = document.getElementById('label6');
const label7 = document.getElementById('label7');
const label8 = document.getElementById('label8');
const label9 = document.getElementById('label9');
const label10 = document.getElementById('label10');
const label11 = document.getElementById('label11');

q1.addEventListener('click', function handleClick() {
  if (q1.checked) {
    a1.style.display = 'block';
    label1.style.display = 'block';
  } else {
    a1.style.display = 'none';
    label1.style.display = 'none';
  }
});

q2.addEventListener('click', function handleClick() {
  if (q2.checked) {
    a2.style.display = 'block';
    label2.style.display = 'block';
  } else {
    a2.style.display = 'none';
    label2.style.display = 'none';
  }
});

q3.addEventListener('click', function handleClick() {
  if (q3.checked) {
    a3.style.display = 'block';
    label3.style.display = 'block';
  } else {
    a3.style.display = 'none';
    label3.style.display = 'none';
  }
});

q4.addEventListener('click', function handleClick() {
  if (q4.checked) {
    a4.style.display = 'block';
    label4.style.display = 'block';
  } else {
    a4.style.display = 'none';
    label4.style.display = 'none';
  }
});

q5.addEventListener('click', function handleClick() {
  if (q5.checked) {
    a5.style.display = 'block';
    label5.style.display = 'block';
  } else {
    a5.style.display = 'none';
    label5.style.display = 'none';
  }
});

q6.addEventListener('click', function handleClick() {
  if (q6.checked) {
    a6.style.display = 'block';
    label6.style.display = 'block';
  } else {
    a6.style.display = 'none';
    label6.style.display = 'none';
  }
});

q7.addEventListener('click', function handleClick() {
  if (q7.checked) {
    a7.style.display = 'block';
    label7.style.display = 'block';
  } else {
    a7.style.display = 'none';
    label7.style.display = 'none';
  }
});

q8.addEventListener('click', function handleClick() {
  if (q8.checked) {
    a8.style.display = 'block';
    label8.style.display = 'block';
  } else {
    a8.style.display = 'none';
    label8.style.display = 'none';
  }
});

q9.addEventListener('click', function handleClick() {
  if (q9.checked) {
    a9.style.display = 'block';
    label9.style.display = 'block';
  } else {
    a9.style.display = 'none';
    label9.style.display = 'none';
  }
});

q10.addEventListener('click', function handleClick() {
  if (q10.checked) {
    a10.style.display = 'block';
    label10.style.display = 'block';
  } else {
    a10.style.display = 'none';
    label10.style.display = 'none';
  }
});

q11.addEventListener('click', function handleClick() {
  if (q11.checked) {
    a11.style.display = 'block';
    label11.style.display = 'block';
  } else {
    a11.style.display = 'none';
    label11.style.display = 'none';
  }
});

  </script>
</body>

</html>