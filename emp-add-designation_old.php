<?php
session_start();
$user_id=$_GET['uid'];
include "layouts\layout_sidebar.php";
include "scripts\connect.php";
?>
<style type="text/css">
  .hide_element{
    display: none;
  }

  .txt_to {
  
  width: 50%;
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

  function hide_spanperm(){
  var element = document.getElementById("span_perm");
  element.classList.add("hide_element");
  //document.getElementById("txt_itemno").required = false;
  }

  function show_spanperm()
  {
  var element = document.getElementById("span_perm");
  element.classList.remove("hide_element");
  //document.getElementById("txt_itemno").required = true;
  }

  function show_spannonperm()
  {
  var element = document.getElementById("span_perm");
  element.classList.remove("hide_element");
  //document.getElementById("txt_itemno").required = true;
  }

  function show_spannonperm(){
  var element = document.getElementById("span_nonperm");
  element.classList.remove("hide_element");
  }

  function hide_spannonperm(){
  var element = document.getElementById("span_nonperm");
  element.classList.add("hide_element");
  }
</script>

  <main id="main" class="main">
  <form method="post" type='submit'>
    <div class="pagetitle">
      <h1>Add New Employee Designation</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <?php
            echo '<li class="breadcrumb-item">
            <a href="emp-designation-history.php?uid='.$user_id.'">Designation History</a>
            </li>';
          ?>
          <li class="breadcrumb-item">Add New Designation</li>
          <list class="breadcrumb-item active"><?php echo $user_id; ?></li>
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
            // include "scripts/emp-add-designation-script2.php";
            
          ?>    
              <br>
              <label><B>From: </B></label>
              <input type='date' class='form-control' name='entry_date' value='<?php if(isset($_POST['entry_date']))
              {
                echo $_POST['entry_date'];
              }?>' min='1899-01-23' max='2500-01-01' required><br>
              <label><B>To: </B></label>
              <input type='radio' name='radio_active' value='1' onchange="hide_date()" <?php 
              if(isset($_POST['radio_active'])&&($_POST['radio_active']=='1')){
                echo "checked";
              }
            ?> required>Present?
              <input type='radio' name='radio_active' value='0' onchange="show_date()" <?php 
              if(isset($_POST['radio_active'])&&($_POST['radio_active']=='0'))
              {
                echo "checked";
              }
            ?> required>Specific Date?<br><br>
              <div 
              <?php 
              if(!isset($_POST['radio_active']))
              {
                echo "class='hide_element'";
              }elseif($_POST['radio_active']=='1'){
                echo "class='hide_element'";
              }
                
               ?> id='to_div'>
                <input type='date' class='form-control' name='date_to' id='date_to' value='<?php 
                if(isset($_POST['date_to']))
                {
                  echo $_POST['date_to'];
                }
              ?>' min='1899-01-23' max='2500-01-01'
              ><br>
              </div>

              <b>DOH Region 12 Office?:</b><br>
              <input type='radio' name='radio_doh' onchange='doh_yes()' value='1' <?php if((isset($_POST['radio_doh']))&&($_POST['radio_doh']==1)) { echo "checked"; }?>>Yes
              <input type='radio' name='radio_doh' onchange='doh_no()' value='0' <?php if((isset($_POST['radio_doh']))&&($_POST['radio_doh']==0)) { echo "checked"; }?>>No<br><br>
              
            <div <?php if(((isset($_POST['radio_doh']))&&($_POST['radio_doh']==0))||(!isset($_POST['radio_doh']))) { echo "class='hide_element'"; }?> id='doh_yes'> 
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
                  if(isset($_POST['select_mstation'])&&($_POST['select_mstation']==$section_row['sec_code'])){
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
                  if(isset($_POST['select_dstation'])&&($_POST['select_dstation']==$section_row['sec_code'])){
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
               <b>Employment Status:</b><br>
              <input type='radio' name='doh_radio_status' value='1' onchange='show_spanperm(); hide_spannonperm()' required>Permanent
              <br><input type='radio' name='doh_radio_status' value='2' onchange='hide_spanperm(); show_spannonperm()'>Job Order/Contractual<br>
              <input type='radio' name='doh_radio_status' value='3'  onchange='hide_spanperm(); show_spannonperm()'>Coterminous<br>
              <input type='radio' name='doh_radio_status' value='4'  onchange='hide_spanperm(); show_spannonperm()'>Temporary<br>
              <input type='radio' name='doh_radio_status' value='5'  onchange='hide_spanperm(); show_spannonperm()'>Casual<br><br>



              

              <span id='span_nonperm' class='hide_element'>
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
                  if((isset($_POST['select_position']))&&($_POST['select_position']==$position_row['pos_code']))
                  {
                    echo "selected";
                  }
                  echo " >".$position."</option>";
                 }

                 ?>
               </select>
              <br>
             <b>Enter Salary:</b>
              <input type='number' name='txt_salary' class='form-control' placeholder="Enter Salary: e.g. 23000, 100000, 90000" required>
            </span>

            <span id='span_perm' class='hide_element'>
                <label><B>Position: </B></label>
               <select class='form-control' name='select_position_perm'>
                <option value="0">- Select -</option>
                 <?php 

                 $getposition_sql = "select * from select_position where permanent='1' order by EmpPosition asc";
                 $position_stmt = sqlsrv_query($conn,$getposition_sql);

                 while($position_row=sqlsrv_fetch_array($position_stmt)){
                  $pos_code=$position_row['pos_code'];
                  $position=$position_row['EmpPosition'];
                  echo "<option value='$pos_code'";
                  if((isset($_POST['select_position']))&&($_POST['select_position']==$position_row['pos_code']))
                  {
                    echo "selected";
                  }
                  echo " >".$position."</option>";
                 }

                 ?>
               </select>
            </span>

            

            </div>
            <div class='hide_element' id='doh_no'>
              <b>Non-DOH Designation:</b>
                <input type="text" class= 'form-control' name="txt_nondoh_designation" id='txt_nondoh_designation' Placeholder='Enter Non-DOH Office/Facility: e.g. Mall of Alnor, KCC of marbel, Cotabato Light'><br>
                <b>Position:</b><br>
                <input type="text" class= 'form-control' name="txt_nondoh_position" id='txt_nondoh_position' Placeholder='Enter Position: e.g. driver, Mechanic I, IT'>
                <br>

              <b>Employment Status:</b><br>
              <input type='radio' name='radio_status' value='1' onchange='show_itemno()' required>Permanent <span id='span_itemno' class='hide_element'><input type='text' name='txt_itemno' class='txt_to' placeholder="Enter Item Code"></span>
              <br><input type='radio' name='radio_status' value='2' onchange='hide_itemno()'>Job Order/Contractual<br>
              <input type='radio' name='radio_status' value='3'  onchange='hide_itemno()'>Coterminous<br>
              <input type='radio' name='radio_status' value='4'  onchange='hide_itemno()'>Temporary<br>
              <input type='radio' name='radio_status' value='5'  onchange='hide_itemno()'>Casual<br><br>

              <b>Enter Salary:</b>
              <input type='number' name='txt_salary' class='form-control' placeholder="Enter Salary: e.g. 23000, 100000, 90000" required>
            </div>
          </div>

              <div class='text-center'><!-- End No Labels Form -->
                <!-- <button class="btn btn-primary" name='btn_save'>Submit</button> -->
                <?php

                echo "<a href='emp-designation-history.php?uid=".$user_id."' class='btn btn-secondary'>Return</a>";
              
                ?>
                </div>
                <button class="btn btn-primary" name='btn_saave'>Submit</button>
        </form>
    </section>
    <?php include "scripts/echo.php"; ?>
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