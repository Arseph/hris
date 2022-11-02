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
$pos =$row3['position'];
$doh12 = $row3['doh12'];
$status= $row3['status'];
$salary = $row3['salary'];
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

  function doh_yes(){
  var element = document.getElementById("doh_yes");
  element.classList.remove("hide_element");
  var element = document.getElementById("doh_no");
  element.classList.add("hide_element");
  document.getElementById("txt_nondoh_designation").required = false;
  document.getElementById("txt_nondoh_position").required = false;
  }

  function doh_no(){
  var element = document.getElementById("doh_yes");
  element.classList.add("hide_element");
  var element = document.getElementById("doh_no");
  element.classList.remove("hide_element");
  document.getElementById("txt_nondoh_designation").required = true;
  document.getElementById("txt_nondoh_position").required = true;
  }

</script>

  <main id="main" class="main">
  <form method="post">
    <div class="pagetitle">
      <h1>Add New Employee Designation</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <?php
            echo '<li class="breadcrumb-item">
            <a href="emp-designation-history.php?uid='.$uid.'">Designation History</a>
            </li>';
          ?>
          <li class="breadcrumb-item">Add New Designation</li>
          <list class="breadcrumb-item active"><?php echo $uid; ?></li>
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
              <input type='date' class='form-control' name='entry_date' value='<?php 
                echo $entry_date;
              ?>' min='1899-01-23' max='2500-01-01' required><br>
              <label><B>To: </B></label>
               <?php 
              if($exit_date=='To Present')
              {
                echo "
                <input type='radio' name='radio_active' value='1' onchange='hide_date()' checked required>Present?
                <input type='radio' name='radio_active' value='0' onchange='show_date()' required>Specific Date?
                <br><br>";

              }else{
                echo "
                <input type='radio' name='radio_active' value='1' onchange='hide_date()' required>Present?
                <input type='radio' name='radio_active' value='0' onchange='show_date()' checked required>Specific Date?
                <br><br>";
              }
                
               ?>

              <div id='to_div' id='date_to' <?php if($exit_date=='To Present') { echo "class='hide_element'"; } ?>>
                  <?php
                    if($exit_date!='To Present')
                    {
                      echo "<input type='date' class='form-control' name='date_to' min='1899-01-23' max='2500-01-01' value='".$exit_date."'>";
                    }else{
                      echo "<input type='date' class='form-control' name='date_to' min='1899-01-23' max='2500-01-01'>";
                    }
                  ?>
                  <br>
              </div>
              <b>DOH Region 12 Office?:</b><br>
              <input type='radio' name='radio_doh' onchange='doh_yes()' value='1' <?php if($doh12=='1'){
                echo "checked";
              }?>>Yes
              <input type='radio' name='radio_doh' onchange='doh_no()' value='0' <?php if($doh12=='0'){
                echo "checked";
              }?>>No<br><br>
              
            <div <?php if($doh12==0) { echo "class='hide_element'"; }?> id='doh_yes'> 
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
                  if(($doh12=='1')&&($dstation==$section_row['sec_code']))
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

                  if(($doh12=='1')&&($mstation==$section_row['sec_code']))
                  {
                    echo "selected";
                  }

                  echo ">".$section_row['mother_station']."</option>";

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

                 while($position_row=sqlsrv_fetch_array($position_stmt)){
                  $pos_code=$position_row['pos_code'];
                  $position=$position_row['EmpPosition'];
                  echo "<option value='$pos_code'";
                  if(($doh12=='1')&&($pos==$position_row['pos_code']))
                  {
                    echo "selected";
                  }
                  echo " >".$position."</option>";
                 }

                 ?>
               </select><br>
            </div>
            <div <?php if($doh12==1) { echo "class='hide_element'"; }?> id='doh_no'>
              <b>Non-DOH Designation:</b>
                <input type="text" class= 'form-control' name="txt_nondoh_designation" id='txt_nondoh_designation' Placeholder='Enter Non-DOH Office/Facility: e.g. Mall of Alnor, KCC of marbel, Cotabato Light' value='<?php if($doh12==0) { echo $mstation; }?>'><br>
                <b>Position:</b><br>
                <input type="text" class= 'form-control' name="txt_nondoh_position" id='txt_nondoh_position' Placeholder='Enter Position: e.g. driver, Mechanic I, IT' value='<?php if($doh12==0) { echo $pos; }?>'><br>
            </div>
             <b>Position Status:</b><br>
              <input type='radio' name='radio_status' value='1' required <?php if ($status=='1'){ echo "checked"; }?>>Permanent<br>
              <input type='radio' name='radio_status' value='2' <?php if ($status=='2'){ echo "checked"; }?>>Job Order/Contractual<br>
              <input type='radio' name='radio_status' value='3' <?php if ($status=='3'){ echo "checked"; }?>>Coterminous<br>
              <input type='radio' name='radio_status' value='4' <?php if ($status=='4'){ echo "checked"; }?>>Temporary<br>
              <input type='radio' name='radio_status' value='5' <?php if ($status=='5'){ echo "checked"; }?>>Casual<br><br>

              <b>Enter Salary:</b>
              <input type='number' name='txt_salary' class='form-control' placeholder="Enter Salary: e.g. 23000, 100000, 90000" value='<?php echo $salary; ?>' required>
          </div>

              <div class='text-center'><!-- End No Labels Form -->
                <button class="btn btn-primary" name='btn_save'>Update</button>
                <?php

                // echo '<a href="emp-designation-history.php?uid='$user_id'" class="btn btn-secondary">Return</a>';

                echo "<a href='emp-designation-history.php?uid=".$uid."' class='btn btn-secondary'>Return</a>";
              
                ?>
                </div><br>
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