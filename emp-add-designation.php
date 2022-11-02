<?php
session_start();
include "layouts\layout_sidebar.php";
$user_id = $_GET['uid'];

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

  function show_date(){
  var element = document.getElementById("span_todate");
  element.classList.remove("hide_element");
  document.getElementById("to_date").required = true;
  }

  function hide_date()
  {
  var element = document.getElementById("span_todate");
  element.classList.add("hide_element");
  document.getElementById("to_date").required = false;
  }

  function show_doh()
  {
    var element = document.getElementById("span_doh");
    element.classList.remove("hide_element");
    var element = document.getElementById("span_nondoh");
    element.classList.add("hide_element");
    document.getElementById("nondoh_dstation").required = false;
    document.getElementById("nondoh_position").required = false;
    document.getElementById("nondoh_status").required = false;
    document.getElementById("nondoh_salary").required = false;
  }

  function hide_doh()
  {
    document.getElementById("doh_radio_status").required = false;
    var element = document.getElementById("span_doh");
    element.classList.add("hide_element");
    var element = document.getElementById("span_nondoh");
    element.classList.remove("hide_element");
    document.getElementById("nondoh_dstation").required = true;
    document.getElementById("nondoh_position").required = true;
    document.getElementById("nondoh_status").required = true;
    document.getElementById("nondoh_salary").required = true;
  }

  function show_nppos()
  {
    var element = document.getElementById("span_nppos");
    element.classList.remove("hide_element");
    var element = document.getElementById("span_ppos");
    element.classList.add("hide_element");
    document.getElementById("doh_np_salary").required = true;
    
  }

  function hide_nppos()
  {
    var element = document.getElementById("span_nppos");
    element.classList.add("hide_element");
    var element = document.getElementById("span_ppos");
    element.classList.remove("hide_element");
    document.getElementById("doh_np_salary").required = false;
    
  }


</script>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add New Designation Form</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
           <?php
            echo '<li class="breadcrumb-item">
            <a href="emp-designation-history.php?uid='.$user_id.'">Designation History</a>
            </li>';
          ?>
          <li class="breadcrumb-item active">Add New Designation Form</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      
      <form method="post">
      <div class="row">
        <div class="col-lg-7">
        <?php include "scripts/designation-script.php"; ?> 
        
            <div class="card">
                <div class="card-body">
                  <br>
                  <B>From</B>
                  <input type="date" name='from_date' class='form-control' required>
                  <br><label><B>To: </B></label><br>
                    <input type='radio' name='radio_active' value='1' onchange="hide_date()" <?php 
                    if(isset($_POST['radio_active'])&&($_POST['radio_active']=='1')){
                      echo "checked";
                    }
                  ?> required>Present Date?
                    <input type='radio' name='radio_active' value='0' onchange="show_date()" <?php 
                    if(isset($_POST['radio_active'])&&($_POST['radio_active']=='0'))
                    {
                      echo "checked";
                    }
                  ?> required>Specific Date?<br>

                  <span class='hide_element' id='span_todate'>
                    <input type='date' class='form-control' name='to_date' id='to_date'>
                  </span>

                  <br>

                  <label><B>DOH Region 12 Connected Office/Factility?</B></label><br>
                  <input type='radio' value='1' onchange='show_doh()' name='radio_doh' required>Yes
                  <input type='radio' value='0' onchange='hide_doh()' name='radio_doh'>No
                  <br><br>

                  <!-- DOH OFFICE SPAN -->
                  <span id='span_doh' class='hide_element'>
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
                    <input type='radio' id='doh_radio_status'name='doh_radio_status' value='1' onchange='hide_nppos()' required>Permanent
                    <br><input type='radio' name='doh_radio_status' value='2' onchange='show_nppos()'>Job Order/Contractual<br>
                    <input type='radio' name='doh_radio_status' value='3'  onchange='show_nppos()'>Coterminous<br>
                    <input type='radio' name='doh_radio_status' value='4'  onchange='show_nppos()'>Temporary<br>
                    <input type='radio' name='doh_radio_status' value='5'  onchange='show_nppos()'>Casual<br><br>
                      
                     <span id='span_ppos' class='hide_element'>
                       <label><B>Position: </B></label>
                       <select class='form-control' name='perm_position'>
                        <option value="0">- Select -</option>
                         <?php 

                         $getposition_sql = "select * from select_position where permanent='1' and pos_void='1' order by EmpPosition asc";
                         $position_stmt = sqlsrv_query($conn,$getposition_sql);

                         while($position_row=sqlsrv_fetch_array($position_stmt)){
                          $pos_code=$position_row['pos_code'];
                          $position=$position_row['EmpPosition'];
                          echo "<option value='$pos_code'>".$position."</option>";
                         }

                         ?>
                       </select>
                      </span> 

                      <span id='span_nppos' class='hide_element'>
                       <label><B>Position: </B></label>
                       <select class='form-control' name='nonperm_position'>
                        <option value="0">- Select -</option>
                         <?php 

                         $getposition_sql = "select * from select_position where permanent='0' order by EmpPosition asc";
                         $position_stmt = sqlsrv_query($conn,$getposition_sql);

                         while($position_row=sqlsrv_fetch_array($position_stmt)){
                          $pos_code=$position_row['pos_code'];
                          $position=$position_row['EmpPosition'];
                          echo "<option value='$pos_code'>".$position."</option>";
                         }

                         ?>
                       </select><br>

                        <label><B>Salary: </B></label><br>
                        <input type='text' class="form-control" name='doh_np_salary' id='doh_np_salary'>
                      </span> 

                  </span>

                   <span id='span_nondoh' class='hide_element'>
                    <label><b>Designation</b></label><br>
                    <input type='text' class='form-control' name='nondoh_dstation' id='nondoh_dstation' placeholder="Enter Designation: e.g. Mall of Asia, DPWH RO12"><br>
                    <label><b>Position</b></label><br>
                    <input type='text' class='form-control' name='nondoh_position' id='nondoh_position' placeholder="Enter Position: e.g. Administrative Aide II, Driver">
                    <br>

                    <b>Employment Status:</b><br>
                    <input type='radio' name='nondoh_status' id='nondoh_status' value='1'>Permanent<br>
                    <input type='radio' name='nondoh_status' value='2'>Job Order/Contractual<br>
                    <input type='radio' name='nondoh_status' value='3' >Coterminous<br>
                    <input type='radio' name='nondoh_status' value='4' >Temporary<br>
                    <input type='radio' name='nondoh_status' value='5' >Casual<br><br>

                    <b>Salary:</b><br>
                    <input type='number' name='nondoh_salary' class="form-control">
                  </span>

                  <div class="text-center"><br>
                    <!-- <button class='btn btn-primary' name='btn_save'>Submit</button> -->
                    <input type='submit' name='btn_save' class='btn btn-primary'>
                    <?php echo "<a href='emp-designation-history.php?uid=".$user_id."' class='btn btn-secondary'>Return</a>" ?>
                  </div>
                </div>
            </div>

        </div>
      </div>
      </form>
    </section>
 
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