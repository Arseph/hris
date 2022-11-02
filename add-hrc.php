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
      <h1>ADD HR Competency</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">ADD HR Competency</li>

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

                    include "scripts\add-competency-script.php";
                   
                    ?>
                    <br><h4>Select Employee<span style="color:red;">*</span></h4>
                    


                    <select name="sel_employee" class="form-select" required>
                        <option value="0">- Select -</option>
                        
                        <?php
                    
                    include "scripts\connect.php";
                    $sql_empname = "select * from dbo.emp_basic where hrinfo = 'unset' order by surname ASC";
                          
                            if($result = sqlsrv_query($conn, $sql_empname))
                            {

                                while($row = sqlsrv_fetch_array($result))
                                {

                                  $agencyid = $row['agencyid'];
                                  $empsurname = $row['surname'];
                                  $empfname = $row['firstname'];
                                  $emp_fullname = $empsurname.", ".$empfname;

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
                 <div class="col-md-12">
                      <h4>Field of Expertise</h4>
                      <textarea name="foe" CLASS='tinymce-editor'>
                        <table border="1" cellpadding="1" cellspacing="1">
    <tbody>
        <tr>
            <td>Field of Expertise</td>
            <td>Level</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>

    </tbody>
</table>

<p>&nbsp;</p>

                        </textarea>


</div>

                                     <div class="col-md-12">
                      <h4>Competency Gaps</h4>
                      <textarea name="remarks" class="tinymce-editor" name="gaps">
                        <table border="1" cellpadding="4" cellspacing="1" style="width:100%">
    <tbody>
        <tr>
            <td>No.</td>
            <td>Competency Required for<br />
            the Position</td>
            <td>Required Competency<br />
            Level (1-4)</td>
            <td>Current Competency<br />
            Level (1-4)</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>

        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    </tbody>
</table>

<p>&nbsp;</p>

                      </textarea>
                    </div>
                <div class="col-md-12">
                    <h4>Action Taken</h4>
                    <textarea class="tinymce-editor" name="actions">
                        <table border="1" cellpadding="4" cellspacing="1" style="width:100%">
    <tbody>
        <tr>
            <td>No.</td>
            <td>GAPS Identified</td>
            <td>Date Target to Address the GAP</td>
            <td>Action Taken&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    </tbody>
</table>

                    </textarea>
                </div>

                <div class="col-md-6"><br><h4>Competency Level</h4>
                              <select id="competency_lvl" name="competency_lvl" class="form-select">
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
               <div class="col-md-12">
                    <h4>GAD Intervention</h4>
                    <textarea class='form-control' name='gad'></textarea>
                </div>
                
                </div>

            

                <div class="text-center">
                  <button type="submit" name="hrcsave" class="btn btn-primary">Add Record</button>
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
