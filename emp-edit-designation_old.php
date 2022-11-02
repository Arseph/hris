<?php
session_start();
include "layouts\layout_sidebar.php";
include "scripts\connect.php";

$uid=$_GET['uid'];
$file_id=$_GET['file_id'];
$record_version=$_GET['record_version'];

$getdata_sql = "select * from emp_designation where agencyid='$uid' and file_id='$file_id' and record_version='$record_version'";
$data_stmt = sqlsrv_query($conn,$getdata_sql);
$row3 = sqlsrv_fetch_array($data_stmt);

$mstation = $row3['mother_station'];
$dstation = $row3['designated_station'];
$entry_date = $row3['entry_date'];
$exit_date =$row3['exit_date'];
$position =$row3['position'];
?>
<style type="text/css">
  .hide_element{
    display: none;
  }
</style>

<script>
  function show_date() {
  var element = document.getElementById("to_div");
  element.classList.remove("hide_element");
  document.getElementById("date_to").required = true;

}

  function hide_date() {
  var element = document.getElementById("to_div");
  element.classList.add("hide_element");
  document.getElementById("date_to").required = false;
}
</script>

  <main id="main" class="main">
  <form method="post">
    <div class="pagetitle">
      <h1>Update Designation</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <?php
            echo '<li class="breadcrumb-item">
            <a href="emp-designation-history.php?uid='.$uid.'">Designation History</a>
            </li>';
          ?>
          <li class="breadcrumb-item active">Update Designation</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-8">

         <div class="card">
            <div class="card-body">

          <form method="post">
          <?php
            include "scripts/emp-edit-designation-script.php";
          ?>    
              <br>
              <label><B>From: </B></label>
              <input type='date' class='form-control' name='entry_date' value='<?php echo $entry_date;
              ?>' min='1899-01-23' max='2500-01-01' required><br>
              <label><B>To: </B></label>
              <input type='radio' name='radio_active' value='1' onchange="hide_date()" <?php 
              if($exit_date=="To Present")
              {
                echo "checked";
              }
              elseif((isset($_POST['radio_active'])&&($_POST['radio_active']=='1')))
              {    
                echo "checked";
              }
            ?> required>Present?
              <input type='radio' name='radio_active' value='0' onchange="show_date()" <?php 
              if($exit_date!="To Present")
              {
                echo "checked";
              }
            ?> required>Specific Date?<br><br>
              <div <?php 
              if($exit_date=="To Present")
              {
                echo "class='hide_element'";
              }
                
               ?> id='to_div'>
                <input type='date' class='form-control' name='date_to' id='date_to' value='<?php 
                if($exit_date!='To Present')
                {
                  echo $exit_date;
                }
              ?>' min='1899-01-23' max='2500-01-01'
              ><br>
              </div>
              
              <label><B>Mother Station: </B></label>

              <select class='form-control' name='select_mstation'>
                <option value='0'>- Select - </option>
                <?php
                $get_msd_sql = "select * from munit where div_void!='0' order by rank asc";
                $msd_stmt = sqlsrv_query($conn,$get_msd_sql);
                
                while($msd_row=sqlsrv_fetch_array($msd_stmt))
                {

                echo "<optgroup label='".$msd_row['mother_unit_long']."'>";
                $div_code=$msd_row['div_code'];

                $get_section_sql = "select * from mstation where sec_void!='0' and mother_unit='$div_code' order by mother_station asc";

                $section_stmt = sqlsrv_query($conn,$get_section_sql);
                while($section_row=sqlsrv_fetch_array($section_stmt))
                {

                  echo "<option value='".$section_row['sec_code']."' ";
                  if($mstation==$section_row['sec_code'])
                  {
                    echo "selected";
                  }
                  echo" >".$section_row['mother_station']."</option>";

                }
                echo "</optgroup>";
                }
                ?>
                </optgroup>
              </select>

              <br>
              <label><B>Designated Station: </B></label>
              <select class='form-control' name='select_dstation'>
                <option value='0'>- Select - </option>
                <?php
                $get_msd_sql = "select * from munit where div_void!='0' order by rank asc";
                $msd_stmt = sqlsrv_query($conn,$get_msd_sql);
                
                while($msd_row=sqlsrv_fetch_array($msd_stmt))
                {

                echo "<optgroup label='".$msd_row['mother_unit_long']."'>";
                $div_code=$msd_row['div_code'];

                $get_section_sql = "select * from mstation where sec_void!='0' and mother_unit='$div_code' order by mother_station asc";

                $section_stmt = sqlsrv_query($conn,$get_section_sql);
                while($section_row=sqlsrv_fetch_array($section_stmt))
                {

                  echo "<option value='".$section_row['sec_code']."' ";
                  if($dstation==$section_row['sec_code']){
                    echo "selected";
                  }
                  echo" >".$section_row['mother_station']."</option>";

                }
                echo "</optgroup>";
                }
                ?>
                </optgroup>
              </select>
              <br>
              <label><B>Position: </B></label>
               <select class='form-control' name='select_position'>
                <option value="0">- Select -</option>
                 <?php 

                 $getposition_sql = "select * from select_position order by EmpPosition asc";
                 $position_stmt = sqlsrv_query($conn,$getposition_sql);

                 while($position_row=sqlsrv_fetch_array($position_stmt))
                 {
                  $pos_code=$position_row['pos_code'];
                  $position_query=$position_row['EmpPosition'];
                  
                  echo "<option value='$pos_code'";
                  
                  if($position==$position_row['pos_code'])
                  {
                    echo "selected";
                  }
                  
                  echo " >".$position_query."</option>";
                 }

                 ?>
               </select>
              </div><!-- End No Labels Form -->
              <div class='text-center'><!-- End No Labels Form -->
                <button class="btn btn-primary" name='btn_save'>Submit</button>
                <?php

                echo "<a href='emp-designation-history.php?uid=".$uid."' class='btn btn-secondary'>Return</a>";
              
                ?>
                </div>
                <br>
            </div>
            
          </form>
          </div>
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