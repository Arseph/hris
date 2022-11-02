<?php


session_start();

include "layouts\layout_sidebar.php";
//error_reporting(E_ALL ^ E_NOTICE);

?>
    
    <style>
        .multiselect {
  width: 100%;
}

.selectBox {
  position: relative;
}

.selectBox select {
  width: 100%;
}

.overSelect {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
}

#mySelectOptions {
  display: none;
  border: 0.5px #7c7c7c solid;
  background-color: #ffffff;
  max-height: 150px;
  overflow-y: scroll;
}

#mySelectOptions label {
  display: block;
  font-weight: normal;
  display: block;
  white-space: nowrap;
  min-height: 1.2em;
  background-color: #ffffff00;
  padding: 0 2.25rem 0 .75rem;
  /* padding: .375rem 2.25rem .375rem .75rem; */
}

#mySelectOptions label:hover {
  background-color: #1e90ff;
}

    </style>


    <script type="text/javascript">
        //bootstrap multiselect
        function checkboxStatusChange() {
  var multiselect = document.getElementById("mySelectLabel");
  var multiselectOption = multiselect.getElementsByTagName('option')[0];

  var values = [];
  var checkboxes = document.getElementById("mySelectOptions");
  var checkedCheckboxes = checkboxes.querySelectorAll('input[type=checkbox]:checked');

  for (const item of checkedCheckboxes) {
    var checkboxValue = item.getAttribute('value');
    values.push(checkboxValue);
  }

  var dropdownValue = "- Select -";
  if (values.length > 0) {
    dropdownValue = values.join(', ');
  }

  multiselectOption.innerText = dropdownValue;
}

function toggleCheckboxArea(onlyHide = false) {
  var checkboxes = document.getElementById("mySelectOptions");
  var displayValue = checkboxes.style.display;

  if (displayValue != "block") {
    if (onlyHide == false) {
      checkboxes.style.display = "block";
    }
  } else {
    checkboxes.style.display = "none";
  }
}


        //first ajax
        $(document).ready(function(){

            $("#sel_depart").change(function(){
                var deptid = $(this).val();

                $.ajax({
                    url: 'scripts/getUsers.php',
                    type: 'post',
                    data: {depart:deptid},
                    dataType: 'json',
                    success:function(response){

                        var len = response.length;

                        $("#sel_user").empty();
                        $("#sel_user").append("<option value='0'>- Select -</option>");
                        for( var i = 0; i<len; i++){
                            var id = response[i]['id'];
                            var mstation_name = response[i]['mother_station'];

                            $("#sel_user").append("<option value='"+id+"'>"+mstation_name+"</option>");

                        }
                    }
                });
            });

        });

        //2nd ajax
        $(document).ready(function(){

            $("#sel_depart2").change(function(){
                var deptid2 = $(this).val();

                $.ajax({
                    url: 'scripts/getUsers2.php',
                    type: 'post',
                    data: {depart2:deptid2},
                    dataType: 'json',
                    success:function(response){

                        var len = response.length;

                        $("#sel_user2").empty();
                        $("#sel_user2").append("<option value='"+id2+"'>- Select - </option>");
                        for( var o = 0; o<len; o++){
                            var id2 = response[o]['id'];
                            var mstation_name2 = response[o]['mother_station'];

                            $("#sel_user2").append("<option value='"+id2+"'>"+mstation_name2+"</option>");

                        }
                    }
                });
            });

        });

        var a=1;
    </script>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add HR Info</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Add HR Info</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

         <div class="card">
            <div class="card-body">

              <!-- No Labels Form -->
              <form method="post" class="row g-3">
                 <div class="col-md-6">
                    <?php
                    include "scripts\spit.php";
                    include "scripts\hrinfo-add-script.php";
                   
                    ?>
                    <br><h4>Select Employee<span style="color:red;">*</span></h4>
                    


                    <select name="sel_employee" class="form-select" required>
                        <option value="0">- Select -</option>
                        
                        <?php
                    
                    include "scripts\connect.php";
                    $sql_empname = "select * from dbo.emp_basic where hrinfo = 'unset' and firstname<>'admin' order by surname ASC";
                          
                            if($result = sqlsrv_query($conn, $sql_empname))
                            {

                                while($row = sqlsrv_fetch_array($result))
                                {

                                  $agencyid = $row['agencyid'];
                                  $empsurname = $row['surname'];
                                  $empfname = $row['firstname'];
                                  if ($empmname!="")
                                  {
                                  $emp_fullname = $empsurname.", ".$empfname." ".$empmname.".";
                                  } else {
                                    $emp_fullname = $empsurname.", ".$empfname;
                                  }

                                    if($_POST['sel_employee'] == $agencyid)
                                    {
                                        echo "<option value='".$agencyid."' selected>".$emp_fullname."</option>";
                                    }
                                    else
                                    {
                                        echo "<option value='".$agencyid."' >".$emp_fullname."</option>";
                                    }

                                }
                            }
                            ?> 
                    </select>
                 </div>
                 <div class="col-md-6"></div>

                <div class="col-md-6"><br><h4>Mother Unit<span style="color:red;">*</span></h4>
                              <select id="sel_depart" name="sel_depart" class="form-select">
                                    <option value="0">- Select -</option>
                                    <?php 
                    include "scripts\connect.php";
                    $sql_munit = "select * from dbo.munit";
                          
                            if($result = sqlsrv_query($conn, $sql_munit))
                            {

                                while($row = sqlsrv_fetch_array($result))
                                {

                                  $munit_id = $row['id'];
                                  $munit_name = $row['mother_unit'];
                                    if($_POST['sel_depart'] == $munit_id)
                                    {
                                        echo "<option value='".$munit_id."' selected>".$munit_name."</option>";
                                    }
                                    else
                                    {
                                        echo "<option value='".$munit_id."' >".$munit_name."</option>";
                                    }

                                }
                            }
                            
            ?>
                                </select>
                </div>
                <div class="col-md-6"><br><h4>Mother Station<span style="color:red;">*</span></h4>
                  <select id="sel_user" name="sel_user" class="form-select">
                    <option value="0">- Select -</option>
                </select>
                </div>
                <div class="col-md-6"><br><h4>Designated Unit<span style="color:red;">*</span></h4>
                  <select id="sel_depart2" name="sel_depart2" class="form-select">
                    <option value="0">- Select -</option>
                                    <?php 
                    include "scripts\connect.php";
                    $sql_munit = "select * from dbo.munit";
                          
                            if($result = sqlsrv_query($conn, $sql_munit))
                            {

                                while($row = sqlsrv_fetch_array($result))
                                {

                                  $munit_id = $row['id'];
                                  $munit_name = $row['mother_unit'];
                                    if($_POST['sel_depart'] == $munit_id)
                                    {
                                        echo "<option value='".$munit_id."' selected>".$munit_name."</option>";
                                    }
                                    else
                                    {
                                        echo "<option value='".$munit_id."' >".$munit_name."</option>";
                                    }

                                }
                            }
            ?>
                  </select>
                </div>
                <div class="col-md-6"><br><h4>Designated Station<span style="color:red;">*</span></h4>
                  <select id="sel_user2" name="sel_user2" class="form-select">
                      <option value="0">- Select -</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <br><h4>Employment Status<span style="color:red;">*</span></h4>
                  <select name="empstatus" class="form-select">
                    <option value='0'>- Select -</option>
                    <option value='Active' 
                    <?php
                    if(isset($_POST['empstatus']))
                    {
                        if($_POST['empstatus'] == 'Active')
                        { 
                            echo "selected";
                        }
                    }
                        ?>
                        >Active</option>
                    <option value='Inactive' 
                    <?php
                        if(isset($_POST['empstatus']))
                        {
                            if($_POST['empstatus'] == 'Inactive')
                            { 
                                echo "selected";
                            }
                        }
                        ?>
                        >Inactive</option>
                    
                    
                    
                  </select>
                </div>
                <div class="col-md-6">
                  <br><h4>Inactive Type<span style="color:red;">*</span></h4>
                  <select name="inactive" class="form-select">
                    <option value='0'>- Select -</option>
                    <option value='1'>Awol</option>
                    <option value='2'>Retired</option>
                    <option value='3'>Secondment</option>
                    <option value='4'>Terminated</option>
                    <option value='5'>End of Contract</option>
                    <option value='6'>Dropped from the roll</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <br><h4>Employment Type<span style="color:red;">*</span></h4>
                  <select name="emptype" class="form-select">
                    <option value='0'>- Select -</option>
                    <?php

                        if($_POST['emptype']=='Permanent')
                        {
                        echo "<option value='Permanent' selected>Permanent</option>";
                        }
                        else
                        {
                        echo "<option value='Permanent' >Permanent</option>";
                        }

                        if($_POST['emptype']=='Non-permanent')
                        {
                        echo "<option value='Non-permanent' selected>Non-permanent</option>";
                        }
                        else
                        {
                        echo "<option value='Non-permanent'>Non-permanent</option>";
                        }
                        
                    


                    ?>
                   
                  </select>
                </div>
                <div class="col-md-6">
                  <br><h4>Non-permanent Type<span style="color:red;">*</span></h4>
                  <select class="form-select" name="nonperm">
                    <option value='0'> - Select - </option>
                    <?php
                        $sql = "select * from select_nonperm";
                        if($result = sqlsrv_query($conn, $sql))
                        {
                          while($row = sqlsrv_fetch_array($result))
                          {
                            $select_nonperm=$row['nonperm_type'];
                            $select_nonperm_id=$row['id'];

                            if($_POST['nonperm']==$select_nonperm_id){
                                echo "<option value='$select_nonperm_id' selected>".$select_nonperm."</option>";
                            }else{
                                echo "<option value='$select_nonperm_id'>".$select_nonperm."</option>";
                            }
                          }
                        }
                    ?>
                  </select>
                </div>
                <div class="col-md-6">
                    <h4>Eligible<span style="color:red;">*</span></h4>
                    <input required type="radio" name="eligible" Value="yes" 
                    <?php 
                    if ((isset($_POST['eligible'])) && ($_POST['eligible']=='yes'))
                    {
                        echo "checked";
                    }
                    ?>
                    >Yes
                    <input required type="radio" name="eligible" Value="no" 
                    <?php 
                    if ((isset($_POST['eligible'])) && ($_POST['eligible']=='no'))
                    {
                        echo "checked";
                    }
                    ?>>no
                    
                    <br><br><h4>Eligibility Type</h4>
                        <input type="checkbox" id="eligibility1" name="eligibility[]" value="1" <?php if (isset($_POST['eligibility1'])){ echo "checked"; } ?>>
                        <label for="eligibility1">Registered nurse</label><br>

                        <input type="checkbox" id="eligibility2" name="eligibility[]" value="2" >
                        <label for="eligibility2">RA 1080</label><br>

                        <input type="checkbox" id="eligibility3" name="eligibility[]" value="3">
                        <label for="eligibility3">Licensure Exam for Teacher</label><br>

                        <input type="checkbox" id="eligibility4" name="eligibility[]" value="4">
                        <label for="eligibilit4">Environmental Planning</label><br>

                        <input type="checkbox" id="eligibility5" name="eligibility[]" value="5" >
                        <label for="eligibility5">CS Sub-Professional</label><br>

                        <input type="checkbox" id="eligibility6" name="eligibility[]" value="6" >
                        <label for="eligibility6">Midwifery Board</label><br>

                        <input type="checkbox" id="eligibility7" name="eligibility[]" value="7">
                        <label for="eligibility7">Barangay Eligibility</label><br>

                        <input type="checkbox" id="eligibility8" name="eligibility[]" value="8" >
                        <label for="eligibilit8">National Competency TESDA</label><br>

                        <input type="checkbox" id="eligibility9" name="eligibility[]"  value="9">
                        <label for="eligibility9">CS Professional</label><br>

                        <input type="checkbox" id="eligibility10" name="eligibility[]" value="10">
                        <label for="eligibility10">Sanitation Board</label><br>

                        <input type="checkbox" id="eligibility11" name="eligibility[]" value="11">
                        <label for="eligibility11">Cvil Engineering</label><br>

                        <input type="checkbox" id="eligibility12" name="eligibility[]" value="12">
                        <label for="eligibilit12">Others</label><br>
                </div>
                <div class="col-6">
                 <h4>Eligibility Level 3</h4>
                 <select class="form-select" name="lvl3">
                   <option value='0'>- Select -</option>
                   <?php
                    
                    include "scripts\connect.php";
                    $sql_position = "select * from dbo.select_lvl3_eligibility order by elig_lvl3 ASC";
                          
                            if($result = sqlsrv_query($conn, $sql_position))
                            {

                                while($row = sqlsrv_fetch_array($result))
                                {
                                    $lvl3_elig_id = $row['id'];
                                    $lvl3_elig = $row['elig_lvl3'];


                                    if($_POST['lvl3'] == $lvl3_elig_id)
                                    {
                                        echo "<option value='".$lvl3_elig_id."' selected>".$lvl3_elig."</option>";
                                    }
                                    else
                                    {
                                        echo "<option value='".$lvl3_elig_id."' >".$lvl3_elig."</option>";
                                    }

                                }
                            }
                            ?>
                 </select>

                  <br><h4>position</h4>
                    <select class="form-select" name="pos">
                       <option value='0'>- Select -</option>
                        <?php
                    
                    include "scripts\connect.php";
                    $sql_position = "select * from dbo.select_position order by position ASC";
                          
                            if($result = sqlsrv_query($conn, $sql_position))
                            {

                                while($row = sqlsrv_fetch_array($result))
                                {
                                    $position_id = $row ['id'];
                                    $position = $row['position'];


                                    if($_POST['pos'] == $position_id)
                                    {
                                        echo "<option value='".$position_id."' selected>".$position."</option>";
                                    }
                                    else
                                    {
                                        echo "<option value='".$position_id."' >".$position."</option>";
                                    }

                                }
                            }
                            ?> 
                    </select>

                    <br><h4>Salary Grade<span style="color:red;">*</span></h4>
                    <select class="form-select" name="salarygrade">
                    <option value='0'>- Select -</option>
                    <?php 
                    $sql_salary_grade = "select * from dbo.select_salary_grade";
                          
                            if($result = sqlsrv_query($conn, $sql_salary_grade))
                            {

                                while($row = sqlsrv_fetch_array($result))
                                {

                                  $salgrade = $row['salary_grade'];
                                  $salgrade_id = $row['id'];
                                if($_POST['salarygrade'] == $salgrade)
                                {
                                    echo "<option value='$salgrade_id' selected>Salary Grade ".$salgrade."</option>";
                                }
                                else
                                {
                                    echo "<option value='$salgrade_id'>Salary Grade ".$salgrade."</option>";
                                }

                                }
                            }
                       
                    ?>
                    </select>

                    <br><h4>Step</h4>
                    <select class="form-select" name="step">
                      <option value='0'>- Select -</option>
                      <?php 
                    $sql_step = "select * from dbo.select_step";
                          
                            if($result = sqlsrv_query($conn, $sql_step))
                            {

                                while($row = sqlsrv_fetch_array($result))
                                {

                                  $step = $row['step'];
                                  $step_id = $row['id'];

                                    if($_POST['step'] == $step_id)
                                    {
                                        echo "<option value='$step_id' selected>Step ".$step."</option>";
                                    }
                                    else
                                    {
                                        echo "<option value='$step_id'>Step ".$step."</option>";
                                    }

                                }
                            }
                       
                    ?>
                    </select>
                </div>

                <div class="col-6">
                    <br><h4>Item No.</h4>
                    <input type="number" name="itemno" class="form-select" value="<?php echo $_POST['itemno'];?>">
                </div>

                <div class="col-6">
                    <br><h4>Basic Salary<span style="color:red;">*</span></h4>
                    <input required type="number" name="basicsalary" class="form-select" value="<?php echo $_POST['basicsalary'];?>">
                </div>

                <div class="col-6">
                    <br><h4>Designation type<span style="color:red;">*</span></h4>
                    <select class="form-select" name="designationtype">
                       <option value="0">- Select - </option>
                        <?php 
                    $sql_step = "select * from dbo.select_designationtype";
                          
                            if($result = sqlsrv_query($conn, $sql_step))
                            {

                                while($row = sqlsrv_fetch_array($result))
                                {

                                  $destype = $row['designation_type'];
                                  $destype_id = $row['id'];

                                    if($_POST['designationtype'] == $destype_id)
                                    {
                                        echo "<option value='$destype_id' selected>".$destype."</option>";
                                    }
                                    else
                                    {
                                        echo "<option value='$destype_id'>".$destype."</option>";
                                    }

                                }
                            }
                       
                    ?>
                    </select>

                    <br><h4>Designation<span style="color:red;">*</span></h4>
                    <input required type="text" name="designation" class="form-select" value="<?php if (isset($_POST['designation'])){echo $_POST['designation'];}?>">
                </div>

                <div class="col-6">
                    <br><h4>Highest Grade Level</h4>
                    <select class="form-select" name="highest_grade">
                       <option value="0">- Select - </option>
                       <?php
                        $sql_highest_grade = "select * from dbo.select_highest_grade";
                          
                            if($result = sqlsrv_query($conn, $sql_highest_grade))
                            {

                                while($row = sqlsrv_fetch_array($result))
                                {

                                  $high_grade = $row['highest_grade'];
                                  $high_grade_id = $row['id'];

                                    if($_POST['highest_grade'] == $high_grade)
                                    {
                                        echo "<option value='$high_grade_id' selected>".$high_grade."</option>";
                                    }
                                    else
                                    {
                                        echo "<option value='$high_grade_id'>".$high_grade."</option>";
                                    }

                                }
                            }
                            ?>                 
                       ?>
                    </select>

                    <br><h4>Work Experience</h4>
                      <select class="form-select" name="workexperience">
                        <?php
                        $sql_work_exp= "select * from dbo.select_work_experience";
                          
                            if($result = sqlsrv_query($conn, $sql_work_exp))
                            {

                                while($row = sqlsrv_fetch_array($result))
                                {

                                  $work_exp = $row['work_experience'];
                                  $work_exp_id = $row['id'];

                                    if($_POST['workexperience'] == $work_exp_id)
                                    {
                                        echo "<option value='$work_exp_id' selected>".$work_exp."</option>";
                                    }
                                    else
                                    {
                                        echo "<option value='$work_exp_id'>".$work_exp."</option>";
                                    }

                                }
                            }
                            ?>                 
                       ?>
                      </select>
                </div>
                    <div class="col-md-12">
                      <br><h2>Skills</h2>
                    </div>
                    <div class="col-md-6">
                      
                      <h4>Personality</h4>
                      <select class="form-select" name="Personality">
                        <option value="0"> - Select -</option>
                        <?php
                        $sql_personality= "select * from dbo.select_personality";
                          
                            if($result = sqlsrv_query($conn, $sql_personality))
                            {

                                while($row = sqlsrv_fetch_array($result))
                                {

                                  $personality = $row['personality'];
                                  $personality_id = $row['id'];


                                    if($_POST['Personality'] == $personality_id)
                                    {
                                        echo "<option value='$personality_id' selected>".$personality."</option>";
                                    }
                                    else
                                    {
                                        echo "<option value='$personality_id'>".$personality."</option>";
                                    }

                                }
                            }
                            ?>                 
                       ?>
                      </select>

                <div id="myMultiselect" class="multiselect">
                      
                      <br><h4>Special Info</h4>
                        <input type="checkbox" id="eligibility1" name="specialinfo[]" value="1" <?php if (isset($_POST['eligibility1'])){ echo "checked"; } ?>>
                        <label for="eligibility1">Presidential Appointee</label><br>

                        <input type="checkbox" id="eligibility2" name="specialinfo[]" value="2" >
                        <label for="eligibility2">CSC Appointee</label><br>

                        <input type="checkbox" id="eligibility3" name="specialinfo[]" value="3">
                        <label for="eligibility3">Solo Parent</label><br>

                        <input type="checkbox" id="eligibility4" name="specialinfo[]" value="4">
                        <label for="eligibilit4">Authority Practice Proff</label><br>

                        <input type="checkbox" id="eligibility5" name="specialinfo[]" value="5" >
                        <label for="eligibility5">Indigenous Group</label><br>

                        <input type="checkbox" id="eligibility6" name="specialinfo[]" value="6" >
                        <label for="eligibility6">PWD</label><br>
                      
                    </div>
                    </div>

                    <div class="col-md-6">

                      <h4>Last Date of promotion or Increment</h4>
                      <input type="date" name="promotion" class="form-select">

                      <br><h4>Date of Entry in Government</h4>
                      <input required type="date" name="entry" class="form-select" value="<?php if (isset($_POST['entry'])){echo $_POST['entry'];}?>">
                    </div>

                    <div class="col-md-6">
                        <h4>Entry Status</h4>
                        <select id="entrystatus" name="entrystatus" class="form-select">
                            <option value="0" selected="selected">- Select -</option>
                            <?php
                            $sql_entry_status = "select * from dbo.select_entry_status";
                          
                            if($result = sqlsrv_query($conn, $sql_entry_status))
                            {

                                while($row = sqlsrv_fetch_array($result))
                                {

                                  $entrystatus = $row['entry_status'];
                                  $entrystatus_id = $row['id'];

                                    if($_POST['entrystatus'] == $entrystatus)
                                    {
                                        echo "<option value='$entrystatus_id' selected>".$entrystatus."</option>";
                                    }
                                    else
                                    {
                                        echo "<option value='$entrystatus_id' >".$entrystatus."</option>";
                                    }

                                }
                            }
                            ?> 
                        </select>
                    </div>
                    <div class="col-md-6">
                        <h4>201 Files</h4>
                        <input type="text" name="201files" class="form-select" value="<?php if(isset($_POST['201files'])){ echo $_POST['201files']; }?>">
                    </div>

                    <div class="col-md-12">
                      <h4>Remarks</h4>
                      <textarea name="remarks" class="form-select" rows="5"  value="<?php if(isset($_POST['remarks'])){ echo $_POST['remarks']; }?>"></textarea>
                    </div>

                <div class="text-center">
                  <button type="submit" name="hrinfosave" class="btn btn-primary">Submit</button>
                </div>
              </form><!-- End No Labels Form -->

            </div>
          </div>

        </div>



      </div>
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
