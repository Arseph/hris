<?php


session_start();
$uid=$_GET['uid']; // get link value
include "scripts\connect.php";
include "layouts\layout_sidebar.php";


$sql = "select * from hrinfo where agencyid='$uid'";

if($result = sqlsrv_query($conn, $sql))
{
  while($row = sqlsrv_fetch_array($result))
  {
    $mother_unit=$row['mother_unit'];
    $designated_unit =$row['designated_unit'];
    $mother_station=$row['mother_station'];
    $designated_station =$row['designated_station'];


    $employment_status =$row['employment_status'];
    $emp_inactive_type=$row['inactive_type'];




    $employment_type =$row['employment_type'];
    $nonperm_type=$row['nonperm_type'];
    $eligible=$row['eligible'];
    $delimiter = ',';
    $x=0; //special info loop variable

    if($eligible=='yes')
    {
        $eligibility_type=$row['eligibility_type'];
        
        
        $eligibility_string = explode($delimiter, $eligibility_type);
        $elig_string_count = count ($eligibility_string);
       
        
        
        $i=0; //eligibility type loop variable
        $p=0; //position loop variable
    }

    $emp_specialinfo=$row['special_info'];

    if ($emp_specialinfo!=""){
           
        $specialinfo_string = explode($delimiter, $emp_specialinfo);
        $specialinfo_count = count ($specialinfo_string);
    }else{
        $specialinfo_string="";
    }

    
    

    $emp_basicsal=$row['basic_salary'];
    $emp_highest_grade=$row['highest_grade'];
    $emp_position=$row['position'];
    $emp_salgrade=$row['salary_grade'];
    $emp_step=$row['step'];
    $emp_work_exp=$row['work_experience'];
    $emp_destype=$row['designation_type'];
    $emp_entrystatus=$row['entry_status'];
    $emp_personality=$row['personality'];
    $emp_itemno=$row['itemno'];
    $emp_201files=$row['files_201'];
    $emp_entrydate=$row['entry_date'];
    $emp_promotiondate=$row['promotion_date'];
    $emp_remarks=$row['remarks'];
    $emp_designation=$row['designation'];
    $emp_lvl3elig=$row['eligibility_lvl3'];
    $emp_mother_unit=$row['mother_unit'];
    $emp_designated_unit =$row['designated_unit'];
    $emp_mother_station=$row['mother_station'];
    $emp_designated_station =$row['designated_station'];


  }
}


 $sql = "select * from mstation where id='$mother_station'";
 if($result = sqlsrv_query($conn, $sql))
{
    while($row = sqlsrv_fetch_array($result))
    {
        $mother_station=$row['mother_station'];
        $mother_unit =$row['mother_unit'];

    }
}

$sql = "select * from mstation where id='$designated_station'";
    if($result = sqlsrv_query($conn, $sql))
    {
        while($row = sqlsrv_fetch_array($result))
        {
            $designated_station=$row['mother_station'];
            $designated_unit =$row['mother_unit'];
        }
    }

$sql = "select * from munit where id='$designated_unit'";
    if($result = sqlsrv_query($conn, $sql))
    {
        while($row = sqlsrv_fetch_array($result))
        {
            $designated_unit =$row['mother_unit'];
        }
    }

?>

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
                        $("#sel_user").append("<option value='0'>- Select Mother Station-</option>");
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
                        $("#sel_user2").append("<option value='"+id2+"'>- Select Designated Station - </option>");
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
                    if(isset($_SESSION['update_success'])){
                        if($_SESSION['update_success']!="")
                        {
                          echo $_SESSION['update_success'];
                          $_SESSION['update_success']="";
                        }
                      }
                    include "scripts\spit.php";
                    include "scripts\update-hrinfo-script.php";
                    ?>
                    
                 </div>
                 <div class="col-md-6"></div>
                 

                <div class="col-md-6"><br><h4>Currently Selected Mother Unit: <br><?php
                     
                        $sql = "select * from munit where id='$mother_unit'";

                        if($result = sqlsrv_query($conn, $sql))
                        {
                          while($row = sqlsrv_fetch_array($result))
                          {
                            $mother_unit=$row['mother_unit'];
                            echo "<b style='color:blue;'>".$mother_unit."</b>";
                          }
                        }
                     ?><br></h4>
                    
                              <select id="sel_depart" name="sel_depart" class="form-select">
                                    <option value="0">- Select Mother Unit-</option>
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
                <div class="col-md-6"><br><h4>Currently Selected Mother Station: <?php  echo "<b style='color:blue;'><br>".$mother_station."</b>" ?></h4>
                  <select id="sel_user" name="sel_user" class="form-select">
                    <option value="0">- Select Mother Station -</option>
                </select>
                </div>
                <div class="col-md-6"><br><h4>Currently Selected Designated Unit: <br><?php
                       
                        echo "<b style='color:blue;'>".$designated_unit."</b>";
                     ?></h4>
                  <select id="sel_depart2" name="sel_depart2" class="form-select">
                    <option value="0" >- Select Designated Unit-</option>
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
                <div class="col-md-6"><br><h4>Currently Selected Designated Station: <br><?php
                       
                        echo "<b style='color:blue;'>".$designated_station."</b>";
                     ?></h4>
                  <select id="sel_user2" name="sel_user2" class="form-select">
                      <option value="0">- Select Designated Station -</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <br><h4>Employment Status<span style="color:red;">*</span></h4>
                  <select name="empstatus" class="form-select" id='empStatus'>
                    <option value='0' disabled>- Select -</option>
                    <?php
                    if($employment_status == 'Active')
                    {
                        echo "<option value='Active' selected>Active</option>";
                        echo "<option value='Inactive'>Inactive</option>";
                    }
                    elseif($employment_status == 'Inactive')
                    {
                        echo "<option value='Active'>Active</option>";
                        echo "<option value='Inactive' selected>Inctive</option>";
                    }
                    ?></select>
                </div>
                <div class="col-md-6">
                  <br><h4>Inactive Type<span style="color:red;">*</span></h4>
                  <select name="inact" class="form-select" <?php if($employment_status=='Active'){ echo "disabled"; }?> id='intype'>
                    <option value='0'>- Select -</option>
                    <option value='1'<?php if($emp_inactive_type=='1'){
                        echo "selected";
                    }?>>Awol</option>
                    <option value='2' <?php if($emp_inactive_type=='2'){
                        echo "selected";
                    }?>>Retired</option>
                    <option value='3' <?php if($emp_inactive_type=='3'){
                        echo "selected";
                    }?>>Secondment</option>
                    <option value='4' <?php if($emp_inactive_type=='4'){
                        echo "selected";
                    }?>>Terminated</option>
                    <option value='5' <?php if($emp_inactive_type=='5'){
                        echo "selected";
                    }?>>End of Contract</option>
                    <option value='6' <?php if($emp_inactive_type=='6'){
                        echo "selected";
                    }?>>Dropped from the roll</option>
                  </select>
                </div>
                <div class="col-md-6">

                  <br><h4>Employment Type<span style="color:red;">*</span></h4>
                  <select name="emptype" class="form-select" id='empType' onclick="employeeType()">
                    <option value='0'>- Select -</option>
                    <option value='Permanent' 
                    <?php                         
                    if ($employment_type=='Permanent')
                    {
                        echo 'selected';
                    }
                    ?>
                    >Permanent</option>
                    <option value='Non-permanent' 
                    <?php                         
                    if ($employment_type=='Non-permanent')
                    {
                        echo 'selected';
                    }
                    ?>
                    >Non-permanent</option>
                   
                  </select>
                </div>
                <div class="col-md-6">
                  <br><h4>Non-permanent Type<span style="color:red;">*</span></h4>
                  <select class="form-select" name="nonperm" id="nonPerm" <?php if($employment_type=='Permanent'){echo "disabled";}?>>
                    <option value='0'> - Select - </option>

                    <?php
                        $sql = "select * from select_nonperm";
                        if($result = sqlsrv_query($conn, $sql))
                        {
                          while($row = sqlsrv_fetch_array($result))
                          {
                            $select_nonperm=$row['nonperm_type'];
                            $select_nonperm_id=$row['id'];

                                if($nonperm_type==$select_nonperm_id)
                                {
                                echo "<option value='$select_nonperm_id' selected>".$select_nonperm."</option>";
                                }
                                else
                                {
                                echo "<option value='$select_nonperm_id'>".$select_nonperm."</option>";
                                }  
                          }
                        }
                    ?>
                  </select>
                </div>
                <div class="col-md-6">
                    <h4>Eligible<span style="color:red;">*</span></h4>
                    <input required type="radio" name="eligible" Value="yes" onchange="elig()" 
                    <?php 
                    if ($eligible=='yes')
                    {
                        echo "checked";
                    }
                    ?>
                    >Yes
                    <input required type="radio" name="eligible" Value="no" onchange="notElig()" 
                    <?php 
                    if ($eligible=='no')
                    {
                        echo "checked";
                    }
                    ?>>no
                    
                    <br><br><h4>Eligibility Type</h4>
                        <input type="checkbox" id="eligibility1" name="eligibility[]" value="1" <?php
                            if($eligible=='yes')
                            {
                                foreach ($eligibility_string as $value) 
                                {
                                    if($eligibility_string[$i]=="1")
                                    {
                                        echo "checked";
                                    }
                                    $i++;
                                }
                            }else{
                                echo "disabled";
                            }
                            $i=0;
                        ?>>
                        <label for="eligibility1">Registered nurse</label><br>

                        <input type="checkbox" id="eligibility2" name="eligibility[]" value="2" <?php
                            if($eligible=='yes')
                            {
                                foreach ($eligibility_string as $value) 
                                {
                                    if($eligibility_string[$i]=="2")
                                    {
                                        echo "checked";
                                    }
                                    $i++;
                                }
                            }else{
                                echo "disabled";
                            }
                            $i=0;
                        ?>>
                        <label for="eligibility2">RA 1080</label><br>

                        <input type="checkbox" id="eligibility3" name="eligibility[]" value="3" <?php
                            if($eligible=='yes')
                            {
                                foreach ($eligibility_string as $value) 
                                {
                                    if($eligibility_string[$i]=="3")
                                    {
                                        echo "checked";
                                    }
                                    $i++;
                                }
                            }else{
                                echo "disabled";
                            }
                            $i=0;
                        ?>>
                        <label for="eligibility3">Licensure Exam for Teacher</label><br>

                        <input type="checkbox" id="eligibility4" name="eligibility[]" value="4" <?php
                            if($eligible=='yes')
                            {
                                foreach ($eligibility_string as $value) 
                                {
                                    if($eligibility_string[$i]=="4")
                                    {
                                        echo "checked";
                                    }
                                    $i++;
                                }
                            }else{
                                echo "disabled";
                            }
                            $i=0;
                        ?>>
                        <label for="eligibilit4">Environmental Planning</label><br>

                        <input type="checkbox" id="eligibility5" name="eligibility[]" value="5" <?php
                            if($eligible=='yes')
                            {
                                foreach ($eligibility_string as $value) 
                                {
                                    if($eligibility_string[$i]=="5")
                                    {
                                        echo "checked";
                                    }
                                    $i++;
                                }
                            }else{
                                echo "disabled";
                            }
                            $i=0;
                        ?>>
                        <label for="eligibility5">CS Sub-Professional</label><br>

                        <input type="checkbox" id="eligibility6" name="eligibility[]" value="6" <?php
                            if($eligible=='yes')
                            {
                                foreach ($eligibility_string as $value) 
                                {
                                    if($eligibility_string[$i]=="6")
                                    {
                                        echo "checked";
                                    }
                                    $i++;
                                }
                            }else{
                                echo "disabled";
                            }
                            $i=0;
                        ?>>
                        <label for="eligibility6">Midwifery Board</label><br>

                        <input type="checkbox" id="eligibility7" name="eligibility[]" value="7" <?php
                            if($eligible=='yes')
                            {
                                foreach ($eligibility_string as $value) 
                                {
                                    if($eligibility_string[$i]=="7")
                                    {
                                        echo "checked";
                                    }
                                    $i++;
                                }
                            }else{
                                echo "disabled";
                            }
                            $i=0;
                        ?>>
                        <label for="eligibility7">Barangay Eligibility</label><br>

                        <input type="checkbox" id="eligibility8" name="eligibility[]" value="8" <?php
                            if($eligible=='yes')
                            {
                                foreach ($eligibility_string as $value) 
                                {
                                    if($eligibility_string[$i]=="8")
                                    {
                                        echo "checked";
                                    }
                                    $i++;
                                }
                            }else{
                                echo "disabled";
                            }
                            $i=0;
                        ?>>
                        <label for="eligibilit8">National Competency TESDA</label><br>

                        <input type="checkbox" id="eligibility9" name="eligibility[]"  value="9" <?php
                            if($eligible=='yes')
                            {
                                foreach ($eligibility_string as $value) 
                                {
                                    if($eligibility_string[$i]=="9")
                                    {
                                        echo "checked";
                                    }
                                    $i++;
                                }
                            }else{
                                echo "disabled";
                            }
                            $i=0;
                        ?>>
                        <label for="eligibility9">CS Professional</label><br>

                        <input type="checkbox" id="eligibility10" name="eligibility[]" value="10"<?php
                            if($eligible=='yes')
                            {
                                foreach ($eligibility_string as $value) 
                                {
                                    if($eligibility_string[$i]=="10")
                                    {
                                        echo "checked";
                                    }
                                    $i++;
                                }
                            }else{
                                echo "disabled";
                            }
                            $i=0;
                        ?>>
                        <label for="eligibility10">Sanitation Board</label><br>

                        <input type="checkbox" id="eligibility11" name="eligibility[]" value="11"<?php
                            if($eligible=='yes')
                            {
                                foreach ($eligibility_string as $value) 
                                {
                                    if($eligibility_string[$i]=="11")
                                    {
                                        echo "checked";
                                    }
                                    $i++;
                                }
                            }else{
                                echo "disabled";
                            }
                            $i=0;
                        ?>>
                        <label for="eligibility11">Cvil Engineering</label><br>

                        <input type="checkbox" id="eligibility12" name="eligibility[]" value="12" <?php
                            if($eligible=='yes')
                            {
                                foreach ($eligibility_string as $value) 
                                {
                                    if($eligibility_string[$i]=="12")
                                    {
                                        echo "checked";
                                    }
                                    $i++;
                                }
                            }else{
                                echo "disabled";
                            }
                            $i=0;
                        ?>>
                        <label for="eligibilit12">Others</label><br>
                </div>
                <div class="col-6">
                 <h4>Eligibility Level 3</h4>
                 <select class="form-select" name="lvl3" id='elig_lvl3' <?php 
                 if($eligible=='no'){ echo "disabled"; }?>>
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

                  <br><h4>position<span style="color:red;">*</span></h4>
                    <select class="form-select" name="pos" required>
                       <option value='0'>- Select -</option>
                        <?php
                    
                    include "scripts\connect.php";
                    $sql_position = "select * from dbo.select_position order by EmpPosition ASC";
                          
                            if($result = sqlsrv_query($conn, $sql_position))
                            {

                                while($row = sqlsrv_fetch_array($result))
                                {
                                    $position_id = $row ['id'];
                                    $position = $row['EmpPosition'];


                                    if($emp_position == $position_id)
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
                    <select class="form-select" name="salarygrade" required>
                    <option value='0'>- Select -</option>
                    <?php 
                    $sql_salary_grade = "select * from dbo.select_salary_grade";
                          
                            if($result = sqlsrv_query($conn, $sql_salary_grade))
                            {

                                while($row = sqlsrv_fetch_array($result))
                                {

                                $salgrade = $row['salary_grade'];
                                $salgrade_id = $row['id'];

                                if($emp_salgrade == $salgrade_id)
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

                                    if($emp_step == $step_id)
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
                    <input type="text" name="itemno" id='itemno' class="form-select" value="<?php
                     if(isset($_POST['itemno'])){
                        echo $_POST['itemno'];
                     }
                    ?>" disabled>
                </div>

                <div class="col-6">
                    <br><h4>Basic Salary<span style="color:red;">*</span></h4>
                    <input required type="number" name="basicsalary" class="form-select" value="<?php echo $emp_basicsal; ?>">
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

                                    if($emp_destype == $destype_id)
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
                    <input required type="text" name="designation" class="form-select" value="<?php echo $emp_designation; ?>">
                </div>

                <div class="col-6">
                    <br><h4>Highest Grade Level<span style="color:red;">*</span></h4>
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

                                    if($emp_highest_grade == $high_grade_id)
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
                    </select>

                    <br><h4>Work Experience</h4>
                      <select class="form-select" name="workexperience">
                        <option value='0'>- select -</option>
                       <?php
                        $sql_work_exp= "select * from dbo.select_work_experience";
                          
                            if($result = sqlsrv_query($conn, $sql_work_exp))
                            {

                                while($row = sqlsrv_fetch_array($result))
                                {

                                  $work_exp = $row['work_experience'];
                                  $work_exp_id = $row['id'];

                                    if($emp_work_exp == $work_exp_id)
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

                                    if($emp_personality == $personality_id)
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
                      </select>

                <div id="myMultiselect" class="multiselect">
                      
                      <br><h4>Special Info</h4>
                        <input type="checkbox" id="eligibility1" name="specialinfo[]" value="1" 
                        <?php
                        if ($specialinfo_string!="")
                        { 
                        foreach ($specialinfo_string as $value) 
                                {
                                    if($specialinfo_string[$x]=="1")
                                    {
                                        echo "checked";
                                    }
                                    $x++;
                                }
                                $x=0;
                        }
                            ?>>
                        <label for="eligibility1">Presidential Appointee</label><br>

                        <input type="checkbox" id="eligibility2" name="specialinfo[]" value="2" <?php
                        if ($specialinfo_string!="")
                        { 
                        foreach ($specialinfo_string as $value) 
                                {
                                    if($specialinfo_string[$x]=="2")
                                    {
                                        echo "checked";
                                    }
                                    $x++;
                                }
                                $x=0;
                        }
                            ?>>

                        <label for="eligibility2">CSC Appointee</label><br>

                        <input type="checkbox" id="eligibility3" name="specialinfo[]" value="3" <?php
                        if ($specialinfo_string!="")
                        { 
                        foreach ($specialinfo_string as $value) 
                                {
                                    if($specialinfo_string[$x]=="3")
                                    {
                                        echo "checked";
                                    }
                                    $x++;
                                }
                                $x=0;
                        }
                            ?>>
                        <label for="eligibility3">Solo Parent</label><br>

                        <input type="checkbox" id="eligibility4" name="specialinfo[]" value="4" <?php
                        if ($specialinfo_string!="")
                        { 
                        foreach ($specialinfo_string as $value) 
                                {
                                    if($specialinfo_string[$x]=="4")
                                    {
                                        echo "checked";
                                    }
                                    $x++;
                                }
                                $x=0;
                        }
                            ?>>
                        <label for="eligibilit4">Authority Practice Proff</label><br>

                        <input type="checkbox" id="eligibility5" name="specialinfo[]" value="5" <?php
                        if ($specialinfo_string!="")
                        { 
                        foreach ($specialinfo_string as $value) 
                                {
                                    if($specialinfo_string[$x]=="5")
                                    {
                                        echo "checked";
                                    }
                                    $x++;
                                }
                                $x=0;
                        }
                            ?>>
                        <label for="eligibility5">Indigenous Group</label><br>

                        <input type="checkbox" id="eligibility6" name="specialinfo[]" value="6"<?php
                        if ($specialinfo_string!="")
                        { 
                        foreach ($specialinfo_string as $value) 
                                {
                                    if($specialinfo_string[$x]=="6")
                                    {
                                        echo "checked";
                                    }
                                    $x++;
                                }
                                $x=0;
                        }
                            ?>>
                        <label for="eligibility6">PWD</label><br>
                      
                    </div>
                    </div>

                    <div class="col-md-6">

                      <h4>Last Date of promotion or Increment</h4>
                      <input type="date" name="promotion" class="form-select" value="<?php echo $emp_promotiondate; ?>">

                      <br><h4>Date of Entry in Government</h4>
                      <input required type="date" name="entry" class="form-select"  value="<?php echo $emp_entrydate; ?>">
                    </div>

                    <div class="col-md-6">
                        <h4>Entry Status</h4>
                        <select id="entrystatus" name="entrystatus" class="form-select">
                            <option value="0" selected="selected">- Select -</option>
                            <?php
                        $sql_highest_grade = "select * from dbo.select_entry_status";
                          
                            if($result = sqlsrv_query($conn, $sql_highest_grade))
                            {

                                while($row = sqlsrv_fetch_array($result))
                                {

                                  $entry_status = $row['entry_status'];
                                  $entry_status_id = $row['id'];

                                    if($emp_entrystatus == $entry_status_id)
                                    {
                                        echo "<option value='$entry_status_id' selected>".$entry_status."</option>";
                                    }
                                    else
                                    {
                                        echo "<option value='$entry_status_id'>".$entry_status."</option>";
                                    }

                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <h4>201 Files</h4>
                        <input type="text" name="201files" class="form-select" value="<?php echo $emp_201files; ?>">
                    </div>

                    <div class="col-md-12">
                      <h4>Remarks</h4>
                      <textarea name="remarks" class="form-select" rows="5"  value="<?php echo $emp_remarks; ?>"></textarea>
                    </div>

                <div class="text-center">
                  <button type="submit" name="hrinfo_update" class="btn btn-primary">Submit</button>
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
  <script>
    function notElig(){
        document.getElementById("eligibility1").disabled = true;
        document.getElementById("eligibility2").disabled = true;
         document.getElementById("eligibility3").disabled = true;
        document.getElementById("eligibility4").disabled = true;
         document.getElementById("eligibility5").disabled = true;
        document.getElementById("eligibility6").disabled = true;
        document.getElementById("eligibility7").disabled = true;
        document.getElementById("eligibility8").disabled = true;
         document.getElementById("eligibility9").disabled = true;
        document.getElementById("eligibility10").disabled = true;
         document.getElementById("eligibility11").disabled = true;
        document.getElementById("eligibility12").disabled = true;
        document.getElementById("elig_lvl3").disabled = true;

        
        document.getElementById('eligibility1').checked = false;
        document.getElementById('eligibility2').checked = false;
        document.getElementById('eligibility3').checked = false;
        document.getElementById('eligibility4').checked = false;
        document.getElementById('eligibility5').checked = false;
        document.getElementById('eligibility6').checked = false;
        document.getElementById('eligibility7').checked = false;
        document.getElementById('eligibility8').checked = false;
        document.getElementById('eligibility9').checked = false;
        document.getElementById('eligibility10').checked = false;
        document.getElementById('eligibility11').checked = false;
        document.getElementById('eligibility12').checked = false;
        const $selectlvl3 = document.querySelector('#elig_lvl3');
            $selectlvl3.value = '0';

    }

    function elig(){
        document.getElementById("eligibility1").disabled = false;
        document.getElementById("eligibility2").disabled = false;
         document.getElementById("eligibility3").disabled = false;
        document.getElementById("eligibility4").disabled = false;
         document.getElementById("eligibility5").disabled = false;
        document.getElementById("eligibility6").disabled = false;
        document.getElementById("eligibility7").disabled = false;
        document.getElementById("eligibility8").disabled = false;
         document.getElementById("eligibility9").disabled = false;
        document.getElementById("eligibility10").disabled = false;
         document.getElementById("eligibility11").disabled = false;
        document.getElementById("eligibility12").disabled = false;
        document.getElementById("elig_lvl3").disabled = false;

        
   

    }

    $('#empType').change(function(e)
    {
        $("#empType option[value='0']").prop('disabled',true);

        if($(this).val() == "Permanent")
        {
            $( "#itemno" ).prop( "disabled", false );
            $( "#nonPerm" ).prop( "disabled", true );
            
            const $select = document.querySelector('#nonPerm');
            $select.value = '0';
            
        }
        else
        {
        $( "#nonPerm" ).prop( "disabled", false );
        $( "#itemno" ).prop( "disabled", true );

        $('#itemno"').val('');

        }
    });

        $('#empStatus').change(function(e)
    {


        if($(this).val() == "Active")
        {
            $( "#intype" ).prop( "disabled", true );
            const $select = document.querySelector('#intype');
            $select.value = '0';
        }
        else
        {
        $( "#intype" ).prop( "disabled", false );

        }
    });

  </script>
