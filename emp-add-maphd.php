<?php
session_start();
include "layouts\layout_sidebar.php";
include "scripts\kick.php";
$uid=$_GET['uid'];


?>
<style type="text/css">
  .hide_element{
    display: none;
  }


  .txt-to {
  width:42%;
  
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #212529;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

</style>

<script>
  function show_extension()
  {
    var element = document.getElementById("div_units");
    element.classList.add("hide_element");

    var element = document.getElementById("div_extension");
    element.classList.remove("hide_element");

    document.getElementById("txt_extension").required = true;
    document.getElementById("txt_units").required = false;
  }

  function show_units()
  {
    var element = document.getElementById("div_units");
    element.classList.remove("hide_element");

    var element = document.getElementById("div_extension");
    element.classList.add("hide_element");

    document.getElementById("txt_extension").required = false;
    document.getElementById("txt_units").required = true;
  }
</script>

  <main id="main" class="main">
  <form method="post">
    <div class="pagetitle">
      <h1>Add New Master/Doctorate Level Education</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <?php
          if($_SESSION['userlevel']<3){
            echo '<li class="breadcrumb-item"><a href="employee-summary.php?uid='.$uid.'">Employee Summary</a></li>';
          }
          ?>

          <?php
           echo "<li class='breadcrumb-item'><a href='emp-education-history.php?uid=".$uid."'>Education History</a></li>";
          ?>

          <li class="breadcrumb-item active">Add New Master/Doctorate Level Education</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-7">
         <form method="post">
         <?php include "scripts/emp-add-maphd-script.php"; ?> 
         <div class="card">
            <div class="card-body">
            <br>
              <b>School Name:</b><br>
              <input type='text' name='txt_school' class='form-control' placeholder='e.g. STI College of Cotabato' value='<?php
               if(isset($_POST['txt_school']))
               {
                  echo $_POST['txt_school'];
               }
              ?>' required>
              <br>
              <b>Course:</b><br>
              <input type='text' name='txt_course' class='form-control' placeholder='e.g. Master in Information Technology' value='<?php
               if(isset($_POST['txt_course']))
               {
                  echo $_POST['txt_course'];
               }
              ?>' required>
              <br>
              <div>
                <b>From:</b>
                  <input type='number' name='txt_from' class='txt-to' placeholder='e.g. 2000' value='<?php
               if(isset($_POST['txt_from']))
               {
                  echo $_POST['txt_from'];
               }
              ?>' required>
                <b>To:</b>
                <input type='number' name='txt_to' class='txt-to' placeholder='e.g. 2006' value='<?php
               if(isset($_POST['txt_to']))
               {
                  echo $_POST['txt_to'];
               }
              ?>' required>
              </div>
              
              <br>
              <b>Geaduate Year?</b><br>
              <input name='radio_grad' type='radio' value="1" <?php if((isset($_POST['radio_grad']))&&($_POST['radio_grad']=='1')){ echo "checked"; } ?> required onclick='show_extension()'><label>yes</label>
              <input name='radio_grad' type='radio' value="0" <?php if((isset($_POST['radio_grad']))&&($_POST['radio_grad']=='0')){ echo "checked"; } ?> onclick='show_units()'><label>no</label><br>

              <div id='div_units' class='hide_element'>
                <br>
                <b>Units:</b><br>
                <input type='number' id='txt_units' name='txt_units' class='form-control' placeholder='e.g. Enter Highest attained Units if Undergrad' value='<?php
                 if(isset($_POST['txt_units']))
                 {
                    echo $_POST['txt_units'];
                 }
                ?>'>
              </div>

              <div id='div_extension' class='hide_element'>
                <br>
                <b>Masteral/Doctoral Name Extension:</b><br>
                <input type='text' id='txt_extension' name='txt_extension' class='form-control' placeholder='e.g. MIT, MPA, D.Ed' value='<?php
                 if(isset($_POST['txt_extension']))
                 {
                    echo $_POST['txt_extension'];
                 }
                ?>'>
              </div>
              <br>



              <b>Scholarship</b><br>
              <input name='txt_scholarship' type='text' class='form-control' placeholder="Enter Scholarship Program Name"  value='<?php
               if(isset($_POST['txt_scholarship']))
               {
                  echo $_POST['txt_scholarship'];
               }
              ?>'>
              <div class="text-center"><br>
                <button class='btn btn-primary' name='btn_save'>Submit</button>
              <?php
                echo "<a class='btn btn-secondary' href='emp-education-history.php?uid=".$uid."'>Return</a>";
              ?> 
              </div>
            </div>
          </div>
          </form>
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