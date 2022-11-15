<?php
session_start();
include "layouts\layout_sidebar.php";
include "scripts\admin-check.php";


$pos_code = $_GET['pos_code'];

$get_pos = "select * from select_position where pos_code='$pos_code'";
$stmt = sqlsrv_query($conn,$get_pos);
$row = sqlsrv_fetch_array($stmt);
?>
<style type="text/css">

  .hide_element{
    display: none;
  }

  .txt_to {
  
  width: 70%;
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

  function hide_permanent(){
  var element = document.getElementById("span_itemno");
  element.classList.add("hide_element");
  document.getElementById("txt_itemno").required = false;
  }

  function show_permanent()
  {
  var element = document.getElementById("span_itemno");
  element.classList.remove("hide_element");
  document.getElementById("txt_itemno").required = true;
  }

</script>

  <main id="main" class="main">
  <form method="post">
    <div class="pagetitle">
      <h1>Edit Position Form</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="add-positions.php">Positions List</a></li>
          <li class="breadcrumb-item active">Add New Position Form</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-7">
         <form method="post">
         <?php include "scripts/edit-position-script.php"; ?> 
         <div class="card">
            <div class="card-body">
            <br>
              
              <b>Position Name:</b><br>
              <input type='text' name='txt_posname' class='form-control' placeholder='Technical Program Assistant, Computer Programmer II' value='<?php echo $row['EmpPosition']; ?>' required>
              <br><b>Position Short Code:</b><br>
              <input type='text' name='txt_posshort' class='form-control' placeholder='TPA, CP II' value='<?php echo $row['pos_short']; ?>' required>

              

              <br><b>Permanent Position:</b><br>
              <input type='radio' name='radio_permanent' value='1' onchange='show_permanent()' required <?php

              if(((isset($row['permanent']))==true)&&($row['permanent']=='1'))
              {
                echo "checked";
              }

              ?>>Yes
              <input type='radio' name='radio_permanent' value='0' onchange='hide_permanent()' <?php

              if(((isset($row['permanent']))==true)&&($row['permanent']=='0'))
              {
                echo "checked";
              }

              ?>>No

              <span id='span_itemno' <?php

              if(((isset($row['permanent']))==false)||($row['permanent']=='0'))
              {
                echo "class='hide_element'";
              }

              ?>>
                <br><br>
                <b>Item Code:</b><br>
                <input type='text' id='txt_itemno' placeholder="Enter Item Code" name='txt_itemno' class='form-control' value='<?php

              if(((isset($row['permanent']))==true)&&($row['permanent']=='1'))
              {
                echo $row['itemno'];
              }

              ?>'>

              <br><b>Salary:</b><br>
                <input type='number' id='txt_salary' placeholder="Enter Item Code" name='txt_salary' value='<?php if($row['permanent']){echo $row['basic_salary']; }?>' class='form-control'>
              </span>

              <div class="text-center"><br>
                <button class='btn btn-primary' name='btn_save'>Submit</button>
                <a href='add-positions.php' class='btn btn-secondary'>Return</a>
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