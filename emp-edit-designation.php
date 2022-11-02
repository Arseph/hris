<?php
session_start();
include "layouts\layout_sidebar.php";
$user_id = $_GET['uid'];
$id = $_GET['id'];


$get_data = "select * from emp_designation where agencyid='$user_id' and id='$id'";
$get_stmt = sqlsrv_query($conn, $get_data);
$get_row = sqlsrv_fetch_array($get_stmt);

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
        <?php include "scripts/edit-designation-script.php"; ?> 
        
            <div class="card">
                <div class="card-body">
                  <br>
                  <B>From</B>
                  <input type="date" name='from_date' class='form-control' value='<?php echo $get_row['entry_date']; ?>'>
                  <br><label><B>To: </B></label><br>
                    <input type='radio' name='radio_active' value='1' onchange="hide_date()" <?php 
                    if($get_row['exit_date']=='To Present'){
                      echo "checked";
                    }
                  ?> required>Present Date?
                    <input type='radio' name='radio_active' value='0' onchange="show_date()" <?php 
                    if($get_row['exit_date']!='To Present'){
                      echo "checked";
                    }
                  ?> required>Specific Date?<br>

                  <span 
                  <?php 
                    if($get_row['exit_date']=='To Present'){
                      echo "class='hide_element'";
                    }
                  ?>
                   id='span_todate'>
                    <input type='date' class='form-control' name='to_date' id='to_date' value='<?php if($get_row['exit_date']!="To Present"){ echo $get_row['exit_date']; } ?>'>
                  </span>

                  <br>

                  <label><B>DOH Region 12 Connected Office/Factility?</B></label><br>
                  <input type='radio' value='1' onchange='show_doh()' name='radio_doh' <?php if($get_row['doh12']=='1'){ echo "checked"; } ?> >Yes
                  <input type='radio' value='0' onchange='hide_doh()' name='radio_doh' <?php if($get_row['doh12']=='0'){ echo "checked"; } ?>>No
                  <br><br>

                  <!-- DOH OFFICE SPAN -->
                  <span id='span_doh' <?php if($get_row['doh12']=='0'){ echo "class='hide_element'"; } ?>>
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
                        if(($get_row['doh12']=='1')&&($get_row['mother_station']==$section_row['sec_code'])){
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
                        if(($get_row['doh12']=='1')&&($get_row['designated_station']==$section_row['sec_code'])){
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
                    <input type='radio' id='doh_radio_status'name='doh_radio_status' value='1' onchange='hide_nppos()' required <?php if($get_row['status']=='1'){ echo "checked"; } ?>>Permanent
                    <br><input type='radio' name='doh_radio_status' value='2' onchange='show_nppos()' <?php if($get_row['status']=='2'){ echo "checked"; } ?>>Job Order/Contractual<br>
                    <input type='radio' name='doh_radio_status' value='3'  onchange='show_nppos()' <?php if($get_row['status']=='3'){ echo "checked"; } ?>>Coterminous<br>
                    <input type='radio' name='doh_radio_status' value='4'  onchange='show_nppos()' <?php if($get_row['status']=='4'){ echo "checked"; } ?>>Temporary<br>
                    <input type='radio' name='doh_radio_status' value='5'  onchange='show_nppos()' <?php if($get_row['status']=='5'){ echo "checked"; } ?>>Casual<br><br>
                      
                     <span id='span_ppos' <?php if($get_row['status']!='1'){ echo "class='hide_element'"; }?>>
                       <label><B>Position: </B></label>
                       <select class='form-control' name='perm_position'>
                        <option value="0">- Select -</option>
                         <?php 

                         $getposition_sql = "select * from select_position where permanent='1' order by EmpPosition asc";
                         $position_stmt = sqlsrv_query($conn,$getposition_sql);

                         while($position_row=sqlsrv_fetch_array($position_stmt)){
                          $pos_code=$position_row['pos_code'];
                          $position=$position_row['EmpPosition'];
                          echo "<option value='$pos_code' ";
                          if(($get_row['status']=='1')&&($get_row['position']==$pos_code)){
                            echo "selected";
                          }
                          echo " >".$position."</option>";
                         }

                         ?>
                       </select>
                      </span> 

                      <span id='span_nppos' <?php if ($get_row['status']=='1'){ echo "class='hide_element'"; } ?>>
                       <label><B>Position: </B></label>
                       <select class='form-control' name='nonperm_position'>
                        <option value="0">- Select -</option>
                         <?php 

                         $getposition_sql = "select * from select_position where permanent='0' order by EmpPosition asc";
                         $position_stmt = sqlsrv_query($conn,$getposition_sql);

                         while($position_row=sqlsrv_fetch_array($position_stmt)){
                          $pos_code=$position_row['pos_code'];
                          $position=$position_row['EmpPosition'];
                          echo "<option value='$pos_code' ";


                          if(($get_row['status']!='1')&&($get_row['position']==$pos_code)){
                            echo "selected";
                          }

                          echo " >".$position."</option>";
                         }

                         ?>
                       </select><br>

                        <label><B>Salary: </B></label><br>
                        <input type='text' class="form-control" name='doh_np_salary' id='doh_np_salary' value='<?php if($get_row['status']!='1'){ echo $get_row['salary']; } ?>'>
                      </span> 

                  </span>

                   <span id='span_nondoh' <?php if($get_row['doh12']=='1'){
                    echo "class='hide_element'";
                   }?>>
                    <label><b>Designation</b></label><br>
                    <input type='text' class='form-control' name='nondoh_dstation' id='nondoh_dstation' placeholder="Enter Designation: e.g. Mall of Asia, DPWH RO12" value='<?php if($get_row['doh12']=='0'){
                    echo $get_row['mother_station'];
                   }?>'  <?php if($get_row['doh12']=='0'){
                    echo "required'";
                   }?>><br>
                    <label><b>Position</b></label><br>
                    <input type='text' class='form-control' name='nondoh_position' id='nondoh_position' placeholder="Enter Position: e.g. Administrative Aide II, Driver" value='<?php if($get_row['doh12']=='0'){
                    echo $get_row['position'];
                   }?>'  <?php if($get_row['doh12']=='0'){
                    echo "required'";
                   }?>>
                    <br>

                    <b>Employment Status:</b><br>
                    <input type='radio' name='nondoh_status' id='nondoh_status' value='1' <?php if(($get_row['doh12']=='0')&&($get_row['status']=='1')){ echo "checked"; }?> <?php if($get_row['doh12']=='0'){
                    echo "required";
                   }?>>Permanent<br>
                    <input type='radio' name='nondoh_status' value='2' <?php if(($get_row['doh12']=='0')&&($get_row['status']=='2')){ echo "checked"; }?>>Job Order/Contractual<br>
                    <input type='radio' name='nondoh_status' value='3' <?php if(($get_row['doh12']=='0')&&($get_row['status']=='3')){ echo "checked"; }?>>Coterminous<br>
                    <input type='radio' name='nondoh_status' value='4' <?php if(($get_row['doh12']=='0')&&($get_row['status']=='4')){ echo "checked"; }?>>Temporary<br>
                    <input type='radio' name='nondoh_status' value='5' <?php if(($get_row['doh12']=='0')&&($get_row['status']=='5')){ echo "checked"; }?>>Casual<br><br>

                    <b>Salary:</b><br>
                    <input type='number' name='nondoh_salary' id='nondoh_salary' class="form-control" value='<?php if($get_row['doh12']=='0'){ echo $get_row['salary']; }?>'  <?php if($get_row['doh12']=='0'){ echo "required"; } ?>>
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