<?php
session_start();
include "scripts\connect.php";

include "layouts\layout_sidebar.php";
?>
<script>
   function onFormSubmission(e){
       return confirm("do you want to delete Y/N");
   }

   var frm = document.getElementById('frm');
   frm.addEventListener("submit", onFormSubmission);
</script>

<style>
.ungrad_btn{
    background: url('assets/img/book-half.svg') no-repeat;
    cursor:pointer;
    margin-left: auto;
    margin-right: auto;
    width: 10%;
}


.txt_to {
/*  display: block;
  width: 100%;*/
/*  width: 300px;*/
width: 74%;
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
    var p = 1;
    var s = 1;
    var t = 1;
    var radio = 1;
    var radio2 = 1;


    function addP() {
        //const pcontainer = document.createElement("div");


        const pschool = document.createElement("input");
        document.getElementById("pschooldiv").appendChild(pschool);
        pschool.setAttribute('id','pschool'+p);
        pschool.setAttribute('name','pschool[]');
        pschool.setAttribute('class','form-control');
        pschool.setAttribute('type','text');
        pschool.setAttribute('placeholder', 'Name of School');
        pschool.setAttribute('required', '');

        const psfrom = document.createElement("input");
        document.getElementById("psyfromdiv").appendChild(psfrom);
        psfrom.setAttribute('id','psfrom'+p);
        psfrom.setAttribute('name','psyfrom[]');
        psfrom.setAttribute('class','form-control');
        psfrom.setAttribute('type','number');
        psfrom.setAttribute('placeholder', 'Year (From)');
        psfrom.setAttribute('required', '');

        const psto = document.createElement("input");
        document.getElementById("psytodiv").appendChild(psto);
        psto.setAttribute('id','psyto'+p);
        psto.setAttribute('name','psyto[]');
        psto.setAttribute('class','form-control');
        psto.setAttribute('type','number');
        psto.setAttribute('placeholder', 'Year (To)');
        psto.setAttribute('required', '');

         const scholarship = document.createElement("input");
        document.getElementById("pscholardiv").appendChild(scholarship);
        scholarship.setAttribute('id','txt_pscholarship'+p);
        scholarship.setAttribute('name','txt_pscholar[]');
        scholarship.setAttribute('class','form-control');
        scholarship.setAttribute('type','text');
        scholarship.setAttribute('style', 'width:100%');
        scholarship.setAttribute('placeholder', 'Scholarship/Honors');
        p++;

    }

    function minusP() {
        if (p>1){
        var pschooldel = document.getElementById("pschooldiv");
        var psytodel = document.getElementById("psytodiv");
        var pscholardel = document.getElementById("pscholardiv");
        var pfromdel = document.getElementById("psyfromdiv");


        pschooldel.removeChild(pschooldel.lastChild);


        pfromdel.removeChild(pfromdel.lastChild);

        psytodel.removeChild(psytodel.lastChild);


        pscholardel.removeChild(pscholardel.lastChild);


        p--;
        }

      
    }

    function  addS(){

        const sschool = document.createElement("input");
        document.getElementById("sschooldiv").appendChild(sschool);
        sschool.setAttribute('id','sschool'+s);
        sschool.setAttribute('name','sschool[]');
        sschool.setAttribute('class','form-control');
        sschool.setAttribute('type','text');
        sschool.setAttribute('placeholder', 'Name of School');
        sschool.setAttribute('required', '');

        const ssfrom = document.createElement("input");
        document.getElementById("ssyfromdiv").appendChild(ssfrom);
        ssfrom.setAttribute('id','ssfrom'+s);
        ssfrom.setAttribute('name','ssyfrom[]');
        ssfrom.setAttribute('class','form-control');
        ssfrom.setAttribute('type','number');
        ssfrom.setAttribute('placeholder', 'Year (From)');
        ssfrom.setAttribute('required', '');

        const ssto = document.createElement("input");
        document.getElementById("ssytodiv").appendChild(ssto);
        ssto.setAttribute('id','ssto'+s);
        ssto.setAttribute('name','ssyto[]');
        ssto.setAttribute('class','form-control');
        ssto.setAttribute('type','number');
        ssto.setAttribute('placeholder', 'Year (To)');
        ssto.setAttribute('required', '');



        const scholarship = document.createElement("input");
        document.getElementById("sscholardiv").appendChild(scholarship);
        scholarship.setAttribute('id','txt_sscholarship'+s);
        scholarship.setAttribute('name','txt_sscholar[]');
        scholarship.setAttribute('class','form-control');
        scholarship.setAttribute('type','text');
        scholarship.setAttribute('style', 'width:100%');
        scholarship.setAttribute('placeholder', 'Scholarship/Honors');
        s++;
        radio++;
    }

    function minusS(){
      if (s>1){
        var sschooldel = document.getElementById("sschooldiv");
        var ssyfromdel = document.getElementById("ssyfromdiv");
        var ssytodel = document.getElementById("ssytodiv");
        var sscholardel = document.getElementById("sscholardiv");
        sschooldel.removeChild(sschooldel.lastChild);
        ssyfromdel.removeChild(ssyfromdel.lastChild);
        ssytodel.removeChild(ssytodel.lastChild);
        sscholardel.removeChild(sscholardel.lastChild);
        s--;
        radio--;
        }
    }

    function addT(){
      const tschool = document.createElement("input");
        document.getElementById("tschooldiv").appendChild(tschool);
        tschool.setAttribute('id','tschool'+t);
        tschool.setAttribute('name','tschool[]');
        tschool.setAttribute('class','form-control');
        tschool.setAttribute('type','text');
        tschool.setAttribute('placeholder', 'Name of School');
        tschool.setAttribute('required', '');

      const tcourse = document.createElement("input");
        document.getElementById("coursediv").appendChild(tcourse);
        tcourse.setAttribute('id','tcourse'+t);
        tcourse.setAttribute('name','tcourse[]');
        tcourse.setAttribute('class','form-control');
        tcourse.setAttribute('type','text');
        tcourse.setAttribute('placeholder', 'Degree/Course');
        tcourse.setAttribute('required', '');


        const tsfrom = document.createElement("input");
        document.getElementById("tsyfromdiv").appendChild(tsfrom);
        tsfrom.setAttribute('id','tsfrom'+t);
        tsfrom.setAttribute('name','tsyfrom[]');
        tsfrom.setAttribute('class','form-control');
        tsfrom.setAttribute('type','number');
        tsfrom.setAttribute('placeholder', 'Year (From)');
        tsfrom.setAttribute('required', '');

        const tsto = document.createElement("input");
        document.getElementById("tsytodiv").appendChild(tsto);
        tsto.setAttribute('id','tsto'+t);
        tsto.setAttribute('name','tsyto[]');
        tsto.setAttribute('class','txt_to');
        tsto.setAttribute('type','number');
        tsto.setAttribute('placeholder', 'Year (To)');
        tsto.setAttribute('style', 'width:50%');
        tsto.setAttribute('required', '');


        
        const grad = document.createElement("input");
        document.getElementById("tsytodiv").appendChild(grad);
        grad.setAttribute('id','grad_year'+t)
        grad.setAttribute('name','grad_year'+t);
        grad.setAttribute('type','checkbox');
        grad.setAttribute('onclick','changebox(this.id)')

        const newLabel = document.createElement("label");
        newLabel.innerHTML = " Graduate year? ";
        document.getElementById("tsytodiv").appendChild(newLabel);



        const units = document.createElement("input");
        document.getElementById("unitsdiv").appendChild(units);
        units.setAttribute('id','txt_units'+t);
        units.setAttribute('name','units'+t);
        units.setAttribute('class','form-control');
        units.setAttribute('type','text');
        units.setAttribute('style', 'width:100%');
        units.setAttribute('placeholder', 'Units');

        const scholarship = document.createElement("input");
        document.getElementById("scholardiv").appendChild(scholarship);
        scholarship.setAttribute('id','txt_scholarship'+t);
        scholarship.setAttribute('name','txt_scholar[]');
        scholarship.setAttribute('class','form-control');
        scholarship.setAttribute('type','text');
        scholarship.setAttribute('style', 'width:100%');
        scholarship.setAttribute('placeholder', 'Scholarship/Honors');
        t++;
    }


    function minusT() {

      if (t>1){

        var tschooldel = document.getElementById("tschooldiv");
        var tsyfromdel = document.getElementById("tsyfromdiv");
        var tsytodel = document.getElementById("tsytodiv");

        var tcoursedel = document.getElementById("coursediv");
        var unitsdel = document.getElementById("unitsdiv");
        var scholardel = document.getElementById("scholardiv");

        tcoursedel.removeChild(tcoursedel.lastChild);

        tschooldel.removeChild(tschooldel.lastChild);
        tsyfromdel.removeChild(tsyfromdel.lastChild);
        tsytodel.removeChild(tsytodel.lastChild);
        tsytodel.removeChild(tsytodel.lastChild);
        tsytodel.removeChild(tsytodel.lastChild);
        unitsdel.removeChild(unitsdel.lastChild);
        scholardel.removeChild(scholardel.lastChild);
        t--;

        }
    }

    function grad(clicked_id) {

     document.getElementById(clicked_id).disabled = true;
     idnum = clicked_id;

     str_units = "txt_units";
     str_grad = "btn_ungrad";
     str_tsto = "tsto"
    
     idnum = idnum.substr(8, idnum.length);

     unitsid = str_units.concat(idnum);
     gradid = str_grad.concat(idnum);
     tstoid= str_tsto.concat(idnum);


     document.getElementById(unitsid).disabled = true;
     document.getElementById(gradid).disabled = false;

     tstovar = document.getElementById(tstoid);
     tstovar.style.backgroundColor = '#48e8e0';

     
    }

    function ungrad(clicked_id) {

     document.getElementById(clicked_id).disabled = true;
     idnum = clicked_id;
     str_units = "txt_units";
     str_grad="btn_grad";
     str_tsto = "tsto"
    
     idnum = idnum.substr(10, idnum.length);

     unitsid = str_units.concat(idnum);
     gradid = str_grad.concat(idnum);
     document.getElementById(unitsid).disabled = false;
     document.getElementById(gradid).disabled = false;

     tstosvar = document.getElementById(tstoid);
     tstovar.style.backgroundColor = '#fff';


    }

    function changebox(box_checked)
    {
      if (document.getElementById(box_checked).checked) 
      {
          //alert(box_checked+" checked");

          units_str ="txt_units";

          idnum = box_checked;
          idnum = idnum.substr(9, idnum.length);
          unitsid = units_str.concat(idnum);
          document.getElementById(unitsid).disabled = true;

      } else {
         // calculate();
         //alert(box_checked+" unchecked");

          units_str ="txt_units";
          
          idnum = box_checked;
          idnum = idnum.substr(9, idnum.length);
          unitsid = units_str.concat(idnum);
          document.getElementById(unitsid).disabled = false;
      }
    }



  </script>



  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Education Form</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Add Education</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add New Education</h5>
              <?php include "scripts/add-education-script.php"; ?>
<form method='post' type='submit' id='frm'>              

              <!-- No Labels Form -->
              <div  class="row g-3">
                <div class="col-md-8">
                  <H5><b>Select Employee:</b></H5> 
                </div>
                <div class="col-md-4">
                  <H5><b>Select Highest Level:</b></H5> 
                </div>
                <div class="col-md-8">
                  <select name="sel_employee" class="form-select" required>
                        <option value="0">- Select -</option>
                                    
                        <?php
                          
                    include "scripts\connect.php";
                    $sql_empname = "select * from dbo.emp_basic where firstname<>'admin' order by surname";
                          
                            if($result = sqlsrv_query($conn, $sql_empname))
                            {

                                while($row = sqlsrv_fetch_array($result))
                                {

                                  $agencyid = $row['agencyid'];

                                  $education_sql= "select * from emp_education where agencyid='$agencyid'";

                                  $paramm = array();
                                  $options = array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

                                  $education_result = sqlsrv_query( $conn, $education_sql , $paramm, $options);

                                  $count_education= sqlsrv_num_rows( $education_result );

                                  if($count_education<1)
                                  {
                                    $empsurname = $row['surname'];
                                    $empfname = $row['firstname'];
                                    $empmname = $row['middlename'];

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
                            }
                            ?>
                    </select>
                </div>
                <div class='col-md-4'>
                      <select id='sel_highgrade' class="form-select" name="sel_highgrade" required>
                    <option value='0'>- Select -</option>
                    <?php 
                    $primary_sql = "select * from dbo.select_highest_grade order by grade_rank asc";
                          
                    if($result = sqlsrv_query($conn, $primary_sql))
                    {
                      while($row = sqlsrv_fetch_array($result))
                      {
                        $highest_grade = $row['highest_grade'];
                        $id = $row['id'];



                        
                        if($_POST['sel_highgrade'] == $id)
                        {
                          echo "<option value='$id' selected>".$highest_grade."</option>";
                        }
                        else
                        {
                          echo "<option value='$id'>".$highest_grade."</option>";
                        }
                      }
                    }
                       
                    ?>
                    </select>
                </div>
                <div>

                </div>
                <br>
                 <div id='primary_main' class="row g-3">



                    <div class="col-10">
                      <H5><b>Select Primary Level Education:</b></H5>
                    </div>
                    
                    <div class="col-md-2">
                      <button class="btn btn-danger" id='Pminus' onclick='minusP()' type='button'>-</button>
                      <button class="btn btn-primary" id='Padd' onclick='addP()' type='button'>+</button>
                    </div>

                    <div class="col-md-4" id='pschooldiv'>
                      <input type="text" id='pschool0' class="form-control" placeholder="Name of School" name='pschool[]' required>
                    </div>
                    

                    <div class="col-md-2" id='psyfromdiv'>
                      <input type="number" class="form-control" placeholder="Year (From)" name='psyfrom[]' required>
  
                    </div>


                    <div class="col-md-3" id='psytodiv'>
                      <input type="number" class="form-control" placeholder="Year (To)" name='psyto[]' required id='psyto0'>
                    </div >
                    
                    
                    <div class="col-md-3" id='pscholardiv'>
                      <input type="text" 
                      class="form-control"
                      id='txt_pscholarship0'
                      placeholder="Scholarship/Honors" 
                      name='txt_pscholar[]'>
                    </div>

                </div >
                

                <div id='secondary_main' class="row g-3">

                    <div class="col-10">
                      <H5><b>Enter Secondary Level Education:</b></H5>
                    </div>
                    
                    <div class="col-md-2">
                      <button class="btn btn-danger" id='Sminus' onclick='minusS()' type='button'>-</button>
                      <button class="btn btn-primary" id='Sadd' onclick='addS()' type='button'>+</button>
                    </div>




                    <div class="col-md-4" id='sschooldiv'>
                      <input type="text" id='sschool0' class="form-control" placeholder="Name of School" name='sschool[]'>
                    </div>
                    

                    <div class="col-md-2" id='ssyfromdiv'>
                      <input type="number" class="form-control" placeholder="Year (From)" name='ssyfrom[]'>
  
                    </div>

                    <div class="col-md-3" id='ssytodiv'>
                      <input type="number" class="form-control" placeholder="Year (To)" name='ssyto[]' id='ssto0'>
                    </div >

                    
                    <div class="col-md-3" id='sscholardiv'>
                      <input type="text" 
                      class="form-control"
                      id='txt_sscholarship0'
                      placeholder="Scholarship/Honors" 
                      name='txt_sscholar[]'>
                    </div>
                </div >

                <div id='tertiary_main' class="row g-3">

                    <div class="col-10">
                      <H5><b>Enter Tertiary/Graduate/Vocational Education:</b></H5>
                    </div>
                    
                    <div class="col-md-2">
                      <button class="btn btn-danger" id='Tminus' onclick='minusT()' type='button'>-</button>
                      <button class="btn btn-primary" id='Tadd' onclick='addT()' type='button'>+</button>
                    </div>

                    <div class="col-md-2" id='tschooldiv'>
                      <input type="text" class="form-control" placeholder="Name of School" id='tschool0' name='tschool[]' >
                    </div>

                    <div class="col-md-2" id='coursediv'>
                      <input type="text" name="tcourse[]" placeholder="Degree/Course" class="form-control">
                    </div>

                    <div class="col-md-2" id='tsyfromdiv'>
                      <input type="number" class="form-control" placeholder="Year (From)" name='tsyfrom[]' >
                    </div>

                    <div class="col-md-3" id='tsytodiv'>
                      <input type="number" class="txt_to" placeholder="Year (To)" name='tsyto[]' id='tsto0' style='width:50%;'>
                      <input type="checkbox" id="grad_year0" name="grad_year0" onchange="changebox(this.id)"><label>Graduate year?</label> 
                    </div >


                    <div class="col-md-1">
                      <div class="input-group mb-3"  id='unitsdiv'>
                        <input type="text" id='txt_units0' class="form-control" placeholder="Units" name="units0" style='width:100%;'>
                      </div>
                    </div >

                    <div class="col-md-2" id='scholardiv'>
                      <input type="text" id='txt_scholarship0' class="form-control" placeholder="Scholarship/Honors" name="txt_scholar[]">
                    </div >

                </div >
                <div class="text-center">
                  <button class="btn btn-primary" name='save'>Submit</button>
                  <!-- <button type="reset" class="btn btn-secondary">Reset</button> -->
                </div>
              <!-- End No Labels Form -->

            </div>
          </div>

</form>        

        </div>
      </div>
    </section>

  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
    © Copyright <b>Department of Health</b>. All Rights Reserved
    </div>

  </footer><!-- End Footer -->

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

  <!-- add primary script -->


</body>

</html>
